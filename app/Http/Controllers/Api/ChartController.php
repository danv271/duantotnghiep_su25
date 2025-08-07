<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    //
    public function getDataToChart(Request $request)
    {
        $timeRange = $request->input('time', 'all'); // Mặc định 12 tháng
        $now = now();

        // Tạo query builder
        $query = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total_price) as total_price')
        );
        
        // Áp dụng filter TRƯỚC khi group by
        switch ($timeRange) {
            case '1':
                $query->where('created_at', '>=', $now->copy()->subMonth(1));
                break;
            case '6':
                $query->where('created_at', '>=', $now->copy()->subMonths(6));
                break;
            case 'all':
            default:
                // Không filter
                break;
        }

        // Thực hiện group by và get data
       $listDataToChart = $query
    // ->where('status_payment', '!=', 'Chưa thanh toán') // Nếu cần filter trạng thái
    ->select(
        DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
        DB::raw('SUM(total_price) as total_price') // Tổng doanh thu theo tháng
    )
    ->where('status_payment','!=', 'chưa thanh toán')
    ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
    ->orderBy('month', 'asc') // Sắp xếp theo tháng tăng dần
    ->get()
    ->map(function ($item) {
        return [
            'date' => $item->month, // Format: YYYY-MM (ví dụ: 2024-01)
            'total_price' => $item->total_price,
        ];
    });

        return response()->json($listDataToChart);
    }
}
