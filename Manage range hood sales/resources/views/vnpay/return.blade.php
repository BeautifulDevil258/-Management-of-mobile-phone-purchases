@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kết quả thanh toán</h2>

    @if(session('success'))
        <div class="alert alert-success">
            <strong>Thành công!</strong> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            <strong>Lỗi!</strong> {{ session('error') }}
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('home') }}" class="btn btn-primary">Về trang chủ</a>
    </div>
</div>
@endsection
