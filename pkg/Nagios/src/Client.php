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
dd($payload);

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

dd($payload);
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

        $payload = $builder->buildForService(); 

dd($payload);
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
        // $commandBuilder = \App::make('Stigma\CommandBuilder\CommandBuilder');
        // $collection = $commandBuilder->getAll(); 

        // $payload = array();

        // foreach($collection as $item)
        // {
        //     $data = new \stdClass;
        //     $data->command_name = $item->command_name;
        //     $data->details = [
        //         'command_name' => $item->command_name ,
        //         'command_line' => $item->command_line
        //     ]; 

        //     $payload[] = $data;
        // }

        // try{
        //     $response = $this->httpClient->post($this->baseUri.'api/v1/commands', [ 
        //         'body'=> [
        //             'payload'=> json_encode($payload)
        //         ]
        //     ]); 

        //     return $response->getStatusCode();
        // } catch (RequestException $e) {
        //     echo $e->getRequest() . "\n";
        //     if ($e->hasResponse()) {
        //         dd($e->getResponse());
        //         echo $e->getResponse()->getStatusCode() . "\n";
        //     } 
        // }
    }

    public function generateContact()
    {
        $builder = \App::make('Stigma\ObjectManager\Builder');

        $payload = $builder->buildForService(); 

dd($payload);
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

    public function generateTimeperiod()
    {
        $builder = \App::make('Stigma\ObjectManager\Builder');

        $payload = $builder->buildForService(); 

dd($payload);
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
