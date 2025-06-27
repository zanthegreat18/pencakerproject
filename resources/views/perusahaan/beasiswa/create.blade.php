@extends('layouts.app')

@section('content')
<div class="p-10">
    <h1 class="text-2xl font-bold mb-6">🎓 Tambah Beasiswa</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-600 text-white px-4 py-2 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perusahaan.beasiswa.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow text-gray-800">
        @csrf
        <div>
            <label class="block font-semibold">Judul</label>
            <input type="text" name="judul" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="w-full px-4 py-2 border rounded" required></textarea>
        </div>

        <div>
            <label class="block font-semibold">Syarat (Opsional)</label>
            <textarea name="syarat" rows="2" class="w-full px-4 py-2 border rounded"></textarea>
        </div>

        <div>
            <label class="block font-semibold">Deadline</label>
            <input type="date" name="deadline" class="px-4 py-2 border rounded" required>
        </div>

        <div class="text-right">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
