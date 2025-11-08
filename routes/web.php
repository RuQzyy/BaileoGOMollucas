<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;

/*
|--------------------------------------------------------------------------
| Public Routes (tidak perlu login)
|--------------------------------------------------------------------------
*/

// Saat buka "/", langsung arahkan ke halaman about pengguna
Route::get('/', function () {
    return view('pengguna.index');
});


// ====================
// ROUTE PUBLIK (tanpa login)
// ====================
Route::get('/index', [PenggunaController::class, 'index'])->name('pengguna.index');
Route::get('/quiz', [PenggunaController::class, 'quiz'])->name('pengguna.quiz');
Route::get('/budaya', [PenggunaController::class, 'budaya'])->name('pengguna.budaya');
Route::get('/reservation', [PenggunaController::class, 'reservation'])->name('pengguna.reservation');


/*
|--------------------------------------------------------------------------
| Admin Routes (perlu login sebagai admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| Pengguna Routes (perlu login sebagai pengguna)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:pengguna'])->group(function () {
    Route::get('/pengguna/dashboard', [PenggunaController::class, 'index'])->name('pengguna.dashboard');
});

/*
|--------------------------------------------------------------------------
| Profile Routes (perlu login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
