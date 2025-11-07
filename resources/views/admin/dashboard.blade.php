@extends('layouts.admin')

@section('title', 'Dashboard Admin | BaileoGO Mollucas')

@section('content')
<header class="mb-6 flex justify-between items-center">
  <div class="flex items-center space-x-3">
    <button id="menuBtn" class="lg:hidden p-2 bg-white rounded-lg shadow hover:bg-gray-100">
      <i data-lucide="menu" class="w-5 h-5 text-gray-700"></i>
    </button>
    <div>
      <h2 class="text-xl lg:text-2xl font-bold">
        Selamat Datang di <span class="text-blue-700">BaileoGO Mollucas</span>
      </h2>
      <p class="text-gray-600 text-xs lg:text-sm mt-1">
        Menjaga dan melestarikan budaya Maluku untuk generasi masa depan 🌊🏝️
      </p>
    </div>
  </div>

  <div class="flex items-center space-x-3">
    <button class="p-2 bg-white rounded-full shadow hover:bg-gray-100">
      <i data-lucide="bell" class="w-5 h-5 text-gray-600"></i>
    </button>
    <div class="flex items-center bg-white rounded-full shadow px-3 py-1.5">
      <i data-lucide="user" class="w-4 h-4 text-gray-500 mr-2"></i>
      <span class="text-sm font-medium">Admin</span>
    </div>
  </div>
</header>

<!-- Statistik -->
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
  <div class="bg-white p-4 lg:p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
    <div class="flex justify-between items-center">
      <div>
        <p class="text-sm text-gray-500">Total Budaya</p>
        <h3 class="text-2xl font-bold text-blue-700 mt-1">{{ $totalBudaya }}</h3>
      </div>
      <i data-lucide="feather" class="w-10 h-10 text-blue-600 opacity-70"></i>
    </div>
  </div>

  <div class="bg-white p-4 lg:p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
    <div class="flex justify-between items-center">
      <div>
        <p class="text-sm text-gray-500">Event Terdaftar</p>
        <h3 class="text-2xl font-bold text-blue-700 mt-1">{{ $totalEvent }}</h3>
      </div>
      <i data-lucide="calendar-days" class="w-10 h-10 text-blue-600 opacity-70"></i>
    </div>
  </div>

  <div class="bg-white p-4 lg:p-5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
    <div class="flex justify-between items-center">
      <div>
        <p class="text-sm text-gray-500">Bahasa Terdokumentasi</p>
        <h3 class="text-2xl font-bold text-blue-700 mt-1">{{ $totalBahasa }}</h3>
      </div>
      <i data-lucide="book-open" class="w-10 h-10 text-blue-600 opacity-70"></i>
    </div>
  </div>
</section>

<!-- Pengumuman Event -->
<section class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 leading-relaxed">
  <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
    <i data-lucide="megaphone" class="w-5 h-5 text-blue-600 mr-2"></i>
    Pengumuman Event Terdekat
  </h3>

  <div class="space-y-4">
    @forelse ($latestEvents as $event)
      <div class="border-l-4 border-blue-600 bg-blue-50 p-4 rounded-md hover:bg-blue-100 transition">
        <h4 class="font-semibold text-blue-800">{{ $event->judul }}</h4>
        <p class="text-gray-600 text-sm mt-1">
          📅 {{ \Carbon\Carbon::parse($event->tanggal)->format('d F Y') }}
        </p>
        <p class="text-gray-600 text-sm mt-1">
          {{ $event->deskripsi }}
        </p>
      </div>
    @empty
      <p class="text-gray-500 text-sm">Belum ada event terdekat.</p>
    @endforelse
  </div>
</section>

<script>
  lucide.createIcons();
</script>
@endsection
