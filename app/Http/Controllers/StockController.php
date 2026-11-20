<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('product')->get();
        return view('stocks.index', compact('stocks'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stocks.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_products' => 'required|exists:products,id',
            'type' => 'required|in:masuk,keluar',
            'quantity' => 'required|integer|min:1',
        ]);
        Stock::create($validated);
        return redirect()->route('stocks.index')
            ->with('success', 'Stock added successfully!');
    }

    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        $products = Product::all();

        return view('stocks.edit', compact('stock', 'products'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_products' => 'required|exists:products,id',
            'type' => 'required|in:masuk,keluar',
            'quantity' => 'required|integer|min:1',
        ]);

        $stock = Stock::findOrFail($id);
        $stock->update($validated);

        return redirect()->route('stocks.index')
            ->with('success', 'Stock updated successfully!');
    }

    public function destroy($id)
    {
        Stock::destroy($id);
        return redirect()->route('stocks.index')
            ->with('success', 'Stock deleted successfully!');
    }
}