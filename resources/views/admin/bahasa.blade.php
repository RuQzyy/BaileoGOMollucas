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

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- INDONESIA INPUT + MIC -->
    <div>
      <label class="text-sm font-medium text-gray-700">Bahasa Indonesia</label>
      <div class="relative mt-1">
        <textarea id="indonesiaInputTranslate" rows="4"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500"
          placeholder="Contoh: saya makan nasi..."></textarea>

        <button id="voiceInputBtn" type="button"
          class="absolute bottom-2 right-2 bg-blue-600 text-white p-2 rounded-lg shadow hover:bg-blue-700">
          <i data-lucide="mic" class="w-4 h-4"></i>
        </button>
      </div>
    </div>

    <!-- AMBON OUTPUT + SPEAKER -->
    <div>
      <label class="text-sm font-medium text-gray-700">Hasil Terjemahan (Bahasa Ambon)</label>
      <div class="relative mt-1">
        <textarea id="ambonResultTranslate" rows="4" readonly
          class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50 text-gray-700"></textarea>

        <button id="playVoiceBtn" type="button"
          class="absolute bottom-2 right-2 bg-green-600 text-white p-2 rounded-lg shadow hover:bg-green-700">
          <i data-lucide="volume-2" class="w-4 h-4"></i>
        </button>
      </div>
    </div>

  </div>
</section>

<!-- TABEL -->
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

<!-- MODAL TAMBAH DATA -->
<div id="addModal" class="hidden fixed inset-0 bg-black/40 z-50 flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
    <h3 class="text-lg font-semibold mb-4">Tambah Kata Baru</h3>
    <form action="{{ route('admin.bahasa.store') }}" method="POST">
      @csrf
      <label class="block text-sm font-medium">Bahasa Indonesia</label>
      <input type="text" name="indonesia" class="w-full border rounded-lg px-3 py-2 mb-3" required>

      <label class="block text-sm font-medium">Bahasa Ambon</label>
      <input type="text" name="ambon" class="w-full border rounded-lg px-3 py-2 mb-4" required>

      <div class="flex justify-end space-x-2">
        <button type="button" id="closeAddModal" class="px-4 py-2 rounded-lg bg-gray-300">Batal</button>
        <button type="submit" class="px-4 py-2 rounded-lg bg-blue-600 text-white">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL EDIT DATA -->
<div id="editModal" class="hidden fixed inset-0 bg-black/40 z-50 flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
    <h3 class="text-lg font-semibold mb-4">Edit Data Bahasa</h3>
    <form id="editForm" method="POST">
      @csrf
      @method('PUT')

      <label class="block text-sm font-medium">Bahasa Indonesia</label>
      <input type="text" id="editIndonesia" name="indonesia" class="w-full border rounded-lg px-3 py-2 mb-3" required>

      <label class="block text-sm font-medium">Bahasa Ambon</label>
      <input type="text" id="editAmbon" name="ambon" class="w-full border rounded-lg px-3 py-2 mb-4" required>

      <div class="flex justify-end space-x-2">
        <button type="button" id="closeEditModal" class="px-4 py-2 rounded-lg bg-gray-300">Batal</button>
        <button type="submit" class="px-4 py-2 rounded-lg bg-green-600 text-white">Update</button>
      </div>
    </form>
  </div>
</div>

<script>
// OPEN ADD MODAL
const addBtn = document.getElementById('addBahasaBtn');
const addModal = document.getElementById('addModal');
const closeAdd = document.getElementById('closeAddModal');

addBtn.onclick = () => addModal.classList.remove('hidden');
closeAdd.onclick = () => addModal.classList.add('hidden');

// OPEN EDIT MODAL
const editButtons = document.querySelectorAll('.editBtn');
const editModal = document.getElementById('editModal');
const closeEdit = document.getElementById('closeEditModal');
const editForm = document.getElementById('editForm');

editButtons.forEach(btn => {
  btn.onclick = () => {
    const id = btn.dataset.id;
    const indonesia = btn.dataset.indonesia;
    const ambon = btn.dataset.ambon;

    document.getElementById('editIndonesia').value = indonesia;
    document.getElementById('editAmbon').value = ambon;
    editForm.action = `/admin/bahasa/${id}`;

    editModal.classList.remove('hidden');
  };
});

closeEdit.onclick = () => editModal.classList.add('hidden');
</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
lucide.createIcons();
const kamus = @json($bahasa);

// DATATABLE
$(document).ready(function () {
  const table = $('#bahasaTable').DataTable({
    pageLength: 10,
    ordering: true,
    order: [[1, 'asc']],
    columnDefs: [{ orderable: false, targets: [0, 3] }]
  });

  table.on('order.dt search.dt page.dt draw.dt', function () {
    table.column(0, { search:'applied', order:'applied', page:'current' })
      .nodes().each((cell, i) => { cell.innerHTML = i + 1; });
    lucide.createIcons();
  }).draw();
});

// TERJEMAHAN OTOMATIS
const indonesiaInput = document.getElementById('indonesiaInputTranslate');
const ambonOutput = document.getElementById('ambonResultTranslate');
let typingTimer;
const delay = 300;

function translateRealtime() {
    let text = indonesiaInput.value.toLowerCase();
    let result = text;
    kamus.forEach(item => {
        const regex = new RegExp(`\\b${item.indonesia}\\b`, 'gi');
        result = result.replace(regex, item.ambon);
    });
    ambonOutput.value = result;
}

indonesiaInput.addEventListener('input', () => {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(translateRealtime, delay);
});

// VOICE INPUT
const micBtn = document.getElementById('voiceInputBtn');
let recognition;

if ('webkitSpeechRecognition' in window) {
    recognition = new webkitSpeechRecognition();
    recognition.lang = 'id-ID';
    recognition.continuous = false;

    micBtn.onclick = () => {
        recognition.start();
        micBtn.classList.add('bg-blue-800');
    };

    recognition.onend = () => {
        micBtn.classList.remove('bg-blue-800');
    };

    recognition.onresult = (e) => {
        indonesiaInput.value += (indonesiaInput.value ? ' ' : '') + e.results[0][0].transcript;
        translateRealtime();
    };
} else {
    micBtn.onclick = () => alert('Browser tidak mendukung voice recognition');
}

// VOICE OUTPUT
const playBtn = document.getElementById('playVoiceBtn');
playBtn.onclick = () => {
    const text = ambonOutput.value;
    const speech = new SpeechSynthesisUtterance(text);
    speech.lang = 'id-ID';
    window.speechSynthesis.speak(speech);
};
</script>
@endsection
