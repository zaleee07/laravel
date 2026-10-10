<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Inventory Laravel')</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,sans-serif;background:#f3f5f9;color:#202938}.top{background:#172554;color:white;padding:16px 5%;display:flex;justify-content:space-between;align-items:center;gap:14px;flex-wrap:wrap}.top a{color:white;text-decoration:none;margin-right:12px}.container{max-width:1150px;margin:28px auto;padding:0 16px}.card{background:white;padding:20px;border-radius:12px;margin-bottom:18px;box-shadow:0 3px 12px #0f172a0c}.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(190px,1fr));gap:16px}.stat{font-size:27px;font-weight:bold;color:#1d4ed8;margin-top:8px}h1{font-size:26px}label{display:block;font-weight:bold;margin:12px 0 6px}input,select{width:100%;padding:10px;border:1px solid #cbd5e1;border-radius:7px}button,.btn{display:inline-block;padding:10px 14px;border:0;border-radius:7px;background:#1d4ed8;color:white;text-decoration:none;cursor:pointer}table{border-collapse:collapse;width:100%}th,td{text-align:left;padding:10px;border-bottom:1px solid #e2e8f0}th{background:#eff6ff}.table-wrap{overflow-x:auto}.notice{background:#dcfce7;color:#166534;padding:12px;border-radius:8px;margin-bottom:14px}.error{background:#fee2e2;color:#991b1b;padding:12px;border-radius:8px;margin:6px 0}.actions{display:flex;gap:8px;flex-wrap:wrap;margin-top:14px}.inline{display:flex;gap:12px;align-items:end;flex-wrap:wrap}.inline>div{flex:1;min-width:150px}.muted{color:#64748b}.danger{background:#b91c1c}.login{max-width:430px;margin:8vh auto;padding:0 16px}.small{font-size:13px}
    </style>
</head>
<body>
<header class="top"><strong>Inventory Laravel</strong>
<nav>
    @auth
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('categories.index') }}">Kategori</a>
        <a href="{{ route('products.index') }}">Produk</a>
        <a href="{{ route('suppliers.index') }}">Supplier</a>
        <a href="{{ route('stock.index') }}">Transaksi Stok</a>
        <a href="{{ route('reports.index') }}">Laporan</a>
        @can('manage-users') <a href="{{ route('users.index') }}">Pengguna</a> @endcan
        <form method="POST" action="{{ route('logout') }}" style="display:inline">@csrf<button type="submit">Logout</button></form>
    @endauth
</nav></header>
<main class="container">
    @auth <p class="muted small">Login sebagai {{ auth()->user()->name }} · Role: {{ auth()->user()->role }}</p> @endauth
    @if(session('success')) <div class="notice">{{ session('success') }}</div> @endif
    @if($errors->has('delete')) <div class="error">{{ $errors->first('delete') }}</div> @endif
    @yield('content')
</main>
</body>
</html>
