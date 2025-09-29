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
    $table->foreignId('product_id')->constrained('products'); // ✅ Singular, specify table
    $table->string('name'); // ✅ Changed from longText to string
    $table->longText('description');
    $table->string('image')->nullable();
    $table->integer('quantity'); // ✅ Changed from string to integer
    $table->decimal('price', 8, 2); // ✅ Changed from string to decimal
    $table->decimal('subtotal', 10, 2); // ✅ Changed from string to decimal, better name
    $table->foreignId('user_id')->constrained('users'); // ✅ Specify table
    $table->timestamps();
    
    // Prevent duplicate products for same user
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


