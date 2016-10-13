<?php

namespace App\APIs;

use App\Interfaces\GrafanaInterface;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Grafana implements GrafanaInterface
{
    protected $client;
    protected $domain;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->domain = config('grafana.host');
    }

    public function login($param)
    {
        $url = $this->domain."/login";

        try {
            $response = $this->client->post($url, [
                'body' => [
                    "email" => $param["email"],
                    "user" => $param["username"],
                    "password" => $param["password"]
                ]
            ]);

            return $response->getStatusCode();
        } catch (RequestException $e) {
            echo $e->getRequest();
            if ($e->hasResponse()) {
                echo $e->getResponse();
            }
        }

        // return $response->getBody();
    }
}
