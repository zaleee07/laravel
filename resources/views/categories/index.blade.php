@extends('layouts.app')
@section('title','Kategori')
@section('content')
<h1>Data Kategori</h1>
<div class="card"><h2>Tambah Kategori</h2><form method="POST" action="{{ route('categories.store') }}">@csrf
<label>Nama kategori</label><input name="name" value="{{ old('name') }}" required>@error('name')<div class="error">{{ $message }}</div>@enderror
<label>Deskripsi</label><input name="description" value="{{ old('description') }}">@error('description')<div class="error">{{ $message }}</div>@enderror
<div class="actions"><button>Tambah</button></div></form></div>
<div class="card"><h2>Daftar Kategori</h2><div class="table-wrap"><table><tr><th>Nama</th><th>Deskripsi</th><th>Jumlah produk</th><th>Aksi</th></tr>
@forelse($categories as $category)<tr><td>{{ $category->name }}</td><td>{{ $category->description }}</td><td>{{ $category->products_count }}</td><td>
@if(auth()->user()->role==='admin')<form method="POST" action="{{ route('categories.destroy',$category) }}" onsubmit="return confirm('Hapus kategori ini?')">@csrf @method('DELETE')<button class="danger">Hapus</button></form>@else - @endif
</td></tr>@empty<tr><td colspan="4">Belum ada kategori.</td></tr>@endforelse
</table></div>{{ $categories->links() }}</div>
@endsection
