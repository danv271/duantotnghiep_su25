<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderSuccessController extends Controller
{
    //
    public function getDataToConversionOptimized()
{
    // Tối ưu: chỉ query những gì cần thiết
    $total = Order::count();
    $success = Order::where('status_payment', 'đã thanh toán')->count();
    $unSuccess = Order::whereIn('status_payment', ['đã hủy', 'hoàn hàng'])->count();
    $pending = $total - $success - $unSuccess;
    
    // Tính phần trăm
    $successRate = $total > 0 ? round(($success / $total) * 100, 2) : 0;
    
    $data = [
        'chart' => [
            'series' => [$successRate],
            'categories' => ['Thành công', 'Không thành công', 'Đang xử lý'],
            'data' => [$success, $unSuccess, $pending]
        ]
    ];

    return response()->json($data,200);
}
}
