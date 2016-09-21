<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicegroups extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicegroups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('servicegroup_name')->index()->unique();
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
        Schema::drop('servicegroups');
    }

}
