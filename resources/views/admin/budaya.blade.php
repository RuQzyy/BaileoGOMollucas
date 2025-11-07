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

  <button id="addBudayaBtn" class="flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
    <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Budaya
  </button>
</header>

<!-- 📋 Tabel Data Budaya -->
<section class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 overflow-x-auto">
  <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
    <i data-lucide="feather" class="w-5 h-5 text-blue-600 mr-2"></i>
    Daftar Budaya
  </h3>

  <table class="min-w-full text-sm text-left border-collapse">
    <thead>
      <tr class="bg-blue-600 text-white">
        <th class="px-4 py-2 rounded-tl-lg">No</th>
        <th class="px-4 py-2">Gambar</th>
        <th class="px-4 py-2">Nama Budaya</th>
        <th class="px-4 py-2">Kategori</th>
        <th class="px-4 py-2">Deskripsi</th>
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
        <td class="px-4 py-3 text-gray-600">{{ Str::limit($b->deskripsi, 80) }}</td>
        <td class="px-4 py-3 text-center flex justify-center">
          <button
            class="text-blue-600 hover:text-blue-800 mx-1 editBtn"
            data-id="{{ $b->id }}"
            data-nama="{{ $b->nama }}"
            data-kategori="{{ $b->kategori }}"
            data-deskripsi="{{ $b->deskripsi }}"
            data-gambar="{{ $b->gambar }}"
            title="Edit"
          >
            <i data-lucide="edit" class="w-4 h-4"></i>
          </button>

          <form action="{{ route('admin.budaya.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline">
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
        <td colspan="6" class="text-center text-gray-500 py-4">Belum ada data budaya.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</section>

<!-- 🧩 Modal Tambah/Edit Budaya -->
<div id="budayaModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
  <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6 relative">
    <button id="closeModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
      <i data-lucide="x" class="w-5 h-5"></i>
    </button>

    <h3 class="text-lg font-semibold text-blue-700 mb-4" id="modalTitle">Tambah Budaya</h3>

    <form id="budayaForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.budaya.store') }}" class="space-y-4">
      @csrf
      <input type="hidden" id="budayaId" name="id">

      <div>
        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Budaya</label>
        <input type="text" id="nama" name="nama" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
      </div>

      <div>
        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
        <select id="kategori" name="kategori" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          <option value="">-- Pilih Kategori --</option>
          <option value="Tarian Tradisional">Tarian Tradisional</option>
          <option value="Upacara Adat">Upacara Adat</option>
          <option value="Musik Tradisional">Musik Tradisional</option>
          <option value="Kesenian">Kesenian</option>
          <option value="Tradisi Lisan">Tradisi Lisan</option>
          <option value="Tradisi Lisan">Rumah Adat</option>
          <option value="Tradisi Lisan">Makanan Tradisional</option>
        </select>
      </div>

      <div>
        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Tuliskan deskripsi singkat budaya..."></textarea>
      </div>

      <div>
        <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Budaya</label>
        <input type="file" id="gambar" name="gambar" accept="image/*" class="w-full mt-1 text-sm border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        <img id="previewGambar" class="mt-3 w-32 h-32 object-cover rounded-lg hidden border">
      </div>

      <div class="flex justify-end space-x-3 mt-6">
        <button type="button" id="cancelBtn" class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Batal</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Simpan</button>
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
  const gambarInput = document.getElementById('gambar');
  const previewGambar = document.getElementById('previewGambar');
  const editButtons = document.querySelectorAll('.editBtn');
  const form = document.getElementById('budayaForm');

  // ✅ Tambah Data
  addBtn.addEventListener('click', () => {
    modalTitle.textContent = 'Tambah Budaya';
    form.action = "{{ route('admin.budaya.store') }}";
    form.reset();
    previewGambar.classList.add('hidden');
    modal.classList.remove('hidden');
  });

  // 📝 Edit Data
  editButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      modalTitle.textContent = 'Edit Budaya';
      form.action = "/admin/budaya/" + btn.dataset.id;
      document.getElementById('budayaId').value = btn.dataset.id;
      document.getElementById('nama').value = btn.dataset.nama;
      document.getElementById('kategori').value = btn.dataset.kategori;
      document.getElementById('deskripsi').value = btn.dataset.deskripsi;
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

  // 🖼️ Preview gambar sebelum upload
  gambarInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = (event) => {
        previewGambar.src = event.target.result;
        previewGambar.classList.remove('hidden');
      };
      reader.readAsDataURL(file);
    }
  });
</script>
@endsection
