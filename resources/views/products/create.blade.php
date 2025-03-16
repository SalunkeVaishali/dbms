@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add New Product</h2>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Back</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="product_description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price ($)</label>
            <input type="number" name="product_price" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="product_image" class="form-control" accept="image/jpeg,image/jpg,image/png">
            <small>Max 2MB. Allowed formats: jpeg, jpg, png.</small>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
