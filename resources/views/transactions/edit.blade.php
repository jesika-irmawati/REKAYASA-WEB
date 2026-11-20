@extends('layout')

@section('content')

<div class="edit-header">
    <h1>Edit Transaction</h1>
    <p>Update your transaction information below.</p>
</div>

<div class="edit-form-container">

    <form method="POST"
          action="{{ route('transactions.update', $transaction->id) }}"
          class="edit-form">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_products">Product</label>

            <select id="id_products"
                    name="id_products"
                    required>

                @foreach($products as $p)
                    <option value="{{ $p->id }}"
                        {{ old('id_products', $transaction->id_products) == $p->id ? 'selected' : '' }}>
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
                   value="{{ old('quantity', $transaction->quantity) }}"
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

                <option value="0"
                    {{ old('status', (string) $transaction->status) === '0' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="1"
                    {{ old('status', (string) $transaction->status) === '1' ? 'selected' : '' }}>
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
                Update
            </button>

        </div>

    </form>

</div>

@endsection