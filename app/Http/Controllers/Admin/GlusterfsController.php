<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\ObjectManager\GlusterfsClusterManager;
use Stigma\ObjectManager\HostManager;

class GlusterfsController extends Controller {

    protected $glusterfsClusterManager;
    protected $hostManager;

    public function __construct(
        GlusterfsClusterManager $glusterfsClusterManager,
        HostManager $hostManager)
    {
        $this->glusterfsClusterManager = $glusterfsClusterManager;
        $this->hostManager = $hostManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function clusterList()
    {
        $items = $this->glusterfsClusterManager->getAllItems();
        return view('admin.glusterfs.index', compact('items'));
    }

}
