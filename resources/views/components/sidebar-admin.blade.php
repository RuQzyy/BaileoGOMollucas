<aside id="sidebar"
  class="sidebar fixed inset-y-0 left-0 w-60 text-white p-6 flex flex-col justify-between z-40 sidebar-transition -translate-x-full lg:translate-x-0"
  style="background: linear-gradient(to bottom, #004b8d, #002f5e);">

  <!-- Bagian Atas (Logo + Menu) -->
  <div class="flex flex-col space-y-6">

    <!-- Logo -->
    <div class="flex items-center justify-center h-24 overflow-hidden shrink-0">
      <img src="{{ asset('assets/images/logo.png') }}"
           alt="Logo"
           class="max-w-full max-h-full object-contain scale-125 drop-shadow-md">
    </div>

    <!-- Menu Navigasi -->
    <nav class="flex-1 space-y-2 text-sm font-medium">
      <a href="{{ route('admin.dashboard') }}"
         class="flex items-center p-2.5 rounded-lg bg-white/25 hover:bg-white/35 transition">
        <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3"></i> Dashboard
      </a>
      <a href="{{ route('admin.budaya') }}"
         class="flex items-center p-2.5 rounded-lg hover:bg-white/20 transition">
        <i data-lucide="mountain" class="w-5 h-5 mr-3"></i> Budaya
      </a>
      <a href="{{ route('admin.event') }}"
         class="flex items-center p-2.5 rounded-lg hover:bg-white/20 transition">
        <i data-lucide="calendar" class="w-5 h-5 mr-3"></i> Event
      </a>
      <a href="{{ route('admin.bahasa') }}"
         class="flex items-center p-2.5 rounded-lg hover:bg-white/20 transition">
        <i data-lucide="languages" class="w-5 h-5 mr-3"></i> Bahasa
      </a>
    </nav>
  </div>

  <!-- Tombol Logout -->
  <a href="{{ route('logout') }}"
     class="flex items-center p-2.5 bg-red-500 hover:bg-red-600 rounded-lg transition text-sm font-medium">
    <i data-lucide="log-out" class="w-5 h-5 mr-3"></i> Logout
  </a>
</aside>
