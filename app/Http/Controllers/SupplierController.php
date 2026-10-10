<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return view('suppliers.index', [
            'suppliers' => Supplier::withCount('products')->orderBy('name')->paginate(10),
            'products' => Product::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'contact_person' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:30'],
        ]);
        Supplier::create($data);
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function attachProduct(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'supplier_price' => ['required', 'numeric', 'min:0'],
        ]);
        $supplier->products()->syncWithoutDetaching([
            $data['product_id'] => ['supplier_price' => $data['supplier_price']],
        ]);
        return redirect()->route('suppliers.index')->with('success', 'Relasi produk-supplier disimpan.');
    }
}
