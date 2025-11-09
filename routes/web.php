<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BahasaController;

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
Route::get('/about', [PenggunaController::class, 'about'])->name('pengguna.about');
Route::get('/deals', [PenggunaController::class, 'deals'])->name('pengguna.deals');
Route::get('/reservation', [PenggunaController::class, 'reservation'])->name('pengguna.reservation');


/*
|--------------------------------------------------------------------------
| Admin Routes (perlu login sebagai admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
      Route::get('/admin/budaya', [AdminController::class, 'budaya'])->name('admin.budaya');
      Route::get('/admin/event', [EventController::class, 'index'])->name('admin.event');
          Route::get('/admin/bahasa', [BahasaController::class, 'bahasa'])->name('admin.bahasa');
});

/*
|--------------------------------------------------------------------------
| budaya
|--------------------------------------------------------------------------
*/


Route::prefix('admin')->group(function () {
    Route::get('/budaya', [BudayaController::class, 'index'])->name('admin.budaya');
    Route::post('/budaya', [BudayaController::class, 'store'])->name('admin.budaya.store');
    Route::delete('/budaya/{id}', [BudayaController::class, 'destroy'])->name('admin.budaya.destroy');
});

/*
|--------------------------------------------------------------------------
| event
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/event', [EventController::class, 'index'])->name('admin.event');
    Route::post('/event', [EventController::class, 'store'])->name('admin.event.store');
    Route::put('/event/{id}', [EventController::class, 'update'])->name('admin.event.update');
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');
});


/*
|--------------------------------------------------------------------------
| Bahasa CRUD
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| bahasa
|--------------------------------------------------------------------------
*/



Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/bahasa', [BahasaController::class, 'index'])->name('admin.bahasa');
    Route::post('/bahasa', [BahasaController::class, 'store'])->name('admin.bahasa.store');
    Route::put('/bahasa/{id}', [BahasaController::class, 'update'])->name('admin.bahasa.update');
    Route::delete('/bahasa/{id}', [BahasaController::class, 'destroy'])->name('admin.bahasa.destroy');
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
