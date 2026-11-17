
@extends('layouts.app')

@section('title', 'Product Details')

@section('content')

<style>
    .action-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 25px;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 22px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-back {
        background: #475569;
        color: white;
    }

    .btn-back:hover {
        background: #334155;
        color: white;
        transform: translateY(-2px);
    }

    .btn-edit {
        background: #2563eb;
        color: white;
    }

    .btn-edit:hover {
        background: #1d4ed8;
        color: white;
        transform: translateY(-2px);
    }
</style>

<div class="container">

    <h2>Product Details</h2>

    <p><strong>ID:</strong> {{ $product->id }}</p>

    <p><strong>Product Name:</strong> {{ $product->name }}</p>

    <p><strong>SKU:</strong> {{ $product->sku }}</p>

    <p><strong>Description:</strong> {{ $product->description }}</p>

    <p><strong>Price:</strong> {{ $product->price }}</p>

    <p><strong>Quantity:</strong> {{ $product->quantity }}</p>

    <h3>Product Image</h3>

    @if($product->image && Storage::disk('public')->exists($product->image))

        <img
            src="{{ asset('storage/' . $product->image) }}"
            alt="{{ $product->name }}"
            style="width: 250px; height: 250px; object-fit: cover; border-radius: 10px;"
        >

    @else

        <p>No product image available.</p>

    @endif

    <div class="action-buttons">

        <a href="{{ route('products.index') }}"
           class="action-btn btn-back">
            ← Back to Products
        </a>

        <a href="{{ route('products.edit', $product->id) }}"
           class="action-btn btn-edit">
            ✎ Edit Product
        </a>

    </div>

</div>

@endsection
