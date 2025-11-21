<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\Bahasa;
use App\Models\Test;


class PenggunaController extends Controller
{
    // Halaman utama (about)
    public function quiz()
    {
          $bahasa = Bahasa::all();
         return view('pengguna.quiz', compact('bahasa'));
    }

    // Halaman budaya
    public function budaya()
    {
        return view('pengguna.budaya');
    }

    // Halaman budaya
    public function test()
    {
        return view('pengguna.test');
    }

    // Halaman budaya
    public function isiBudaya()
    {
        return view('pengguna.isiBudaya');
    }

    // Halaman budaya
    public function agendaBudaya()
    {
        return view('pengguna.agendaBudaya');
    }
    // Halaman budaya
    public function chatBot()
    {
        return view('pengguna.chatBot');
    }
    // Halaman budaya
    public function soalQuiz()
    {
        return view('pengguna.soalQuiz');
    }

    // Halaman reservation
    public function reservation()
    {
        return view('pengguna.reservation');
    }

    // Halaman index (misalnya home)
      public function index()
{
    $currentYear = Carbon::now()->year; // Tahun sekarang (misalnya 2025)

    $events = Event::whereYear('tanggal', $currentYear)
        ->latest()
        ->get();

    return view('pengguna.index', compact('events'));
}

    // Dashboard (hanya untuk pengguna login)
    public function dashboard()
    {
        return view('pengguna.dashboard');
    }
}
