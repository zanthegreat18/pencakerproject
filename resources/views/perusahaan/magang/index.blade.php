<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Magang Saya - Dashboard Perusahaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-gray-900 text-white font-sans">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-gray-950 text-white p-6 space-y-4 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold text-purple-400 mb-8 text-center">AntiNganggur</h1>
            <nav class="space-y-3 text-sm">
                <a href="{{ route('perusahaan.dashboard') }}" class="block px-4 py-2 rounded hover:bg-purple-800">🏠 Dashboard</a>
                <a href="{{ route('vacancies.index') }}" class="block px-4 py-2 rounded hover:bg-purple-800">📢 Lowongan</a>
                <a href="{{ route('perusahaan.magang.index') }}" class="block px-4 py-2 rounded bg-purple-800">💼 Magang</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-purple-800">🎓 Beasiswa</a>
            </nav>
        </div>
        <div class="text-xs text-gray-400 text-center space-x-4 border-t border-gray-700 pt-6">
            <a href="#" class="hover:text-purple-300">Support</a>
            <a href="#" class="hover:text-purple-300">Logout</a>
        </div>
    </aside>

    {{-- MAIN --}}
    <main class="flex-1 bg-gradient-to-br from-purple-100 via-white to-blue-100 text-gray-900">
        <div class="flex justify-between items-center bg-white px-8 py-4 shadow border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Magang Perusahaan Anda</h2>
            <a href="{{ route('perusahaan.magang.create') }}"
               class="bg-green-600 px-4 py-2 rounded text-white hover:bg-green-700 text-sm">
                + Tambah Magang
            </a>
        </div>

        <div class="p-10">
            @if(session('success'))
                <div class="mb-4 bg-green-600 text-white px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto rounded shadow-lg">
                <table class="w-full table-auto border border-gray-200 bg-white text-sm text-gray-800">
                    <thead class="bg-purple-100 text-left">
                        <tr>
                            <th class="p-3">Keahlian</th>
                            <th class="p-3">Min Pendidikan</th>
                            <th class="p-3">Gaji</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">No. Telp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($magangs as $m)
                            <tr class="border-t border-gray-200 hover:bg-purple-50 transition">
                                <td class="p-3">{{ $m->keahlian }}</td>
                                <td class="p-3">{{ $m->min_pendidikan }}</td>
                                <td class="p-3">Rp{{ number_format($m->gaji, 0, ',', '.') }}</td>
                                <td class="p-3">{{ $m->email }}</td>
                                <td class="p-3">{{ $m->no_telp }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-4 text-center text-gray-400">Belum ada magang yang ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

</body>
</html>
