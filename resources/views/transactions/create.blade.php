@extends('layout')

@section('content')

<div class="edit-header">
    <h1>Add Transaction</h1>
    <p>Enter your transaction information below.</p>
</div>

<div class="edit-form-container">

    <form method="POST"
          action="{{ route('transactions.store') }}"
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
            <label for="quantity">Quantity</label>

            <input type="number"
                   id="quantity"
                   name="quantity"
                   placeholder="Enter transaction quantity"
                   value="{{ old('quantity') }}"
                   min="1"
                   required>

            @error('quantity')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select id="status"
                    name="status"
                    required>

                <option value="">Select Transaction Status</option>

                <option value="0"
                    {{ old('status') === '0' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="1"
                    {{ old('status') === '1' ? 'selected' : '' }}>
                    Completed
                </option>

            </select>

            @error('status')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="edit-actions">

            <a href="{{ route('transactions.index') }}"
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