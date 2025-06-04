<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Trả về view danh sách đơn hàng
        return view('admin.orders.index');
    }
    public function show($id = null)
    {
        // Trả về view chi tiết đơn hàng
        return view('admin.orders.show');
    }
}
