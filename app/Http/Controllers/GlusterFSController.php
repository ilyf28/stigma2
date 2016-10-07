<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\GlusterFS\GlusterFSManager;
use Stigma\ObjectManager\GlusterfsClusterManager;

class GlusterFSController extends Controller {

    protected $glusterfsClusterManager;

    public function __construct(
        GlusterFSManager $glusterFSManager,
        GlusterfsClusterManager $glusterfsClusterManager)
    {
        $this->glusterFSManager = $glusterFSManager;
        $this->glusterfsClusterManager = $glusterfsClusterManager;
    }

    public function getAllClusters()
    {
        $items = $this->glusterfsClusterManager->getAllItems();

        return $items;
    }

    public function getClusterStatus($id)
    {
        try {
            $command = "ansible -i /etc/ansible/hosts 192.168.107.131 -m shell -a 'gstatus -v -o json'  2>&1";
            $output = array();
            exec($command, $output);
            return $output;
            // $result = array();
            // $result['result'] = json_decode('{"brick_count": 6, "bricks_active": 6, "glfs_version": "3.7.9", "node_count": 2, "nodes_active": 2, "over_commit": "No", "product_name": "Red Hat Gluster Storage Server 3.1 Update 3", "raw_capacity": 128081461248, "sh_active": 2, "sh_enabled": 2, "snapshot_count": 0, "status": "healthy", "usable_capacity": 64040730624, "used_capacity": 207716352, "volume_count": 1, "volume_summary": [{"snapshot_count": 0, "state": "up", "usable_capacity": 64040730624, "used_capacity": 103858176, "volume_name": "vol-01"}]}');
            // return $result;
        } catch (Exception $e) {
            
        }
        // $items = $this->glusterFSManager->exec($command);

        // return $items;
    }

}
