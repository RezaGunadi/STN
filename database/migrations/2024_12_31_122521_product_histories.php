<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_histories', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('category');
            $table->string('brand');
            $table->string('type');
            $table->string('code');
            $table->text('description');
            $table->date('payment_date');
            $table->string('purpose_used')->nullable();
            $table->integer('price');
            $table->string('status');
            $table->text('event_location')->nullable();
            $table->text('storage_location')->nullable();
            $table->integer('is_available')->default(1);
            $table->text('note')->nullable();
            $table->integer('user_id')->default(0);
            $table->string('qr_string');
            $table->integer('is_consumable')->default(0);
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('product_histories');
    }
}
