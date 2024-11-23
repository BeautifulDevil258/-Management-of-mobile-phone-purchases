@extends('layouts.app')

@section('content')
    <div class="container-fluid px-5 mt-5">
        @if(request()->input('query'))
            <h1 class="text-center text-primary mb-4">Các sản phẩm cho tìm kiếm: "{{ request()->input('query') }}"</h1>
        @else
            <h1 class="text-center text-primary mb-4">Our Products</h1>
        @endif
        
        <div class="row">
            @forelse ($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('img/no-image.png') }}" class="card-img-top product-image" alt="No Image">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ $product->name }}</h5>
                            <p class="card-text text-muted text-center">{{ number_format($product->price, 2) }}₫</p>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary mt-auto">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No products available.</p>
                </div>
            @endforelse
        </div>

        <!-- Phân trang -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-4') }} <!-- Laravel cung cấp phương thức links() cho phân trang -->
        </div>
    </div>

    <style>
        .product-image {
            width: 100%; /* Đảm bảo ảnh chiếm 100% chiều rộng của card */
            height: 200px; /* Chiều cao cố định để đảm bảo các ảnh bằng nhau */
            object-fit: cover; /* Đảm bảo ảnh không bị méo và giữ tỷ lệ khung hình */
        }
    </style>
@endsection
