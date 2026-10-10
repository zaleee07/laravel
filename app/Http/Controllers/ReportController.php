<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->withSum(['stockMovements as total_in' => fn ($q) => $q->where('type', 'IN')], 'quantity')
            ->withSum(['stockMovements as total_out' => fn ($q) => $q->where('type', 'OUT')], 'quantity')
            ->orderBy('name')->get();

        $categories = Category::withCount('products')->withSum('products', 'stock')->withAvg('products', 'price')->orderBy('name')->get();

        return view('reports.index', compact('products', 'categories'));
    }
}
