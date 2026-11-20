@extends('layout')
@section('content')

<div class="product-header">
    <div class="product-heading">
        <h1>Stocks</h1>
        <p>Manage your product stock movements.</p>
    </div>

    <a href="{{ route('stocks.create') }}" class="btn">
        + Add Stock
    </a>
</div>

<table>
    <thead>
        <tr>
            <th class="number-center">No.</th>
            <th>Product</th>
            <th class="stock-center">Type</th>
            <th class="stock-center">Quantity</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($stocks as $index => $stock)
        <tr>
            <td class="number-center">{{ $index + 1 }}</td>
            <td>{{ $stock->product->name }}</td>
            <td class="stock-center">{{ ucfirst($stock->type) }}</td>
            <td class="stock-center">{{ $stock->quantity }}</td>

            <td>
                <div class="action-buttons">
                    <a href="{{ route('stocks.edit', $stock->id) }}" class="btn-edit">
                        Edit
                    </a>

                    <form action="{{ route('stocks.destroy', $stock->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this stock?')">
                            Delete
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection