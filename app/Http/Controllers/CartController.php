<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Variant;

class CartController extends Controller
{
 public function index()
{
    if (Auth::check()) {
        $userId = Auth::id();

        $cartItems = Cart::join('cart_items', 'carts.id', '=', 'cart_items.cart_id')
            ->join('variants', 'cart_items.variant_id', '=', 'variants.id')
            ->join('products', 'variants.product_id', '=', 'products.id')
            ->leftJoin('products_images', function($join) {
                $join->on('products.id', '=', 'products_images.product_id')
                     ->whereRaw('products_images.id = (SELECT MIN(id) FROM products_images WHERE product_id = products.id)');
            })
            ->select(
                'cart_items.id as cart_item_id',
                'cart_items.quantity',
                'products.name as product_name',
                'variants.price as variant_price',
                'variants.stock_quantity as max_quantity',
                'products_images.path as image_path'
            )
            ->where('carts.user_id', $userId)
            ->get();

        return view('cart', compact('cartItems'));

    } else {
        // Lấy từ session nếu chưa đăng nhập
        $cartItems = session('cart', []);
        return view('cart', compact('cartItems'));
    }
}


    public function update(Request $request)
    {
        try {
            $cartItems = $request->input('cart_items', []);
            
            foreach ($cartItems as $itemId => $quantity) {
                if ($quantity > 0) {
                    CartItem::where('id', $itemId)->update(['quantity' => $quantity]);
                }
            }

            return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');

        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Error updating cart: ' . $e->getMessage());
        }
    }

    public function clear()
    {
        try {
            $userId = Auth::check() ? Auth::id() : 1;

            $cart = Cart::where('user_id', $userId)->first();
            
            if ($cart) {
                CartItem::where('cart_id', $cart->id)->delete();
            }

            return redirect()->route('cart.index')->with('success', 'Cart cleared successfully!');

        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Error clearing cart: ' . $e->getMessage());
        }
    }

    public function remove($id)
{
    try {
        CartItem::where('id', $id)->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed successfully!');

    } catch (\Exception $e) {
        return redirect()->route('cart.index')->with('error', 'Error removing item: ' . $e->getMessage());
    }
}
public function add(Request $request)
{
    $variantId = $request->input('variant_id');
    $quantity = (int) $request->input('quantity', 1);

    $variant = \App\Models\Variants::with('product')->findOrFail($variantId);

    // Người dùng đã đăng nhập
    if (Auth::check()) {
        $userId = Auth::id();

        $cart = Cart::firstOrCreate(['user_id' => $userId ]);

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('variant_id', $variantId)
            ->first();

        $currentCartQuantity = $cartItem ? $cartItem->quantity : 0;
        $totalAfterAdd = $currentCartQuantity + $quantity;

        if ($totalAfterAdd > $variant->stock_quantity) {
            return back()->with('error', "Số lượng vượt quá tồn kho! Tồn kho: {$variant->stock_quantity}, đã có trong giỏ: {$currentCartQuantity}");
        }

        if ($cartItem) {
            $cartItem->update(['quantity' => $totalAfterAdd]);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'variant_id' => $variantId,
                'quantity' => $quantity,
            ]);
        }
    }
    // Người dùng chưa đăng nhập — dùng session
    else {
        $cart = session()->get('cart', []);

        // Nếu sản phẩm đã có trong giỏ
        if (isset($cart[$variantId])) {
            $newQuantity = $cart[$variantId]['quantity'] + $quantity;

            if ($newQuantity > $variant->stock_quantity) {
                return back()->with('error', "Số lượng vượt quá tồn kho! Tồn kho: {$variant->stock_quantity}, đã có trong giỏ: {$cart[$variantId]['quantity']}");
            }

            $cart[$variantId]['quantity'] = $newQuantity;
        } else {
            if ($quantity > $variant->stock_quantity) {
                return back()->with('error', "Số lượng vượt quá tồn kho! Tồn kho: {$variant->stock_quantity}");
            }

            $cart[$variantId] = [
                'product_name' => $variant->product->name,
                'price' => $variant->price,
                'quantity' => $quantity,
                'variant_id' => $variant->id,
                'image_path' => $variant->product->images
            ];
        }

        session()->put('cart', $cart);
    }

    return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng!');
}


}
