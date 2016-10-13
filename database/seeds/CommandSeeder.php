<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $CommandManager = App::make('Stigma\ObjectManager\CommandManager');


        $data = [
            'command_name' => 'notify-host-by-email',
            'command_line' => '/usr/bin/printf "%b" "***** Nagios *****\n\nNotification Type: $NOTIFICATIONTYPE$\nHost: $HOSTNAME$\nState: $HOSTSTATE$\nAddress: $HOSTADDRESS$\nInfo: $HOSTOUTPUT$\n\nDate/Time: $LONGDATETIME$\n" | /bin/mail -s "** $NOTIFICATIONTYPE$ Host Alert: $HOSTNAME$ is $HOSTSTATE$ **" $CONTACTEMAIL$'
        ];

        $CommandManager->register($data);


        $data = [
            'command_name' => 'notify-service-by-email',
            'command_line' => '/usr/bin/printf "%b" "***** Nagios *****\n\nNotification Type: $NOTIFICATIONTYPE$\n\nService: $SERVICEDESC$\nHost: $HOSTALIAS$\nAddress: $HOSTADDRESS$\nState: $SERVICESTATE$\n\nDate/Time: $LONGDATETIME$\n\nAdditional Info:\n\n$SERVICEOUTPUT$\n" | /bin/mail -s "** $NOTIFICATIONTYPE$ Service Alert: $HOSTALIAS$/$SERVICEDESC$ is $SERVICESTATE$ **" $CONTACTEMAIL$'
        ];

        $CommandManager->register($data);


        $data = [
            'command_name' => 'check-host-alive',
            'command_line' => '$USER1$/check_ping -H $HOSTADDRESS$ -w 3000.0,80% -c 5000.0,100% -p 5'
        ];

        $CommandManager->register($data);


        $data = [
            'command_name' => 'check_local_disk',
            'command_line' => '$USER1$/check_disk -w $ARG1$ -c $ARG2$ -p $ARG3$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_local_load',
            'command_line' => '$USER1$/check_load -w $ARG1$ -c $ARG2$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_local_procs',
            'command_line' => '$USER1$/check_procs -w $ARG1$ -c $ARG2$ -s $ARG3$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_local_users',
            'command_line' => '$USER1$/check_users -w $ARG1$ -c $ARG2$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_local_swap',
            'command_line' => '$USER1$/check_swap -w $ARG1$ -c $ARG2$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_local_mrtgtraf',
            'command_line' => '$USER1$/check_mrtgtraf -F $ARG1$ -a $ARG2$ -w $ARG3$ -c $ARG4$ -e $ARG5$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_ftp',
            'command_line' => '$USER1$/check_ftp -H $HOSTADDRESS$ $ARG1$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_hpjd',
            'command_line' => '$USER1$/check_hpjd -H $HOSTADDRESS$ $ARG1$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_snmp',
            'command_line' => '$USER1$/check_snmp -H $HOSTADDRESS$ $ARG1$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_http',
            'command_line' => '$USER1$/check_http -I $HOSTADDRESS$ $ARG1$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_ssh',
            'command_line' => '$USER1$/check_ssh $ARG1$ $HOSTADDRESS$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_dhcp',
            'command_line' => '$USER1$/check_dhcp $ARG1$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_ping',
            'command_line' => '$USER1$/check_ping -H $HOSTADDRESS$ -w $ARG1$ -c $ARG2$ -p 5'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_pop',
            'command_line' => '$USER1$/check_pop -H $HOSTADDRESS$ $ARG1$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_imap',
            'command_line' => '$USER1$/check_imap -H $HOSTADDRESS$ $ARG1$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_smtp',
            'command_line' => '$USER1$/check_smtp -H $HOSTADDRESS$ $ARG1$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_tcp',
            'command_line' => '$USER1$/check_tcp -H $HOSTADDRESS$ -p $ARG1$ $ARG2$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_udp',
            'command_line' => '$USER1$/check_udp -H $HOSTADDRESS$ -p $ARG1$ $ARG2$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_nt',
            'command_line' => '$USER1$/check_nt -H $HOSTADDRESS$ -p 12489 -v $ARG1$ $ARG2$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'process-host-perfdata',
            'command_line' => '/usr/bin/printf "%b" "$LASTHOSTCHECK$\t$HOSTNAME$\t$HOSTSTATE$\t$HOSTATTEMPT$\t$HOSTSTATETYPE$\t$HOSTEXECUTIONTIME$\t$HOSTOUTPUT$\t$HOSTPERFDATA$\n" >> /var/log/nagios/host-perfdata.out'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'process-service-perfdata',
            'command_line' => '/usr/bin/printf "%b" "$LASTSERVICECHECK$\t$HOSTNAME$\t$SERVICEDESC$\t$SERVICESTATE$\t$SERVICEATTEMPT$\t$SERVICESTATETYPE$\t$SERVICEEXECUTIONTIME$\t$SERVICELATENCY$\t$SERVICEOUTPUT$\t$SERVICEPERFDATA$\n" >> /app/nagios/var/service-perfdata.out'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'graphios_perf_host',
            'command_line' => '/bin/mv /var/spool/nagios/graphios/host-perfdata /var/spool/nagios/graphios/host-perfdata.$TIMET$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => ' graphios_perf_service',
            'command_line' => '/bin/mv /var/spool/nagios/graphios/service-perfdata /var/spool/nagios/graphios/service-perfdata.$TIMET$'
        ];

        $CommandManager->register($data);

        // NRPE
        $data = [
            'command_name' => 'check_nrpe',
            'command_line' => '$USER1$/check_nrpe -H $HOSTADDRESS$ -c $ARG1$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_nrpe_1',
            'command_line' => '$USER1$/check_nrpe -H $HOSTADDRESS$ -c $ARG1$ -a $ARG2$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_nrpe_2',
            'command_line' => '$USER1$/check_nrpe -H $HOSTADDRESS$ -c $ARG1$ -a $ARG2$ $ARG3$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_nrpe_3',
            'command_line' => '$USER1$/check_nrpe -H $HOSTADDRESS$ -c $ARG1$ -a $ARG2$ $ARG3$ $ARG4$'
        ];

        $CommandManager->register($data);

    }
}
