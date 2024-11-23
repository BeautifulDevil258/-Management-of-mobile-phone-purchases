@extends('layouts.app')

@section('content')
<div class="login-container">
    <form method="POST" action="{{ route('login') }}" class="login-form" id="login-account">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <button type="submit" class="btn-log" id="loginButton">Login</button>

        @if (session('error'))
            <span class="text-danger">{{ session('error') }}</span>
        @endif
        <a href="{{ route('password.request') }}">Quên mật khẩu?</a>

        <p class="text-center">Nếu bạn chưa có tài khoản hãy nhấn: <a href="{{ route('register') }}">Đăng ký</a></p>
    </form>
</div>
@endsection

<style>
    /* Container bọc form để căn giữa */
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Để container chiếm toàn bộ chiều cao màn hình */
    }

    /* Style tổng thể cho form */
    .login-form {
        width: 40%;
        padding: 20px;
        background-color: #f8f8f8;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
    }

    /* Style cho các form group */
    .form-group {
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
    }

    /* Style cho nhãn */
    .form-group label {
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    /* Style cho input */
    .form-group input {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus {
        border-color: #007bff;
    }

    /* Style cho nút bấm */
    .btn-log {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-log:hover {
        background-color: #0056b3;
    }

    .text-danger {
        color: red;
        font-size: 13px;
    }

    /* Responsive: làm cho form nhỏ gọn trên thiết bị di động */
    @media (max-width: 600px) {
        .login-form {
            width: 80%;
            padding: 15px;
        }
    }
</style>
