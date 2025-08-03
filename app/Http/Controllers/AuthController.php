<?php

namespace App\Http\Controllers;

use App\Models\OtpCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use function Psy\debug;

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
        // debug($error);
        $user = User::where('email', $validatedData['email'])->first();
        // dd($user);
        if ($user) {
            $credentials = [
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
            ];
            // dd($credentials);
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
    public function forgotPassword()
    {
        return view('auth.forgotPassword');
    }
    public function handleForgotPassword(Request $request)
    {
        // dd($request->all());
        $error = [];
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'email.exists' => 'Email không tồn tại trong hệ thống',
        ]);
        // dd($validatedData);
        if ($validatedData) {
            $otp = rand(100000, 999999);
            $expiresAt = now()->addMinutes(10); // OTP sẽ hết hạn sau 10 phút
            // dd($otp, $expiresAt);
            OtpCode::updateOrCreate(
                ['email' => $validatedData['email']],
                ['otp' => $otp, 'expires_at' => $expiresAt]
            );
            try {
                Mail::to($validatedData['email'])->queue(new \App\Mail\ForgotPassword($otp));
                return redirect()->route('reset.password')->with([
                    'success',
                    'Mã OTP đã được gửi đến email của bạn. Vui lòng kiểm tra email để đặt lại mật khẩu.',
                    'email' => $validatedData['email']
                ]);
            } catch (\Exception $e) {
                $error = ['error' => 'Không thể gửi email. Vui lòng thử lại sau.'];
                return redirect()->route('forgot-password')->withErrors($error)->withInput();
            }
        }
    }
    public function handleResetPassword(Request $request)
    {
        // dd($request->all());
        $error = [];
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
            'otp' => 'required|digits:6',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'otp.required' => 'Mã OTP không được để trống',
            'otp.digits' => 'Mã OTP phải có 6 chữ số',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);
        $otpCode = OtpCode::where('email', $validatedData['email'])
            ->where('otp', $validatedData['otp'])
            ->where('expires_at', '>', now())
            ->first();
        // dd($otpCode);
        if (!$otpCode) {
            $error = ['error' => 'Mã OTP không hợp lệ hoặc đã hết hạn'];
            return redirect()->route('reset.password')->withErrors($error)->withInput();
        }

        $user = User::where('email', $validatedData['email'])->first();
        if ($user) {
            // dd($validatedData);
            $validatedData['password'] = Hash::make($validatedData['password']);
            $user->update(['password' => $validatedData['password']]);
            // Xóa mã OTP sau khi đặt lại mật khẩu thành công
            $otpCode->delete();
            return redirect()->route('login')->with('success', 'Đặt lại mật khẩu thành công! Vui lòng đăng nhập.');
        } else {
            $error = ['error' => 'Không tìm thấy người dùng với email này'];
            return redirect()->route('reset.password')->withErrors($error)->withInput();
        }
    }
    public function resetPassword()
    {
        return view('auth.resetPassword');
    }
    public function updatePass(request $request)
    {
        // dd(Auth::user());
        $user = Auth::user();
        // dd($user->password);
        $dataValidate = $request->validate([
            'current_password' => ['required', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);
        // dd($dataValidate);
        if ($dataValidate) {
            $check = Hash::check($dataValidate['current_password'], $user->password);
            $user->password = Hash::make($dataValidate['password']);
            $user->save();
            return redirect('account')->with('success', 'Cập nhật mật khẩu thành công ');
        }
    }
}
