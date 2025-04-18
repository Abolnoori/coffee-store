<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodoct extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [ 'name', 'description', 'price', 'discount', 'image', 'category_id','updated_at','created_at' ];
    public function category() {

        return $this->belongsTo(Category::class);
        
    }
}
