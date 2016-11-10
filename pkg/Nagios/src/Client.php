<?php
namespace Stigma\Nagios; 
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Client
{
    protected $httpClient;
    protected $baseUri;
    protected $port;
    protected $builder;

    public function __construct($baseUri)
    {
        $this->baseUri = $baseUri;
        $client = new HttpClient;
        $this->httpClient = $client;
        $this->builder = \App::make('Stigma\ObjectManager\Builder');
    }

    public function generateHost()
    {
        $payload = $this->builder->buildForHost();

        $uri = 'api/v1/hosts';

        try {
            // $task = 'ls';
            // //$process = new Process('/app/stigma/bin/envoy run '.$task);
            // //$process = new Process('ls -lsa');
            // $process = new Process('ls -lsa');
            // $process->run();
            // if (!$process->isSuccessful()) {
            //         dd('11111');
            //     throw new ProcessFailedException($process);
            // }
            // $result = $process->getOutput();

            // $response = $this->httpClient->post($this->baseUri.$uri, [
            //     'body'=> [
            //         'payload'=>json_encode($payload)
            //     ]
            // ]);

            // return $response->getStatusCode();
        } catch (\Exception $e) {
            return 400;
            // dd((string)$e->getResponse()->getBody());
        } 
    }

    public function generateService()
    {
        $payload = $this->builder->buildForService(); 

        $uri = 'api/v1/services';

        try{
            $response = $this->httpClient->post($this->baseUri.$uri, [ 
                'body'=> [
                    'payload'=>json_encode($payload)  
                ]
            ]);

            return $response->getStatusCode();
        } catch (\Exception $e) {
            return 400;
            // dd((string)$e->getResponse()->getBody());
        } 
    }

    public function generateCommand()
    {
        $payload = $this->builder->buildForCommand(); 

        $uri = 'api/v1/commands';

        try{
            $response = $this->httpClient->post($this->baseUri.$uri, [ 
                'body'=> [
                    'payload'=>json_encode($payload)  
                ]
            ]);

            return $response->getStatusCode();
        } catch (\Exception $e) {
            return 400;
            // dd((string)$e->getResponse()->getBody());
        }
    }

    public function generateContact()
    {
        $payload = $this->builder->buildForContact(); 

        $uri = 'api/v1/contacts';

        try{
            $response = $this->httpClient->post($this->baseUri.$uri, [ 
                'body'=> [
                    'payload'=>json_encode($payload)  
                ]
            ]);

            return $response->getStatusCode();
        } catch (\Exception $e) {
            return 400;
            // dd((string)$e->getResponse()->getBody());
        }
    }

    public function generateTimeperiod()
    {
        $payload = $this->builder->buildForTimeperiod(); 

        $uri = 'api/v1/timeperiods';

        try{
            $response = $this->httpClient->post($this->baseUri.$uri, [ 
                'body'=> [
                    'payload'=>json_encode($payload)  
                ]
            ]);

            return $response->getStatusCode();
        } catch (\Exception $e) {
            return 400;
            // dd((string)$e->getResponse()->getBody());
        }
    }

    public function requestToRestart()
    {
        $uri = 'nagios/cgi-bin/cmd.cgi';

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

        return false;
    }
}
