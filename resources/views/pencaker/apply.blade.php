@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-semibold mb-4">Lamar Lowongan: {{ $vacancy->title }}</h2>

    <form method="POST" action="{{ route('lamaran.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">

        <div class="mb-4">
            <label class="block text-sm font-medium">Upload CV (PDF)</label>
            <input type="file" name="cv_file" accept="application/pdf" required class="mt-1">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Kirim Lamaran
        </button>
    </form>
</div>
@endsection
