<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JobDetailHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_detail_histories', function (Blueprint $table) {
            $table->id();
            // $table->integer('starter_user_id');
            // $table->integer('closer_user_id');
            $table->bigInteger('job_detail_id');
            $table->bigInteger('id_product');
            // $table->string('lat_user');
            // $table->string('lng_user');
            // $table->string('user_city');
            // $table->string('user_province');
            // $table->string('user_address');
            $table->bigInteger('event_id');
            $table->integer('created_by');
            $table->integer('deleted_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('job_detail_histories');
    }
}
