@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Chi tiết đơn hàng</h1>
    
    <div class="card shadow-sm p-4 mb-5">
        <h3 class="mb-3 text-primary">Thông tin đơn hàng</h3>
        <div class="row mb-2">
            <div class="col-md-6"><strong>Mã đơn hàng:</strong> {{ $order->id }}</div>
            <div class="col-md-6"><strong>Tên người nhận:</strong> {{ $order->name }}</div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6"><strong>Địa chỉ:</strong> {{ $order->address }}</div>
            <div class="col-md-6"><strong>Số điện thoại:</strong> {{ $order->phone }}</div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6"><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</div>
            <div class="col-md-6"><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }} VND</div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6"><strong>Trạng thái:</strong> 
            <span class="badge 
    @if ($order->status == 'completed') 
        bg-success 
    @elseif ($order->status == 'canceled') 
        bg-danger 
    @else 
        bg-warning 
    @endif">
    @if ($order->status == 'completed') 
        Đã thanh toán 
    @elseif ($order->status == 'canceled') 
        Đã hủy 
    @else 
        Chưa thanh toán 
    @endif
</span>

            </div>
        </div>
    </div>

    <div class="card shadow-sm p-4">
        <h3 class="mb-3 text-primary">Danh sách sản phẩm</h3>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>
                            @if ($item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" style="width: 50px; height: auto;">
                            @else
                                <img src="{{ asset('img/no-image.png') }}" alt="No Image" style="width: 50px; height: auto;">
                            @endif
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 0, ',', '.') }} VND</td>
                        <td>{{ number_format($item->quantity * $item->price, 0, ',', '.') }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="text-center mt-4">
    @if ($order->status === 'pending')
    <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="d-inline">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-danger btn-lg">Hủy đơn hàng</button>
        </form>
    @else
        <p class="text-muted">Không thể hủy đơn hàng trong trạng thái hiện tại.</p>
    @endif
    <a onclick="window.history.back()" class="btn btn-primary btn-lg fade-in">Quay lại trang trước</a>
</div>
</div>
@endsection
