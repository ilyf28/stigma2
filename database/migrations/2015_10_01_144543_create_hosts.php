<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('host_name')->index()->unique();
            $table->string('alias');
            $table->string('template_name')->nullable()->unique(); //name for using as template
            $table->string('is_template');
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
        Schema::drop('hosts');
    }
}
