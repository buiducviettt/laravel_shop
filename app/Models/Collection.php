<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'products_collections';
    protected $fillable = [
        'name',
        'slug',
        'image',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
