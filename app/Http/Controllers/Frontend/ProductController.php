<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Danh sách tất cả sản phẩm
    public function index()
    {
        $products = Product::where('is_active', true)
            ->paginate(12);

        return view('frontend.products.index', compact('products'));
    }

    // Chi tiết sản phẩm
    public function show(Product $product)
    {
        abort_if(!$product->is_active, 404);

        $category = $product->category;

        return view('frontend.products.detail', compact('product', 'category'));
    }
}
