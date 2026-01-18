<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrendingProduct extends Model
{
    //
    protected $fillable = [
        'product_id',
        'priority'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
