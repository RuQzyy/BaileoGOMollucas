<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budaya;
use App\Models\Event;
use App\Models\Bahasa;

class AdminController extends Controller
{
   public function index()
    {
        $totalBudaya = Budaya::count();
        $totalEvent = Event::count();
        $totalBahasa = Bahasa::count();

        $latestEvents = Event::orderBy('tanggal', 'asc')->take(3)->get();

        return view('admin.dashboard', compact('totalBudaya', 'totalEvent', 'totalBahasa', 'latestEvents'));
    }

     public function budaya()
    {
        return view('admin.budaya');
    }

     public function event()
    {
        return view('admin.event');
    }

     public function bahasa()
    {
        return view('admin.bahasa');
    }
}

