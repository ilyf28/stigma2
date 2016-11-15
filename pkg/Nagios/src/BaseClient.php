<?php
namespace Stigma\Nagios;

abstract class BaseClient
{
    protected $local_path;
    protected $remote_path;

    public function __construct()
    {
        $this->local_path = '/tmp/';
        $this->remote_path = '/app/nagios/etc/objects/';
    }

    protected function setupConfig($cfg, $payload)
    {
        try {
            $local_file = $this->local_path.$cfg;
            $remote_file = $this->remote_path.$cfg;

            if (file_exists($local_file)) unlink($local_file);
            file_put_contents($local_file, $payload, LOCK_EX);

            $connection = ssh2_connect('nagios', 22);
            ssh2_auth_password($connection, 'root', 'S2curity');
            ssh2_scp_send($connection, $local_file, $remote_file, 0644);

            return 200;
        } catch (Exception $e) {
            return 400;
        }

        return 400;
    }
}