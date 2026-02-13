<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariants;

class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->product_id;

        $product = Product::findOrFail($id);

        $colorId = $request->color;
        $sizeId  = $request->size;

        // Tìm variant nếu có
        $variant = null;

        if ($colorId && $sizeId) {
            $variant = $product->variants()
                ->where('color_id', $colorId)
                ->where('size_id', $sizeId)
                ->with(['color', 'size'])
                ->first();
        }

        $key = $variant
            ? $id . '-' . $variant->id   // mỗi variant là 1 dòng riêng
            : $id;

        if (isset($cart[$key])) {
            $cart[$key]['quantity']++;
        } else {
            $cart[$key] = [
                'product_id' => $id,
                'variant_id' => $variant?->id,
                'name' => $product->name,
                'price' => $product->base_price,
                'color' => $variant?->color->name ?? null,
                'size'  => $variant?->size->name ?? null,
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
