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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('SubTotal', 8, 2);
            $table->decimal('Envio', 8, 2);
            $table->decimal('Impuesto', 8, 2);
            $table->decimal('Total', 8, 2);
            $table->timestamps();

            // Add foreign keys manually with explicit references
            $table->foreign('cart_id')
                ->references('id')
                ->on('cart')
                ->onDelete('cascade');
                
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

public function down(): void
{
    Schema::table('pedidos', function (Blueprint $table) {
        
        $table->dropForeign(['cart_id']);
        $table->dropForeign(['user_id']);
    });
    
    Schema::dropIfExists('pedidos');
}
};