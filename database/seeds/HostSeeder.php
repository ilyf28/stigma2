<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $hostManager = App::make('Stigma\ObjectManager\HostManager');


        $data = [
            'host_name' => 'generic-host',
            'alias' => 'Generic host definition template',
            'template_name' => 'generic-host',
            'is_template' => 'Y',
            'data' => '{"name":"generic-host","notifications_enabled":"1","event_handler_enabled":"1","flap_detection_enabled":"1","process_perf_data":"1","retain_status_information":"1","retain_nonstatus_information":"1","notification_period":"24x7","register":"0"}',
        ];

        $hostManager->register($data);


        $data = [
            'host_name' => 'linux-server',
            'alias' => 'Linux host definition template',
            'template_name' => 'linux-server',
            'is_template' => 'Y',
            'data' => '{"name":"linux-server","use":"generic-host","check_period":"24x7","check_interval":"5","retry_interval":"1","max_check_attempts":"10","check_command":"check-host-alive","notification_period":"workhours","notification_interval":"120","notification_options":"d,u,r","contact_groups":"admins","register":"0"}',
        ];

        $hostManager->register($data);


        $data = [
            'host_name' => 'windows-server',
            'alias' => 'Windows host definition template',
            'template_name' => 'windows-server',
            'is_template' => 'Y',
            'data' => '{"name":"windows-server","use":"generic-host","check_period":"24x7","check_interval":"5","retry_interval":"1","max_check_attempts":"10","check_command":"check-host-alive","notification_period":"24x7","notification_interval":"30","notification_options":"d,r","contact_groups":"admins","hostgroups":"windows-servers","register":"0"}',
        ];

        $hostManager->register($data);


        $data = [
            'host_name' => 'generic-printer',
            'alias' => 'Define a generic printer template',
            'template_name' => 'generic-printer',
            'is_template' => 'Y',
            'data' => '{"name":"generic-printer","use":"generic-host","check_period":"24x7","check_interval":"5","retry_interval":"1","max_check_attempts":"10","check_command":"check-host-alive","notification_period":"workhours","notification_interval":"30","notification_options":"d,r","contact_groups":"admins","register":"0"}',
        ];

        $hostManager->register($data);


        $data = [
            'host_name' => 'generic-switch',
            'alias' => 'Define a template for switches',
            'template_name' => 'generic-switch',
            'is_template' => 'Y',
            'data' => '{"name":"generic-switch","use":"generic-host","check_period":"24x7","check_interval":"5","retry_interval":"1","max_check_attempts":"10","check_command":"check-host-alive","notification_period":"24x7","notification_interval":"30","notification_options":"d,r","contact_groups":"admins","register":"0"}',
        ];

        $hostManager->register($data);


        $data = [
            'host_name' => 'localhost',
            'alias' => 'localhost',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => '{"use":"linux-server,generic-host","host_name":"localhost","alias":"localhost","address":"127.0.0.1","_graphiteprefix":"stigma"}',
        ];

        $hostManager->register($data);

    }
}