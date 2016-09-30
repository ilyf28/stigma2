<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlusterfsVolumes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glusterfs_volumes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cluster_id')->unsigned();
            $table->foreign('cluster_id')->references('id')->on('glusterfs_clusters')->onDelete('cascade');
            $table->string('volume_name');
            $table->string('type');
            $table->string('bricks');
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
        Schema::drop('glusterfs_volumes');
    }

}
