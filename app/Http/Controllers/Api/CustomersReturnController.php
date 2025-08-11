<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomersReturnController extends Controller
{
    //
    public function getCustomerReturnRateComparison()
    {
        // Tháng hiện tại
        $currentMonthStart = now()->startOfMonth();
        $currentMonthEnd = now()->endOfMonth();

        // Tháng trước
        $lastMonthStart = now()->subMonth()->startOfMonth();
        $lastMonthEnd = now()->subMonth()->endOfMonth();

        // === THÁNG HIỆN TẠI ===
        $totalCustomersThisMonth = User::whereHas('order', function ($query) use ($currentMonthStart, $currentMonthEnd) {
            $query->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd]);
        })->count();

        $returningCustomersThisMonth = User::whereHas('order', function ($query) use ($currentMonthStart) {
            $query->where('created_at', '<', $currentMonthStart);
        })->whereHas('order', function ($query) use ($currentMonthStart, $currentMonthEnd) {
            $query->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd]);
        })->count();

        $returnRateThisMonth = $totalCustomersThisMonth > 0 ? round(($returningCustomersThisMonth / $totalCustomersThisMonth) * 100, 2) : 0;

        // === THÁNG TRƯỚC ===
        $totalCustomersLastMonth = User::whereHas('order', function ($query) use ($lastMonthStart, $lastMonthEnd) {
            $query->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd]);
        })->count();

        $returningCustomersLastMonth = User::whereHas('order', function ($query) use ($lastMonthStart) {
            $query->where('created_at', '<', $lastMonthStart);
        })->whereHas('order', function ($query) use ($lastMonthStart, $lastMonthEnd) {
            $query->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd]);
        })->count();

        $returnRateLastMonth = $totalCustomersLastMonth > 0 ? round(($returningCustomersLastMonth / $totalCustomersLastMonth) * 100, 2) : 0;

        // === SO SÁNH ===
        $growthRate = $returnRateLastMonth > 0 ? round((($returnRateThisMonth - $returnRateLastMonth) / $returnRateLastMonth) * 100, 2) : 0;
        $difference = $returnRateThisMonth - $returnRateLastMonth;

        return response()->json([
            'current_month' => [
                'return_rate' => $returnRateThisMonth,
                'total_customers' => $totalCustomersThisMonth,
                'returning_customers' => $returningCustomersThisMonth,
                'new_customers' => $totalCustomersThisMonth - $returningCustomersThisMonth,
                'month_name' => now()->format('m/Y')
            ],
            'last_month' => [
                'return_rate' => $returnRateLastMonth,
                'total_customers' => $totalCustomersLastMonth,
                'returning_customers' => $returningCustomersLastMonth,
                'new_customers' => $totalCustomersLastMonth - $returningCustomersLastMonth,
                'month_name' => now()->subMonth()->format('m/Y')
            ],
            'comparison' => [
                'growth_rate' => $growthRate, // % thay đổi
                'difference' => $difference, // Chênh lệch tuyệt đối
                'trend' => $difference > 0 ? 'tăng' : ($difference < 0 ? 'giảm' : 'không đổi')
            ]
        ], 200);
    }
}
