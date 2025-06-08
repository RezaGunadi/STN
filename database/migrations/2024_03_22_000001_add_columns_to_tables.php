<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('product_type', function (Blueprint $table) {
            $table->string('size')->nullable()->after('type');
        });

        Schema::table('product', function (Blueprint $table) {
            $table->string('vendor_name')->default('STN')->after('type');
            $table->boolean('is_show_on_web')->default(false)->after('vendor_name');
            $table->string('size')->nullable()->after('is_show_on_web');
        });
    }

    public function down()
    {
        Schema::table('product_type', function (Blueprint $table) {
            $table->dropColumn('size');
        });

        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn(['vendor_name', 'is_show_on_web', 'size']);
        });
    }
}; 