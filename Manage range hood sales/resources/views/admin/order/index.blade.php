@extends('layouts.adminapp')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Quản Lý Đơn Hàng</h1>

        @if ($orders->isEmpty())
            <p class="text-center">Chưa có đơn hàng nào.</p>
        @else
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Total Amount</th>
                        <th>Status</th>
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
                                <span class="badge 
                                    @if($order->status == 'pending') badge-warning 
                                    @elseif($order->status == 'in_delivery') badge-success 
                                    @elseif($order->status == 'completed') badge-success 
                                    @elseif($order->status == 'canceled') badge-danger 
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-info">Xem Chi Tiết</a>
                                <select name="status" class="form-control" onchange="updateStatus({{ $order->id }}, this.value)">
                                    <option value="">Chọn Trạng Thái</option>
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ Thanh Toán</option>
                                    <option value="in_delivery" {{ $order->status == 'in delivery' ? 'selected' : '' }}>Đang giao hàng</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Đã Thanh Toán</option>
                                    <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Đã Hủy</option>
                                </select>
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

    <script>
        function updateStatus(orderId, status) {
            if (status) {
                // Gửi yêu cầu AJAX
                fetch(`/admin/order/${orderId}`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Đảm bảo CSRF token được gửi
                    },
                    body: JSON.stringify({ status: status })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Cập nhật thành công, tải lại trang
                        location.reload(); // Tải lại trang
                    } else {
                        alert('Có lỗi xảy ra, vui lòng thử lại.');
                    }
                })
                .catch(error => {
                    console.error('Lỗi:', error);
                    alert('Có lỗi xảy ra, vui lòng thử lại.');
                });
            }
        }
    </script>
@endsection
