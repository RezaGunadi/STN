<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->decimal('total_amount', 15, 2);
            $table->decimal('rental_amount', 15, 2);
            $table->decimal('total_rental_amount', 15, 2);
            $table->string('status')->default('pending'); // pending, approved, rejected, completed
            $table->text('notes')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->timestamp('order_date');
            $table->timestamp('approved_at')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('product')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('rental_amount', 15, 2);
            $table->decimal('total_rental_amount', 15, 2);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
