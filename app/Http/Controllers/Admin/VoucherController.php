<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::orderBy('created_at', 'desc')->paginate(10);
        $totalVouchers = Voucher::count();
        $activeVouchers = Voucher::where('is_active', true)->count();
        $expiredVouchers = Voucher::where('end_date', '<', now())->count();
        $shippingVouchers = Voucher::where('type', 'shipping')->count();
        $productVouchers = Voucher::where('type', 'product')->count();
        
        return view('admin.vouchers.index', compact(
            'vouchers',
            'totalVouchers',
            'activeVouchers',
            'expiredVouchers',
            'shippingVouchers',
            'productVouchers'
        ));
    }

    /**
     * Show the form for creating a new voucher.
     */
    public function create()
    {
        return view('admin.vouchers.create');
    }

    /**
     * Store a newly created voucher in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:vouchers,code',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:shipping,product',
            'discount_value' => 'required|numeric|min:0',
            'min_order_amount' => 'nullable|numeric|min:0',
            'max_usage' => 'nullable|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'boolean'
        ]);

        // Handle checkbox for is_active
        $validated['is_active'] = $request->has('is_active');

        // Generate code if not provided
        if (empty($validated['code'])) {
            $validated['code'] = strtoupper(Str::random(8));
        }

        // Ensure code is uppercase
        $validated['code'] = strtoupper($validated['code']);

        Voucher::create($validated);

        return redirect()
            ->route('admin.vouchers.index')
            ->with('Thành công', 'Voucher được tạo thành công.');
    }

    /**
     * Display the specified voucher.
     */
    public function show(Voucher $voucher)
    {
        return view('admin.vouchers.show', compact('voucher'));
    }

    /**
     * Show the form for editing the specified voucher.
     */
    public function edit(Voucher $voucher)
    {
        return view('admin.vouchers.edit', compact('voucher'));
    }

    /**
     * Update the specified voucher in storage.
     */
    public function update(Request $request, Voucher $voucher)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:vouchers,code,' . $voucher->id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:shipping,product',
            'discount_value' => 'required|numeric|min:0',
            'min_order_amount' => 'nullable|numeric|min:0',
            'max_usage' => 'nullable|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'boolean'
        ]);

        // Handle checkbox for is_active
        $validated['is_active'] = $request->has('is_active');

        // Ensure code is uppercase
        $validated['code'] = strtoupper($validated['code']);

        $voucher->update($validated);

        return redirect()
            ->route('admin.vouchers.index')
            ->with('Thành công', 'Voucher được cập nhật thành công.');
    }

    /**
     * Remove the specified voucher from storage.
     */
    public function destroy(Voucher $voucher)
    {
        // Check if voucher has been used
        if ($voucher->used_count > 0) {
            return redirect()
                ->route('admin.vouchers.index')
                ->with('Lỗi', 'Không thể xóa voucher đã được sử dụng.');
        }

        $voucher->delete();

        return redirect()
            ->route('admin.vouchers.index')
            ->with('Thành công', 'Đã xóa voucher thành công.');
    }

    /**
     * Toggle voucher active status
     */
    public function toggleStatus(Voucher $voucher)
    {
        $voucher->update(['is_active' => !$voucher->is_active]);
        
        $status = $voucher->is_active ? 'kích hoạt' : 'vô hiệu hóa';
        
        return redirect()
            ->route('admin.vouchers.index')
            ->with('Thành công', "Đã {$status} voucher thành công.");
    }

    /**
     * Reset voucher usage count
     */
    public function resetUsage(Voucher $voucher)
    {
        $voucher->update(['used_count' => 0]);
        
        return redirect()
            ->route('admin.vouchers.index')
            ->with('Thành công', 'Đã reset số lần sử dụng voucher thành công.');
    }

    /**
     * Generate voucher code
     */
    public function generateCode()
    {
        $code = strtoupper(Str::random(8));
        
        // Check if code already exists
        while (Voucher::where('code', $code)->exists()) {
            $code = strtoupper(Str::random(8));
        }
        
        return response()->json(['code' => $code]);
    }
} 