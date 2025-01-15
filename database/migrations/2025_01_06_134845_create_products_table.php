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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price',10,2);
            $table->decimal('discountPercentage',4,2)->nullable();
            $table->decimal('rating',3,2)->nullable();
            $table->integer('stock');
            $table->json('tags')->nullable();
            $table->string('brand');
            $table->string('sku');
            $table->json('reviews')->nullable();
            $table->json('images')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
