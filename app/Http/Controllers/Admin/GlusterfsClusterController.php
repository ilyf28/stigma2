<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\GlusterFS\GlusterFSManager;
use Stigma\ObjectManager\GlusterfsClusterManager;
use Stigma\ObjectManager\HostManager;

class GlusterfsClusterController extends Controller {

    protected $glusterfsManager;
    protected $glusterfsClusterManager;
    protected $hostManager;

    public function __construct(
        GlusterFSManager $glusterfsManager,
        GlusterfsClusterManager $glusterfsClusterManager,
        HostManager $hostManager)
    {
        $this->glusterfsManager = $glusterfsManager;
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
        $hostGlusterfsCollection = $this->hostManager->getAllGlusterfs();

        return view('admin.glusterfs.cluster.create', compact('hostGlusterfsCollection'));
    }

    public function store(Request $request)
    { 
        $param = $this->processFormData($request);

        $this->glusterfsClusterManager->register($param);

        $members = $request->get('cluster_members');
        $this->runGdeploy($members);

        return redirect()->route('admin.glusterfs.clusters.index');
    }

    public function edit($id)
    { 
        $cluster = $this->glusterfsClusterManager->find($id);

        $hostGlusterfsCollection = $this->hostManager->getAllGlusterfs();

        return view('admin.glusterfs.cluster.edit', compact('cluster', 'hostGlusterfsCollection'));
    }

    public function update(Request $request, $id)
    {
        $param = $this->processFormData($request);
        
        $this->glusterfsClusterManager->update($id, $param);

        $members = $request->get('cluster_members');
        $this->runGdeploy($members);

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
        
        $members = $request->get('cluster_members');

        if(count($members) > 0){
            $result['members'] = implode(',', $members);
        } else {
            $result['members'] = '';
        }

        return $result;
    }

    private function runGdeploy($members)
    {
        if(count($members) > 0){
            $generator = $this->glusterfsManager->getClusterGenerator();
            $hosts = array();
            foreach ($members as $member) {
                $host = $this->hostManager->findByName($member);
                $data = json_decode($host)[0]->data;
                $address = json_decode($data)->address;
                array_push($hosts, $address);
            }
            $result = $generator->createCluster($hosts);
            $this->glusterfsManager->execute($result);
        }
    }

}
