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
        $timeRange = $request->input('time', '12'); // Mặc định 12 tháng
        $now = now();
        $listDataToChart = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total_price) as total_price')
        )
            // ->where('status_payment', '!=', 'Chưa thanh toán') // Lọc đơn hàng đã thanh toán
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get()
            ->map(function ($item) {
                return [
                    'date' => $item->date,
                    'total_price' => $item->total_price,
                ];
            });
        // dd($listDataToChart);

        switch ($timeRange) {
            case '1':
                $listDataToChart->where('created_at', '>=', $now->subMonths(1));
                break;
            case '6':
                $listDataToChart->where('created_at', '>=', $now->subMonths(6));
                break;
            case '12':
                $listDataToChart->where('created_at', '>=', $now->subMonths(12));
                break;
            case 'all':
            default:
                break;
        }
        return response()->json($listDataToChart);
    }
}
