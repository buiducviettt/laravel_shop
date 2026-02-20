<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariants;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $product = Product::findOrFail($request->product_id);
        $variant = $product->variants()
            ->where('color_id', $request->color)
            ->where('size_id', $request->size)
            ->with(['color', 'size'])
            ->first();
        if (!$variant) {
            return response()->json([
                'success' => false,
                'message' => 'Variant không tồn tại'
            ], 400);
        }
        $key = $product->id . '-' . $variant->id;
        if (isset($cart[$key])) {
            $cart[$key]['quantity']++;
        } else {
            $cart[$key] = [
                'product_id' => $product->id,
                'variant_id' => $variant->id,
                'name'       => $product->name,
                'price'      => $variant->price,
                'color'      => $variant->color->name,
                'size'       => $variant->size->name,
                'quantity'   => 1
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'count'   => collect($cart)->sum('quantity')
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
        $items = array_values($cart);
        $total = 0;
        foreach ($items as &$item) {
            $item['subtotal'] = $item['price'] * $item['quantity'];
            $total += $item['subtotal'];
        }
        return response()->json([
            'items' => array_values($cart),
            'count' => collect($cart)->sum('quantity'),
            'total' => $total
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
