<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'Contact';
    protected $fillable = [ 'name','email','subject','message','updated_at','created_at' ];    
}
