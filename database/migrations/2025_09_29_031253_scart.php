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
       Schema::create('cart', function(Blueprint $table){
    $table->id();
    $table->foreignId('product_id')->constrained('products'); 
    $table->string('name'); 
    $table->longText('description');
    $table->string('image')->nullable();
    $table->integer('quantity'); // 
    $table->decimal('price', 8, 2); 
    $table->decimal('subtotal', 10, 2); 
    $table->foreignId('user_id')->constrained('users');
    $table->timestamps();
    
    // Revisar id de productos repetidos en usuario Admin
    $table->unique(['product_id', 'user_id']);
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
    });
    
    Schema::dropIfExists('cart');
    }
};


