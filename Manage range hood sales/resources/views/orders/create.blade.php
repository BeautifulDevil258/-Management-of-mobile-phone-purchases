@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tạo Đơn Hàng</h1>

        @if ($cartItems->isEmpty())
            <p class="text-center">Giỏ hàng của bạn đang trống.</p>
        @else
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td>
                                <a href="{{ route('product.show', $item->product->id) }}">
                                    {{ $item->product->name }}
                                </a>
                            </td>
                            <td>
                                @if ($item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" style="width: 50px; height: auto;">
                                @else
                                    <img src="{{ asset('img/no-image.png') }}" alt="No Image" style="width: 50px; height: auto;">
                                @endif
                            </td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->product->price, 0) }}₫</td>
                            <td>{{ number_format($item->product->price * $item->quantity, 0) }}₫</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h5 class="text-right">Tổng cộng: {{ number_format($total, 0) }}₫</h5>

            <form action="{{ route('orders.store') }}" method="POST" class="mt-4">
                @csrf
                <h4>Thông tin khách hàng:</h4>
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Điện thoại:</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>

                <h4>Chọn phương thức thanh toán:</h4>
                <div class="form-group">
                    <select name="payment_method" class="form-control" required>
                        <option value="cash_on_delivery" selected>Thanh toán khi nhận hàng</option>
                        <option value="vnpay">VNPay</option>
                    </select>
                </div>

                <!-- Ẩn các sản phẩm đã chọn để gửi lên server -->
                @foreach($cartItems as $item)
                    <input type="hidden" name="selected_items[]" value="{{ $item->id }}">
                @endforeach

                <input type="hidden" name="total" value="{{ $total }}">
                <button type="submit" class="btn btn-primary mt-3">Tiến hành thanh toán</button>
            </form>
        @endif
    </div>
@endsection
