@extends('layout')

@section('content')

<div class="edit-header">
    <h1>Edit Product</h1>
    <p>Update your product information below.</p>
</div>

<div class="edit-form-container">

    <form method="POST"
          action="{{ route('products.update', $product->id) }}"
          class="edit-form">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                   id="name"
                   name="name"
                   value="{{ old('name', $product->name) }}"
                   required>

            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description"
                      name="description">{{ old('description', $product->description) }}</textarea>

            @error('description')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number"
                   id="price"
                   name="price"
                   value="{{ old('price', $product->price) }}"
                   min="0"
                   step="0.01"
                   required>

            @error('price')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="edit-actions">

            <a href="{{ route('products.index') }}"
               class="btn-cancel">
                Cancel
            </a>

            <button type="submit" class="btn-update">
                Update
            </button>

        </div>

    </form>

</div>

@endsection