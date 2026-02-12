<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    //
    protected $table = 'product_materials';
     protected $fillable = [
        'name',
        'code',
    ];
}
