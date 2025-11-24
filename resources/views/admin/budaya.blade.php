@extends('layouts.admin')

@section('title', 'Data Budaya | BaileoGO Mollucas')

@section('content')
<header class="mb-6 flex justify-between items-center">
  <div class="flex items-center space-x-3">
    <button id="menuBtn" class="lg:hidden p-2 bg-white rounded-lg shadow hover:bg-gray-100">
      <i data-lucide="menu" class="w-5 h-5 text-gray-700"></i>
    </button>
    <div>
      <h2 class="text-xl lg:text-2xl font-bold text-blue-700">Manajemen Budaya</h2>
      <p class="text-gray-600 text-xs lg:text-sm mt-1">
        Kelola data budaya Maluku secara lengkap dan terstruktur 🏝️
      </p>
    </div>
  </div>

  <button id="addBudayaBtn"
    class="flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
    <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Budaya
  </button>
</header>

<section class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 overflow-x-auto">
  <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
    <i data-lucide="feather" class="w-5 h-5 text-blue-600 mr-2"></i>
    Daftar Budaya
  </h3>

  <!-- FILTER KATEGORI -->
  <div class="mb-4 flex items-center space-x-3">
    <form method="GET" action="{{ route('admin.budaya') }}">
      <select name="kategori" onchange="this.form.submit()"
        class="border px-3 py-2 rounded-lg text-sm">
        <option value="">-- Semua Kategori --</option>
        <option value="Tarian Tradisional" {{ request('kategori') == 'Tarian Tradisional' ? 'selected' : '' }}>Tarian Tradisional</option>
        <option value="Rumah Adat" {{ request('kategori') == 'Rumah Adat' ? 'selected' : '' }}>Rumah Adat</option>
        <option value="Pakaian Tradisional" {{ request('kategori') == 'Pakaian Tradisional' ? 'selected' : '' }}>Pakaian Tradisional</option>
        <option value="Bangunan Tradisional" {{ request('kategori') == 'Bangunan Tradisional' ? 'selected' : '' }}>Bangunan Tradisional</option>
        <option value="Alat Musik Tradisional" {{ request('kategori') == 'Alat Musik Tradisional' ? 'selected' : '' }}>Alat Musik Tradisional</option>
        <option value="Makan Tradisional" {{ request('kategori') == 'Makan Tradisional' ? 'selected' : '' }}>Makan Tradisional</option>
        <option value="Sejarah" {{ request('kategori') == 'Sejarah' ? 'selected' : '' }}>Sejarah</option>
        <option value="Cerita Rakyat" {{ request('kategori') == 'Cerita Rakyat' ? 'selected' : '' }}>Cerita Rakyat</option>
        <option value="Wisata" {{ request('kategori') == 'Wisata' ? 'selected' : '' }}>Wisata</option>
        <option value="Tokoh" {{ request('kategori') == 'Tokoh' ? 'selected' : '' }}>Tokoh</option>
      </select>
    </form>
  </div>

  <table class="min-w-full text-sm text-left border-collapse">
    <thead>
      <tr class="bg-blue-600 text-white">
        <th class="px-4 py-2 rounded-tl-lg">No</th>
        <th class="px-4 py-2">Gambar</th>
        <th class="px-4 py-2">Nama Budaya</th>
        <th class="px-4 py-2">Kategori</th>
        <th class="px-4 py-2">Lokasi</th>
        <th class="px-4 py-2">Deskripsi</th>
        <th class="px-4 py-2">Deskripsi Singkat</th>
        <th class="px-4 py-2">Konteks</th>
        <th class="px-4 py-2">Alasan</th>
        <th class="px-4 py-2 text-center rounded-tr-lg">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($budaya as $b)
      <tr class="border-b hover:bg-blue-50 transition">
        <td class="px-4 py-3">{{ $loop->iteration }}</td>
        <td class="px-4 py-3">
          @if($b->gambar)
            <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->nama }}" class="w-16 h-16 rounded-lg object-cover border">
          @else
            <span class="text-gray-400 italic">Tidak ada</span>
          @endif
        </td>

        <td class="px-4 py-3 font-medium text-gray-800">{{ $b->nama }}</td>
        <td class="px-4 py-3">{{ $b->kategori }}</td>
        <td class="px-4 py-3">{{ $b->lokasi ?? '-' }}</td>
        <td class="px-4 py-3 text-gray-600">{{ Str::limit($b->deskripsi, 70) }}</td>
        <td class="px-4 py-3 text-gray-600">{{ Str::limit($b->deskripsi_singkat, 70) }}</td>
        <td class="px-4 py-3 text-gray-600">{{ Str::limit($b->konteks, 70) }}</td>
        <td class="px-4 py-3 text-gray-600">{{ Str::limit($b->alasan, 70) }}</td>

        <td class="px-4 py-3 text-center flex justify-center">
          <button
            class="text-blue-600 hover:text-blue-800 mx-1 editBtn"
            data-id="{{ $b->id }}"
            data-nama="{{ $b->nama }}"
            data-kategori="{{ $b->kategori }}"
            data-deskripsi="{{ $b->deskripsi }}"
            data-deskripsi_singkat="{{ $b->deskripsi_singkat }}"
            data-konteks="{{ $b->konteks }}"
            data-lokasi="{{ $b->lokasi }}"
            data-alasan="{{ $b->alasan }}"
            data-gambar="{{ $b->gambar }}"
            title="Edit">
            <i data-lucide="edit" class="w-4 h-4"></i>
          </button>

          <form action="{{ route('admin.budaya.destroy', $b->id) }}" method="POST"
            onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-800 mx-1" title="Hapus">
              <i data-lucide="trash" class="w-4 h-4"></i>
            </button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="10" class="text-center text-gray-500 py-4">Belum ada data budaya.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</section>

<!-- MODAL -->
<div id="budayaModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
  <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6 relative max-h-[90vh] overflow-y-auto">
    <button id="closeModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
      <i data-lucide="x" class="w-5 h-5"></i>
    </button>

    <h3 class="text-lg font-semibold text-blue-700 mb-4" id="modalTitle">Tambah Budaya</h3>

    <form id="budayaForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.budaya.store') }}" class="space-y-4">
      @csrf
      <input type="hidden" id="budayaId" name="id">
      <input type="hidden" id="methodField" name="_method" value="POST">

      <div>
        <label class="block text-sm font-medium text-gray-700">Nama Budaya</label>
        <input type="text" id="nama" name="nama" class="w-full mt-1 border rounded-lg px-3 py-2" required>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Kategori</label>
        <select id="kategori" name="kategori" class="w-full mt-1 border rounded-lg px-3 py-2" required>
          <option value="">-- Pilih Kategori --</option>
          <option value="Tarian Tradisional">Tarian Tradisional</option>
          <option value="Rumah Adat">Rumah Adat</option>
          <option value="Pakaian Tradisional">Pakaian Tradisional</option>
          <option value="Bangunan Tradisional">Bangunan Tradisional</option>
          <option value="Alat Musik Tradisional">Alat Musik Tradisional</option>
          <option value="Makan Tradisional">Makan Tradisional</option>
          <option value="Sejarah">Sejarah</option>
          <option value="Cerita Rakyat">Cerita Rakyat</option>
          <option value="Wisata">Wisata</option>
          <option value="Tokoh">Tokoh</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Lokasi</label>
        <input type="text" id="lokasi" name="lokasi" class="w-full mt-1 border rounded-lg px-3 py-2" placeholder="Ambon, Banda Neira">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="3" class="w-full mt-1 border rounded-lg px-3 py-2"></textarea>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
        <input type="text" id="deskripsiSingkat" name="deskripsi_singkat" class="w-full mt-1 border rounded-lg px-3 py-2" maxlength="255" placeholder="Ringkasan singkat (maks 255 karakter)">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Konteks Budaya</label>
        <textarea id="konteks" name="konteks" rows="3" class="w-full mt-1 border rounded-lg px-3 py-2"></textarea>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Alasan</label>
        <textarea id="alasan" name="alasan" rows="3" class="w-full mt-1 border rounded-lg px-3 py-2" placeholder="Alasan disini hanya untuk kategori wisata"></textarea>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Gambar Budaya</label>
        <input type="file" id="gambar" name="gambar" accept="image/*" class="w-full mt-1 border rounded-lg px-3 py-2">
        <img id="previewGambar" class="mt-3 w-32 h-32 object-cover rounded-lg hidden border">
      </div>

      <div class="flex justify-end space-x-3 mt-6">
        <button type="button" id="cancelBtn" class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg">Batal</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
      </div>
    </form>
  </div>
</div>

<script>
  lucide.createIcons();
  const modal = document.getElementById('budayaModal');
  const addBtn = document.getElementById('addBudayaBtn');
  const closeModal = document.getElementById('closeModal');
  const cancelBtn = document.getElementById('cancelBtn');
  const modalTitle = document.getElementById('modalTitle');
  const form = document.getElementById('budayaForm');
  const previewGambar = document.getElementById('previewGambar');
  const gambarInput = document.getElementById('gambar');
  const methodField = document.getElementById('methodField');
  const editButtons = document.querySelectorAll('.editBtn');

  addBtn.addEventListener('click', () => {
    modalTitle.textContent = 'Tambah Budaya';
    form.action = "{{ route('admin.budaya.store') }}";
    methodField.value = "POST";
    form.reset();
    previewGambar.classList.add('hidden');
    document.getElementById('deskripsiSingkat').value = "";
    document.getElementById('alasan').value = "";
    modal.classList.remove('hidden');
  });

  editButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      modalTitle.textContent = 'Edit Budaya';
      form.action = "/admin/budaya/" + btn.dataset.id;
      methodField.value = "PUT";

      document.getElementById('budayaId').value = btn.dataset.id;
      document.getElementById('nama').value = btn.dataset.nama || '';
      document.getElementById('kategori').value = btn.dataset.kategori || '';
      document.getElementById('lokasi').value = btn.dataset.lokasi ?? '';
      document.getElementById('deskripsi').value = btn.dataset.deskripsi ?? '';
      document.getElementById('deskripsiSingkat').value = btn.dataset.deskripsi_singkat ?? '';
      document.getElementById('konteks').value = btn.dataset.konteks ?? '';
      document.getElementById('alasan').value = btn.dataset.alasan ?? '';

      if (btn.dataset.gambar) {
        previewGambar.src = "/storage/" + btn.dataset.gambar;
        previewGambar.classList.remove('hidden');
      } else {
        previewGambar.classList.add('hidden');
      }

      modal.classList.remove('hidden');
    });
  });

  closeModal.addEventListener('click', () => modal.classList.add('hidden'));
  cancelBtn.addEventListener('click', () => modal.classList.add('hidden'));

  gambarInput.addEventListener('change', e => {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = event => {
        previewGambar.src = event.target.result;
        previewGambar.classList.remove('hidden');
      };
      reader.readAsDataURL(file);
    }
  });
</script>
@endsection
