@extends('layouts.app')

@section('content')
    <div class="container-fluid px-5 mt-5">
        <h1 class="text-center text-primary mb-4">{{ $product->name }}</h1>
        
        <div class="row">
            <div class="col-md-6">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('img/no-image.png') }}" class="img-fluid" alt="No Image">
                @endif
            </div>
            <div class="col-md-6">
                <h5 class="text-muted">${{ number_format($product->price, 2) }}</h5>
                <p>{{!! $product->description !!}}</p>
                <p><strong>Quantity Available:</strong> {{ $product->quantity }}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" max="{{ $product->quantity }}" required>
                    </div>
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
                <button class="btn btn-secondary mt-2" onclick="window.history.back()">Back</button>
            </div>
        </div>
    </div>
@endsection
