<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HostgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $hostgroupManager = App::make('Stigma\ObjectManager\HostgroupManager');

        $data = [
            'hostgroup_name' => 'linux-servers',
            'alias' => 'Linux Servers',
            'data' => json_decode('{"hostgroup_name":"linux-servers","alias":"Linux Servers","members":"localhost"}'),
        ];

        $hostgroupManager->register($data);
    }
}