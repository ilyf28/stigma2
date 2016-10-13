<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Stigma\ObjectManager\ServiceManager;
use Stigma\ObjectManager\ServicegroupManager;

class ServicegroupController extends Controller {

    protected $serviceManager;
    protected $servicegroupManager;

    public function __construct(ServiceManager $serviceManager, ServicegroupManager $servicegroupManager)
    {
        $this->serviceManager = $serviceManager;
        $this->servicegroupManager = $servicegroupManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = $this->servicegroupManager->getAllItems();
        return view('admin.servicegroup.index', compact('items'));
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

        $this->servicegroupManager->register($param);

        return redirect()->route('admin.servicegroups.index');
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
    public function update(Request $request, $id)
    {
        $param = $this->processFormData($request);
        
        $this->servicegroupManager->update($id,$param);

        return redirect()->route('admin.servicegroups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->servicegroupManager->delete($id);
    }

    private function processFormData(Request $request)
    {
        $servicegroupTmpl = config('servicegroup_tmpl');
        $param = [];
        $result = [];

        foreach($request->all() as $key => $value)
        {
            if (array_key_exists($key, $servicegroupTmpl) && ($value != '')) {
                $param[$key] = $value;
            }
        }

        $result['servicegroup_name'] = $request->get('servicegroup_name');
        $result['alias'] = $request->get('alias');

        $serviceMembers = $request->get('serviceMembers');
        $servicegroupMembers = $request->get('servicegroupMembers');

        if(count($serviceMembers) > 0){
            $param['members'] = implode(',', $serviceMembers);
        }
        if(count($servicegroupMembers) > 0){
            $param['servicegroup_members'] = implode(',', $servicegroupMembers);
        }

        $result['data'] = $param;

        return $result;
    }

    private function showForm($id=null)
    {
        if ($id > 0) {
            $servicegroup = $this->servicegroupManager->find($id);
            $servicegroupJsonData = json_decode($servicegroup->data);
        }

        $servicegroupTmpl = config('servicegroup_tmpl');

        $serviceAllCollection = $this->serviceManager->getAllItems();
        $servicegroupAllCollection = $this->servicegroupManager->getAllItems();

        if (isset($servicegroup)) {
            return view('admin.servicegroup.edit',
                compact('serviceAllCollection', 'servicegroupAllCollection', 'servicegroupTmpl', 'servicegroup', 'servicegroupJsonData'));
        } else {
            return view('admin.servicegroup.create',
                compact('serviceAllCollection', 'servicegroupAllCollection', 'servicegroupTmpl'));
        }
    }

}
