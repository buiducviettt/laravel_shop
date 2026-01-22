<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //
    protected $table = 'product_size';
     protected $fillable = [
        'name',
        'code',
    ];
}
