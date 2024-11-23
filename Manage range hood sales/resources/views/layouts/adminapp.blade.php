<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Trị</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden; /* Ngăn chặn thanh cuộn ngang */
        }
        .first-title {
            color: white;
            background-color: transparent;
            display: flex;
            align-items: center;
        }
        .sidebar {
            width: 200px;
            background-color: #2c3e50;
            padding: 20px;
            color: white;
            transition: margin-left 0.3s; /* Hiệu ứng chuyển tiếp cho sidebar */
            position: fixed; /* Để sidebar luôn hiển thị trên màn hình */
            height: 100%;
        }
        .sidebar.collapsed {
            margin-left: -200px; /* Đẩy sidebar ra ngoài khi thu gọn */
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 0;
            margin: 5px 0;
            display: block;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .content {
            padding: 5px;
            flex-grow: 1;
            margin-left: 200px; /* Dịch chuyển nội dung sang phải để tránh sidebar */
            transition: margin-left 0.3s; /* Hiệu ứng chuyển tiếp cho nội dung */
        }
        .content.collapsed {
            margin-left: 0; /* Đưa nội dung về vị trí ban đầu khi sidebar thu gọn */
        }
        .toggle-sidebar {
            position: fixed; /* Đặt vị trí nút */
            top: 20px;
            left: 20px; /* Vị trí của biểu tượng bên góc trái */
            z-index: 9999;
            cursor: pointer;
            background-color: transparent; /* Bỏ màu nền */
            border: none; /* Bỏ viền */
            color: white; /* Màu chữ mặc định */
            font-size: 24px; /* Kích thước biểu tượng */
            transition: color 0.3s; /* Hiệu ứng chuyển tiếp cho màu */
        }
        .toggle-sidebar.collapsed {
            color: #2c3e50; /* Màu khi sidebar bị ẩn */
        }
        .alert {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            z-index: 9999;
            display: none; 
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <h2 class="first-title">Menu <button class="toggle-sidebar"><i class="fas fa-bars"></i></button></h2>
        <a href="{{ route('products.index') }}">Quản lý Sản phẩm</a>
        <a href="{{ route('categories.index') }}">Quản lý Danh mục</a>
        <a href="{{ route('order.index') }}">Quản lý Đơn hàng</a>
        <a href="{{ route('statistics.index') }}">Thống kê Doanh thu</a>

        @if(auth()->check())
            <a href="">Chào bạn, {{ auth()->user()->name }}</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}">Đăng nhập</a>
            <a href="{{ route('register') }}">Đăng ký</a>
        @endif
    </div>

    <div class="content" id="content">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @yield('content')
        @stack('scripts') 
    </div>
    
    <script>
        $(document).ready(function() {
            $('.toggle-sidebar').click(function() {
                $('#sidebar').toggleClass('collapsed'); // Thay đổi lớp CSS cho sidebar
                $('#content').toggleClass('collapsed'); // Thay đổi lớp CSS cho nội dung
                $(this).toggleClass('collapsed'); // Thay đổi lớp CSS cho nút
            });

            console.log('Trang đã được tải, đang kiểm tra thông báo thành công');
            @if(session('success'))
                console.log('Thông báo thành công được tìm thấy, đang hiển thị thông báo');
                $('.alert').slideDown().delay(5000).slideUp(); // Hiển thị và biến mất sau 5 giây
            @endif
        });
    </script>
</body>
</html>
