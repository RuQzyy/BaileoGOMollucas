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

        // ✅ Cek hanya berdasarkan kolom 'indonesia'
        $exists = Bahasa::where('indonesia', $indonesia)->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Kata bahasa Indonesia sudah ada dalam database!');
        }

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

        // ✅ Cegah duplikasi 'indonesia' saja, bukan 'ambon'
        $exists = Bahasa::where('indonesia', $indonesia)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Kata bahasa Indonesia sudah ada dalam database!');
        }

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
