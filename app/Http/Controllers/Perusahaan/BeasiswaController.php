<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BeasiswaController extends Controller

{

    public function index()
    {
        $beasiswas = Beasiswa::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('perusahaan.beasiswa.index', compact('beasiswas'));
    }

    public function create()
    {
        return view('perusahaan.beasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'syarat' => 'nullable|string',
            'deadline' => 'required|date',
        ]);

        Beasiswa::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'syarat' => $request->syarat,
            'deadline' => $request->deadline,
            'user_id' => auth()->id(), // Penting: supaya tahu siapa yang buat
        ]);

        return redirect()->route('perusahaan.beasiswa.index')->with('success', 'Beasiswa berhasil ditambahkan.');
    }
}
