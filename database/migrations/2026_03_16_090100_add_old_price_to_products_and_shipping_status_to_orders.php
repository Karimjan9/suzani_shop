<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('old_price')->nullable()->after('price');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->string('shipping_status')->default('pending')->after('status');
            $table->index('shipping_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex(['shipping_status']);
            $table->dropColumn('shipping_status');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('old_price');
        });
    }
};
