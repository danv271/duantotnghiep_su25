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

use function Laravel\Prompts\form;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data = [];
        $data['totalOrders'] = Order::whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->count();
        $lastWeek = Order::whereBetween('created_at', [
            now()->subWeek()->startOfWeek(),
            now()->subWeek()->endOfWeek()
        ])->count();
        $data['growthRate'] = growthRate($data['totalOrders'], $lastWeek);

        $data['tolTalPrice'] = Order::where('status_payment', '!=', 'Chưa thanh toán')->whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ])->sum('total_price');
        $lastMonthPrice = Order::where('status_payment', '!=', 'Chưa thanh toán')->whereBetween('created_at', [
            now()->subMonth()->startOfMonth(),
            now()->subMonth()->endOfMonth()
        ])->sum('total_price');
        $data['growthRatePrice'] = growthRate($data['tolTalPrice'], $lastMonthPrice);
        $data['tolTalPrice'] = formatToText($data['tolTalPrice']);
        $data['bestSellingProducts'] = OrderDetail::with('variant.product.images')->select('variant_id', OrderDetail::raw('SUM(quantity) as total_quantity', Variant::raw('SUM(stock_quantity) as total_stock')))
            ->groupBy('variant_id')
            ->orderByDesc('total_quantity')
            ->limit(10)
            ->get();

        $data['listDeals'] = Order::where('type_payment',  'vnpay')->whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ])->count();
        $lastMonthDeals = Order::where('type_payment',  'vnpay')->whereBetween('created_at', [
            now()->subMonth()->startOfMonth(),
            now()->subMonth()->endOfMonth()
        ])->count();
        $data['growthRateDeals'] = growthRate($data['listDeals'], $lastMonthDeals);
        $data['listNewUser'] = User::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ])
            ->where('role_id', '1')
            ->whereHas('order')
            ->count();
        $lastMonthUser = User::whereBetween('created_at', [
            now()->subMonth()->startOfMonth(),
            now()->subMonth()->endOfMonth()
        ])
            ->where('role_id', '1')
            ->whereHas('order')
            ->count();
        $data['growthRateUser'] = growthRate($data['listNewUser'], $lastMonthUser);
        // dd($data['growthRateUser']);

        $data['inventory'] = Variant::with('product')
            ->select('product_id', DB::raw('SUM(stock_quantity) as total_stock'))
            ->groupBy('product_id')
            ->orderBy('total_stock', 'asc')
            ->paginate(7);

        $data['listOrders'] = Order::whereNotIn('status_order', ['Đã giao', 'Đã hủy'])
            ->paginate(10);
        return view('admin.dashboard', compact('data')); // Return the view for the admin dashboard
    }
}
