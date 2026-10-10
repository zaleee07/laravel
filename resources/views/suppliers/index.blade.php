@extends('layouts.app')
@section('title','Supplier')
@section('content')
<h1>Data Supplier</h1><div class="card"><h2>Tambah Supplier</h2><form method="POST" action="{{ route('suppliers.store') }}">@csrf
<label>Nama supplier</label><input name="name" required>@error('name')<div class="error">{{ $message }}</div>@enderror
<label>Nama kontak</label><input name="contact_person"><label>Telepon</label><input name="phone"><div class="actions"><button>Tambah Supplier</button></div></form></div>
<div class="card"><h2>Daftar Supplier</h2><div class="table-wrap"><table><tr><th>Nama</th><th>Kontak</th><th>Telepon</th><th>Jumlah produk</th></tr>@forelse($suppliers as $supplier)<tr><td>{{ $supplier->name }}</td><td>{{ $supplier->contact_person }}</td><td>{{ $supplier->phone }}</td><td>{{ $supplier->products_count }}</td></tr>@empty<tr><td colspan="4">Belum ada supplier.</td></tr>@endforelse</table></div>{{ $suppliers->links() }}</div>
@if(auth()->user()->role==='admin' && $products->count())<div class="card"><h2>Hubungkan Produk dan Supplier</h2><form method="POST" action="{{ route('suppliers.attach',$suppliers->first()?->id ?? 0) }}">@csrf
<label>Supplier</label><select id="supplier-select" required>@foreach($suppliers as $supplier)<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>@endforeach</select>
<label>Produk</label><select name="product_id">@foreach($products as $product)<option value="{{ $product->id }}">{{ $product->sku }} - {{ $product->name }}</option>@endforeach</select>
<label>Harga supplier</label><input type="number" name="supplier_price" min="0" step=".01" value="0"><p class="small muted">Pilih supplier di atas; tombol di bawah menghubungkan ke supplier yang dipilih.</p><button type="button" onclick="this.form.action='/suppliers/'+document.getElementById('supplier-select').value+'/products';this.form.submit()">Simpan Relasi</button>
</form></div>@endif
@endsection
