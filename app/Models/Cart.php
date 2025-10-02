<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    

     protected $fillable = [
        'product_id',
        'name',
        'description', 
        'image',
        'quantity',
        'price',
        'subtotal',
        'user_id'
    ];

        public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function Check()
    {
        return $this->hasMany(Checkout::class);
    }
}
