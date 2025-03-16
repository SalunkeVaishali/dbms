@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Category</h2>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}" required>
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea name="category_description" class="form-control">{{ $category->category_description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">Update</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-2">Cancel</a>
    </form>
</div>
@endsection
