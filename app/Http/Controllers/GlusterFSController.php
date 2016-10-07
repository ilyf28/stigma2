<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\GlusterFS\GlusterFSManager;
use Stigma\ObjectManager\GlusterfsClusterManager;
use Stigma\ObjectManager\HostManager;

class GlusterFSController extends Controller {

    protected $glusterFSManager;
    protected $glusterfsClusterManager;
    protected $hostManager;

    public function __construct(
        GlusterFSManager $glusterFSManager,
        GlusterfsClusterManager $glusterfsClusterManager,
        HostManager $hostManager)
    {
        $this->glusterFSManager = $glusterFSManager;
        $this->glusterfsClusterManager = $glusterfsClusterManager;
        $this->hostManager = $hostManager;
    }

    public function getAllClusters()
    {
        $items = $this->glusterfsClusterManager->getAllItems();

        return $items;
    }

    public function getClusterStatus($id)
    {
        $cluster = $this->glusterfsClusterManager->find($id);
        $members = explode(',', $cluster->members);
        $host_name = $members[0];
        $host = $this->hostManager->findByName($host_name);
        $data = json_decode($host)[0]->data;
        $address = json_decode($data)->address;

        try {
            $command = "sudo ansible -i /etc/ansible/hosts ".$address." -m shell -a 'gstatus -v -o json | cut -b 28-'  2>&1";
            $output = $this->glusterFSManager->exec($command);
            $result = array();
            $result['result'] = $output[1];
            return $result;
        } catch (Exception $e) {
            
        }
    }

}
