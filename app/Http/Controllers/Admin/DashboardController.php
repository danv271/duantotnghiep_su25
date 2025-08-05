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
        $inventory = Variant::with('product')
            ->where('status', 'active')
            ->whereNull('deleted_at')
            ->get();

        $data['inventory'] = $inventory->groupBy('product_id')
            ->map(function ($items) {
                return [
                    'product_id' => $items->first()->product_id,
                    'total_stock' => $items->sum('stock_quantity'),
                    'count_variants' => $items->count(), // Số lượng biến thể
                ];
            })
            ->sortBy('total_stock') // Sort by total_stock in ascending order
            ->values();

        $perPage = 10; // Number of items per page
        $currentPage = request()->input('page', 1); // Get current page from request, default to 1
        $paginatedInventory = new LengthAwarePaginator(
            $data['inventory']->forPage($currentPage, $perPage), // Items for current page
            $data['inventory']->count(), // Total items
            $perPage, // Items per page
            $currentPage, // Current page
            ['path' => request()->url(), 'query' => request()->query()] // Preserve URL and query params
        );

        $data['inventory'] = $paginatedInventory;

        // dd($paginatedInventory);
        return view('admin.dashboard', compact('data')); // Return the view for the admin dashboard
    }
}
