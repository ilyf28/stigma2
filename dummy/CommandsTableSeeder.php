<?php

require_once dirname(__FILE__)."/../../utils/UUID.php";

class CommandsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('commands')->delete();

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'notify-host-by-email',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '/usr/bin/printf "%b" "***** Nagios *****\n\nNotification Type: $NOTIFICATIONTYPE$\nHost: $HOSTNAME$\nState: $HOSTSTATE$\nAddress: $HOSTADDRESS$\nInfo: $HOSTOUTPUT$\n\nDate/Time: $LONGDATETIME$\n" | /bin/mail -s "** $NOTIFICATIONTYPE$ Host Alert: $HOSTNAME$ is $HOSTSTATE$ **" $CONTACTEMAIL$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'notify-service-by-email',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '/usr/bin/printf "%b" "***** Nagios *****\n\nNotification Type: $NOTIFICATIONTYPE$\n\nService: $SERVICEDESC$\nHost: $HOSTALIAS$\nAddress: $HOSTADDRESS$\nState: $SERVICESTATE$\n\nDate/Time: $LONGDATETIME$\n\nAdditional Info:\n\n$SERVICEOUTPUT$\n" | /bin/mail -s "** $NOTIFICATIONTYPE$ Service Alert: $HOSTALIAS$/$SERVICEDESC$ is $SERVICESTATE$ **" $CONTACTEMAIL$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check-host-alive',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_ping -H $HOSTADDRESS$ -w 3000.0,80% -c 5000.0,100% -p 5'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_local_disk',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_disk -w $ARG1$ -c $ARG2$ -p $ARG3$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_local_load',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_load -w $ARG1$ -c $ARG2$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_local_procs',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_procs -w $ARG1$ -c $ARG2$ -s $ARG3$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_local_users',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_users -w $ARG1$ -c $ARG2$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_local_swap',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_swap -w $ARG1$ -c $ARG2$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_local_mrtgtraf',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_mrtgtraf -F $ARG1$ -a $ARG2$ -w $ARG3$ -c $ARG4$ -e $ARG5$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_ftp',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_ftp -H $HOSTADDRESS$ $ARG1$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_hpjd',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_hpjd -H $HOSTADDRESS$ $ARG1$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_snmp',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_snmp -H $HOSTADDRESS$ $ARG1$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_http',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_http -I $HOSTADDRESS$ $ARG1$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_ssh',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_ssh $ARG1$ $HOSTADDRESS$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_dhcp',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_dhcp $ARG1$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_ping',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_ping -H $HOSTADDRESS$ -w $ARG1$ -c $ARG2$ -p 5'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_pop',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_pop -H $HOSTADDRESS$ $ARG1$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_imap',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_imap -H $HOSTADDRESS$ $ARG1$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_smtp',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_smtp -H $HOSTADDRESS$ $ARG1$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_tcp',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_tcp -H $HOSTADDRESS$ -p $ARG1$ $ARG2$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_udp',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_udp -H $HOSTADDRESS$ -p $ARG1$ $ARG2$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'check_nt',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '$USER1$/check_nt -H $HOSTADDRESS$ -p 12489 -v $ARG1$ $ARG2$'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'process-host-perfdata',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '/usr/bin/printf "%b" "$LASTHOSTCHECK$\t$HOSTNAME$\t$HOSTSTATE$\t$HOSTATTEMPT$\t$HOSTSTATETYPE$\t$HOSTEXECUTIONTIME$\t$HOSTOUTPUT$\t$HOSTPERFDATA$\n" >> /var/log/nagios/host-perfdata.out'
		]);

		$uuid = UUID::v4();
		Object::create([
			'uuid' => $uuid,
			'object_type' => '12',
			'first_name' => 'process-service-perfdata',
			'second_name' => '',
			'is_active' => '1'
		]);
		Command::create([
			'object_uuid' => $uuid,
			'command_line' => '/usr/bin/printf "%b" "$LASTSERVICECHECK$\t$HOSTNAME$\t$SERVICEDESC$\t$SERVICESTATE$\t$SERVICEATTEMPT$\t$SERVICESTATETYPE$\t$SERVICEEXECUTIONTIME$\t$SERVICELATENCY$\t$SERVICEOUTPUT$\t$SERVICEPERFDATA$\n" >> /var/log/nagios/service-perfdata.out'
		]);
	}

}