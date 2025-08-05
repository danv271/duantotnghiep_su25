<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Api\ChartController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Variant;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data = [];
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

        $data['tolTalOrders'] = Order::count();
        $data['tolTalPrice'] = formatToText(Order::where('status_payment', '!=', 'Chưa thanh toán')->sum('total_price'));
        $data['bestSellingProducts'] = OrderDetail::with('variant.product.images')->select('variant_id', OrderDetail::raw('SUM(quantity) as total_quantity', Variant::raw('SUM(stock_quantity) as total_stock')))
            ->groupBy('variant_id')
            ->orderByDesc('total_quantity')
            ->limit(10)
            ->get();
        $data['listCoupon'] = Voucher::where('max_usage', '>', 'used_count')->count();
        $data['listNewUser'] = User::where('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 month')))->where('role_id', '1')->count();
        $data['inventory'] = Variant::with('product')
            ->select('product_id', DB::raw('SUM(stock_quantity) as total_stock'))
            ->groupBy('product_id')
            ->orderBy('total_stock','asc')
            ->paginate(7);
        // dd($data['inventory']);

        // dd($paginatedInventory);
        return view('admin.dashboard', compact('data')); // Return the view for the admin dashboard
    }
}
