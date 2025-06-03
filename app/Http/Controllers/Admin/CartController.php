<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Trả về giao diện quản lý giỏ hàng
        return view('admin.cart.index');
    }
}
