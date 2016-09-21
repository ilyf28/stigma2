<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactgroups extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactgroups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contactgroup_name')->index()->unique();
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
        Schema::drop('contactgroups');
    }

}
