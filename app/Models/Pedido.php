<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     use HasFactory;

  
    protected $table = 'pedidos';
    
    protected $fillable = [
        'cart_id',
        'user_id',
        'SubTotal',
        'Envio', 
        'Impuesto',
        'Total'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
     public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function items()
    {
        return $this->hasMany(PedidoItem::class);
    }
   
}