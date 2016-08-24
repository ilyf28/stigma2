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

    public function generate()
    {
        $response = $this->nagiosClient->generateHost();

        if($response == 200){
            return new Response('success', 200);
        }else{
            return new Response('error', 400);
        }
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

    private function processFormData(Request $request)
    {
        $hostTmpl = config('host_tmpl');
        $param = [];

        $templateIds = $request->get('host_template');
        $serviceIds = $request->get('service_ids');


        foreach($request->all() as $key => $value)
        {
            if(array_key_exists($key,$hostTmpl) && ($value != '' )) { 
                $param[$key] = $value;
            }
        } 

        $param['is_template'] = $request->get('is_template');
        $param['is_immutable'] = $request->get('is_immutable');

        if(count($templateIds) > 0){
            $param['template_ids'] = implode(',',$templateIds);
        }else {
            $param['template_ids'] = ''; 
        }

        if(count($serviceIds) > 0){
            $param['service_ids'] = implode(',',$serviceIds);
        }else {
            $param['service_ids'] = ''; 
        }

        if($request->get('command_id') > 0){
            $param['command_id'] = $request->get('command_id');
            $param['command_argument'] = $request->get('command_argument');
        }

        if($request->get('address') != ''){
            $param['address'] = $request->get('address');
        }

        return $param;
    } 

    private function showForm($id=null)
    {
        if($id > 0){ 
            $host = $this->hostManager->find($id);
            $hostJsonData = json_decode($host->data);
        } 

        $hostTmpl = config('host_tmpl');

        $hostTemplateCollection = $this->hostManager->getAllTemplates();

        $commandList = $this->commandManager->pluck('id', 'command_name');
        $timeperiodList =$this->timeperiodManager->pluck('id', 'timeperiod_name');
        $contactList =$this->contactManager->pluck('id', 'contact_name');


        if(isset($host)){
            return view('admin.host.edit',
                compact('hostTmpl', 'host', 'hostJsonData', 'hostTemplateCollection', 'commandList','timeperiodList', 'contactList'));
        }else {
            return view('admin.host.create',
                compact('hostTmpl', 'hostTemplateCollection', 'commandList','timeperiodList', 'contactList'));
        } 
    }
}
