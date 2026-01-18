<?php

namespace App\Models;
use App\Models\Variant;
use App\Models\Category;
use App\Models\Collection;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'category_id',
        'collection_id',
        'name',
        'slug',
        'description',
        'image',
        'base_price',
        'is_active'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function collection(){
        return $this->belongsTo(Collection::class);
    }
    public function variants(){
        return $this->hasMany(Variant::class);
    }
    public function trending(){
        return $this->hasOne(TrendingProduct::class);
    }
    
}
