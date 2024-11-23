@extends('layouts.app')

@section('content')
<div class="reset-container">
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <h2 class="form-title">Đặt lại mật khẩu</h2>
        <div class="form-group">
            <label for="email">Nhập địa chỉ email của bạn</label>
            <input id="email" type="email" name="email" required>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <button type="submit" class="btn-primary">Gửi liên kết đặt lại mật khẩu</button>

        @if (session('status'))
            <span class="text-success">{{ session('status') }}</span>
        @endif
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
    display: block; /* Hiển thị label dưới dạng khối */
    margin-bottom: 5px; /* Khoảng cách dưới label */
    font-weight: bold; /* Chữ đậm cho label */
}

input[type="email"] {
    width: 100%; /* Chiều rộng 100% */
    padding: 10px; /* Padding cho input */
    border: 1px solid #ddd; /* Viền nhẹ */
    border-radius: 4px; /* Bo tròn góc cho input */
    transition: border-color 0.3s; /* Hiệu ứng chuyển màu viền */
}

input[type="email"]:focus {
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

.text-danger {
    color: red; /* Màu đỏ cho thông báo lỗi */
}

.text-success {
    color: green; /* Màu xanh cho thông báo thành công */
}
</style>
