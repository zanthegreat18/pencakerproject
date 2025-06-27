@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-3xl p-4 bg-white dark:bg-gray-800 rounded shadow">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-2">
        {{ $lowongan->title }}
    </h2>

    <p class="text-gray-700 dark:text-gray-200 mb-1">
        <strong>📍 Lokasi:</strong> {{ $lowongan->location }}
    </p>

    <p class="text-gray-700 dark:text-gray-200 mb-1">
        <strong>⏳ Deadline:</strong> {{ $lowongan->deadline->format('d M Y') }}
    </p>

    <p class="text-gray-600 dark:text-gray-300 mt-3 mb-6">
        {{ $lowongan->description }}
    </p>

    <a href="{{ route('lamaran.create', $lowongan->id) }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow transition">
       Apply Sekarang
    </a>
</div>
@endsection
