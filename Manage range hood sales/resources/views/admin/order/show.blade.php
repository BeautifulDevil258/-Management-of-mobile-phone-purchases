@extends('layouts.adminapp')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Order Details</h1>

        <div class="mb-4">
            <h5>Order ID: {{ $order->id }}</h5>
            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Address:</strong> {{ $order->address }}</p>
            <p><strong>Phone:</strong> {{ $order->phone }}</p>
            <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
            <p><strong>Payment Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
        </div>

        <h3>Products in Order</h3>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
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
                        <td>{{ number_format($item->price, 2) }}₫</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right mt-4">
            <a href="{{ route('order.index') }}" class="btn btn-primary">Back to Orders</a>
        </div>
    </div>
@endsection
