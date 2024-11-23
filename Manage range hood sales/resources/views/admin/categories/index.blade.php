@extends('layouts.adminapp')

@section('content')
<div class="container-fluid mt-5 px-5">
    <h1 class="text-center text-primary mb-4">Category List</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="h5 text-muted">Manage Your Categories</span>
        <a href="{{ route('categories.create') }}" class="btn btn-success">Add New Category</a>
    </div>

    <table class="table table-hover table-bordered table-striped shadow-sm rounded w-100">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">No categories available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
