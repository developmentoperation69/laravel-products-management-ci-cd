@extends('layouts.app')

@section('title', 'All Products')

@section('content')

<style>
    .products-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .btn {
        display: inline-block;
        padding: 9px 14px;
        border: none;
        border-radius: 6px;
        color: white;
        text-decoration: none;
        font-size: 14px;
        cursor: pointer;
        margin: 2px;
        transition: 0.3s;
    }

    .btn:hover {
        opacity: 0.85;
        transform: translateY(-2px);
    }

    .btn-add {
        background: #198754;
    }

    .btn-view {
        background: #0d6efd;
    }

    .btn-edit {
        background: #f0ad4e;
        color: #222;
    }

    .btn-delete {
        background: #dc3545;
    }

    .actions {
        white-space: nowrap;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background: #f4f4f4;
    }

    .success {
        background: #d1e7dd;
        color: #0f5132;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 15px;
    }
</style>

<div class="products-header">
    <h2>All Products</h2>

    <a href="{{ route('products.create') }}" class="btn btn-add">
        + Add New Product
    </a>
</div>

@if(session('success'))
    <p class="success">{{ session('success') }}</p>
@endif

@if($products->count())

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>SKU</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>

                <td>{{ $product->name }}</td>

                <td>
                    @if($product->image)
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            width="70"
                            height="70"
                            style="object-fit: cover; border-radius: 8px;"
                            alt="{{ $product->name }}"
                        >
                    @else
                        No Image
                    @endif
                </td>

                <td>{{ $product->sku }}</td>

                <td>{{ $product->price }}</td>

                <td>{{ $product->quantity }}</td>

                <td class="actions">

                    <a href="{{ route('products.show', $product) }}"
                       class="btn btn-view">
                        View
                    </a>

                    <a href="{{ route('products.edit', $product) }}"
                       class="btn btn-edit">
                        Edit
                    </a>

                    <form
                        action="{{ route('products.destroy', $product) }}"
                        method="POST"
                        style="display:inline"
                        onsubmit="return confirm('Are you sure you want to delete this product?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-delete">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@else

    <p>No products found. Add your first product!</p>

@endif

@endsection
