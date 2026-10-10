@extends('layouts.app')
@section('title','Detail Produk')
@section('content')
<h1>Detail Produk</h1><div class="card"><p><strong>SKU:</strong> {{ $product->sku }}</p><p><strong>Nama:</strong> {{ $product->name }}</p><p><strong>Kategori:</strong> {{ $product->category->name }}</p><p><strong>Harga:</strong> Rp {{ number_format($product->price,0,',','.') }}</p><p><strong>Stok:</strong> {{ $product->stock }}</p><p><strong>Batas stok rendah:</strong> {{ $product->minimum_stock }}</p><a class="btn" href="{{ route('products.edit',$product) }}">Edit</a> <a class="btn" href="{{ route('products.index') }}">Kembali</a></div>
@endsection
