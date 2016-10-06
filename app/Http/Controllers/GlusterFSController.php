<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Stigma\ObjectManager\GlusterfsClusterManager;

class GlusterFSController extends Controller {

    protected $glusterfsClusterManager;

    /**
     * Set the dependencies.
     *
     * @param NagiosInterface $nagiosAPI
     * @return void
     */
    public function __construct(GlusterfsClusterManager $glusterfsClusterManager)
    {
        $this->glusterfsClusterManager = $glusterfsClusterManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getAllClusters()
    {
        $items = $this->glusterfsClusterManager->getAllItems();

        return $items;
    }

}
