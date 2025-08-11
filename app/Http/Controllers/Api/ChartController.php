<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function getDataToChart(Request $request)
    {
        $timeRange = $request->input('time', 'all');
        $now = now();

        // Khởi tạo query builder cơ bản
        $query = Order::where('status_payment', '!=', 'chưa thanh toán');

        switch ($timeRange) {
            case '1':
                // Hiển thị doanh thu theo NGÀY trong 1 tháng gần nhất
                $listDataToChart = $query
                    ->where('created_at', '>=', $now->copy()->subMonth(1))
                    ->select(
                        DB::raw('DATE(created_at) as date'),
                        DB::raw('SUM(total_price) as total_price')
                    )
                    ->groupBy(DB::raw('DATE(created_at)'))
                    ->orderBy('date', 'asc')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'date' => $item->date, // Format: YYYY-MM-DD (ví dụ: 2024-01-15)
                            'total_price' => $item->total_price,
                        ];
                    });
                break;

            case '6':
                // Hiển thị doanh thu theo THÁNG trong 6 tháng gần nhất
                $listDataToChart = $query
                    ->where('created_at', '>=', $now->copy()->subMonths(6))
                    ->select(
                        DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                        DB::raw('SUM(total_price) as total_price')
                    )
                    ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
                    ->orderBy('month', 'asc')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'date' => $item->month, // Format: YYYY-MM (ví dụ: 2024-01)
                            'total_price' => $item->total_price,
                        ];
                    });
                break;
            case '12':
                $listDataToChart = $query
                    ->where('created_at', '>=', $now->copy()->subMonths(12))
                    ->select(
                        DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                        DB::raw('SUM(total_price) as total_price')
                    )
                    ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
                    ->orderBy('month', 'asc')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'date' => $item->month, // Format: YYYY-MM (ví dụ: 2024-01)
                            'total_price' => $item->total_price,
                        ];
                    });
                break;
            case 'all':
            default:
                // Hiển thị doanh thu theo THÁNG cho toàn bộ thời gian
                $listDataToChart = $query
                    ->select(
                        DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                        DB::raw('SUM(total_price) as total_price')
                    )
                    ->groupBy(DB::raw('DATE_FORMAT(created_at, "%Y-%m")'))
                    ->orderBy('month', 'asc')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'date' => $item->month, // Format: YYYY-MM (ví dụ: 2024-01)
                            'total_price' => $item->total_price,
                        ];
                    });
                break;
        }

        return response()->json($listDataToChart);
    }
}
