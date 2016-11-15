<?php
namespace Stigma\Nagios;

abstract class BaseClient
{
    protected $ssh_key;

    public function __construct()
    {
        $this->ssh_key = '/etc/ssh/ssh_host_rsa_key';
    }

    protected function setupConfig($cfg, $payload)
    {
        try {
            // scp
            $result = shell_exec('envoy run ls');
            dd($result);

            return 200;
        } catch (Exception $e) {
            return 400;
        }

        return 400;
    }
}