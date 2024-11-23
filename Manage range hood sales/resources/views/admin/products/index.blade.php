@extends('layouts.adminapp')

@section('content')
    <div class="container-fluid px-5 mt-5">
        <h1 class="text-center text-primary mb-4">Product List</h1>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="h5 text-muted">Manage Your Products</span>
            <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
        </div>

        <table class="table table-hover table-bordered table-striped shadow-sm rounded w-100">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="100">
                            @else
                                <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ number_format($product->price, 2) }}₫</td>
                        <td>{{ $product->category->name }}</td>
                        <td class="d-flex">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No products available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
