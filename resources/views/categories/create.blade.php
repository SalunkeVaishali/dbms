@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Category</h2>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="category_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea name="category_description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">Save</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-2">Cancel</a>
    </form>
</div>
@endsection
