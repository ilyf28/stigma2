<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TimeperiodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $timeperiodManager = App::make('Stigma\ObjectManager\TimeperiodManager');


        $data = [
            'timeperiod_name' => '24x7',
            'alias' => '24 Hours A Day, 7 Days A Week',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"timeperiod_name":"24x7","alias":"24 Hours A Day, 7 Days A Week","sunday":"00:00-24:00","monday":"00:00-24:00","tuesday":"00:00-24:00","wednesday":"00:00-24:00","thursday":"00:00-24:00","friday":"00:00-24:00","saturday":"00:00-24:00"}'),
        ];

        $timeperiodManager->register($data);


        $data = [
            'timeperiod_name' => 'workhours',
            'alias' => 'Normal Work Hours',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"timeperiod_name":"workhours","alias":"Normal Work Hours","monday":"09:00-17:00","tuesday":"09:00-17:00","wednesday":"09:00-17:00","thursday":"09:00-17:00","friday":"09:00-17:00"}'),
        ];

        $timeperiodManager->register($data);


        $data = [
            'timeperiod_name' => 'none',
            'alias' => 'No Time Is A Good Time',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"timeperiod_name":"none","alias":"No Time Is A Good Time"}'),
        ];

        $timeperiodManager->register($data);


        $data = [
            'timeperiod_name' => 'us-holidays',
            'alias' => 'U.S. Holidays',
            'template_name' => 'us-holidays',
            'is_template' => 'Y',
            'data' => json_decode('{"name":"us-holidays","timeperiod_name":"us-holidays","alias":"U.S. Holidays","january 1":"00:00-00:00","monday -1 may":"00:00-00:00","july 4":"00:00-00:00","monday 1 september":"00:00-00:00","thursday 4 november":"00:00-00:00","december 25":"00:00-00:00"}'),
        ];

        $timeperiodManager->register($data);


        $data = [
            'timeperiod_name' => '24x7_sans_holidays',
            'alias' => '24x7 Sans Holidays',
            'template_name' => NULL,
            'is_template' => 'N',
            'data' => json_decode('{"timeperiod_name":"24x7_sans_holidays","alias":"24x7 Sans Holidays","use":"us-holidays","sunday":"00:00-24:00","monday":"00:00-24:00","tuesday":"00:00-24:00","wednesday":"00:00-24:00","thursday":"00:00-24:00","friday":"00:00-24:00","saturday":"00:00-24:00"}'),
        ];

        $timeperiodManager->register($data);

    }
}