<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('craftsmanship_method')->nullable()->after('color');
            $table->string('production_time')->nullable()->after('craftsmanship_method');
            $table->boolean('custom_order_available')->default(false)->after('is_made_to_order');
            $table->string('availability_mode')->default('available')->after('custom_order_available');
            $table->boolean('delivery_available')->default(true)->after('availability_mode');
        });

        DB::table('products')
            ->where('is_made_to_order', true)
            ->update(['availability_mode' => 'made_to_order']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'craftsmanship_method',
                'production_time',
                'custom_order_available',
                'availability_mode',
                'delivery_available',
            ]);
        });
    }
};
