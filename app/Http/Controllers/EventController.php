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
            'deskripsi' => 'nullable|string',
            'deskripsi_singkat' => 'nullable|string|max:255', // ✅ tambahkan validasi baru
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('events', 'public');
        }

        Event::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deskripsi_singkat' => $request->deskripsi_singkat, // ✅ simpan ke DB
            'tanggal' => $request->tanggal,
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
            'deskripsi' => 'nullable|string',
            'deskripsi_singkat' => 'nullable|string|max:255', // ✅ validasi tambahan
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika ada gambar baru, hapus yang lama
        if ($request->hasFile('gambar')) {
            if ($event->gambar) {
                Storage::disk('public')->delete($event->gambar);
            }
            $event->gambar = $request->file('gambar')->store('events', 'public');
        }

        $event->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deskripsi_singkat' => $request->deskripsi_singkat, // ✅ update field baru
            'tanggal' => $request->tanggal,
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
