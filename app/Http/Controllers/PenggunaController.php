<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\Bahasa;
use App\Models\Test;
use App\Models\Quiz;
use App\Models\Budaya;




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
    // Tetap: data budaya lama tidak diubah
    $budaya = Budaya::latest()->get();

    // Tetap: daftar kategori
    $kategori = Budaya::select('kategori')->distinct()->get();

    // Baru: hanya budaya kategori Wisata
    $budayaWisata = Budaya::where('kategori', 'Wisata')->latest()->get();

    return view('pengguna.budaya', compact('budaya', 'kategori', 'budayaWisata'));
}


    // Halaman budaya
  public function test()
{
    // -----------------------
    // EVENT LOGIC (PUNYAMU)
    // -----------------------
    $today = now()->toDateString();

    $upcoming = Event::whereDate('tanggal', '>=', $today)
        ->orderBy('tanggal', 'asc')
        ->get();

    $bigStory = $upcoming->first();

    $smallStories = collect();

    if ($upcoming->count() > 1) {
        $smallStories = $upcoming->slice(1)->take(3);
    }

    if ($smallStories->count() < 3) {
        $past = Event::whereDate('tanggal', '<', $today)
            ->orderBy('tanggal', 'desc')
            ->take(3 - $smallStories->count())
            ->get();

        $smallStories = $smallStories->concat($past);
    }

    // -----------------------
    // BUDAYA — DATA UNTUK CAROUSEL
    // -----------------------

 $budayaCarousel = Budaya::where('kategori', 'Tarian Tradisional')
    ->whereIn('nama', ['Katreji', 'Kidabela', 'Lenso', 'Cakalele'])
    ->orderByRaw("FIELD(nama, 'Katreji', 'Kidabela', 'Lenso', 'Cakalele')")
    ->get();

$budayaThumbnail = Budaya::where('kategori', 'Tarian Tradisional')
    ->whereIn('nama', ['Katreji', 'Kidabela', 'Lenso', 'Cakalele'])
    ->orderByRaw("FIELD(nama, 'Katreji', 'Kidabela', 'Lenso', 'Cakalele')")
    ->get();

     $randomBudaya = Budaya::inRandomOrder()->take(4)->get();

     $randomSlider = Budaya::inRandomOrder()->take(12)->get();



    return view('pengguna.test', compact(
        'bigStory',
        'smallStories',
        'budayaCarousel',
        'budayaThumbnail',
        'randomBudaya',
        'randomSlider'
    ));
}



    // Halaman budaya
    public function isiBudaya()
    {
        return view('pengguna.isiBudaya');
    }

    // Halaman budaya
public function agendaBudaya($id)
{
    $event = Event::findOrFail($id);

    $otherEvents = Event::where('id', '!=', $id)
        ->orderBy('tanggal', 'DESC')
        ->take(3)
        ->get();

    return view('pengguna.agendaBudaya', compact('event', 'otherEvents'));
}



    // Halaman budaya
    public function chatBot()
    {
        return view('pengguna.chatBot');
    }
    // Halaman budaya
   public function soalQuiz()
{
    // Ambil 20 soal acak (jika soal < 20, ambil semuanya)
    $quizzes = Quiz::inRandomOrder()->limit(20)->get();

    return view('pengguna.soalQuiz', compact('quizzes'));
}


public function getQuizData()
{
    $quiz = Quiz::orderBy('id', 'ASC')->get();

    $quiz->transform(function ($q) {
        $q->media_url = $q->media_url ? asset($q->media_url) : null;
        return $q;
    });

    return response()->json($quiz);
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
    public function audio()
    {
        return view('pengguna.audio');
    }

}
