<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->product_id;

        $product = Product::findOrFail($id);

        // Không bắt buộc variant nếu bạn muốn đơn giản
        $color = $request->color ?? null;
        $size  = $request->size ?? null;

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_id' => $id,
                'name' => $product->name,
                'price' => $product->base_price,
                'color' => $color,
                'size' => $size,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'count' => collect($cart)->sum('quantity')
        ]);
    }

    public function buyNow(Request $request)
    {
        $this->addToCart($request);
        return redirect()->route('checkout');
    }
    public function miniCart()
    {
        $cart = session()->get('cart', []);

        return response()->json([
            'items' => array_values($cart),
            'count' => collect($cart)->sum('quantity')
        ]);
    }
    //xóa sp khỏi giỏ 
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->product_id;

        foreach ($cart as $key => $item) {
            if ($item['product_id'] == $productId) {
                unset($cart[$key]);
                break; // xoá 1 cái thôi
            }
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'count' => collect($cart)->sum('quantity'),
            'items' => array_values($cart),
        ]);
    }

    public function clear()
    {
        session()->forget('cart');

        return response()->json([
            'success' => true,
            'count' => 0,
            'items' => [],
        ]);
    }
}
