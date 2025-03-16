@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Product Details</h2>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Back</a>

    <div class="card">
        <div class="card-body">
            <h3>{{ $product->name }}</h3>
            <p><strong>Category:</strong> {{ $product->category->name }}</p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>

            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="150">
            @endif
        </div>
    </div>
</div>
@endsection
