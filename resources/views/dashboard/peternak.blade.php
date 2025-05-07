@extends('layouts.master')
@section('content')

<div class="page-heading">
    <h3>Dashboard Peternak</h3>
</div>
<p>Selamat datang, {{ Auth::user()->name }}!</p>
<!-- Konten khusus untuk peternak -->
<h2>Halo, {{ auth()->user()->name }}</h2>
<p>Email: {{ auth()->user()->email }}</p>
<p>Nomor Telepon: {{ auth()->user()->no_telp }}</p>
<p>Alamat: {{ auth()->user()->alamat }}</p>
<p>Jumlah Ternak: {{ auth()->user()->jumlah_ternak }}</p>
<!-- Tombol Logout -->
{{-- <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form> --}}

@endsection
