<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    // Trang sản phẩm theo category
    public function show(Category $category)
    {
        abort_if(!$category->is_active, 404);

        $products = $category->products()
            ->where('is_active', true)
            ->paginate(12);
        return view('frontend.categories.index', compact('category', 'products'));
    }
}
