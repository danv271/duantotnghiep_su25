<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all(); // hoặc ->take(8) nếu bạn muốn giới hạn

        return view('index', compact('products'));
    }
}
