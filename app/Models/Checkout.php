<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'user_id',
        'SubTotal',
        'Envio',
        'Impuesto',
        'Total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

     public function items()
    {
        return $this->hasMany(PedidoItem::class);
    }
}
