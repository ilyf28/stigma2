<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\GlusterFS\GlusterFSManager;
use Stigma\ObjectManager\GlusterfsClusterManager;
use Stigma\ObjectManager\GlusterfsVolumeManager;
use Stigma\ObjectManager\HostManager;

class GlusterfsClusterController extends Controller {

    protected $glusterfsManager;
    protected $glusterfsClusterManager;
    protected $glusterfsVolumeManager;
    protected $hostManager;

    public function __construct(
        GlusterFSManager $glusterfsManager,
        GlusterfsClusterManager $glusterfsClusterManager,
        GlusterfsVolumeManager $glusterfsVolumeManager,
        HostManager $hostManager)
    {
        $this->glusterfsManager = $glusterfsManager;
        $this->glusterfsClusterManager = $glusterfsClusterManager;
        $this->glusterfsVolumeManager = $glusterfsVolumeManager;
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
        $param = array();

        $param['cluster_name'] = $request->get('cluster_name');
        $param['devices'] = $request->get('devices');
        $param['alias'] = $request->get('alias');
        
        $members = $request->get('cluster_members');

        if(count($members) > 0){
            $param['members'] = implode(',', $members);
        } else {
            $param['members'] = '';
        }

        $this->glusterfsClusterManager->register($param);

        if(count($members) > 0){
            $generator = $this->glusterfsManager->getClusterGenerator();
            $hosts = $this->findHostIP($members);
            $result = $generator->createCluster($hosts, $param['devices']);
            $this->glusterfsManager->execute($result);
        }

        return redirect()->route('admin.glusterfs.clusters.index');
    }

    public function edit($id)
    { 
        $cluster = $this->glusterfsClusterManager->find($id);
        $volumes = $this->glusterfsVolumeManager->findByForeign($id);
        $hostGlusterfsCollection = $this->hostManager->getAllGlusterfs();
        
        $brickAllCollection = array();
        if (!empty($cluster->members) && !empty($cluster->devices)) {
            $members = explode(',', $cluster->members);
            $devices = explode(',', $cluster->devices);
            $deviceCount = count($devices);
            foreach ($members as $member) {
                for ($i=0; $i < $deviceCount; $i++) { 
                    $brickNum = $i + 1;
                    $brickAllCollection[] = $member.":/gluster/brick".$brickNum;
                }
            }
        }

        return view('admin.glusterfs.cluster.edit', compact('cluster', 'volumes', 'brickAllCollection', 'hostGlusterfsCollection'));
    }

    public function update(Request $request, $id)
    {
        $param = array();

        $param['cluster_id'] = $id;
        $param['volume_name'] = $request->get('volume_name');
        $param['type'] = $request->get('type');

        $bricks = $request->get('volume_bricks');

        if(count($bricks) > 0){
            $param['bricks'] = implode(',', $bricks);
        } else {
            $param['bricks'] = '';
        }
        
        $volumes = $this->glusterfsVolumeManager->findByForeign($id);
        if(count($volumes) > 0){
            $this->glusterfsVolumeManager->update($volumes[0]->id, $param);
        } else {
            $this->glusterfsVolumeManager->register($param);
        }

        if(count($bricks) > 0){
            $generator = $this->glusterfsManager->getVolumeGenerator();
            $members = $request->get('cluster_members');
            $hosts = $this->findHostIP($members);
            $result = $generator->createVolume($hosts, $param['volume_name'], $param['bricks']);
            $this->glusterfsManager->execute($result);
        }

        return redirect()->route('admin.glusterfs.clusters.edit', $id);
    }

    public function destroy($id)
    {
        $cluster = $this->glusterfsClusterManager->find($id);
        $members = $cluster->members;
        $devices = $cluster->devices;
        $volumeGroups = array();
        for ($i = 0; $i <= count($devices); $i++) {
            $num = $i + 1;
            array_push($volumeGroups, 'GLUSTER_vg'.$num);
        }
        $vgs = implode(',', $volumeGroups);

        $generator = $this->glusterfsManager->getClusterGenerator();
        $result = $generator->deleteCluster($members, $devices, $vgs);
        $this->glusterfsManager->execute($result);

        // $this->glusterfsVolumeManager->delete(oid);
        $this->glusterfsClusterManager->delete($id);
    }

    public function destroyVolume($id)
    {
        $volume = $this->glusterfsVolumeManager->find($id);
        $volume_name = $volume->volume_name;
        $cluster_id = $volume->cluster_id;
        $cluster = $this->glusterfsClusterManager->find($cluster_id);
        $members = $cluster->members;

        $generator = $this->glusterfsManager->getVolumeGenerator();
        $result = $generator->deleteVolume($members, $volume_name);
        $this->glusterfsManager->execute($result);

        $this->glusterfsVolumeManager->delete($id);
    }

    private function findHostIP(array $members)
    {
        $hosts = array();
        foreach ($members as $member) {
            $host = $this->hostManager->findByName($member);
            $data = json_decode($host)[0]->data;
            $address = json_decode($data)->address;
            array_push($hosts, $address);
        }
        return $hosts;
    }

}
