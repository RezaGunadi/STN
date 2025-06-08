<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity')->default(1);
            $table->decimal('price', 10, 2);
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamp('requested_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->timestamp('paid_at')->nullable();
            $table->unsignedBigInteger('paid_by')->nullable();
            $table->decimal('paid_amount', 10, 2)->nullable();
            $table->string('paid_method')->nullable();
            $table->text('paid_notes')->nullable();
            $table->boolean('is_delivered')->default(false);
            $table->timestamp('delivered_at')->nullable();
            $table->unsignedBigInteger('delivered_by')->nullable();
            $table->text('delivered_notes')->nullable();
            $table->boolean('is_cancelled')->default(false);
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('paid_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('delivered_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_carts');
    }
};
