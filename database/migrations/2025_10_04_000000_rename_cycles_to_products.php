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
        if (Schema::hasTable('cycles') && !Schema::hasTable('products')) {
            Schema::rename('cycles', 'products');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('products') && !Schema::hasTable('cycles')) {
            Schema::rename('products', 'cycles');
        }
    }
};
