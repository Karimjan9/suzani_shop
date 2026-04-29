<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['products', 'categories', 'content_blocks', 'portfolio_items', 'feedback'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table): void {
                $table->json('translations')->nullable();
            });
        }
    }

    public function down(): void
    {
        foreach (['products', 'categories', 'content_blocks', 'portfolio_items', 'feedback'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table): void {
                $table->dropColumn('translations');
            });
        }
    }
};
