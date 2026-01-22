<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendingController extends Controller
{
    //
    public function index(){
        // lấy cate từ model 
        // categories
        $categories = DB::table('categories')
            ->select()
            ->get();

        // trending products (join sang products)
        $trendings = DB::table('trending_products')
            ->join('products', 'trending_products.product_id', '=', 'products.id')
             ->leftJoin('product_images', function ($join) {
        $join->on('product_images.product_id', '=', 'products.id')
             ->where('product_images.is_main', 1);
    })
            ->select(
                    'products.id',
                    'products.name',
                    'products.slug',
                    'products.base_price',
                    'trending_products.type',
                    'product_images.image_url as image'  
            )
           ->orderBy('trending_products.priority')
            ->get();
        return view('frontend.trending') ->with(compact ('categories', 'trendings'));
    }
   
}
