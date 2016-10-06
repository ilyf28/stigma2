<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interfaces\NagiosInterface;

class ServerHostsController extends Controller
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
        $result = $this->nagiosAPI->listHosts($status);

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return Response
     */
    public function show($name)
    {
        $result = $this->nagiosAPI->showHost($name);

        return $result;
    }
}
