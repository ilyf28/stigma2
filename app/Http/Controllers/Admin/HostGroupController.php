<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Stigma\ObjectManager\HostManager;
use Stigma\ObjectManager\HostgroupManager;

class HostgroupController extends Controller {

    protected $hostManager;
    protected $hostgroupManager;

    public function __construct(HostManager $hostManager, HostgroupManager $hostgroupManager)
    {
        $this->hostManager = $hostManager;
        $this->hostgroupManager = $hostgroupManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = $this->hostgroupManager->getAllItems();
        return view('admin.hostgroup.index', compact('items'));
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

        $this->hostgroupManager->register($param);

        return redirect()->route('admin.hostgroups.index');
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
        
        $this->hostgroupManager->update($id,$param);

        return redirect()->route('admin.hostgroups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->hostgroupManager->delete($id);
    }

    private function processFormData(Request $request)
    {
        $hostgroupTmpl = config('hostgroup_tmpl');
        $param = [];
        $result = [];

        foreach($request->all() as $key => $value)
        {
            if (array_key_exists($key, $hostgroupTmpl) && ($value != '')) {
                $param[$key] = $value;
            }
        }

        $result['hostgroup_name'] = $request->get('hostgroup_name');
        $result['alias'] = $request->get('alias');

        $hostMembers = $request->get('hostMembers');
        $hostgroupMembers = $request->get('hostgroupMembers');

        if(count($hostMembers) > 0){
            $param['members'] = implode(',', $hostMembers);
        }
        if(count($hostgroupMembers) > 0){
            $param['hostgroup_members'] = implode(',', $hostgroupMembers);
        }

        $result['data'] = $param;

        return $result;
    }

    private function showForm($id=null)
    {
        if ($id > 0) {
            $hostgroup = $this->hostgroupManager->find($id);
            $hostgroupJsonData = json_decode($hostgroup->data);
        }

        $hostgroupTmpl = config('hostgroup_tmpl');

        $hostAllCollection = $this->hostManager->getAllItems();
        $hostgroupAllCollection = $this->hostgroupManager->getAllItems();

        if (isset($hostgroup)) {
            return view('admin.hostgroup.edit',
                compact('hostAllCollection', 'hostgroupAllCollection', 'hostgroupTmpl', 'hostgroup', 'hostgroupJsonData'));
        } else {
            return view('admin.hostgroup.create',
                compact('hostAllCollection', 'hostgroupAllCollection', 'hostgroupTmpl'));
        }
    }

}
