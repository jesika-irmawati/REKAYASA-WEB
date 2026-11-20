@extends('layout')

@section('content')

<div class="product-header">
    <div class="product-heading">
        <h1>Products</h1>
        <p>Manage your product inventory</p>
    </div>

    <a href="{{ route('products.create') }}" class="btn">
        + Add Product
    </a>
</div>

<table>
    <thead>
        <tr>
            <th class="number-center">No.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $index => $item)
        <tr>
            <td class="number-center">{{ $index + 1 }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>

            <td>
                <div class="action-buttons">
                    <a href="{{ route('products.edit', $item->id) }}" class="btn-edit">
                        Edit
                    </a>

                    <form action="{{ route('products.destroy', $item->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this product?')">
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