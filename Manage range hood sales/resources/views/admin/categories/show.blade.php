@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
    <h1 class="mb-4">Category Details</h1>
    <dl class="row">
        <dt class="col-sm-3">ID</dt>
        <dd class="col-sm-9">{{ $category->id }}</dd>

        <dt class="col-sm-3">Name</dt>
        <dd class="col-sm-9">{{ $category->name }}</dd>
    </dl>
    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
