<?php
namespace Stigma\Nagios; 
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;

class Client
{
    protected $httpClient;
    protected $baseUri;
    protected $port;

    public function __construct($baseUri)
    {
        $this->baseUri = $baseUri;
        $client = new HttpClient;
        $this->httpClient = $client;
    }

    public function generateHost()
    {
        $builder = \App::make('Stigma\ObjectManager\Builder');

        $payload = $builder->buildForHost();

        $uri = 'api/v1/hosts';

        try {
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

    public function generateService()
    {
        $builder = \App::make('Stigma\ObjectManager\Builder');

        $payload = $builder->buildForService(); 

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
        $builder = \App::make('Stigma\ObjectManager\Builder');

        $collection = $builder->buildForCommand(); 
        $payload = array();

        foreach($collection as $item)
        {
            $data = new \stdClass;
            $data->command_name = $item->command_name;
            $data->details = [
                'command_name' => $item->command_name,
                'command_line' => $item->command_line
            ];

            $payload[] = $data;
        }

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
        $builder = \App::make('Stigma\ObjectManager\Builder');

        $payload = $builder->buildForContact(); 

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
        $builder = \App::make('Stigma\ObjectManager\Builder');

        $payload = $builder->buildForTimeperiod(); 

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
        $uri = 'api/v1/nagios';

        $response = $this->httpClient->get($this->baseUri.$uri, [
            'query' => [
                'command'=> 'restart'
            ]
        ]); 

        if ($response->getStatusCode() == '200') {
            return true;
        }

        return false;
    }
}
