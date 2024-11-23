@extends('layouts.app')

@section('content')  <!-- Bắt đầu phần content -->
<form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" required autofocus>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required>
    </div>
    <div class="form-group">
        <button type="button" class="btn-reg" id="send-otp-button">Gửi OTP</button>
    </div>
    
    <div class="form-group" id="otp-input" style="display:none;">
        <label for="otp">Nhập OTP</label>
        <input id="otp" type="text" name="otp" required>
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>
    
    <button type="submit" class="btn-reg" id="register-button" style="display:none;">Register</button>
    <p class="text-center">Nếu bạn đã có tài khoản hãy nhấn: <a href="{{ route('login') }}">Đăng nhập</a></p>
</form>
<script>
    document.getElementById('send-otp-button').addEventListener('click', function() {
    var email = document.getElementById('email').value;
    console.log("Gửi OTP cho email:", email); // Kiểm tra email có được lấy đúng không

    // Gửi request đến backend để gửi OTP
    fetch('/send-otp', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Sử dụng meta tag
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log("OTP đã gửi thành công.");
            document.getElementById('otp-input').style.display = 'block';
            document.getElementById('register-button').style.display = 'block';
            alert('OTP đã được gửi đến email của bạn.');
        } else {
            alert('Gửi OTP thất bại. Vui lòng thử lại.');
        }
    })
    .catch(error => {
        console.error("Lỗi khi gửi OTP:", error); // Kiểm tra lỗi cụ thể
    });
});

</script>

@endsection  <!-- Kết thúc phần content -->
<style>
    /* Style tổng thể cho form */
.register-form {
    width: 40%;
    margin: 50px auto;
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
.btn-reg {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-reg:hover {
    background-color: #0056b3;
}

/* Responsive: làm cho form nhỏ gọn trên thiết bị di động */
@media (max-width: 600px) {
    .register-form {
        padding: 15px;
    }
}
</style>

