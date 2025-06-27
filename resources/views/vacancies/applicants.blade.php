@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-semibold mb-4">👥 Pelamar untuk: {{ $vacancy->title }}</h2>

    @if ($vacancy->applications->isEmpty())
        <p class="text-gray-600">Belum ada yang melamar.</p>
    @else
        <table class="table-auto w-full border mt-4">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Status & Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacancy->applications as $app)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $app->user->name }}</td>
                        <td class="px-4 py-2">{{ $app->user->email }}</td>
                        <td class="px-4 py-2 capitalize text-sm">

                            {{-- ✅ Tombol TERIMA --}}
                            <form method="POST" action="{{ route('applications.updateStatus', $app->id) }}" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="accepted">
                                <button class="bg-green-600 text-white px-2 py-1 rounded text-sm hover:bg-green-700">Terima</button>
                            </form>

                            {{-- ✅ Tombol TOLAK --}}
                            <form method="POST" action="{{ route('applications.updateStatus', $app->id) }}" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="rejected">
                                <button class="bg-red-600 text-white px-2 py-1 rounded text-sm hover:bg-red-700">Tolak</button>
                            </form>

                            {{-- ✅ Badge Status --}}
                            <div class="text-xs mt-2 italic">
                                Status:
                                <span class="px-2 py-1 rounded
                                    @if($app->status === 'pending') bg-yellow-200 text-yellow-800
                                    @elseif($app->status === 'accepted') bg-green-200 text-green-800
                                    @else bg-red-200 text-red-800 @endif">
                                    {{ ucfirst($app->status) }}
                                </span>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
