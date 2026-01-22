<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    //
     protected $table = 'product_colors';
    protected $fillable = [
        'name',
        'code',
    ];
}
