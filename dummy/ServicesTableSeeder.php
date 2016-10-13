<?php

require_once dirname(__FILE__)."/../../utils/UUID.php";

class ServicesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('services')->delete();
		DB::table('service_details')->delete();

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '2',
			'first_name' => '',
			'second_name' => 'generic-service',
			'is_active' => '1'
		]);
		Service::create([
			'object_uuid' => $uuid,
			'host_fk' => '',
			'description' => 'Generic Template',
			'command_fk' => ''
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'name',
			'value' => 'generic-service'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'active_checks_enabled',
			'value' => '1'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'passive_checks_enabled',
			'value' => '1'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'parallelize_check',
			'value' => '1'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'obsess_over_service',
			'value' => '1'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'check_freshness',
			'value' => '0'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'notifications_enabled',
			'value' => '1'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'event_handler_enabled',
			'value' => '1'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'flap_detection_enabled',
			'value' => '1'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'failure_prediction_enabled',
			'value' => '1'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'process_perf_data',
			'value' => '1'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'retain_status_information',
			'value' => '1'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'retain_nonstatus_information',
			'value' => '1'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'is_volatile',
			'value' => '0'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'check_period',
			'value' => '24x7'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'max_check_attempts',
			'value' => '3'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'normal_check_interval',
			'value' => '10'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'retry_check_interval',
			'value' => '2'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'contact_groups',
			'value' => 'admins'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'notification_options',
			'value' => 'w,u,c,r'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'notification_interval',
			'value' => '60'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'notification_period',
			'value' => '24x7'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'register',
			'value' => '0'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '2',
			'first_name' => '',
			'second_name' => 'local-service',
			'is_active' => '1'
		]);
		Service::create([
			'object_uuid' => $uuid,
			'host_fk' => '',
			'description' => 'Localhost Template',
			'command_fk' => ''
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'name',
			'value' => 'local-service'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'use',
			'value' => 'generic-service'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'max_check_attempts',
			'value' => '4'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'normal_check_interval',
			'value' => '5'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'retry_check_interval',
			'value' => '1'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'register',
			'value' => '0'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '2',
			'first_name' => 'localhost',
			'second_name' => 'PING',
			'is_active' => '1'
		]);
		Service::create([
			'object_uuid' => $uuid,
			'host_fk' => '',
			'description' => 'PING',
			'command_fk' => ''
		]);

		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'use',
			'value' => 'local-service'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'host_name',
			'value' => 'localhost'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'service_description',
			'value' => 'PING'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'check_command',
			'value' => 'check_ping!100.0,20%!500.0,60%'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => '_graphiteprefix',
			'value' => 'monitoring.nagios.localhost'
		]);
		
		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '2',
			'first_name' => 'localhost',
			'second_name' => 'Root Partition',
			'is_active' => '1'
		]);
		Service::create([
			'object_uuid' => $uuid,
			'host_fk' => '',
			'description' => 'Root Partition',
			'command_fk' => ''
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'use',
			'value' => 'local-service'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'host_name',
			'value' => 'localhost'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'service_description',
			'value' => 'Root Partition'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'check_command',
			'value' => 'check_local_disk!20%!10%!/'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => '_graphiteprefix',
			'value' => 'monitoring.nagios.localhost'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '2',
			'first_name' => 'localhost',
			'second_name' => 'Current Users',
			'is_active' => '1'
		]);
		Service::create([
			'object_uuid' => $uuid,
			'host_fk' => '',
			'description' => 'Current Users',
			'command_fk' => ''
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'use',
			'value' => 'local-service'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'host_name',
			'value' => 'localhost'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'service_description',
			'value' => 'Current Users'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'check_command',
			'value' => 'check_local_users!20!50'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => '_graphiteprefix',
			'value' => 'monitoring.nagios.localhost'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '2',
			'first_name' => 'localhost',
			'second_name' => 'Total Processes',
			'is_active' => '1'
		]);
		Service::create([
			'object_uuid' => $uuid,
			'host_fk' => '',
			'description' => 'Total Processes',
			'command_fk' => ''
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'use',
			'value' => 'local-service'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'host_name',
			'value' => 'localhost'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'service_description',
			'value' => 'Total Processes'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'check_command',
			'value' => 'check_local_procs!250!400!RSZDT'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => '_graphiteprefix',
			'value' => 'monitoring.nagios.localhost'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '2',
			'first_name' => 'localhost',
			'second_name' => 'Current Load',
			'is_active' => '1'
		]);
		Service::create([
			'object_uuid' => $uuid,
			'host_fk' => '',
			'description' => 'Current Load',
			'command_fk' => ''
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'use',
			'value' => 'local-service'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'host_name',
			'value' => 'localhost'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'service_description',
			'value' => 'Current Load'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'check_command',
			'value' => 'check_local_load!5.0,4.0,3.0!10.0,6.0,4.0'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => '_graphiteprefix',
			'value' => 'monitoring.nagios.localhost'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '2',
			'first_name' => 'localhost',
			'second_name' => 'Swap Usage',
			'is_active' => '1'
		]);
		Service::create([
			'object_uuid' => $uuid,
			'host_fk' => '',
			'description' => 'Swap Usage',
			'command_fk' => ''
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'use',
			'value' => 'local-service'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'host_name',
			'value' => 'localhost'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'service_description',
			'value' => 'Swap Usage'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'check_command',
			'value' => 'check_local_swap!20!10'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => '_graphiteprefix',
			'value' => 'monitoring.nagios.localhost'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '2',
			'first_name' => 'localhost',
			'second_name' => 'SSH',
			'is_active' => '1'
		]);
		Service::create([
			'object_uuid' => $uuid,
			'host_fk' => '',
			'description' => 'SSH',
			'command_fk' => ''
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'use',
			'value' => 'local-service'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'host_name',
			'value' => 'localhost'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'service_description',
			'value' => 'SSH'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'check_command',
			'value' => 'check_ssh'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'notifications_enabled',
			'value' => '0'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => '_graphiteprefix',
			'value' => 'monitoring.nagios.localhost'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '2',
			'first_name' => 'localhost',
			'second_name' => 'HTTP',
			'is_active' => '1'
		]);
		Service::create([
			'object_uuid' => $uuid,
			'host_fk' => '',
			'description' => 'HTTP',
			'command_fk' => ''
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'use',
			'value' => 'local-service'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'host_name',
			'value' => 'localhost'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'service_description',
			'value' => 'HTTP'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'check_command',
			'value' => 'check_http'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => 'notifications_enabled',
			'value' => '0'
		]);
		ServiceDetail::create([
			'service_fk' => $uuid,
			'key' => '_graphiteprefix',
			'value' => 'monitoring.nagios.localhost'
		]);
	}

}
