<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\PerusahaanDashboardController;
use App\Http\Controllers\Dashboard\PencakerDashboardController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\Pencaker\LowonganController;
use App\Http\Controllers\Pencaker\ApplicationController;
use App\Http\Controllers\Pencaker\LamaranController;
use App\Http\Controllers\Admin\CompanyController;

// ⛳ Public Homepage
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ✅ Authenticated User (semua role)
Route::middleware(['auth'])->group(function () {
    // 🔧 Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 🏠 Dashboard per role
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/perusahaan/dashboard', [PerusahaanDashboardController::class, 'index'])->name('perusahaan.dashboard');
    Route::get('/pencaker/dashboard', [PencakerDashboardController::class, 'index'])->name('pencaker.dashboard');
});

// 🧑‍💼 PERUSAHAAN - CRUD Lowongan & Lihat Pelamar
Route::middleware(['auth'])->group(function () {
    Route::resource('/perusahaan/vacancies', VacancyController::class);
    Route::get('/perusahaan/vacancies/{id}/applicants', [VacancyController::class, 'applicants'])->name('vacancies.applicants');
    Route::patch('/perusahaan/applications/{id}/update-status', [VacancyController::class, 'updateStatus'])->name('applications.updateStatus');
});

// 🏢 PERUSAHAAN - Tambah Magang & Beasiswa
Route::prefix('perusahaan')->middleware(['auth', 'perusahaan'])->group(function () {
    Route::resource('magang', \App\Http\Controllers\Perusahaan\MagangController::class)
        ->only(['index', 'create', 'store'])
        ->names('perusahaan.magang');

    Route::resource('beasiswa', \App\Http\Controllers\Perusahaan\BeasiswaController::class)
        ->only(['index', 'create', 'store'])
        ->names('perusahaan.beasiswa');
});

// 👤 PENCAKER - Lowongan, Apply, & Riwayat Lamaran
Route::middleware(['auth'])->group(function () {
    Route::get('/pencaker/lowongan', [LowonganController::class, 'index'])->name('pencaker.lowongan.index');
    Route::get('/pencaker/lowongan/{id}', [LowonganController::class, 'show'])->name('pencaker.lowongan.show');
    Route::post('/pencaker/lowongan/{id}/apply', [LowonganController::class, 'apply'])->name('pencaker.lowongan.apply');

    Route::get('/pencaker/lamaran-saya', [ApplicationController::class, 'index'])->name('pencaker.applications.index');

    Route::get('/lamaran/{vacancy}/apply', [LamaranController::class, 'create'])->name('lamaran.create');
    Route::post('/lamaran/store', [LamaranController::class, 'store'])->name('lamaran.store');
});

// 👑 ADMIN ROUTES
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/statistik', [AdminDashboardController::class, 'statistik'])->name('admin.statistik');
    Route::resource('beasiswa', BeasiswaController::class)->names('admin.beasiswa');
    Route::resource('magang', MagangController::class)->names('admin.magang');
    Route::resource('company', CompanyController::class)->names('admin.company');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->names('admin.users');
    Route::get('iklan', [\App\Http\Controllers\Admin\ComercialController::class, 'index'])->name('admin.iklan.index');
    Route::resource('admin/comercial', \App\Http\Controllers\Admin\ComercialController::class)->names('admin.comercial');
    Route::get('/lamaran', [App\Http\Controllers\Admin\LamaranAdminController::class, 'index'])->name('admin.lamaran.index');
});

// 🛫 Auto redirect ke dashboard sesuai role setelah login
Route::get('/redirect-dashboard', function () {
    $user = auth()->user();

    return match ($user->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'perusahaan' => redirect()->route('perusahaan.dashboard'),
        'pencaker' => redirect()->route('pencaker.dashboard'),
        default => abort(403, 'Role tidak dikenali.'),
    };
})->middleware('auth');

// 🧾 Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
