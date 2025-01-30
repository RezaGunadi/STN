<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JobDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_details', function (Blueprint $table) {
            $table->id();
            // $table->integer('starter_user_id');
            // $table->integer('closer_user_id');
            $table->integer('id_product');
            $table->integer('day_finished')->default(0);
            $table->string('lat_user');
            $table->string('lng_user');
            $table->bigInteger('event_id');
            $table->integer('created_by');
            $table->integer('deleted_by')->default(0);
            $table->integer('updated_by')->default(0);
            // $table->string('user_city');
            // $table->string('user_province');
            // $table->string('user_address');
            // $table->foreign('starter_user_id')->references('id')->on('users');
            // $table->foreign('closer_user_id')->references('id')->on('users');
            // $table->foreign('id_product')->references('id')->on('product');
            // $table->foreign('event_id')->references('id')->on('jobs');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_details');
    }
}
