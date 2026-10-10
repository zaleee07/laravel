@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="login"><div class="card"><h1>Inventory Laravel</h1><p class="muted">Masuk untuk mengelola persediaan barang.</p>
<form method="POST" action="{{ route('login.store') }}">@csrf
<label>Email</label><input type="email" name="email" value="{{ old('email') }}" required autofocus>
@error('email')<div class="error">{{ $message }}</div>@enderror
<label>Password</label><input type="password" name="password" required>
@error('password')<div class="error">{{ $message }}</div>@enderror
<div class="actions"><button type="submit">Login</button></div></form>
<p class="small muted">Akun demo: admin@example.com / password</p></div></div>
@endsection
