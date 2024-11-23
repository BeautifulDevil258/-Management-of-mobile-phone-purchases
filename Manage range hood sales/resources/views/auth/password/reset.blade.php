@extends('layouts.app')

@section('title', 'Đặt lại mật khẩu')

@section('content')
<div class="reset-container">
    <h1 class="form-title">Đặt lại mật khẩu</h1>

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        
        <div class="form-group">
            <label for="password">Mật khẩu mới:</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Xác nhận mật khẩu:</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>
        
        <button type="submit" class="btn-primary">Đặt lại mật khẩu</button>
    </form>
</div>
@endsection

<style>
.reset-container {
    max-width: 400px; /* Chiều rộng tối đa cho form */
    margin: 50px auto; /* Căn giữa form */
    padding: 20px; /* Padding bên trong form */
    border-radius: 8px; /* Bo tròn góc */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Đổ bóng cho form */
    background-color: #fff; /* Màu nền của form */
}

.form-title {
    text-align: center; /* Căn giữa tiêu đề */
    margin-bottom: 20px; /* Khoảng cách dưới tiêu đề */
    font-size: 24px; /* Kích thước chữ */
    color: #333; /* Màu chữ */
}

.form-group {
    margin-bottom: 15px; /* Khoảng cách giữa các trường nhập */
}

label {
    font-weight: bold; /* Chữ đậm cho label */
}

input[type="password"] {
    width: 100%; /* Chiều rộng 100% */
    padding: 10px; /* Padding cho input */
    border: 1px solid #ddd; /* Viền nhẹ */
    border-radius: 4px; /* Bo tròn góc cho input */
    transition: border-color 0.3s; /* Hiệu ứng chuyển màu viền */
}

input[type="password"]:focus {
    border-color: #007bff; /* Màu viền khi focus */
    outline: none; /* Tắt outline mặc định */
}

.btn-primary {
    width: 100%; /* Chiều rộng 100% cho nút */
    padding: 10px; /* Padding cho nút */
    background-color: #007bff; /* Màu nền của nút */
    color: white; /* Màu chữ của nút */
    border: none; /* Tắt viền */
    border-radius: 4px; /* Bo tròn góc cho nút */
    cursor: pointer; /* Con trỏ chuột khi hover */
    transition: background-color 0.3s; /* Hiệu ứng chuyển màu nền */
}

.btn-primary:hover {
    background-color: #0056b3; /* Màu nền khi hover */
}
</style>
