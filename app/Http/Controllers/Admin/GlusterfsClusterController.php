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
        return $this->showClusterForm();
    }

    private function showClusterForm($id=null)
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
