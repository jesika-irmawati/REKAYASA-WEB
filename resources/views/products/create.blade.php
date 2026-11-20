@extends('layout')

@section('content')

<div class="edit-header">
    <h1>Add Product</h1>
    <p>Enter your product information below.</p>
</div>

<div class="edit-form-container">

    <form method="POST"
          action="{{ route('products.store') }}"
          class="edit-form">

        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"
                   id="name"
                   name="name"
                   placeholder="Enter product name"
                   value="{{ old('name') }}"
                   required>

            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description"
                      name="description"
                      placeholder="Enter product description">{{ old('description') }}</textarea>

            @error('description')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number"
                   id="price"
                   name="price"
                   placeholder="Enter product price"
                   value="{{ old('price') }}"
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
                Save
            </button>

        </div>

    </form>

</div>

@endsection