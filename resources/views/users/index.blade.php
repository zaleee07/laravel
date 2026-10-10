@extends('layouts.app')
@section('title','Pengguna')
@section('content')
<h1>Manajemen Pengguna</h1><div class="card"><h2>Tambah Pengguna</h2><form method="POST" action="{{ route('users.store') }}">@csrf
<label>Nama</label><input name="name" required>@error('name')<div class="error">{{ $message }}</div>@enderror
<label>Email</label><input type="email" name="email" required>@error('email')<div class="error">{{ $message }}</div>@enderror
<label>Password minimal 8 karakter</label><input type="password" name="password" required minlength="8">@error('password')<div class="error">{{ $message }}</div>@enderror
<label>Role</label><select name="role"><option value="staff">Staff</option><option value="admin">Admin</option></select><div class="actions"><button>Tambah Pengguna</button></div></form></div>
<div class="card"><h2>Daftar Pengguna</h2><div class="table-wrap"><table><tr><th>Nama</th><th>Email</th><th>Role</th></tr>@foreach($users as $user)<tr><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td>{{ $user->role }}</td></tr>@endforeach</table></div>{{ $users->links() }}</div>
@endsection
