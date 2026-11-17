
@extends('layouts.app')

@section('title', 'Add New Product')

@section('content')

<style>
    .product-form {
        max-width: 650px;
        margin: 30px auto;
        padding: 30px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.08);
    }

    .product-form label {
        display: block;
        margin: 15px 0 7px;
        font-weight: bold;
    }

    .product-form input,
    .product-form textarea {
        width: 100%;
        padding: 11px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
    }

    .btn {
        display: inline-block;
        padding: 11px 20px;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        cursor: pointer;
        font-size: 14px;
        margin-top: 20px;
    }

    .btn-save {
        background: #2563eb;
        color: white;
    }

    .btn-back {
        background: #64748b;
        color: white;
        margin-left: 8px;
    }

    .error {
        color: red;
        font-size: 13px;
    }

    #image-preview {
        display: none;
        width: 120px;
        height: 120px;
        object-fit: cover;
        margin-top: 12px;
        border-radius: 8px;
    }
</style>

<div class="product-form">

    <h2>Add New Product</h2>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('products.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <label>Product Name</label>
        <input type="text" name="name"
               value="{{ old('name') }}" required>

        <label>SKU</label>
        <input type="text" name="sku"
               value="{{ old('sku') }}" required>

        <label>Description</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <label>Price</label>
        <input type="number" step="0.01"
               name="price" value="{{ old('price') }}" required>

        <label>Quantity</label>
        <input type="number" name="quantity"
               value="{{ old('quantity') }}" required>

        <label>Product Image</label>
        <input type="file"
               name="image"
               accept="image/jpeg,image/png,image/jpg,image/webp"
               onchange="previewImage(event)">

        <img id="image-preview" alt="Product image preview">

        <button type="submit" class="btn btn-save">
            Save Product
        </button>

        <a href="{{ route('products.index') }}" class="btn btn-back">
            ← Back to Products
        </a>

    </form>

</div>

<script>
    function previewImage(event) {
        const preview = document.getElementById('image-preview');
        const file = event.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    }
</script>

@endsection
