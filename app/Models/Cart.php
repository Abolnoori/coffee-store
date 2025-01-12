<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
        protected $fillable = ['user_id',];
        protected $hidden = ['id', 'created_at','updated_at',];
        public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
