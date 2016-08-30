<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Stigma\ObjectManager\CommandManager;
use Stigma\ObjectManager\ContactManager;
use Stigma\ObjectManager\HostManager;
use Stigma\ObjectManager\TimeperiodManager;
use Stigma\Nagios\Client as NagiosClient;

class HostController extends Controller {

    protected $commandManager;
    protected $contactManager;
    protected $hostManager;
    protected $timeperiodManager;
    protected $nagiosClient;

    public function __construct(
        CommandManager $commandManager, 
        ContactManager $contactManager,
        HostManager $hostManager, 
        TimeperiodManager $timeperiodManager, 
        NagiosClient $nagiosClient)
    {
        $this->commandManager = $commandManager;
        $this->contactManager = $contactManager;
        $this->hostManager = $hostManager;
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
        $items = $this->hostManager->getAllItems();
        return view('admin.host.index', compact('items'));  
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

        $this->hostManager->register($param);

        return redirect()->route('admin.hosts.index');
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
        
        $this->hostManager->update($id,$param);

        return redirect()->route('admin.hosts.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->hostManager->delete($id);
    }

    public function generate()
    {
        $response = $this->nagiosClient->generateHost();

        if($response == 200){
            return new Response('success', 200);
        }else{
            return new Response('error', 400);
        }
    }

    private function processFormData(Request $request)
    {
        $hostTmpl = config('host_tmpl');
        $param = [];
        $result = [];

        foreach($request->all() as $key => $value)
        {
            if (array_key_exists($key, $hostTmpl) && ($value != '')) {
                $param[$key] = $value;
            }
        }

        $result['host_name'] = $request->get('host_name');
        $result['alias'] = $request->get('alias');
        $result['is_template'] = $request->get('is_template');

        if ($request->get('is_template') == 'Y') {
            $result['template_name'] = $request->get('host_name');
            
            unset($param['host_name']);
            $param['name'] = $request->get('host_name');
        } else {
            $result['template_name'] = '';
        }

        $templates = $request->get('host_template');

        if(count($templates) > 0){
            $param['use'] = implode(',', $templates);
        }

        if (strcmp($request->get('check_command'), 'none') == 0) {
            unset($param['check_command']);
        } else {
            $param['check_command'] = $request->get('check_command').'!'.$request->get('check_commandArg');
        }
        unset($param['check_commandArg']);

        $result['data'] = $param;

        return $result;
    } 

    private function showForm($id=null)
    {
        if ($id > 0) {
            $host = $this->hostManager->find($id);
            $hostJsonData = json_decode($host->data);
            $command = 'none';
            $commandArg = '';
            if (isset($hostJsonData->check_command)) {
                $splited = explode('!', $hostJsonData->check_command, 2);
                $command = $splited[0];
                if (count($splited) > 1) $commandArg = $splited[1];
            }
        }

        $hostTmpl = config('host_tmpl');

        $hostTemplateCollection = $this->hostManager->getAllTemplates();

        $commandList = $this->commandManager->pluck('command_name');
        $timeperiodList =$this->timeperiodManager->pluck('timeperiod_name');
        $contactList =$this->contactManager->pluck('contact_name');

        if (isset($host)) {
            return view('admin.host.edit',
                compact('hostTmpl', 'host', 'hostJsonData', 'hostTemplateCollection', 'command', 'commandArg', 'commandList', 'timeperiodList', 'contactList'));
        } else {
            return view('admin.host.create',
                compact('hostTmpl', 'hostTemplateCollection', 'commandList', 'timeperiodList', 'contactList'));
        }
    }
}
