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
       Schema::create('pedido_items', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pedido_id');
        $table->unsignedBigInteger('product_id');
        $table->string('product_name');
        $table->text('product_description');
        $table->string('image')->nullable();
        $table->integer('quantity');
        $table->decimal('price', 8, 2);
        $table->decimal('subtotal', 10, 2);
        $table->timestamps();

        $table->foreign('pedido_id')
            ->references('id')
            ->on('pedidos')
            ->onDelete('cascade');
            
        $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedido_items', function (Blueprint $table) {
            $table->dropForeign(['pedido_id']);
            $table->dropForeign(['product_id']);
        });
        
        Schema::dropIfExists('pedido_items');
    }
};