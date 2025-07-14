<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function index(Request $request)
    {
        $query = DB::table('orders');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('user_email', 'like', '%' . $search . '%')
                    ->orWhere('user_phone', 'like', '%' . $search . '%');
            });
        }

        $orders = $query->orderBy('id', 'desc')->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();

        if (!$order) {
            return redirect()->route('admin.orders.index')->with('error', 'Không tìm thấy đơn hàng.');
        }

        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
{
    $order = DB::table('orders')->where('id', $id)->first();

    if (!$order) {
        return redirect()->route('admin.orders.index')->with('error', 'Không tìm thấy đơn hàng.');
    }

    return view('admin.orders.edit', compact('order'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'status_order' => 'required|string|max:255',
        'status_payment' => 'required|string|max:255',
    ]);

    DB::table('orders')->where('id', $id)->update([
        'status_order' => $request->status_order,
        'status_payment' => $request->status_payment,
        'updated_at' => now(),
    ]);

    return redirect()->route('admin.orders.index')->with('success', 'Đã cập nhật đơn hàng.');
}


    public function destroy($id)
    {
        DB::table('orders')->where('id', $id)->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Đã xóa đơn hàng.');
    }
    public function indexClient(Request $request)
    {
         // Lấy ID của khách hàng đang đăng nhập
        $userId = Auth::id();

        // Query lấy các đơn hàng của người dùng
        $query = Order::with([
            'OrderDetail.variant.product.images'
        ])->where('user_id', $userId);

        // Nếu có từ khóa tìm kiếm thì thêm điều kiện
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('user_email', 'like', '%' . $search . '%')
                    ->orWhere('user_phone', 'like', '%' . $search . '%');
            });
        }

        // Sắp xếp mới nhất và phân trang
        $orders = $query->orderBy('id', 'desc')->paginate(10);

        return view('account', compact('orders'));
    }
}
