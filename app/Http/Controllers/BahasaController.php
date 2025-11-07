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

        Bahasa::create([
            'indonesia' => strtolower(trim($request->indonesia)),
            'ambon' => strtolower(trim($request->ambon)),
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

        $bahasa->update([
            'indonesia' => strtolower(trim($request->indonesia)),
            'ambon' => strtolower(trim($request->ambon)),
        ]);

        return redirect()->back()->with('success', 'Kata berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Bahasa::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Kata berhasil dihapus!');
    }
}
