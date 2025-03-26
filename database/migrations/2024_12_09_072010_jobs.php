<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->text('event_location');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->integer('total_price')->default(0);
            $table->integer('price_before_discount')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('additional_price')->default(0);
            $table->integer('starter_user_id')->default(0);
            $table->integer('closer_user_id')->default(0);
            $table->integer('starter_team_id')->default(0);
            $table->integer('closer_team_id')->default(0);
            $table->string('user_city')->nullable();
            $table->string('user_province')->nullable();
            $table->string('user_address')->nullable();
            $table->string('client');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('finish_date')->nullable();
            // $table->foreign('starter_user_id')->references('id')->on('users');
            // $table->foreign('closer_user_id')->references('id')->on('users');
            $table->integer('created_by');
            $table->integer('deleted_by')->default(0);
            $table->integer('updated_by')->default(0);
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
        Schema::dropIfExists('jobs');
    }
}
