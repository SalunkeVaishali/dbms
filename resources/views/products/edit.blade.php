@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Product</h2>
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

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" value="{{$product->product_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="product_description" class="form-control" required>{{ $product->product_description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price ($)</label>
            <input type="number" name="product_price" class="form-control" value="{{$product->product_price}}"  required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control" accept="image/jpeg,image/jpg,image/png">
            <small>Max 2MB. Allowed formats: jpeg, jpg, png.</small>
            @if($product->image)
                <div>
                    <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-2">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
