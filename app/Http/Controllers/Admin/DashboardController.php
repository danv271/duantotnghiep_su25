<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Api\ChartController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $tolTalOrders =  Order::count();
        $chartController = new ChartController();
        // $listDataForChart = $chartController->getDataToChart(new Request(['time' => 'all']));
        // dd($listDataForChart);
        function formatToText($number)
        {
            if ($number >= 1000000000) {
                return number_format($number / 1000000000, 2, ',', '.') . ' tỷ';
            } elseif ($number >= 1000000) {
                return number_format($number / 1000000, 2, ',', '.') . ' triệu';
            } elseif ($number >= 1000) {
                return number_format($number / 1000, 2, ',', '.') . ' nghìn';
            } else {
                return number_format($number, 0, ',', '.') . ' đồng';
            }
        }
        $tolTalPrice = Order::where('status_payment', '!=', 'Chưa thanh toán')->sum('total_price');
        $tolTalPrice = formatToText($tolTalPrice);
        $bestSellingProducts = OrderDetail::with('variant.product.images')->select('variant_id', OrderDetail::raw('SUM(quantity) as total_quantity', Variant::raw('SUM(stock_quantity) as total_stock')))
            ->groupBy('variant_id')
            ->orderByDesc('total_quantity')
            ->limit(10)
            ->get();
        // dd($bestSellingProducts);

        return view('admin.dashboard', compact('tolTalOrders', 'tolTalPrice', 'bestSellingProducts')); // Return the view for the admin dashboard
    }

}
