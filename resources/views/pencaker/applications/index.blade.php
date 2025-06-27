@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-semibold mb-4">📄 Lamaran Saya</h2>

    @if ($applications->isEmpty())
        <p class="text-gray-600">Belum ada lamaran yang dikirim.</p>
    @else
        <table class="table-auto w-full border mt-4">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-4 py-2">Posisi</th>
                    <th class="px-4 py-2">Perusahaan</th>
                    <th class="px-4 py-2">Lokasi</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $app)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $app->vacancy->title }}</td>
                        <td class="px-4 py-2">{{ $app->vacancy->company->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $app->vacancy->location }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded
                                @if($app->status === 'pending') bg-yellow-200 text-yellow-800
                                @elseif($app->status === 'accepted') bg-green-200 text-green-800
                                @else bg-red-200 text-red-800 @endif">
                                {{ ucfirst($app->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
