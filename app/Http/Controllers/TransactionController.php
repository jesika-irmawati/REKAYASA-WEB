<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_products' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:0,1',
        ]);

        Transaction::create($validated);
        return redirect()->route('transactions.index')
            ->with('success', 'Transaction added successfully!');
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $products = Product::all();
        return view('transactions.edit', compact('transaction', 'products'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_products' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:0,1',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->update($validated);
        return redirect()->route('transactions.index')
            ->with('success', 'Transaction updated successfully!');
    }

    public function destroy($id)
    {
        Transaction::destroy($id);
        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully!');
    }
}