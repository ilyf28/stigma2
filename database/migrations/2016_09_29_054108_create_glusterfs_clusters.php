<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlusterfsClusters extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glusterfs_clusters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cluster_name')->index()->unique();
            $table->string('devices');
            $table->string('alias');
            $table->string('members');
            $table->string('quorum');
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
        Schema::drop('glusterfs_clusters');
    }

}
