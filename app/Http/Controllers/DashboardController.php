<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interfaces\NagiosInterface;

use Stigma\ObjectManager\GlusterfsClusterManager;
use Stigma\ObjectManager\GlusterfsVolumeManager;
use Stigma\ObjectManager\HostManager;

class DashboardController extends Controller
{
    private $nagiosAPI;
    protected $glusterfsClusterManager;
    protected $glusterfsVolumeManager;
    protected $hostManager;

    /**
     * Set the dependencies.
     *
     * @param NagiosInterface $nagiosAPI
     * @return void
     */
    public function __construct(
        NagiosInterface $nagiosAPI,
        GlusterfsClusterManager $glusterfsClusterManager,
        GlusterfsVolumeManager $glusterfsVolumeManager,
        HostManager $hostManager)
    {
        $this->nagiosAPI = $nagiosAPI;
        $this->glusterfsClusterManager = $glusterfsClusterManager;
        $this->glusterfsVolumeManager = $glusterfsVolumeManager;
        $this->hostManager = $hostManager;
    }

    /**
     * Display a nagios system status.
     *
     * @return \Illuminate\Http\Response
     */
    // public function systemstatus()
    // {
    //     $result = $this->nagiosAPI->getSystemStatus();

    //     return $result;
    // }

    /**
     * Display a host status.
     *
     * @return \Illuminate\Http\Response
     */
    public function hoststatus()
    {
        $result = $this->nagiosAPI->getHostStatus();

        return $result;
    }

    /**
     * Display a service status.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicestatus()
    {
        $result = $this->nagiosAPI->getServiceStatus();

        return $result;
    }

    /**
     * Display a glusterfs status.
     *
     * @return \Illuminate\Http\Response
     */
    public function glusterfsstatus()
    {
        $result = array();
        $count = array();

        $hosts = $this->hostManager->getAllGlusterfs();
        $clusters = $this->glusterfsClusterManager->getAllItems();
        $volumes = $this->glusterfsVolumeManager->getAllItems();
        $countBricks = 0;
        foreach ($volumes as $volume) {
            $bricks = explode(',', $volume->bricks);
            $countBricks += count($bricks);
        }

        $count['node'] = count($hosts);
        $count['cluster'] = count($clusters);
        $count['volume'] = count($volumes);
        $count['brick'] = $countBricks;
        $count['alert'] = '0';

        $result['data']['count'] = $count;

        return $result;
    }

    /**
     * Display a event log.
     *
     * @param  string  $type
     * @param  string  $startdate
     * @param  string  $enddate
     * @return \Illuminate\Http\Response
     */
    public function event($type, $starttime, $endtime)
    {
        $result = $this->nagiosAPI->getEvent($type, $starttime, $endtime);

        return $result;
    }
}
