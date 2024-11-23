<!DOCTYPE html>
<html>
<head>
    <title>HutmuiWorld</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Popper.js và Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .first-title {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .first-title a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .first-title a:hover {
            color: #ffc107;
        }
        .logo{
            width: 10%;
        }
        .container-fullscreen {
            padding: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        img {
            max-width: 100%;
            height: auto;
            transition: transform 0.3s;
        }

        img:hover {
            transform: scale(1.05);
        }

        .form-inline {
            display: flex;
            align-items: center;
        }

        .form-control {
            width: 200px;
        }

        .btn-outline-success {
            margin-left: 5px;
        }

        #success-alert {
            position: fixed;
            top: 60px;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            z-index: 9999;
            display: none;
        }

        .account-container {
            display: flex;
            align-items: center;
            gap: 15px;
            
        }

        .menu-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 80%;
            margin: 10px 0;
        }

        .search-container {
            display: flex;
            justify-content: center;
        }

        .search-container button {
            background: none;
            border: none;
            outline: none;
            padding: 0;
            color: white;
            font-size: 1.5em;
            cursor: pointer;
            transition: 0.3s;
        }

        .search-container button:hover {
            transform: scale(1.1);
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="first-title">
    <div class="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('img/Logo.png') }}" alt="Logo"></a>
    </div>

    <div class="menu-container">
        <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
        <a href="{{ route('product.index') }}"><i class="fas fa-th-large"></i> Products</a>
        <div class="search-container">
            <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        <a href="{{ route('cart.show') }}"><i class="fas fa-shopping-basket"></i> Cart</a>
        <a href="{{ route('orders.index') }}"><i class="fas fa-clipboard-list"></i> Orders</a>

        <div class="account-container">
            @if(auth()->check())
                <span><i class="fas fa-user-circle"></i> {{ auth()->user()->name }}</span>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Log Out</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Sign Up</a>
            @endif
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<script>
    $(document).ready(function() {
        console.log('Page loaded, checking for success session');
        @if(session('success'))
            console.log('Success message found, showing alert');
            $('#success-alert').slideDown().delay(5000).slideUp(); // Hiển thị và biến mất sau 5 giây
        @endif
    });
</script>
<div class="container-fullscreen">
    @yield('content')
    @stack('scripts')
</div>
<script src="{{ asset('js/scripts.js') }}"></script>
<!-- Thêm Anime.js từ CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
</body>
</html>
