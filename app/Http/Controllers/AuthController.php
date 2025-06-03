<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 
    protected $user;
    public function __construct()
    {
        // Khởi tạo người dùng nếu cần
        $this->user = new User();
    }
    public function handleLogin(Request $request)
    {
        $error = [];
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'email.exists' => 'Email không tồn tại trong hệ thống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
        ]);
        $user = User::where('email', $validatedData['email'])->first();
        if ($user) {
            $credentials = [
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
            ];
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                // Lưu thông tin người dùng vào session
                $request->session()->put('user', $user);
                // Kiểm tra vai trò của người dùng
                if ($user->role_id == 2) {
                    // Nếu là admin, chuyển hướng đến trang quản trị
                    return redirect()->intended('admin/dashboard')->with('success', 'Đăng nhập thành công!');
                } elseif ($user->role_id == 1) {
                    // dd(session()->get('user'));  
                    // Nếu là người dùng thường, chuyển hướng đến trang người dùng
                    return redirect()->intended('/')->with('success', 'Đăng nhập thành công!');
                }
            } else {
                // Đăng nhập thất bại
                $error = ['error' => 'Email hoặc mật khẩu không chính xác'];
                return redirect()->route('login')->withErrors($error)->withInput();
            }
        } else {
            // Không tìm thấy user
            $error = ['error' => 'Email không tồn tại trong hệ thống'];
            return redirect()->route('login')->withErrors($error)->withInput();
        }
    }
    public function handleRegister(Request $request)
    {
        $error = [];
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'first_name.required' => 'Họ không được để trống',
            'last_name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã được sử dụng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);

        $data = [
            'name' => $validatedData['first_name'] . ' ' . $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => 1,
            'is_active' => 1,
        ];
        if ($data) {
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
            return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
        } else {
            $error = $data;
            return redirect()->route('/register')->withErrors([
                'error' => $error,
            ])->withInput();
        }
    }
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
