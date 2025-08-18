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
        // $data['tolTalPrice'] = formatToText($data['tolTalPrice']);
        $data['tolTalPrice'] = number_format($data['tolTalPrice'], 0, ',', '.');
        $data['bestSellingProducts'] = OrderDetail::select(
            'products.id as product_id',
            'products.name as product_name',
            'products.base_price',
            DB::raw('(SELECT path FROM products_images WHERE product_id = products.id ORDER BY id ASC LIMIT 1) as image_path'),
            DB::raw('SUM(order_details.quantity) as total_quantity'),
            DB::raw('SUM(variants.stock_quantity) as total_stock') // Tổng stock của tất cả variants
        )
            ->join('variants', 'order_details.variant_id', '=', 'variants.id')
            ->join('products', 'variants.product_id', '=', 'products.id')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_quantity')
            ->limit(10)
            ->get();

        // dd($data['bestSellingProducts']);
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
            ->paginate(5);

        $data['listOrders'] = Order::whereNotIn('status_order', ['Đã giao', 'Đã hủy'])
            ->paginate(10);
        $data['productRevenueStatistics'] = OrderDetail::select(
            'products.id',
            'products.name',
            DB::raw('(SELECT path FROM products_images WHERE product_id = products.id ORDER BY id ASC LIMIT 1) as image_path'),
            DB::raw('SUM(order_details.quantity) as total_quantity'),
            DB::raw('SUM(order_details.quantity * order_details.variant_price) as total_revenue')
        )
            ->join('variants', 'order_details.variant_id', '=', 'variants.id')
            ->join('products', 'variants.product_id', '=', 'products.id')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_revenue')
            ->paginate(10);
        return view('admin.dashboard', compact('data')); // Return the view for the admin dashboard
    }
}
