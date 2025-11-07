<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BudayaController extends Controller
{
    public function index()
    {
        $budaya = Budaya::latest()->get();
        return view('admin.budaya', compact('budaya'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('budaya', 'public');
        }

        Budaya::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
        ]);

        return redirect()->back()->with('success', 'Data budaya berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $budaya = Budaya::findOrFail($id);
        if ($budaya->gambar) {
            Storage::disk('public')->delete($budaya->gambar);
        }
        $budaya->delete();
        return redirect()->back()->with('success', 'Data budaya berhasil dihapus!');
    }
}
