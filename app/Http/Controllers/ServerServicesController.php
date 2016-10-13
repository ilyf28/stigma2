<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interfaces\NagiosInterface;

class ServerServicesController extends Controller
{
    private $nagiosAPI;

    /**
     * Set the dependencies.
     *
     * @param NagiosInterface $nagiosAPI
     * @return void
     */
    public function __construct(NagiosInterface $nagiosAPI)
    {
        $this->nagiosAPI = $nagiosAPI;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  string  $status
     * @return Response
     */
    public function index($status = null)
    {
        $result = $this->nagiosAPI->listServices($status);

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @param  string  $servicedescription
     * @return Response
     */
    public function show($name, $servicedescription)
    {
        $result = $this->nagiosAPI->showService($name, $servicedescription);

        return $result;
    }
}
