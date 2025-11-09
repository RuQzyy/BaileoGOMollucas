@extends('layouts.admin')

@section('title', 'Manajemen Bahasa | BaileoGO Mollucas')

@section('content')
<header class="mb-6 flex justify-between items-center">
  <div class="flex items-center space-x-3">
    <button id="menuBtn" class="lg:hidden p-2 bg-white rounded-lg shadow hover:bg-gray-100">
      <i data-lucide="menu" class="w-5 h-5 text-gray-700"></i>
    </button>
    <div>
      <h2 class="text-xl lg:text-2xl font-bold text-blue-700">Manajemen Bahasa</h2>
      <p class="text-gray-600 text-xs lg:text-sm mt-1">
        Kelola kamus digital Bahasa Indonesia ↔ Bahasa Ambon 🌺
      </p>
    </div>
  </div>

  <button id="addBahasaBtn"
    class="flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm px-5 py-2.5 rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
    <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Data Bahasa
  </button>
</header>

@if(session('success'))
  <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 shadow">
    {{ session('success') }}
  </div>
@endif

@if(session('error'))
  <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 shadow">
    {{ session('error') }}
  </div>
@endif


<!-- 🧠 SIMULASI TERJEMAHAN -->
<section class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 mb-8">
  <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
    <i data-lucide="languages" class="w-5 h-5 text-blue-600 mr-2"></i>
    Simulasi Terjemahan Bahasa Indonesia ↔ Ambon
  </h3>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="text-sm font-medium text-gray-700">Bahasa Indonesia</label>
      <textarea id="indonesiaInputTranslate" rows="4"
        class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500"
        placeholder="Contoh: saya makan nasi..."></textarea>
    </div>
    <div>
      <label class="text-sm font-medium text-gray-700">Hasil Terjemahan (Bahasa Ambon)</label>
      <textarea id="ambonResultTranslate" rows="4" readonly
        class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 bg-gray-50 text-gray-700"></textarea>
    </div>
  </div>

  <div class="flex justify-end mt-4">
    <button id="translateBtn"
      class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow flex items-center gap-2">
      <i data-lucide="arrow-right" class="w-4 h-4"></i> Terjemahkan
    </button>
  </div>
</section>

<!-- 📋 TABEL DATA -->
<section class="bg-white shadow-md rounded-xl p-5 overflow-x-auto">
  <h3 class="text-lg font-semibold text-blue-700 mb-4 flex items-center">
    <i data-lucide="book-open" class="w-5 h-5 mr-2"></i>
    Daftar Kata & Terjemahan
  </h3>

  <table id="bahasaTable" class="min-w-full border border-gray-200 rounded-lg text-sm">
    <thead class="bg-blue-600 text-white text-left">
      <tr>
        <th class="px-4 py-3 w-10 text-center">No</th>
        <th class="px-4 py-3">Bahasa Indonesia</th>
        <th class="px-4 py-3">Bahasa Ambon</th>
        <th class="px-4 py-3 text-center">Aksi</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 text-gray-700">
      @foreach($bahasa as $index => $item)
      <tr class="hover:bg-gray-50 transition">
        <td class="px-4 py-2 text-center font-medium"></td>
        <td class="px-4 py-2">{{ ucfirst($item->indonesia) }}</td>
        <td class="px-4 py-2">{{ ucfirst($item->ambon) }}</td>
        <td class="px-4 py-2 text-center">
          <div class="flex justify-center space-x-2">
            <button class="editBtn text-blue-600 hover:text-blue-800 transition"
              data-id="{{ $item->id }}" data-indonesia="{{ $item->indonesia }}" data-ambon="{{ $item->ambon }}"
              title="Edit">
              <i data-lucide="edit" class="w-4 h-4"></i>
            </button>
            <form action="{{ route('admin.bahasa.destroy', $item->id) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus"
                class="text-red-500 hover:text-red-700 transition">
                <i data-lucide="trash-2" class="w-4 h-4"></i>
              </button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>

<!-- 🪟 MODAL TAMBAH -->
<div id="addModal" class="hidden fixed inset-0 bg-black/40 z-50 flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
    <h3 class="text-lg font-semibold mb-4 text-blue-700">Tambah Kata Baru</h3>
    <form action="{{ route('admin.bahasa.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="text-sm text-gray-700 font-medium">Bahasa Indonesia</label>
        <input type="text" name="indonesia" required class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="mb-3">
        <label class="text-sm text-gray-700 font-medium">Bahasa Ambon</label>
        <input type="text" name="ambon" required class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="flex justify-end space-x-2 mt-5">
        <button type="button" id="closeAddModal" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">Batal</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- 🪟 MODAL EDIT -->
<div id="editModal" class="hidden fixed inset-0 bg-black/40 z-50 flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
    <h3 class="text-lg font-semibold mb-4 text-blue-700">Edit Kata</h3>
    <form id="editForm" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label class="text-sm text-gray-700 font-medium">Bahasa Indonesia</label>
        <input type="text" id="editIndonesia" name="indonesia" required class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="mb-3">
        <label class="text-sm text-gray-700 font-medium">Bahasa Ambon</label>
        <input type="text" id="editAmbon" name="ambon" required class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="flex justify-end space-x-2 mt-5">
        <button type="button" id="closeEditModal" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">Batal</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Update</button>
      </div>
    </form>
  </div>
</div>

<!-- ✅ DataTables CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<style>
  div.dataTables_wrapper { font-size: 0.9rem; margin-top: 1rem; }
  .dataTables_filter input, .dataTables_length select {
    border: 1px solid #d1d5db; border-radius: 0.5rem; padding: 0.4rem 0.75rem;
  }
  .dataTables_paginate .paginate_button {
    background-color: white; border: 1px solid #d1d5db; border-radius: 0.375rem;
    padding: 0.3rem 0.6rem; font-size: 0.85rem; font-weight: 500;
  }
  .dataTables_paginate .paginate_button.current {
    background-color: #2563eb; color: white !important; border-color: #2563eb;
  }
</style>

<script>
lucide.createIcons();
const kamus = @json($bahasa);

$(document).ready(function () {
  const table = $('#bahasaTable').DataTable({
    pageLength: 10,
    ordering: true,
    order: [[1, 'asc']],
    language: {
      search: "", searchPlaceholder: "Cari kata...",
      lengthMenu: "Tampilkan _MENU_ data",
      info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
      paginate: { next: "›", previous: "‹" },
      zeroRecords: "Tidak ada data ditemukan"
    },
    columnDefs: [{ orderable: false, targets: [0, 3] }]
  });

  table.on('order.dt search.dt page.dt draw.dt', function () {
    table.column(0, { search:'applied', order:'applied', page:'current' })
      .nodes().each((cell, i) => { cell.innerHTML = i + 1; });
    lucide.createIcons();
  }).draw();

  // ===== Modal Tambah =====
  const addModal = document.getElementById('addModal');
  document.getElementById('addBahasaBtn').onclick = () => addModal.classList.remove('hidden');
  document.getElementById('closeAddModal').onclick = () => addModal.classList.add('hidden');

  // ===== Modal Edit (fixed event delegation) =====
  const editModal = document.getElementById('editModal');
  $(document).on('click', '.editBtn', function () {
    const id = $(this).data('id');
    const indonesia = $(this).data('indonesia');
    const ambon = $(this).data('ambon');

    $('#editIndonesia').val(indonesia);
    $('#editAmbon').val(ambon);
    $('#editForm').attr('action', `/admin/bahasa/${id}`);

    editModal.classList.remove('hidden');
  });
  $('#closeEditModal').on('click', () => editModal.classList.add('hidden'));
});

// ===== Terjemahan =====
document.getElementById('translateBtn').addEventListener('click', () => {
  const inputText = document.getElementById('indonesiaInputTranslate').value.toLowerCase();
  let outputText = inputText;
  kamus.forEach(item => {
    const regex = new RegExp(`\\b${item.indonesia}\\b`, 'gi');
    outputText = outputText.replace(regex, item.ambon);
  });
  document.getElementById('ambonResultTranslate').value = outputText;
});
</script>
@endsection
