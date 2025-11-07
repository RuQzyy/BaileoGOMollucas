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

  <button id="addBahasaBtn" class="flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg shadow transition">
    <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Data Bahasa
  </button>
</header>

<!-- Alert -->
@if(session('success'))
  <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 shadow">
    {{ session('success') }}
  </div>
@endif

<!-- 📋 Tabel Data Bahasa -->
<section class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 overflow-x-auto mb-8">
  <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
    <i data-lucide="book-open" class="w-5 h-5 text-blue-600 mr-2"></i>
    Daftar Kata & Terjemahan
  </h3>

  <table class="min-w-full text-sm text-left border-collapse">
    <thead>
      <tr class="bg-blue-600 text-white">
        <th class="px-4 py-2 rounded-tl-lg">No</th>
        <th class="px-4 py-2">Bahasa Indonesia</th>
        <th class="px-4 py-2">Bahasa Ambon</th>
        <th class="px-4 py-2 text-center rounded-tr-lg">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($bahasa as $index => $item)
      <tr class="border-b hover:bg-blue-50 transition">
        <td class="px-4 py-3">{{ $index + 1 }}</td>
        <td class="px-4 py-3 font-medium text-gray-800">{{ ucfirst($item->indonesia) }}</td>
        <td class="px-4 py-3 text-gray-700">{{ ucfirst($item->ambon) }}</td>
        <td class="px-4 py-3 text-center flex justify-center">
          <!-- Edit -->
          <button
            class="text-blue-600 hover:text-blue-800 mx-1 editBtn"
            data-id="{{ $item->id }}"
            data-indonesia="{{ $item->indonesia }}"
            data-ambon="{{ $item->ambon }}">
            <i data-lucide="edit" class="w-4 h-4"></i>
          </button>
          <!-- Delete -->
          <form action="{{ route('admin.bahasa.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kata ini?')">
            @csrf
            @method('DELETE')
            <button class="text-red-600 hover:text-red-800 mx-1">
              <i data-lucide="trash" class="w-4 h-4"></i>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>

<!-- 🌐 Simulasi "Google Translate Ambon" -->
<section class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
  <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
    <i data-lucide="languages" class="w-5 h-5 text-blue-600 mr-2"></i>
    Simulasi Terjemahan Bahasa Indonesia ↔ Ambon
  </h3>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="text-sm font-medium text-gray-700">Bahasa Indonesia</label>
      <textarea id="indonesiaInputTranslate" rows="4" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" placeholder="Contoh: saya makan nasi..."></textarea>
    </div>

    <div>
      <label class="text-sm font-medium text-gray-700">Hasil Terjemahan (Bahasa Ambon)</label>
      <textarea id="ambonResultTranslate" rows="4" readonly class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 bg-gray-50 text-gray-700"></textarea>
    </div>
  </div>

  <div class="flex justify-end mt-4">
    <button id="translateBtn" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
      <i data-lucide="arrow-right" class="w-4 h-4 inline-block mr-1"></i> Terjemahkan
    </button>
  </div>
</section>

<!-- 🧩 Modal Tambah/Edit Bahasa -->
<div id="bahasaModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
  <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6 relative">
    <button id="closeBahasaModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
      <i data-lucide="x" class="w-5 h-5"></i>
    </button>

    <h3 class="text-lg font-semibold text-blue-700 mb-4" id="bahasaModalTitle">Tambah Data Bahasa</h3>

    <form id="bahasaForm" method="POST">
      @csrf
      <div id="methodField"></div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Bahasa Indonesia</label>
        <input type="text" id="indonesiaInput" name="indonesia" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" required>
      </div>

      <div class="mt-3">
        <label class="block text-sm font-medium text-gray-700">Bahasa Ambon</label>
        <input type="text" id="ambonInput" name="ambon" class="w-full mt-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500" required>
      </div>

      <div class="flex justify-end space-x-3 mt-6">
        <button type="button" id="cancelBahasaBtn" class="px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200">Batal</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Simpan</button>
      </div>
    </form>
  </div>
</div>

<script>
lucide.createIcons();

// Data kamus dari database (Blade ke JS)
const kamus = @json($bahasa);

// ===== Modal =====
const bahasaModal = document.getElementById('bahasaModal');
const bahasaForm = document.getElementById('bahasaForm');
const methodField = document.getElementById('methodField');
const addBtn = document.getElementById('addBahasaBtn');
const closeBtn = document.getElementById('closeBahasaModal');
const cancelBtn = document.getElementById('cancelBahasaBtn');
const title = document.getElementById('bahasaModalTitle');

addBtn.addEventListener('click', () => {
  bahasaForm.action = "{{ route('admin.bahasa.store') }}";
  methodField.innerHTML = '';
  title.textContent = 'Tambah Data Bahasa';
  bahasaForm.reset();
  bahasaModal.classList.remove('hidden');
});

closeBtn.addEventListener('click', () => bahasaModal.classList.add('hidden'));
cancelBtn.addEventListener('click', () => bahasaModal.classList.add('hidden'));

document.querySelectorAll('.editBtn').forEach(btn => {
  btn.addEventListener('click', () => {
    const id = btn.dataset.id;
    bahasaForm.action = `/admin/bahasa/${id}/update`;
    methodField.innerHTML = '@csrf';
    title.textContent = 'Edit Data Bahasa';
    document.getElementById('indonesiaInput').value = btn.dataset.indonesia;
    document.getElementById('ambonInput').value = btn.dataset.ambon;
    bahasaModal.classList.remove('hidden');
  });
});

// ===== Simulasi Google Translate Ambon =====
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
