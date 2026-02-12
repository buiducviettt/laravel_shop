<?php

namespace App\Models;

use App\Models\ProductVariants;
use App\Models\Category;
use App\Models\Collection;
use App\Models\ProductImage;
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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
    public function variants()
    {
        return $this->hasMany(ProductVariants::class);
    }
    public function trending()
    {
        return $this->hasOne(TrendingProduct::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function getRouteKeyName() // hàm để gọi slug
    {
        return 'slug';
    }
    // ✅ (KHUYÊN DÙNG) ẢNH CHÍNH
    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)
            ->where('is_main', true)
            ->orderBy('sort_order');
    }
}
