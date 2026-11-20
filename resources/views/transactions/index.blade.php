@extends('layout')
@section('content')
<div class="product-header">
    <div class="product-heading">
        <h1>Transactions</h1>
        <p>Manage your product transactions.</p>
    </div>
    <a href="{{ route('transactions.create') }}" class="btn">
        + Add Transaction
    </a>
</div>
<table>
    <thead>
        <tr>
            <th class="number-center">No.</th>
            <th>Product</th>
            <th class="transaction-center">Quantity</th>
            <th class="transaction-center">Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $index => $t)
        <tr>
            <td class="number-center">{{ $index + 1 }}</td>
            <td>{{ $t->product->name }}</td>
            <td class="transaction-center">{{ $t->quantity }}</td>
            <td class="transaction-center">
                {{ $t->status ? 'Completed' : 'Pending' }}
            </td>
            <td>
                <div class="action-buttons">

                    <a href="{{ route('transactions.edit', $t->id) }}">
                        Edit
                    </a>

                    <form action="{{ route('transactions.destroy', $t->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this transaction?')">
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