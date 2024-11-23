<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Thêm dòng này để import Hash
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User; // Thêm dòng này để import User

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Tạo OTP ngẫu nhiên
        $otp = rand(100000, 999999);
    
        // Gửi email chứa OTP
        try {
            Mail::to($request->email)->send(new OtpMail($otp));
        } catch (\Exception $e) {
            \Log::error('Error sending OTP: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gửi email thất bại.']);
        }
    
        // Lưu OTP vào session
        session(['otp' => $otp]);
    
        return response()->json(['success' => true]);
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'otp' => 'required|numeric',
        ]);
    
        if ($request->otp != session('otp')) {
            return back()->withErrors(['otp' => 'OTP không chính xác.']);
        }
        
        // Xóa OTP khỏi session sau khi xác minh thành công
        session()->forget('otp');
        
    
        // Tiếp tục xử lý đăng ký người dùng
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);
    
        Auth::login($user);
        return redirect('/')->with('success', 'Đăng ký thành công!');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        // Xác thực các trường email và password
        $request->validate([
            'email' => 'required|email', // Trường email bắt buộc và phải là định dạng email
            'password' => 'required',      // Trường password bắt buộc
        ], [
            'email.required' => 'Trường email không được bỏ trống.',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Trường mật khẩu không được bỏ trống.',
        ]);

        $credentials = $request->only('email', 'password');

        // Kiểm tra thông tin đăng nhập
        if (!Auth::attempt($credentials)) {
            $user = \App\Models\User::where('email', $request->email)->first();

            if (!$user) {
                throw ValidationException::withMessages([
                    'email' => 'Email không tồn tại.',
                ]);
            } else {
                throw ValidationException::withMessages([
                    'password' => 'Mật khẩu không chính xác.',
                ]);
            }
        }
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
    
            if ($user->role === 'admin') {
                return redirect()->intended('/admin')->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->intended('/')->with('success', 'Đăng nhập thành công');
            }
        }
    
        return back()->withErrors(['email','password' => 'Kiểm tra lại email hoặc mật khẩu của bạn.']);
    }
    public function showResetForm()
{
    return view('auth.password.email');
}
public function sendResetLinkEmail(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'Email không tồn tại.']);
    }

    // Tạo token và lưu vào database
    $token = Str::random(60);

    // Kiểm tra xem token đã tồn tại chưa
    $existingToken = PasswordResetToken::where('email', $request->email)->first();

    if ($existingToken) {
        // Nếu đã tồn tại, cập nhật token và thời gian tạo
        $existingToken->token = $token;
        $existingToken->created_at = now();
        $existingToken->save(); // Đây là phương thức của mô hình Eloquent
    } else {
        // Nếu không tồn tại, tạo mới một bản ghi
        PasswordResetToken::create([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);
    }

    // Gửi email chứa liên kết đặt lại mật khẩu
    Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email));

    return back()->with('status', 'Chúng tôi đã gửi liên kết đặt lại mật khẩu đến email của bạn.');
}
public function showResetFormWithToken($token)
{
    return view('auth.password.reset')->with(['token' => $token]);
}

public function reset(Request $request)
{
    $request->validate([
        'password' => 'required|confirmed|min:8',
        'token' => 'required'
    ]);

    // Tìm token trong database
    $passwordResetToken = PasswordResetToken::where('token', $request->token)->first();

    if (!$passwordResetToken) {
        return back()->withErrors(['token' => 'Token không hợp lệ.']);
    }

    // Tìm user với email tương ứng với token
    $user = User::where('email', $passwordResetToken->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'Email không tồn tại.']);
    }

    // Reset mật khẩu
    $user->password = Hash::make($request->password);
    $user->save();

    // Xóa token sau khi đã sử dụng
    $passwordResetToken->delete();

    return redirect('/login')->with('success', 'Mật khẩu đã được đặt lại thành công.');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
