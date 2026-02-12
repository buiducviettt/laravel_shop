<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuratedPin extends Model
{
    protected $table = 'curated_pins';
    protected $fillable = [
        'title',
        'image',
        'link', // optional (link product / collection / url)
    ];
}
