<?php

namespace App\APIs;

use App\Interfaces\NagiosInterface;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Nagios implements NagiosInterface
{
    private $_host_status = array("0" => "up", "1" => "down", "2" => "unreachable", "9" => "pending");
    private $_service_status = array("0" => "ok", "1" => "warning", "2" => "unknown", "3" => "critical", "9" => "pending");

    protected $client;
    protected $command;
    protected $domain;

    public function __construct(Client $client)
    {
        $domain = config('nagios.host').':'.config('nagios.apiport')."/";
        $pos = strpos($domain, 'http://');
        $end = substr($domain, -1);
        if ($pos === false) { $domain = 'http://'.$domain; }
        if ($end !== '/') { $domain .= '/'; }

        $this->client = $client;
        $this->domain = $domain;
    }

    public function listHosts($status)
    {
        $this->command = "api/v1/hosts";
        if (isset($this->_host_status[$status])) {
            $this->command = "api/v1/hosts?hoststatus=".$this->_host_status[$status];
        }
        $result = $this->call();

        return $result;
    }

    public function showHost($name)
    {
        $this->command = "api/v1/hosts/".$name;
        $result = $this->call();

        return $result;
    }

    public function listServices($status)
    {
        $this->command = "api/v1/services";
        if (isset($this->_service_status[$status])) {
            $this->command = "api/v1/services?servicestatus=".$this->_service_status[$status];
        }
        $result = $this->call();

        return $result;
    }

    public function showService($name, $servicedescription)
    {
        $this->command = "api/v1/services/".$name."?servicedescription=".urlencode($servicedescription);
        $result = $this->call();

        return $result;
    }

    public function getSystemStatus()
    {
        $this->command = "api/v1/nagios?command=status";
        $result = $this->call(TRUE);

        return $result;
    }

    public function getHostStatus()
    {
        $this->command = "api/v1/statistic/host";
        $result = $this->call();

        return $result;
    }

    public function getServiceStatus()
    {
        $this->command = "api/v1/statistic/service";
        $result = $this->call();

        return $result;
    }

    public function getEvent($type, $starttime, $endtime)
    {
        $this->command = "api/v1/statistic/log?type=".$type."&starttime=".$starttime."&endtime=".$endtime;
        $result = $this->call();

        return $result;
    }

    private function call($code = null)
    {
        $url = $this->domain.$this->command;

        try {
            $response = $this->client->get($url);
        } catch (RequestException $e) {
            echo $e->getRequest();
            if ($e->hasResponse()) {
                echo $e->getResponse();
            }
        }

        if ($code) {
            return $response->getStatusCode();
        }

        return $response->getBody();
    }
}
