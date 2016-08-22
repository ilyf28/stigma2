<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Stigma\ObjectManager\HostManager ;
use Stigma\ObjectManager\ServiceManager ;
use Stigma\CommandBuilder\CommandBuilder ;
use Stigma\Nagios\Client as NagiosClient ;
use Illuminate\Http\Response;

class HostController extends Controller {

    protected $hostManager ;
    protected $serviceManager ;
    protected $commandBuilder ;
    protected $nagiosClient ;

    public function __construct(HostManager $hostManager, ServiceManager $serviceManager,CommandBuilder $commandBuilder, NagiosClient $nagiosClient)
    {
        $this->hostManager = $hostManager ;
        $this->serviceManager = $serviceManager ;
        $this->commandBuilder = $commandBuilder ;
        $this->nagiosClient = $nagiosClient ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = $this->hostManager->getAllItems() ;
        return view('admin.host.index',compact('items')) ;  
    }

    public function generate()
    {
        $response = $this->nagiosClient->generateHost() ;

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
        return $this->showForm() ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    { 
        $param = $this->processFormData($request) ; 

        $this->hostManager->register($param) ;

        return redirect()->route('admin.hosts.index') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    { 
        return $this->showForm($id) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    { 
        return $this->showForm($id) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request , $id)
    {
        $param = $this->processFormData($request) ;
        

        $this->hostManager->update($id,$param) ;

        return redirect()->route('admin.hosts.index') ; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->hostManager->delete($id) ;
    }

    private function processFormData(Request $request)
    {
        $hostTmpl = config('host_tmpl') ;
        $param = [] ;

        $templateIds = $request->get('host_template') ;
        $serviceIds = $request->get('service_ids') ;


        foreach($request->all() as $key => $value)
        {
            if(array_key_exists($key,$hostTmpl) && ($value != '' )) { 
                $param[$key] = $value ;
            }
        } 

        $param['is_template'] = $request->get('is_template') ;
        $param['is_immutable'] = $request->get('is_immutable') ;

        if(count($templateIds) > 0){
            $param['template_ids'] = implode(',',$templateIds) ;
        }else {
            $param['template_ids'] = '' ; 
        }

        if(count($serviceIds) > 0){
            $param['service_ids'] = implode(',',$serviceIds) ;
        }else {
            $param['service_ids'] = '' ; 
        }

        if($request->get('command_id') > 0){
            $param['command_id'] = $request->get('command_id') ;
            $param['command_argument'] = $request->get('command_argument') ;
        }

        if($request->get('address') != ''){
            $param['address'] = $request->get('address') ;
        }

        return $param ;
    } 

    private function showForm($id=null)
    {
        if($id > 0){ 
            $host = $this->hostManager->find($id) ;
            $hostJsonData = json_decode($host->data) ;
        } 

        $hostTmpl = config('host_tmpl') ;
        $hostTmpl = collect($hostTmpl) ;
        $hostTmpl->sortBy(function($field){ 
            if($field['required'] && $field['display_name'] == 'HOST NAME' ){
                return 0 ;
            }else if($field['required'] ) { 
                return 1 ;
            }

            return 10;
        });

        $hostTemplateCollection = $this->hostManager->getAllTemplates() ;
        $serviceTemplateCollection = $this->serviceManager->getAllItems() ; 

        /*
        $serviceTemplateCollection = $serviceTemplateCollection->filter(function($item){ 
            if($item->is_template == 'N'){
                return $item ;
            } 
        });
         */ 

        $commandList = $this->commandBuilder->pluck('id','command_name')  ;


        if(isset($host)){
            return view('admin.host.edit',compact('hostTmpl','host','hostJsonData','hostTemplateCollection','serviceTemplateCollection','commandList')) ;   
        }else {
            return view('admin.host.create',compact('hostTmpl','hostTemplateCollection','serviceTemplateCollection','commandList')) ;   
        } 
    }
}
