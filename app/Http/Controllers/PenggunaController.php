<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    // Halaman utama (about)
    public function about()
    {
        return view('pengguna.about');
    }

    // Halaman deals
    public function deals()
    {
        return view('pengguna.deals');
    }

    // Halaman reservation
    public function reservation()
    {
        return view('pengguna.reservation');
    }

    // Halaman index (misalnya home)
    public function index()
    {
        return view('pengguna.index');
    }

    // Dashboard (hanya untuk pengguna login)
    public function dashboard()
    {
        return view('pengguna.dashboard');
    }
}
