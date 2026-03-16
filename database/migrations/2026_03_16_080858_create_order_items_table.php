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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->string('product_id');
            $table->string('product_title');
            $table->string('category_label')->nullable();
            $table->string('image_label')->nullable();
            $table->text('short_description')->nullable();
            $table->text('full_description')->nullable();
            $table->string('material')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('availability')->nullable();
            $table->string('lead_time')->nullable();
            $table->json('images')->nullable();
            $table->unsignedBigInteger('unit_price');
            $table->unsignedInteger('quantity');
            $table->unsignedBigInteger('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
