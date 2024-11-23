@extends('layouts.adminapp')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4 text-info">Thống Kê Đơn Hàng và Doanh Thu</h1>

        <form method="GET" action="{{ route('statistics.index') }}" class="mb-4">
            @csrf
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}" placeholder="dd/mm/yyyy">
                </div>
                <div class="col-md-4">
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}" placeholder="dd/mm/yyyy">
                </div>
                <div class="col-md-4">
                    <select name="group_by" class="form-select">
                        <option value="day" {{ request('group_by') == 'day' ? 'selected' : '' }}>Theo Ngày</option>
                        <option value="month" {{ request('group_by') == 'month' ? 'selected' : '' }}>Theo Tháng</option>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Lọc</button>
                <button type="button" class="btn btn-secondary" id="resetButton">Xóa Bộ Lọc</button>
            </div>
        </form>

        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="text-center mb-4">
                    @if (request('group_by') == 'day' || !request('group_by'))
                        Doanh Thu Tháng {{ date('m') }} Năm {{ date('Y') }} 
                    @elseif (request('group_by') == 'month')
                        Doanh Thu Năm {{ date('Y') }}
                    @endif
                </h2>

                <!-- Biểu đồ doanh thu -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <canvas id="revenueChart" width="250" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
<!-- Phần tổng số đơn hàng và các chỉ số khác -->
<div class="row text-center mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Số Đơn Hàng</h5>
                        <p class="card-text">{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Giá Trị Đơn Hàng</h5>
                        <p class="card-text">{{ number_format($totalOrderValue, 0, ',', '.') }} VND</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Số Đơn Đã Thanh Toán</h5>
                        <p class="card-text">{{ $totalCompletedOrders }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Doanh Thu Thực</h5>
                        <p class="card-text">{{ number_format($totalRevenue, 0, ',', '.') }} VND</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Số Còn Phải Thu</h5>
                        <p class="card-text">{{ number_format($totalPending, 0, ',', '.') }} VND</p>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-center mb-4">Sản Phẩm Bán Chạy Nhất</h3>
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <canvas id="topProductsChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #f8f9fa; /* Nền sáng hơn */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h1 {
            font-weight: bold;
            color: #007bff; /* Màu xanh cho tiêu đề chính */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #343a40; /* Màu tối cho tiêu đề phụ */
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Thêm bóng cho thẻ */
        }
        .card-text{
            color: white;
        }

        .btn {
            transition: background-color 0.3s, color 0.3s; /* Thêm hiệu ứng chuyển màu */
            background-color: #28a745; /* Màu xanh lá cây */
            color: white; /* Chữ màu trắng */
            border: none; /* Bỏ viền */
        }

        .btn:hover {
            background-color: #218838; /* Màu xanh lá cây đậm khi hover */
        }

        .btn-secondary {
            background-color: #6c757d; /* Màu xám cho nút phụ */
        }

        .btn-secondary:hover {
            background-color: #5a6268; /* Màu xám đậm khi hover */
        }

        #revenueChart, #topProductsChart {
            animation: fadeIn 1s ease-in;
            height: 300px; /* Đặt chiều cao biểu đồ để giữ tỷ lệ */
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        
      const ctx = document.getElementById('revenueChart').getContext('2d');
const revenueChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($dates) !!}, // Gán tất cả tháng hoặc ngày từ Controller
        datasets: [{
            label: 'Doanh thu',
            data: {!! json_encode($revenues) !!}, // Gán doanh thu cho từng tháng hoặc ngày
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            x: {
                type: 'time', // Định nghĩa trục x là loại thời gian
                time: {
                    unit: 'day', // Đơn vị thời gian là ngày
                    tooltipFormat: 'DD/MM/YYYY', // Định dạng cho tooltip
                    displayFormats: {
                        day: 'DD/MM/YYYY' // Hiển thị trên trục x theo định dạng dd/mm/yyyy
                    }
                },
                title: {
                    display: true,
                    text: 'Thời gian'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Doanh thu'
                }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Thời Gian',
                        }
                    }
                }
            }
        });

        // Biểu đồ sản phẩm bán chạy nhất
        const topProductsCtx = document.getElementById('topProductsChart').getContext('2d');
        const topProductNames = @json($topProducts->pluck('product.name'));
        const topProductQuantities = @json($topProducts->pluck('total_quantity'));

        const topProductsChart = new Chart(topProductsCtx, {
            type: 'doughnut', // Đổi thành biểu đồ bánh donut
            data: {
                labels: topProductNames,
                datasets: [{                                                                                                                                
                    label: 'Sản Phẩm Bán Chạy',
                    data: topProductQuantities,
                    backgroundColor: [
                        '#ff6384', // Màu sắc tươi sáng
                        '#36a2eb',
                        '#ffce56',
                        '#4bc0c0',
                        '#9966ff',
                    ],
                    borderColor: '#fff', // Viền trắng cho các phần
                    borderWidth: 2 // Độ dày viền
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Cho phép điều chỉnh tỉ lệ
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                const value = tooltipItem.raw;
                                const quantity = value; // Sử dụng giá trị này cho số lượng
                                const sum = tooltipItem.dataset.data.reduce((a, b) => a + b, 0); // Tính tổng số
                                let percentage = ((quantity / sum) * 100).toFixed(2) + '%'; // Tính tỷ lệ phần trăm
                                return `Số lượng: ${quantity}, Tỷ lệ: ${percentage}`; // Kết hợp và trả về chuỗi
                            },
                            color: '#fff',
                        }
                    }
                }
            }
        });

        document.getElementById('resetButton').addEventListener('click', function () {
            window.location.href = "{{ route('statistics.index') }}";
        });
    </script>
@endsection
