@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<h1>Dashboard</h1><p class="muted">Ringkasan kondisi persediaan barang.</p>
<div class="grid">
<div class="card">Total Produk<div class="stat">{{ $totalProducts }}</div></div>
<div class="card">Total Stok<div class="stat">{{ $totalStock }}</div></div>
<div class="card">Stok Rendah<div class="stat">{{ $lowStock }}</div></div>
<div class="card">Nilai Inventory<div class="stat">Rp {{ number_format($inventoryValue,0,',','.') }}</div></div>
</div>
<div class="card"><h2>Transaksi Terbaru</h2><div class="table-wrap"><table><tr><th>Waktu</th><th>Produk</th><th>Jenis</th><th>Jumlah</th><th>Pengguna</th></tr>
@forelse($recentMovements as $movement)<tr><td>{{ $movement->created_at }}</td><td>{{ $movement->product->name }}</td><td>{{ $movement->type === 'IN' ? 'Masuk' : 'Keluar' }}</td><td>{{ $movement->quantity }}</td><td>{{ $movement->user->name }}</td></tr>@empty<tr><td colspan="5">Belum ada transaksi.</td></tr>@endforelse
</table></div></div>
@endsection
