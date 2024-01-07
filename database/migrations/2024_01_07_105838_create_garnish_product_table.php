<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('garnish_product', function (Blueprint $table) {
            $table->unsignedBigInteger('garnish_id');
            $table
                ->foreign('garnish_id')
                ->references('id')
                ->on('garnishes')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('product_id');
            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->cascadeOnDelete();

            $table->primary(['garnish_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('garnish_product');
    }
};
