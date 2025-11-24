@extends('layouts.admin')

@section('title', 'Manajemen Event | BaileoGO Mollucas')

@section('content')
<header class="mb-6 flex justify-between items-center">
  <div class="flex items-center space-x-3">
    <button id="menuBtn" class="lg:hidden p-2 bg-white rounded-lg shadow hover:bg-gray-100">
      <i data-lucide="menu" class="w-5 h-5 text-gray-700"></i>
    </button>
    <div>
      <h2 class="text-xl lg:text-2xl font-bold text-blue-700">Manajemen Event</h2>
      <p class="text-gray-600 text-xs lg:text-sm mt-1">
        Kelola daftar event budaya dan kegiatan pelestarian di Maluku 🎉
      </p>
    </div>
  </div>

  <button id="addEventBtn" class="flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
    <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Event
  </button>
</header>

@if (session('success'))
  <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
    {{ session('success') }}
  </div>
@endif

<!-- 📋 Tabel Data Event -->
<section class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 overflow-x-auto">
  <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
    <i data-lucide="calendar-days" class="w-5 h-5 text-blue-600 mr-2"></i>
    Daftar Event Budaya
  </h3>

  <table class="min-w-full text-sm text-left border-collapse">
    <thead>
      <tr class="bg-blue-600 text-white">
        <th class="px-4 py-2 rounded-tl-lg">No</th>
        <th class="px-4 py-2">Gambar</th>
        <th class="px-4 py-2">Judul</th>
        <th class="px-4 py-2">Sub Judul</th>
        <th class="px-4 py-2">Deskripsi Singkat</th>
        <th class="px-4 py-2">Tanggal Mulai</th>
        <th class="px-4 py-2">Tanggal Berakhir</th>
        <th class="px-4 py-2">Lokasi</th>
        <th class="px-4 py-2 text-center rounded-tr-lg">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($events as $index => $event)
      <tr class="border-b hover:bg-blue-50 transition">
        <td class="px-4 py-3">{{ $index + 1 }}</td>

        <td class="px-4 py-3">
          @if ($event->gambar)
            <img src="{{ asset('storage/' . $event->gambar) }}" class="w-16 h-16 object-cover rounded-lg border">
          @else
            <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400">
              <i data-lucide="image" class="w-6 h-6"></i>
            </div>
          @endif
        </td>

        <td class="px-4 py-3 font-medium text-gray-800">{{ $event->judul }}</td>
        <td class="px-4 py-3 font-medium text-gray-800">{{ $event->sub_judul }}</td>
        <td class="px-4 py-3 text-gray-600">{{ $event->deskripsi_singkat }}</td>

        <td class="px-4 py-3">{{ $event->tanggal }}</td>

        <td class="px-4 py-3">
          @if ($event->tanggal_berakhir)
            {{ $event->tanggal_berakhir }}
          @else
            <span class="text-gray-400 italic">Satu Hari</span>
          @endif
        </td>

        <td class="px-4 py-3">{{ $event->lokasi }}</td>

        <td class="px-4 py-3 text-center">
          <button
            class="text-blue-600 hover:text-blue-800 mx-1 editEventBtn"
            data-id="{{ $event->id }}"
            data-judul="{{ $event->judul }}"
            data-sub_judul="{{ $event->sub_judul }}"
            data-deskripsi="{{ $event->deskripsi }}"
            data-deskripsi-singkat="{{ $event->deskripsi_singkat }}"
            data-tanggal="{{ $event->tanggal }}"
            data-tanggal-berakhir="{{ $event->tanggal_berakhir }}"
            data-lokasi="{{ $event->lokasi }}">
            <i data-lucide="edit" class="w-4 h-4"></i>
          </button>

          <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Yakin ingin menghapus event ini?')" class="text-red-600 hover:text-red-800 mx-1">
              <i data-lucide="trash" class="w-4 h-4"></i>
            </button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="9" class="text-center py-4 text-gray-500">Belum ada event terdaftar.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</section>

<!-- 🧩 Modal Tambah/Edit Event -->
<div id="eventModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
  <div class="bg-white max-h-[90vh] overflow-y-auto w-full max-w-lg rounded-xl shadow-lg p-6 relative">
    <button id="closeEventModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
      <i data-lucide="x" class="w-5 h-5"></i>
    </button>

    <h3 class="text-lg font-semibold text-blue-700 mb-4" id="eventModalTitle">Tambah Event</h3>

    <form id="eventForm" action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <div id="methodField"></div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Judul Event</label>
        <input type="text" name="judul" id="judul" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Sub Judul</label>
        <input type="text" name="sub_judul" id="sub_judul" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
        <input type="text" name="deskripsi_singkat" id="deskripsi_singkat" maxlength="255" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Deskripsi Lengkap</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2"></textarea>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
        <input type="date" name="tanggal" id="tanggal" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Tanggal Berakhir (Opsional)</label>
        <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Lokasi</label>
        <input type="text" name="lokasi" id="lokasi" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Gambar</label>
        <input type="file" name="gambar" accept="image/*" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2">
      </div>

      <div class="flex justify-end space-x-3 mt-6">
        <button type="button" id="cancelEventBtn" class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Batal</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Simpan</button>
      </div>
    </form>
  </div>
</div>

<script>
  lucide.createIcons();

  const eventModal = document.getElementById('eventModal');
  const addEventBtn = document.getElementById('addEventBtn');
  const closeEventModal = document.getElementById('closeEventModal');
  const cancelEventBtn = document.getElementById('cancelEventBtn');
  const eventForm = document.getElementById('eventForm');
  const eventModalTitle = document.getElementById('eventModalTitle');
  const methodField = document.getElementById('methodField');

  addEventBtn.addEventListener('click', () => {
    eventModalTitle.textContent = 'Tambah Event';
    eventForm.action = "{{ route('admin.event.store') }}";
    methodField.innerHTML = '';
    eventForm.reset();
    eventModal.classList.remove('hidden');
  });

  document.querySelectorAll('.editEventBtn').forEach(btn => {
    btn.addEventListener('click', () => {
      eventModalTitle.textContent = 'Edit Event';
      eventForm.action = "/admin/event/" + btn.dataset.id;
      methodField.innerHTML = '@method("PUT")';

      document.getElementById('judul').value = btn.dataset.judul;
      document.getElementById('sub_judul').value = btn.dataset.sub_judul;
      document.getElementById('deskripsi').value = btn.dataset.deskripsi;
      document.getElementById('deskripsi_singkat').value = btn.dataset.deskripsiSingkat;
      document.getElementById('tanggal').value = btn.dataset.tanggal;
      document.getElementById('tanggal_berakhir').value = btn.dataset.tanggalBerakhir ?? '';
      document.getElementById('lokasi').value = btn.dataset.lokasi;

      eventModal.classList.remove('hidden');
    });
  });

  [closeEventModal, cancelEventBtn].forEach(el =>
    el.addEventListener('click', () => eventModal.classList.add('hidden'))
  );
</script>
@endsection
