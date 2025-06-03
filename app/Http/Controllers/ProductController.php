<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller; // ✅ thêm dòng này nếu IDE báo lỗi

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product-detail', compact('product'));
    }
}
