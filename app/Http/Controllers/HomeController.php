<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'images', 'variants.attributesValue.attribute')->paginate(12);
        $categories = Category::all(); 
        return view('index', compact('products','categories'));
    }
}
