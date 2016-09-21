<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('CommandSeeder');
        $this->call('HostSeeder');
        $this->call('HostgroupSeeder');
        $this->call('ServiceSeeder');
        $this->call('ContactSeeder');
        $this->call('ContactgroupSeeder');
        $this->call('TimeperiodSeeder');
    } 
}
