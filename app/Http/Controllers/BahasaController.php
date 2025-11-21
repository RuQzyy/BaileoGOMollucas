<?php

namespace App\Http\Controllers;

use App\Models\Bahasa;
use Illuminate\Http\Request;

class BahasaController extends Controller
{
    public function index()
    {
        $bahasa = Bahasa::latest()->get();
        return view('admin.bahasa', compact('bahasa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'indonesia' => 'required|string|max:255',
            'ambon' => 'required|string|max:255',
        ]);

        $indonesia = strtolower(trim($request->indonesia));
        $ambon = strtolower(trim($request->ambon));

        // 🔍 Cek apakah kata Indonesia sudah ada
        $existsIndonesia = Bahasa::where('indonesia', $indonesia)->exists();

        // 🔍 Cek apakah kata Ambon sudah ada
        $existsAmbon = Bahasa::where('ambon', $ambon)->exists();

        // ❌ Jika dua-duanya sudah ada, tolak input
        if ($existsIndonesia && $existsAmbon) {
            return redirect()->back()->with('error', 'Kata dengan pasangan bahasa Indonesia dan Ambon ini sudah ada dalam database!');
        }

        // ✅ Jika salah satu belum ada, tetap boleh input
        Bahasa::create([
            'indonesia' => $indonesia,
            'ambon' => $ambon,
        ]);

        return redirect()->back()->with('success', 'Kata berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $bahasa = Bahasa::findOrFail($id);

        $request->validate([
            'indonesia' => 'required|string|max:255',
            'ambon' => 'required|string|max:255',
        ]);

        $indonesia = strtolower(trim($request->indonesia));
        $ambon = strtolower(trim($request->ambon));

        // 🔍 Cek apakah kata Indonesia sudah ada (selain data ini)
        $existsIndonesia = Bahasa::where('indonesia', $indonesia)
            ->where('id', '!=', $id)
            ->exists();

        // 🔍 Cek apakah kata Ambon sudah ada (selain data ini)
        $existsAmbon = Bahasa::where('ambon', $ambon)
            ->where('id', '!=', $id)
            ->exists();

        // ❌ Jika dua-duanya sudah ada, tolak update
        if ($existsIndonesia && $existsAmbon) {
            return redirect()->back()->with('error', 'Kata dengan pasangan bahasa Indonesia dan Ambon ini sudah ada dalam database!');
        }

        // ✅ Jika salah satu belum ada, izinkan update
        $bahasa->update([
            'indonesia' => $indonesia,
            'ambon' => $ambon,
        ]);

        return redirect()->back()->with('success', 'Kata berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Bahasa::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Kata berhasil dihapus!');
    }
}
