@extends('admin.layouts.app')
@section('konten')

@foreach($produk as $p)

<h1>Hello {{ $p->nama }}</h1>

@endforeach
@endsection