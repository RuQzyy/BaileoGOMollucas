<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BudayaController extends Controller
{
    public function index(Request $request)
    {
        $budaya = Budaya::when($request->kategori, function ($query) use ($request) {
                return $query->where('kategori', $request->kategori);
            })
            ->latest()
            ->get();

        return view('admin.budaya', compact('budaya'));
    }

   public function store(Request $request)
{
    $request->validate([
        'nama'              => 'required|string|max:255',
        'kategori'          => 'required|string|max:255',
        'lokasi'            => 'nullable|string|max:255',
        'deskripsi'         => 'nullable|string',
        'deskripsi_singkat' => 'nullable|string|max:255',
        'konteks'           => 'nullable|string',
        'alasan'            => 'nullable|string',
        'gambar'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $path = null;
    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('budaya', 'public');
    }

    Budaya::create([
        'nama'              => $request->nama,
        'kategori'          => $request->kategori,
        'lokasi'            => $request->lokasi,
        'deskripsi'         => $request->deskripsi,
        'deskripsi_singkat' => $request->deskripsi_singkat,
        'konteks'           => $request->konteks,
        'alasan'            => $request->alasan,
        'gambar'            => $path,
    ]);

    return redirect()->back()->with('success', 'Data budaya berhasil ditambahkan!');
}


public function update(Request $request, $id)
{
    $budaya = Budaya::findOrFail($id);

    $request->validate([
        'nama'              => 'required|string|max:255',
        'kategori'          => 'required|string|max:255',
        'lokasi'            => 'nullable|string|max:255',
        'deskripsi'         => 'nullable|string',
        'deskripsi_singkat' => 'nullable|string|max:255',
        'konteks'           => 'nullable|string',
        'alasan'            => 'nullable|string',
        'gambar'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = [
        'nama'              => $request->nama,
        'kategori'          => $request->kategori,
        'lokasi'            => $request->lokasi,
        'deskripsi'         => $request->deskripsi,
        'deskripsi_singkat' => $request->deskripsi_singkat,
        'konteks'           => $request->konteks,
        'alasan'            => $request->alasan,
    ];

    if ($request->hasFile('gambar')) {
        if ($budaya->gambar && Storage::disk('public')->exists($budaya->gambar)) {
            Storage::disk('public')->delete($budaya->gambar);
        }
        $data['gambar'] = $request->file('gambar')->store('budaya', 'public');
    }

    $budaya->update($data);

    return redirect()->back()->with('success', 'Data budaya berhasil diperbarui!');
}

    public function destroy($id)
    {
        $budaya = Budaya::findOrFail($id);

        if ($budaya->gambar && Storage::disk('public')->exists($budaya->gambar)) {
            Storage::disk('public')->delete($budaya->gambar);
        }

        $budaya->delete();

        return redirect()->back()->with('success', 'Data budaya berhasil dihapus!');
    }

  public function show($id)
{
    // Ambil budaya utama
    $budaya = Budaya::findOrFail($id);

    // Ambil budaya lain (kategori berbeda, random, max 4)
    $budayaLain = Budaya::where('id', '!=', $id)
        ->where('kategori', '!=', $budaya->kategori)
        ->inRandomOrder()
        ->take(4)
        ->get();

    // Ambil 3 budaya random lain (bebas kategori, tapi tidak sama dengan yang utama)
    $budayaRandom = Budaya::where('id', '!=', $id)
        ->inRandomOrder()
        ->take(3)
        ->get();

    return view('pengguna.desc', compact('budaya', 'budayaLain', 'budayaRandom'));
}

public function wisata($id)
{
    // Ambil budaya wisata utama
    $budaya = Budaya::where('id', $id)
        ->where('kategori', 'Wisata')
        ->firstOrFail();

    // Ambil wisata lain (kategori Wisata, tapi bukan yang sedang dilihat)
    $wisataLain = Budaya::where('kategori', 'Wisata')
        ->where('id', '!=', $id)
        ->inRandomOrder()
        ->take(4)
        ->get();

    // Ambil 3 budaya kategori bebas (opsional sebagai rekomendasi tambahan)
    $budayaRandom = Budaya::where('id', '!=', $id)
        ->inRandomOrder()
        ->take(3)
        ->get();

    return view('pengguna.wisata', compact('budaya', 'wisataLain', 'budayaRandom'));
}



public function filter(Request $request)
{
    $kategori = $request->kategori;

    if ($kategori == 'semua') {
        // Batasi 21 data saja
        $data = Budaya::latest()->limit(21)->get();
    } else {
        $data = Budaya::where('kategori', $kategori)->latest()->get();
    }

    return response()->json($data);
}



}
