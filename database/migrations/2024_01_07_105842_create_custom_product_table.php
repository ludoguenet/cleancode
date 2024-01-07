<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('custom_product', function (Blueprint $table) {
            $table->unsignedBigInteger('custom_id');
            $table
                ->foreign('custom_id')
                ->references('id')
                ->on('customs')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('product_id');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->cascadeOnDelete();

            $table->primary(['custom_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_product');
    }
};
