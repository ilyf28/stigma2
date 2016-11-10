<?php
namespace Stigma\Nagios;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;

class Client
{
    protected $httpClient;
    protected $objectsPath;
    protected $builder;
    protected $baseUri;

    public function __construct($baseUri, $objectsPath)
    {
        $this->httpClient = new HttpClient;
        $this->objectsPath = $objectsPath;
        $this->builder = \App::make('Stigma\ObjectManager\Builder');
        $this->baseUri = $baseUri;
    }

    public function generateHost()
    {
        $payload = $this->builder->buildForHost();

        $cfg = $this->objectsPath.'hosts.cfg';

        return $this->writeConfig($cfg, $payload);
    }

    public function generateService()
    {
        $payload = $this->builder->buildForService(); 

        $cfg = $this->objectsPath.'services';

        return $this->writeConfig($cfg, $payload);
    }

    public function generateCommand()
    {
        $payload = $this->builder->buildForCommand(); 

        $cfg = $this->objectsPath.'commands';

        return $this->writeConfig($cfg, $payload);
    }

    public function generateContact()
    {
        $payload = $this->builder->buildForContact(); 

        $cfg = $this->objectsPath.'contacts';

        return $this->writeConfig($cfg, $payload);
    }

    public function generateTimeperiod()
    {
        $payload = $this->builder->buildForTimeperiod(); 

        $cfg = $this->objectsPath.'timeperiods';

        return $this->writeConfig($cfg, $payload);
    }

    public function requestToRestart()
    {
        $uri = 'nagios/cgi-bin/cmd.cgi';

        try{
            $response = $this->httpClient->post($this->baseUri.$uri, [
                    'body' => [
                            'cmd_typ' => '13',
                            'cmd_mod' => '2'
                    ],
                    'auth' => [config('nagios.username'), config('nagios.password')]
            ]);

            if ($response->getStatusCode() == '200') {
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }

        return false;
    }

    private function writeConfig($cfg, $payload)
    {
        try {
            if (file_exists($cfg)) {
                unlink($cfg);
            }

            file_put_contents($cfg, $payload, LOCK_EX);

            return 200;
        } catch (\Exception $e) {
            return 400;
        }

        return 400;
    }
}
