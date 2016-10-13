<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $contactManager = App::make('Stigma\ObjectManager\ContactManager');


        $data = [
            'contact_name' => 'generic-contact',
            'alias' => 'Generic contact definition template',
            'template_name' => 'generic-contact',
            'is_template' => 'Y',
            'data' => json_decode('{"name":"generic-contact","service_notification_period":"24x7","host_notification_period":"24x7","service_notification_options":"w,u,c,r,f,s","host_notification_options":"d,u,r,f,s","service_notification_commands":"notify-service-by-email","host_notification_commands":"notify-host-by-email","register":"0"}'),
        ];

        $contactManager->register($data);


        $data = [
            'contact_name' => 'nagiosadmin',
            'alias' => 'Just one contact defined by default - the Nagios admin',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"contact_name":"nagiosadmin","use":"generic-contact","alias":"Nagios Admin","email":"nagios@localhost"}'),
        ];

        $contactManager->register($data);

    }
}