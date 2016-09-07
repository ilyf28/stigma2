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

        // GlusterFS
        $data = [
            'command_name' => 'check_disk_and_inode',
            'command_line' => '$USER1$/check_nrpe -H $HOSTADDRESS$ -c check_disk_and_inode'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_cpu_multicore',
            'command_line' => '$USER1$/check_nrpe -H $HOSTADDRESS$ -c check_cpu_multicore'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_memory',
            'command_line' => '$USER1$/check_nrpe -H $HOSTADDRESS$ -c check_memory'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_swap_usage',
            'command_line' => '$USER1$/check_nrpe -H $HOSTADDRESS$ -c check_swap_usage'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_interfaces',
            'command_line' => '$USER1$/check_nrpe -H $HOSTADDRESS$ -c check_interfaces'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_remote_host',
            'command_line' => '$USER1$/gluster/check_remote_host.py -H $HOSTADDRESS$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'host_service_handler',
            'command_line' => '$USER1$/gluster/gluster_host_service_handler.py -s $SERVICESTATE$ -t $SERVICESTATETYPE$ -a $SERVICEATTEMPT$ -l $HOSTADDRESS$ -n "$SERVICEDESC$"'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'notify-host-to-ovirt',
            'command_line' => '$USER1$/gluster/notify_ovirt_engine_handler.py -c $HOSTGROUPNAME$ -H $HOSTNAME$ -g $_HOSTGLUSTER_ENTITY$ -t $HOSTSTATE$ -o $_CONTACTOVIRT_REST_API$ -u $_CONTACTOVIRT_USER$ -p $USER3$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'notify-service-to-ovirt',
            'command_line' => '$USER1$/gluster/notify_ovirt_engine_handler.py -c $HOSTGROUPNAME$ -H $HOSTNAME$ -g $_SERVICEGLUSTER_ENTITY$ -s "$SERVICEDESC$" -t $SERVICESTATE$ -o $_CONTACTOVIRT_REST_API$ -u $_CONTACTOVIRT_USER$ -p $USER3$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'gluster-notify-host-by-snmp',
            'command_line' => '$USER1$/gluster/hostsnmptrapgenerator.py $NOTIFICATIONTYPE$ $HOSTNOTIFICATIONNUMBER$ "$HOSTNAME$" $HOSTSTATEID$ $HOSTSTATETYPE$ $HOSTATTEMPT$ $HOSTDURATIONSEC$ "$HOSTGROUPNAMES$" $LASTHOSTCHECK$ $LASTHOSTSTATECHANGE$ "$HOSTOUTPUT$"'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'gluster-notify-service-by-snmp',
            'command_line' => '$USER1$/gluster/servicesnmptrapgenerator.py $NOTIFICATIONTYPE$ $SERVICENOTIFICATIONNUMBER$ "$HOSTNAME$" $HOSTSTATEID$ "$SERVICEDESC$" $SERVICESTATEID$ $SERVICEATTEMPT$ "$SERVICEDURATION$" "$SERVICEGROUPNAMES$" $LASTSERVICECHECK$ $LASTSERVICESTATECHANGE$ "$SERVICEOUTPUT$"'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_brick_usage',
            'command_line' => '$USER1$/check_nrpe -H $HOSTADDRESS$ -c check_brick_usage -a $_SERVICEBRICK_DIR$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_vol_utilization',
            'command_line' => '$USER1$/gluster/check_vol_server.py $ARG1$ $ARG2$ -w $ARG3$ -c $ARG4$ -o utilization'
        ];

        $CommandManager->register($data);


        $data = [
            'command_name' => 'check_cluster_vol_usage',
            'command_line' => '$USER1$/gluster/check_cluster_vol_usage.py  -w $ARG1$ -c $ARG2$ -hg $HOSTNAME$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'gluster_auto_discovery',
            'command_line' => 'sudo $USER1$/gluster/discovery.py -H $ARG1$ -c $HOSTNAME$ -m auto -n $ARG2$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_dummy',
            'command_line' => '$USER1$/check_dummy 0'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_vol_status',
            'command_line' => '$USER1$/gluster/check_vol_server.py $ARG1$ $ARG2$ -o status'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_vol_quota_status',
            'command_line' => '$USER1$/gluster/check_vol_server.py $ARG1$ $ARG2$ -o quota'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_vol_heal_status',
            'command_line' => '$USER1$/gluster/check_vol_server.py $ARG1$ $ARG2$ -o self-heal'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_vol_heal_info',
            'command_line' => '$USER1$/gluster/check_vol_server.py $ARG1$ $ARG2$ -o heal-info'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_vol_georep_status',
            'command_line' => '$USER1$/gluster/check_vol_server.py $ARG1$ $ARG2$ -o geo-rep'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_quorum_status',
            'command_line' => '$USER1$/gluster/check_vol_server.py $HOSTNAME$ dummy -o quorum'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_cluster_status',
            'command_line' => '$USER1$/gluster/check_cluster_status.py $HOSTNAME$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'submit_external_command',
            'command_line' => '$USER1$/gluster/submit_external_command.py -c "$ARG1$" -H "$ARG2$" -s "$ARG3$" -t "$ARG4$"'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'brick_status_event_handler',
            'command_line' => '$USER1$/gluster/brick_status_event_handler.py -hg "$HOSTGROUPNAMES$" -v $_SERVICEVOL_NAME$ -st $SERVICESTATETYPE$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_brick_status',
            'command_line' => '$USER1$/check_nrpe -H $HOSTADDRESS$ -c check_brick_status -a $_SERVICEVOL_NAME$ $_SERVICEBRICK_DIR$'
        ];

        $CommandManager->register($data);

        $data = [
            'command_name' => 'check_proc_status',
            'command_line' => '$USER1$/check_nrpe -H $HOSTADDRESS$ -c check_proc_status -a $ARG1$'
        ];

        $CommandManager->register($data);


    }
}
