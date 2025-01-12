<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cartitems';
    protected $fillable = ['cart_id', 'product_id', 'quantity', 'price', 'discount'];
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Prodoct::class);
    }
}
