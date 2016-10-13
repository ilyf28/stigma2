<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $serviceManager = App::make('Stigma\ObjectManager\ServiceManager');


        $data = [
            'host_name' => 'generic-service',
            'service_description' => 'Generic service definition template',
            'template_name' => 'generic-service',
            'is_template' => 'Y',
            'data' => json_decode('{"name":"generic-service","active_checks_enabled":"1","passive_checks_enabled":"1","parallelize_check":"1","obsess_over_service":"1","check_freshness":"0","notifications_enabled":"1","event_handler_enabled":"1","flap_detection_enabled":"1","process_perf_data":"1","retain_status_information":"1","retain_nonstatus_information":"1","is_volatile":"0","check_period":"24x7","max_check_attempts":"3","normal_check_interval":"10","retry_check_interval":"2","contact_groups":"admins","notification_options":"w,u,c,r","notification_interval":"60","notification_period":"24x7","register":"0"}'),
        ];

        $serviceManager->register($data);


        $data = [
            'host_name' => 'local-service',
            'service_description' => 'Local service definition template',
            'template_name' => 'local-service',
            'is_template' => 'Y',
            'data' => json_decode('{"name":"local-service","use":"generic-service","max_check_attempts":"4","normal_check_interval":"5","retry_check_interval":"1","register":"0"}'),
        ];

        $serviceManager->register($data);


        $data = [
            'host_name' => 'localhost',
            'service_description' => 'PING',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"use":"local-service","host_name":"localhost","service_description":"PING","check_command":"check_ping!100.0,20%!500.0,60%","_graphiteprefix":"stigma"}'),
        ];

        $serviceManager->register($data);


        $data = [
            'host_name' => 'localhost',
            'service_description' => 'Root Partition',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"use":"local-service","host_name":"localhost","service_description":"Root Partition","check_command":"check_local_disk!20%!10%!/","_graphiteprefix":"stigma"}'),
        ];

        $serviceManager->register($data);


        $data = [
            'host_name' => 'localhost',
            'service_description' => 'Current Users',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"use":"local-service","host_name":"localhost","service_description":"Current Users","check_command":"check_local_users!20!50","_graphiteprefix":"stigma"}'),
        ];

        $serviceManager->register($data);


        $data = [
            'host_name' => 'localhost',
            'service_description' => 'Total Processes',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"use":"local-service","host_name":"localhost","service_description":"Total Processes","check_command":"check_local_procs!250!400!RSZDT","_graphiteprefix":"stigma"}'),
        ];

        $serviceManager->register($data);


        $data = [
            'host_name' => 'localhost',
            'service_description' => 'Current Load',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"use":"local-service","host_name":"localhost","service_description":"Current Load","check_command":"check_local_load!5.0,4.0,3.0!10.0,6.0,4.0","_graphiteprefix":"stigma"}'),
        ];

        $serviceManager->register($data);


        $data = [
            'host_name' => 'localhost',
            'service_description' => 'Swap Usage',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"use":"local-service","host_name":"localhost","service_description":"Swap Usage","check_command":"check_local_swap!20!10","_graphiteprefix":"stigma"}'),
        ];

        $serviceManager->register($data);


        $data = [
            'host_name' => 'localhost',
            'service_description' => 'SSH',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"use":"local-service","host_name":"localhost","service_description":"SSH","check_command":"check_ssh","notifications_enabled":"0","_graphiteprefix":"stigma"}'),
        ];

        $serviceManager->register($data);


        $data = [
            'host_name' => 'localhost',
            'service_description' => 'HTTP',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"use":"local-service","host_name":"localhost","service_description":"HTTP","check_command":"check_http","notifications_enabled":"0","_graphiteprefix":"stigma"}'),
        ];

        $serviceManager->register($data);

    }
}
