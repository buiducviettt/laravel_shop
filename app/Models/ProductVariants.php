<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    //
    protected $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'material_id',
        'price',
        'stock',
        'sku',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function color(){
        return $this->belongsTo(Colors::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
    public function material(){
        return $this->belongsTo(Materials::class);
    }
    
}
