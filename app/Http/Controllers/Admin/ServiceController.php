<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Stigma\ObjectManager\CommandManager;
use Stigma\ObjectManager\ContactManager;
use Stigma\ObjectManager\HostManager;
use Stigma\ObjectManager\ServiceManager;
use Stigma\ObjectManager\TimeperiodManager;
use Stigma\Nagios\Client as NagiosClient;

class ServiceController extends Controller {

    protected $commandManager;
    protected $contactManager;
    protected $hostManager;
    protected $serviceManager;
    protected $timeperiodManager;
    protected $nagiosClient;

    public function __construct(
        CommandManager $commandManager, 
        ContactManager $contactManager,
        HostManager $hostManager, 
        ServiceManager $serviceManager,
        TimeperiodManager $timeperiodManager, 
        NagiosClient $nagiosClient)
    {
        $this->commandManager = $commandManager;
        $this->contactManager = $contactManager;
        $this->hostManager = $hostManager;
        $this->serviceManager = $serviceManager;
        $this->timeperiodManager = $timeperiodManager;
        $this->nagiosClient = $nagiosClient;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    { 
        $items = $this->serviceManager->getAllItems();
        return view('admin.service.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->showForm();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $param = $this->processFormData($request); 

        $this->serviceManager->register($param);

        return redirect()->route('admin.services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->showForm($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    { 
        return $this->showForm($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */ 
    public function update(Request $request , $id)
    {
        $param = $this->processFormData($request); 

        $this->serviceManager->update($id,$param);

        return redirect()->route('admin.services.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->serviceManager->delete($id);
    }

    public function generate()
    {
        $response = $this->nagiosClient->generateService(); 

        if($response == 200){
            return new Response('success', 200);
        }else{
            return new Response('error', 400);
        }
    }

    private function processFormData(Request $request)
    {
        $serviceTmpl = config('service_tmpl');
        $param = [];
        $result = [];

        foreach($request->all() as $key => $value)
        {
            if (array_key_exists($key, $serviceTmpl) && ($value != '' )) { 
                $param[$key] = $value;
            }
        }

        $result['host_name'] = $request->get('host_name');
        $result['service_description'] = $request->get('service_description');
        $result['is_template'] = $request->get('is_template');

        if ($request->get('is_template') == 'Y') {
            $result['template_name'] = $request->get('host_name');
            
            unset($param['host_name']);
            $param['name'] = $request->get('host_name');
        } else {
            $result['template_name'] = null;
        }

        $templates = $request->get('service_template');

        if(count($templates) > 0){
            $param['use'] = implode(',', $templates);
        }

        if (strcmp($request->get('check_command'), 'none') == 0) {
            unset($param['check_command']);
        } else {
            $arg = '';
            if (strcmp($request->get('check_commandArg'), '') != 0) $arg = '!'.$request->get('check_commandArg');
            $param['check_command'] = $request->get('check_command').$arg;
        }
        unset($param['check_commandArg']);

        $result['data'] = $param;

        return $result;
    }

    private function showForm($id=null)
    {
        $command = 'none';
        $commandArg = '';

        if ($id > 0) {
            $service = $this->serviceManager->find($id);
            $serviceJsonData = json_decode($service->data);
            if (isset($serviceJsonData->check_command)) {
                $splited = explode('!', $serviceJsonData->check_command, 2);
                $command = $splited[0];
                if (count($splited) > 1) $commandArg = $splited[1];
            }
        }

        $serviceTmpl = config('service_tmpl');

        $serviceTemplateCollection = $this->serviceManager->getAllTemplates();

        $commandList = $this->commandManager->pluck('command_name');
        $timeperiodList =$this->timeperiodManager->pluck('timeperiod_name');
        $contactList =$this->contactManager->pluck('contact_name');
        $hostList = $this->hostManager->pluck('host_name');

        if (isset($service)) {
            return view('admin.service.edit',
                compact('serviceTmpl', 'service', 'serviceJsonData', 'serviceTemplateCollection', 'command', 'commandArg', 'commandList', 'timeperiodList', 'contactList', 'hostList'));
        } else {
            return view('admin.service.create',
                compact('serviceTmpl', 'serviceTemplateCollection', 'command', 'commandArg', 'commandList', 'timeperiodList', 'contactList', 'hostList'));
        }
    }
}
