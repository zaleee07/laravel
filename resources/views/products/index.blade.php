@extends('layouts.app')
@section('title','Produk')
@section('content')
<h1>Data Produk</h1><div class="actions"><a class="btn" href="{{ route('products.create') }}">Tambah Produk</a></div>
<div class="card"><h2>Cari dan Filter</h2><form method="GET" class="inline">
<div><label>Nama / SKU</label><input name="search" value="{{ request('search') }}"></div>
<div><label>Kategori</label><select name="category_id"><option value="">Semua kategori</option>@foreach($categories as $category)<option value="{{ $category->id }}" @selected(request('category_id')==$category->id)>{{ $category->name }}</option>@endforeach</select></div>
<div><label>Urutkan</label><select name="sort">@foreach(['name'=>'Nama','sku'=>'SKU','price'=>'Harga','stock'=>'Stok'] as $key=>$label)<option value="{{ $key }}" @selected($sort===$key)>{{ $label }}</option>@endforeach</select></div>
<div><label>Arah</label><select name="direction"><option value="asc" @selected($direction==='asc')>Naik</option><option value="desc" @selected($direction==='desc')>Turun</option></select></div><div><button>Filter</button></div>
</form></div>
<div class="card"><div class="table-wrap"><table><tr><th>SKU</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th>Status</th><th>Aksi</th></tr>
@forelse($products as $product)<tr><td>{{ $product->sku }}</td><td>{{ $product->name }}</td><td>{{ $product->category->name }}</td><td>Rp {{ number_format($product->price,0,',','.') }}</td><td>{{ $product->stock }}</td><td>{{ $product->stock <= $product->minimum_stock ? 'Stok rendah' : 'Aman' }}</td><td><div class="actions"><a class="btn" href="{{ route('products.show',$product) }}">Detail</a><a class="btn" href="{{ route('products.edit',$product) }}">Edit</a>
@if(!$product->stockMovements()->exists())<form method="POST" action="{{ route('products.destroy',$product) }}" onsubmit="return confirm('Hapus produk ini?')">@csrf @method('DELETE')<button class="danger">Hapus</button></form>@endif</div></td></tr>@empty<tr><td colspan="7">Produk tidak ditemukan.</td></tr>@endforelse
</table></div>{{ $products->links() }}</div>
@endsection
