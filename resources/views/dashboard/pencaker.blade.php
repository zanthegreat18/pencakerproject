@extends('layouts.app')

@section('content')
<div class="container">
    <h1>🙋‍♂️ Dashboard Pencaker</h1>
    <p>Selamat datang, pencaker legend!</p>

    <br>

    <a href="{{ route('pencaker.lowongan.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        🔍 Lihat Lowongan Kerja
    </a>
</div>
@endsection