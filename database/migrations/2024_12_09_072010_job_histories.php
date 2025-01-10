<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JobHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_id');
            $table->string('event_name');
            $table->text('event_location');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->integer('starter_user_id');
            $table->integer('closer_user_id');
            $table->string('user_city')->nullable();
            $table->string('user_province')->nullable();
            $table->string('user_address')->nullable();
            $table->string('client');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('finish_date')->nullable();
            // $table->foreign('starter_user_id')->references('id')->on('users');
            // $table->foreign('closer_user_id')->references('id')->on('users');
            $table->integer('created_by');
            $table->integer('deleted_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('job_histories');
    }
}
