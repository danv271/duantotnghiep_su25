<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //
    public function index()
    {
        // dd(session());
        $data = User::findOrFail(session('user')->id);
        // dd($data->order);
        $orders = $data->order;
        // dd($orders);
        $nameparts = explode(' ', $data->name);
        if (count($nameparts) > 2) {
            $data->first_name = $nameparts[0] . ' ' . $nameparts[1];
            $data->last_name = implode(' ', array_slice($nameparts, 2));
        } else {
            $data->first_name = $nameparts[0];
            $data->last_name = $nameparts[1];
        }
        // dd($data);
        return view('account', compact('data', 'orders'));
    }
    public function updateUser(Request $request)
    {
        // Validate dữ liệu
        $validator = Validator::make(
            $request->all(),
            [
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . session('user')->id,
                'phone' => 'required|string|max:20',
            ],
            [
                'firstName.required' => 'Không được để trống tên',
                'lastName.required' => 'Không được để trống họ',
                'email.required' => 'Không được để trống email',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại trong hệ thống',
                'phone.required' => 'Không được để trống số điện thoại',
                'phone.max' => 'Số điện thoại không được vượt quá 20 ký tự',
                
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Tìm user và cập nhật
            // dd($request->phone);
            $user = User::findOrFail(session('user')->id);
            // Ghép first_name và last_name thành name
            $fullName = trim($request->firstName . ' ' . $request->lastName);
           $user->update([
                'name' => $fullName,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra: ' . $e->getMessage())
                ->withInput();
        }
    }
}
