<?php

require_once dirname(__FILE__)."/../../utils/UUID.php";

class HostsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('hosts')->delete();
		DB::table('host_details')->delete();

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '1',
			'first_name' => 'generic-host',
			'second_name' => '',
			'is_active' => '1'
		]);
		Host::create([
			'object_uuid' => $uuid,
			'description' => 'Generic Template',
			'command_fk' => ''
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'name',
			'value' => 'generic-host'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notifications_enabled',
			'value' => '1'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'event_handler_enabled',
			'value' => '1'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'flap_detection_enabled',
			'value' => '1'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'failure_prediction_enabled',
			'value' => '1'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'process_perf_data',
			'value' => '1'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'retain_status_information',
			'value' => '1'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'retain_nonstatus_information',
			'value' => '1'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_period',
			'value' => '24x7'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'register',
			'value' => '0'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '1',
			'first_name' => 'linux-server',
			'second_name' => '',
			'is_active' => '1'
		]);
		Host::create([
			'object_uuid' => $uuid,
			'description' => 'Linux Server Template',
			'command_fk' => ''
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'name',
			'value' => 'linux-server'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'use',
			'value' => 'generic-host'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'check_period',
			'value' => '24x7'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'check_interval',
			'value' => '5'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'retry_interval',
			'value' => '1'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'max_check_attempts',
			'value' => '10'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'check_command',
			'value' => 'check-host-alive'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_period',
			'value' => 'workhours'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_interval',
			'value' => '120'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_options',
			'value' => 'd,u,r'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'contact_groups',
			'value' => 'admins'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'register',
			'value' => '0'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '1',
			'first_name' => 'windows-server',
			'second_name' => '',
			'is_active' => '1'
		]);
		Host::create([
			'object_uuid' => $uuid,
			'description' => 'Windows Server Template',
			'command_fk' => ''
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'name',
			'value' => 'windows-server'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'use',
			'value' => 'generic-host'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'check_period',
			'value' => '24x7'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'check_interval',
			'value' => '5'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'retry_interval',
			'value' => '1'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'max_check_attempts',
			'value' => '10'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'check_command',
			'value' => 'check-host-alive'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_period',
			'value' => '24x7'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_interval',
			'value' => '30'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_options',
			'value' => 'd,r'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'contact_groups',
			'value' => 'admins'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'hostgroups',
			'value' => 'windows-servers'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'register',
			'value' => '0'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '1',
			'first_name' => 'generic-printer',
			'second_name' => '',
			'is_active' => '1'
		]);
		Host::create([
			'object_uuid' => $uuid,
			'description' => 'Generic Printer Template',
			'command_fk' => ''
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'name',
			'value' => 'generic-printer'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'use',
			'value' => 'generic-host'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'check_period',
			'value' => '24x7'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'check_interval',
			'value' => '5'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'retry_interval',
			'value' => '1'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'max_check_attempts',
			'value' => '10'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'check_command',
			'value' => 'check-host-alive'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_period',
			'value' => 'workhours'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_interval',
			'value' => '30'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_options',
			'value' => 'd,r'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'contact_groups',
			'value' => 'admins'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'statusmap_image',
			'value' => 'printer.png'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'register',
			'value' => '0'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '1',
			'first_name' => 'generic-switch',
			'second_name' => '',
			'is_active' => '1'
		]);
		Host::create([
			'object_uuid' => $uuid,
			'description' => 'Generic Switch Template',
			'command_fk' => ''
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'name',
			'value' => 'generic-switch'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'use',
			'value' => 'generic-host'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'check_period',
			'value' => '24x7'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'check_interval',
			'value' => '5'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'retry_interval',
			'value' => '1'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'max_check_attempts',
			'value' => '10'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'check_command',
			'value' => 'check-host-alive'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_period',
			'value' => '24x7'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_interval',
			'value' => '30'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'notification_options',
			'value' => 'd,r'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'contact_groups',
			'value' => 'admins'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'statusmap_image',
			'value' => 'switch.png'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'register',
			'value' => '0'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '1',
			'first_name' => 'generic-router',
			'second_name' => '',
			'is_active' => '1'
		]);
		Host::create([
			'object_uuid' => $uuid,
			'description' => 'Generic Router Template',
			'command_fk' => ''
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'name',
			'value' => 'generic-router'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'use',
			'value' => 'generic-switch'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'statusmap_image',
			'value' => 'router.png'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'register',
			'value' => '0'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '1',
			'first_name' => 'localhost',
			'second_name' => '',
			'is_active' => '1'
		]);
		Host::create([
			'object_uuid' => $uuid,
			'description' => 'Localhost',
			'command_fk' => ''
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'name',
			'value' => 'localhost'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'use',
			'value' => 'linux-server'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'host_name',
			'value' => 'localhost'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'alias',
			'value' => 'localhost'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => 'address',
			'value' => '127.0.0.1'
		]);
		HostDetail::create([
			'host_fk' => $uuid,
			'key' => '_graphiteprefix',
			'value' => 'monitoring.nagios'
		]);
	}
}
