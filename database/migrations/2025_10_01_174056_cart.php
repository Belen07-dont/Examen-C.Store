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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();

            // Prevent duplicate products for the same user
            $table->unique(['product_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart', function (Blueprint $table) {
            // Drop the foreign key constraints first
            $table->dropForeign(['product_id']);
            $table->dropForeign(['user_id']);
            // Drop the unique constraint
            $table->dropUnique(['product_id', 'user_id']);
        });
        
        Schema::dropIfExists('cart');
    }
};