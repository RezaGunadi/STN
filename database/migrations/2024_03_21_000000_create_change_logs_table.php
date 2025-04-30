<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_logs', function (Blueprint $table) {
            $table->id();
            $table->string('model_type'); // The model class name (e.g., ProductDB, User, etc.)
            $table->unsignedBigInteger('model_id'); // The ID of the changed record
            $table->string('action'); // create, update, delete
            $table->string('field_name')->nullable(); // The name of the changed field
            $table->text('old_value')->nullable(); // The old value
            $table->text('new_value')->nullable(); // The new value
            $table->unsignedBigInteger('user_id'); // The user who made the change
            $table->string('ip_address')->nullable(); // IP address of the user
            $table->string('user_agent')->nullable(); // Browser/device info
            $table->json('additional_data')->nullable(); // Any additional context
            $table->timestamps();
            $table->softDeletes();

            // Indexes for better query performance
            $table->index(['model_type', 'model_id']);
            $table->index('user_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('change_logs');
    }
}
