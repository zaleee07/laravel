@extends('layouts.app')
@section('title','Edit Produk')
@section('content')
<h1>Edit Produk</h1><div class="card"><form method="POST" action="{{ route('products.update',$product) }}">@method('PUT')@include('products._form')</form></div>
@endsection
