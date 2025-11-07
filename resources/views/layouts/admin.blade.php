<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard Admin | BaileoGO Mollucas')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    body { background-color: #f9fafb; }
    .sidebar-transition { transition: transform 0.3s ease-in-out; }
  </style>
</head>
<body class="flex min-h-screen font-sans text-gray-800">

  <!-- Sidebar -->
  @include('components.sidebar-admin')

  <!-- Overlay (untuk mobile) -->
  <div id="overlay" class="fixed inset-0 bg-black/40 hidden z-30 lg:hidden"></div>

  <!-- Main Content -->
  <main class="flex-1 w-full lg:ml-60 p-4 sm:p-6 lg:p-8 transition-all duration-300">
    @yield('content')
  </main>

  <!-- Script lucide + sidebar toggle -->
  <script>
    lucide.createIcons();
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const menuBtn = document.getElementById('menuBtn');

    menuBtn?.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    });

    overlay?.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });

    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1024) {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.add('hidden');
      } else {
        sidebar.classList.add('-translate-x-full');
      }
    });
  </script>
</body>
</html>
