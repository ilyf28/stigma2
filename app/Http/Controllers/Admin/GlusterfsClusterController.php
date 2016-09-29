<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\ObjectManager\GlusterfsClusterManager;
use Stigma\ObjectManager\HostManager;

class GlusterfsClusterController extends Controller {

    protected $glusterfsClusterManager;
    protected $hostManager;

    public function __construct(
        GlusterfsClusterManager $glusterfsClusterManager,
        HostManager $hostManager)
    {
        $this->glusterfsClusterManager = $glusterfsClusterManager;
        $this->hostManager = $hostManager;
    }

    public function index()
    {
        $items = $this->glusterfsClusterManager->getAllItems();
        return view('admin.glusterfs.cluster.index', compact('items'));
    }

    public function create()
    {
        return $this->showForm();
    }

    public function store(Request $request)
    { 
        $param = $this->processFormData($request);

        $this->glusterfsClusterManager->register($param);

        return redirect()->route('admin.glusterfs.clusters.index');
    }

    public function edit($id)
    { 
        return $this->showForm($id);
    }

    public function update(Request $request, $id)
    {
        $param = $this->processFormData($request);
        
        $this->glusterfsClusterManager->update($id, $param);

        return redirect()->route('admin.glusterfs.clusters.index');
    }

    public function destroy($id)
    {
        $this->glusterfsClusterManager->delete($id);
    }

    private function processFormData(Request $request)
    {
        $result = [];

        $result['cluster_name'] = $request->get('cluster_name');
        $result['alias'] = $request->get('alias');
        
        $member = $request->get('cluster_member');

        if(count($member) > 0){
            $result['member'] = implode(',', $member);
        } else {
            $result['member'] = '';
        }

        return $result;
    }

    private function showForm($id=null)
    {
        if ($id > 0) {
            $cluster = $this->glusterfsClusterManager->find($id);
        }

        $hostGlusterfsCollection = $this->hostManager->getAllGlusterfs();

        if (isset($cluster)) {
            return view('admin.glusterfs.cluster.edit', compact('cluster', 'hostGlusterfsCollection'));
        } else {
            return view('admin.glusterfs.cluster.create', compact('hostGlusterfsCollection'));
        }
    }

}
