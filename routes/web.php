<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BahasaController;
use App\Http\Controllers\PitchController;
use App\Http\Controllers\QuizController;




Route::get('/pengguna/soal-quiz', [PenggunaController::class, 'soalQuiz'])->name('pengguna.soal.quiz');

Route::get('/pengguna/quiz/data', [PenggunaController::class, 'getQuizData'])->name('pengguna.quiz.data');







/*
|--------------------------------------------------------------------------
| Public Routes (tidak perlu login)
|--------------------------------------------------------------------------
*/

// Saat buka "/", langsung arahkan ke halaman about pengguna
Route::get('/', [PenggunaController::class, 'test'])->name('pengguna.test');



// ====================
// ROUTE PUBLIK (tanpa login)
// ====================
Route::get('/index', [PenggunaController::class, 'index'])->name('pengguna.index');
Route::get('/quiz', [PenggunaController::class, 'quiz'])->name('pengguna.quiz');
Route::get('/budaya', [PenggunaController::class, 'budaya'])->name('pengguna.budaya');
Route::get('/test', [PenggunaController::class, 'test'])->name('pengguna.test');
Route::get('/isiBudaya', [PenggunaController::class, 'isiBudaya'])->name('pengguna.isiBudaya');
Route::get('/agendaBudaya', [PenggunaController::class, 'agendaBudayaList'])
    ->name('pengguna.agendaBudaya.list');
Route::get('/agendaBudaya/{id}', [PenggunaController::class, 'agendaBudaya'])
    ->name('pengguna.agendaBudaya.detail');
Route::get('/audio', [PenggunaController::class, 'audio'])->name('pengguna.audio');


Route::get('/chatBot', [PenggunaController::class, 'chatBot'])->name('pengguna.chatBot');
Route::post('/ask-baileobot', [AdminController::class, 'askBaileobot'])->name('ask.baileobot');
Route::get('/soalQuiz', [PenggunaController::class, 'soalQuiz'])->name('pengguna.soalQuiz');

Route::get('/budaya/{id}', [BudayaController::class, 'show'])->name('pengguna.budaya.show');
Route::get('/wisata/{id}', [BudayaController::class, 'wisata'])->name('pengguna.wisata');


Route::get('/budaya/filter', [BudayaController::class, 'filter']);




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
    Route::get('/baileobot', [AdminController::class, 'baileobot'])->name('admin.baileobot');
    Route::post('/baileobot/ask', [AdminController::class, 'askBaileobot'])->name('admin.baileobot.ask');

});

/*
|--------------------------------------------------------------------------
| budaya
|--------------------------------------------------------------------------
*/


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/budaya', [BudayaController::class, 'index'])->name('admin.budaya');
    Route::post('/budaya', [BudayaController::class, 'store'])->name('admin.budaya.store');
    Route::put('/budaya/{id}', [BudayaController::class, 'update'])->name('admin.budaya.update'); // 🔥 WAJIB
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


/*
|--------------------------------------------------------------------------
| machine learning faruqq
|--------------------------------------------------------------------------
*/
Route::post('/detect-pitch', [PitchController::class, 'detect']);
Route::get('/musik', function () {
    return view('pengguna.musik');
});

/*
|--------------------------------------------------------------------------
| quiz
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/quiz', [QuizController::class, 'index'])->name('admin.quiz');
    Route::post('/quiz', [QuizController::class, 'store'])->name('admin.quiz.store');
    Route::put('/quiz/{id}', [QuizController::class, 'update'])->name('admin.quiz.update');
    Route::delete('/quiz/{id}', [QuizController::class, 'destroy'])->name('admin.quiz.destroy');
});

require __DIR__.'/auth.php';
