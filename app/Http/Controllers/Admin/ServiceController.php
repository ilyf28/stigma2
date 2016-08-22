<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Stigma\ObjectManager\HostManager ;
use Stigma\ObjectManager\ServiceManager ;
use Stigma\CommandBuilder\CommandBuilder ; 
use Stigma\Nagios\Client as NagiosClient ;
use Illuminate\Http\Response;

class ServiceController extends Controller {

    protected $hostManager ;
    protected $serviceManager ;
    protected $commandBuilder ;
 
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
        $items = $this->serviceManager->getAllItems() ;
        return view('admin.service.index',compact('items')) ;   
    }

    public function generate()
    {
        $response = $this->nagiosClient->generateService() ; 

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
        $serviceTmpl = config('service_tmpl') ;
        $serviceTmpl = collect($serviceTmpl) ;
        $serviceTmpl->sortBy(function($field){ 
            if($field['required'] && $field['display_name'] == 'SERVICE NAME' ){
                return 0 ;
            }else if($field['required'] ) { 
                return 1 ;
            }

            return 10;
        });

        $serviceTemplateCollection = $this->serviceManager->getAllTemplates() ;

        $commandList = $this->commandBuilder->pluck('id','command_name')  ;

        return view('admin.service.create',compact('serviceTmpl','serviceTemplateCollection','commandList')) ;  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $param = $this->processFormData($request) ; 

        $this->serviceManager->register($param) ;

        return redirect()->route('admin.services.index') ;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    { 
        $service = $this->serviceManager->find($id) ;
        $serviceJsonData = json_decode($service->data) ;

        $serviceTmpl = config('service_tmpl') ;
        $serviceTmpl = collect($serviceTmpl) ;
        $serviceTmpl->sortBy(function($field){ 
            if($field['required'] && $field['display_name'] == 'SERVICE NAME' ){
                return 0 ;
            }else if($field['required'] ) { 
                return 1 ;
            }

            return 10;
        });

        $serviceTemplateCollection = $this->serviceManager->getAllTemplates() ;
        $commandList = $this->commandBuilder->pluck('id','command_name')  ;

        return view('admin.service.edit',compact('serviceTmpl','service','serviceJsonData','serviceTemplateCollection','commandList')) ;    

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

        $this->serviceManager->update($id,$param) ;

        return redirect()->route('admin.services.index') ; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->serviceManager->delete($id) ;
    }

    private function processFormData(Request $request)
    {
        $serviceTmpl = config('service_tmpl') ;
        $param = [] ;

        $templateIds = $request->get('service_template') ; 

        foreach($request->all() as $key => $value)
        {
            if(array_key_exists($key,$serviceTmpl) && ($value != '' )) { 
                $param[$key] = $value ;
            }
        } 

        $param['is_template'] = $request->get('is_template') ;
        $param['is_immutable'] = $request->get('is_immutable') ;
        $param['service_name'] = $request->get('service_name') ;

        if(count($templateIds) > 0){
            $param['template_ids'] = implode(',',$templateIds) ;
        }

        if($request->get('command_id') > 0){
            $param['command_id'] = $request->get('command_id') ;
            $param['command_argument'] = $request->get('command_argument') ;
        } 

        return $param ;
    }
}
