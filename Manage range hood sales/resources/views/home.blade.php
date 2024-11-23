@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <div class="main-container">
        <h1>Welcome to Hut mui world</h1>
        <p>Nơi bạn chọn được những mẫu máy hút mùi tốt nhất!</p>

        <div class="row align-items-start">
        <div class="col-md-3 categories-container" id="categoryContainer">
    <h3>Categories</h3>
    <ul class="list-group" id="categoryList">
        @foreach ($categories as $index => $category)
            <a href=""><li class="list-group-item category-item {{ $index >= 4 ? 'd-none' : '' }}">{{ $category->name }}</li></a>
        @endforeach
    </ul>

    <!-- Nút điều hướng -->
    <div class="d-flex justify-content-between mt-2">
        <button class="btn btn-primary" id="prevCategory" style="display:none;">&#10094;</button>
        <button class="btn btn-primary" id="nextCategory">&#10095;</button>
    </div>
</div>

            <div class="col-md-6">
                <div class="ad-images-container" id="adImagesContainer">
                    <img src="{{ asset('img/2(102).jpg') }}" alt="Ad Image 1" class="ad-image active">
                    <img src="{{ asset('img/may-hut-mui-makano-mkh-000002-hut-manh.jpg') }}" alt="Ad Image 2" class="ad-image">
                    <img src="{{ asset('img/4(105).jpg') }}" alt="Ad Image 3" class="ad-image">
                    <div class="ad-nav">
                        <button class="nav-button" onclick="prevImage()">&#10094;</button>
                        <button class="nav-button" onclick="nextImage()">&#10095;</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 promotions-container" id="promotionsContainer">
                <h3>Promotions</h3>
                <div class="promotion-item">Promotion 1: Get 20% off on selected items!</div>
                <div class="promotion-item">Promotion 2: Buy 1 Get 1 Free on certain products!</div>
                <div class="promotion-item d-none more-promotions">Promotion 3: Special discount for members!</div>
                <div class="promotion-item d-none more-promotions">Promotion 4: Free shipping on orders over $50!</div>
                <button class="btn btn-primary mt-2" id="showMorePromotions" style="display:none;">Show More</button>
            </div>
        </div>

        <div class="container-fluid px-5 mt-5">
            <h1 class="text-center text-primary mb-4">Our Products</h1>
            
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
                {{ $products->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>

    <script>
        let currentIndex = 0;
        const images = document.querySelectorAll('.ad-image');
        const totalImages = images.length;

        function showImage(index) {
            images.forEach((img, i) => {
                img.style.display = (i === index) ? 'block' : 'none';
            });
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % totalImages;
            showImage(currentIndex);
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + totalImages) % totalImages;
            showImage(currentIndex);
        }

        // Automatically change image every 5 seconds
        setInterval(nextImage, 5000);

        // Initialize slideshow
        showImage(currentIndex);
            // Lấy danh sách các danh mục
const categories = document.querySelectorAll('.category-item');
let currentCategoryIndex = 0; // Chỉ số hiện tại cho danh mục
const itemsPerPage = 4; // Số danh mục hiển thị mỗi lần

function updateCategoryDisplay() {
    // Ẩn tất cả danh mục
    categories.forEach((category) => {
        category.classList.add('d-none');
    });

    // Hiển thị danh mục hiện tại và danh mục tiếp theo
    for (let i = 0; i < itemsPerPage && (currentCategoryIndex + i) < categories.length; i++) {
        categories[currentCategoryIndex + i].classList.remove('d-none');
    }

    // Ẩn/hiện nút mũi tên
    document.getElementById('prevCategory').style.display = (currentCategoryIndex > 0) ? 'block' : 'none';
    document.getElementById('nextCategory').style.display = (currentCategoryIndex + itemsPerPage < categories.length) ? 'block' : 'none';
}

// Sự kiện nhấn nút tiếp theo
document.getElementById('nextCategory').addEventListener('click', () => {
    if (currentCategoryIndex + itemsPerPage < categories.length) {
        currentCategoryIndex++;
        updateCategoryDisplay();
    }
});

// Sự kiện nhấn nút trước
document.getElementById('prevCategory').addEventListener('click', () => {
    if (currentCategoryIndex > 0) {
        currentCategoryIndex--;
        updateCategoryDisplay();
    }
});

// Khởi tạo hiển thị ban đầu
updateCategoryDisplay();

        // Show more functionality for promotions
        const promotions = document.querySelectorAll('.more-promotions');
        const showMorePromotionsButton = document.getElementById('showMorePromotions');

        if (promotions.length > 0) {
            showMorePromotionsButton.style.display = 'block';
            showMorePromotionsButton.addEventListener('click', () => {
                promotions.forEach(promotion => promotion.classList.remove('d-none'));
                showMorePromotionsButton.style.display = 'none';
            });
        }
    </script>
@endsection
