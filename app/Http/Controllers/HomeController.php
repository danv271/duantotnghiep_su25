<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        
        // Lấy danh mục cha (parent_id là null) kèm danh mục con
        $parentCategories = Category::whereNull('parent_category_id')
            ->with(['children.products' => function ($query) {
                $query->with('images', 'variants.attributesValue.attribute')
                    ->orderBy('id', 'desc')
                    ->take(4); // Lấy tối đa 4 sản phẩm mỗi danh mục con
            }])
        ->get();
        $products = Product::with('category', 'images', 'variants.attributesValue.attribute')->paginate(12);
        $newProducts = Product::with('category', 'images', 'variants.attributesValue.attribute')->orderBy('id','desc')->take(4)->get();
        $categories = Category::all();
        return view('index', compact('products','categories','newProducts','parentCategories'));
    }

}
