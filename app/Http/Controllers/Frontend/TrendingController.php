<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendingController extends Controller
{
    //
    public function index()
    {
        // lấy cate từ model 
        // categories
        $categories = DB::table('categories')
            ->select()
            ->get();

        // trending products (join sang products)
        $trendings = DB::table('trending_products')
            ->join('products', 'trending_products.product_id', '=', 'products.id')
            ->select(
                'products.name',
                'products.slug',
                'trending_products.image',
                'trending_products.type'
            )
            ->orderBy('trending_products.priority')
            ->get();
        return view('frontend.trending')->with(compact('categories', 'trendings'));
    }
}
