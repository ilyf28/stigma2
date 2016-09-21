<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ContactgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $contactgroupManager = App::make('Stigma\ObjectManager\ContactgroupManager');

        $data = [
            'contactgroup_name' => 'admins',
            'alias' => 'Nagios Administrators',
            'data' => json_decode('{"contactgroup_name":"admins","alias":"Nagios Administrators","members":"nagiosadmin"}'),
        ];

        $contactgroupManager->register($data);
    }
}