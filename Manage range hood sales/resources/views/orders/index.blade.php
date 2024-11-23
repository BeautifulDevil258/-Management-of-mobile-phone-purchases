@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Your Orders</h1>

        @if ($orders->isEmpty())
            <p class="text-center">You have no orders yet.</p>
        @else
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ number_format($order->total_amount, 2) }}₫</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">View Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Thêm liên kết phân trang -->
            <div class="d-flex justify-content-center">
                {{ $orders->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
@endsection
