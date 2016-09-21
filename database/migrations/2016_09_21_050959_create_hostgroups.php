<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostgroups extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostgroups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hostgroup_name')->index()->unique();
            $table->string('alias');
            $table->text('data');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hostgroups');
    }

}
