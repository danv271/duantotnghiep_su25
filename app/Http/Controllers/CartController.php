<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::check() ? Auth::id() : 8;

        $cartItems = Cart::join('cart_items', 'carts.id', '=', 'cart_items.cart_id')
            ->join('variants', 'cart_items.variant_id', '=', 'variants.id')
            ->join('products', 'variants.product_id', '=', 'products.id')
            ->leftJoin('products_images', function($join) {
                $join->on('products.id', '=', 'products_images.product_id')
                     ->whereRaw('products_images.id = (SELECT MIN(id) FROM products_images WHERE product_id = products.id)');
            })
            ->select(
                'carts.*',
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
            $userId = Auth::check() ? Auth::id() : 8;

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


}
