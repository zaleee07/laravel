@extends('layouts.app')
@section('title','Laporan')
@section('content')
<h1>Laporan Inventory</h1><div class="card"><div class="table-wrap"><table><tr><th>SKU</th><th>Produk</th><th>Kategori</th><th>Stok</th><th>Total masuk</th><th>Total keluar</th><th>Nilai stok</th><th>Status</th></tr>
@foreach($products as $product)<tr><td>{{ $product->sku }}</td><td>{{ $product->name }}</td><td>{{ $product->category->name }}</td><td>{{ $product->stock }}</td><td>{{ $product->total_in ?? 0 }}</td><td>{{ $product->total_out ?? 0 }}</td><td>Rp {{ number_format($product->stock*$product->price,0,',','.') }}</td><td>{{ $product->stock <= $product->minimum_stock ? 'Stok rendah' : 'Aman' }}</td></tr>@endforeach
</table></div></div>
<div class="card"><h2>Ringkasan Kategori</h2><div class="table-wrap"><table><tr><th>Kategori</th><th>Jumlah produk</th><th>Total stok</th><th>Rata-rata harga</th></tr>@foreach($categories as $category)<tr><td>{{ $category->name }}</td><td>{{ $category->products_count }}</td><td>{{ $category->products_sum_stock ?? 0 }}</td><td>Rp {{ number_format($category->products_avg_price ?? 0,0,',','.') }}</td></tr>@endforeach</table></div></div>
@endsection
