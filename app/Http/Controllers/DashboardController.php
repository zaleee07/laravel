<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProducts' => Product::count(),
            'totalStock' => Product::sum('stock'),
            'lowStock' => Product::whereColumn('stock', '<=', 'minimum_stock')->count(),
            'inventoryValue' => Product::selectRaw('COALESCE(SUM(stock * price), 0) as total')->value('total'),
            'recentMovements' => StockMovement::with(['product', 'user'])->latest()->take(8)->get(),
        ]);
    }
}
