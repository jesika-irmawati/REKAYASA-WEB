@extends('layout')

@section('content')

<div class="edit-header">
    <h1>Add Stock</h1>
    <p>Enter your stock information below.</p>
</div>

<div class="edit-form-container">

    <form method="POST"
          action="{{ route('stocks.store') }}"
          class="edit-form">

        @csrf

        <div class="form-group">
            <label for="id_products">Product</label>

            <select id="id_products"
                    name="id_products"
                    required>

                <option value="">Select Product</option>

                @foreach($products as $p)
                    <option value="{{ $p->id }}"
                        {{ old('id_products') == $p->id ? 'selected' : '' }}>
                        {{ $p->name }}
                    </option>
                @endforeach

            </select>

            @error('id_products')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="type">Type</label>

            <select id="type"
                    name="type"
                    required>

                <option value="">Select Stock Type</option>
                <option value="masuk" {{ old('type') == 'masuk' ? 'selected' : '' }}>Masuk</option>
                <option value="keluar" {{ old('type') == 'keluar' ? 'selected' : '' }}>Keluar</option>

            </select>

            @error('type')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>

            <input type="number"
                   id="quantity"
                   name="quantity"
                   placeholder="Enter stock quantity"
                   value="{{ old('quantity') }}"
                   min="1"
                   required>

            @error('quantity')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="edit-actions">

            <a href="{{ route('stocks.index') }}"
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