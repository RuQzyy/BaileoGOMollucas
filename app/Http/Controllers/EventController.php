<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // 🧭 Tampilkan daftar event
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.event', compact('events'));
    }

    // ➕ Simpan event baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deskripsi_singkat' => 'nullable|string|max:255',
            'tanggal' => 'required|date', // tanggal mulai
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('events', 'public');
        }

        Event::create([
            'judul' => $request->judul,
            'sub_judul' => $request->sub_judul,
            'deskripsi' => $request->deskripsi,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'tanggal' => $request->tanggal,              // mulai
            'tanggal_berakhir' => $request->tanggal_berakhir,  // boleh null
            'lokasi' => $request->lokasi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->back()->with('success', 'Event berhasil ditambahkan!');
    }

    // ✏️ Update event (edit)
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'deskripsi_singkat' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'tanggal_berakhir' => 'nullable|date|after_or_equal:tanggal',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika ada gambar baru → hapus yang lama
        if ($request->hasFile('gambar')) {
            if ($event->gambar) {
                Storage::disk('public')->delete($event->gambar);
            }
            $event->gambar = $request->file('gambar')->store('events', 'public');
        }

        $event->update([
            'judul' => $request->judul,
            'sub_judul' => $request->sub_judul,
            'deskripsi' => $request->deskripsi,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'tanggal' => $request->tanggal,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'lokasi' => $request->lokasi,
            'gambar' => $event->gambar,
        ]);

        return redirect()->back()->with('success', 'Event berhasil diperbarui!');
    }

    // 🗑️ Hapus event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->gambar) {
            Storage::disk('public')->delete($event->gambar);
        }

        $event->delete();

        return redirect()->back()->with('success', 'Event berhasil dihapus!');
    }
}
