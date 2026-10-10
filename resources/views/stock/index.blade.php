@extends('layouts.app')
@section('title','Transaksi Stok')
@section('content')
<h1>Transaksi Barang</h1><div class="card"><h2>Catat Barang Masuk / Keluar</h2><form method="POST" action="{{ route('stock.store') }}">@csrf
<label>Produk</label><select name="product_id" required>@foreach($products as $product)<option value="{{ $product->id }}">{{ $product->sku }} - {{ $product->name }} (stok: {{ $product->stock }})</option>@endforeach</select>
<label>Jenis transaksi</label><select name="type"><option value="IN">Barang masuk</option><option value="OUT">Barang keluar</option></select>
<label>Jumlah</label><input type="number" name="quantity" min="1" required>@error('quantity')<div class="error">{{ $message }}</div>@enderror
<label>Catatan</label><input name="note" maxlength="255"><div class="actions"><button>Simpan transaksi</button></div></form></div>
<div class="card"><h2>Histori Transaksi</h2><div class="table-wrap"><table><tr><th>Waktu</th><th>Produk</th><th>Jenis</th><th>Jumlah</th><th>Pengguna</th><th>Catatan</th></tr>@forelse($movements as $movement)<tr><td>{{ $movement->created_at }}</td><td>{{ $movement->product->name }}</td><td>{{ $movement->type==='IN'?'Masuk':'Keluar' }}</td><td>{{ $movement->quantity }}</td><td>{{ $movement->user->name }}</td><td>{{ $movement->note }}</td></tr>@empty<tr><td colspan="6">Belum ada transaksi.</td></tr>@endforelse</table></div>{{ $movements->links() }}</div>
@endsection
