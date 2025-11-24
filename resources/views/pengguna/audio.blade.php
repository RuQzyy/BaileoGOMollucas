<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://db.onlinewebfonts.com/c/89d11a443c316da80dcb8f5e1f63c86e?family=Bauhaus+93+V2" rel="stylesheet" type="text/css"/>
   
    {{-- Favicon --}}
    <link rel="stylesheet" href="">

    {{-- REMIXICON --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css ">

    {{-- Swiper css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">

     <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/audio.css') }}">
    
    <title>Baileo Go Mollucas</title>
</head> 
<body>
  {{-- Header --}}
    <header class="header" id="header">
      <nav class="nav container">
        <a href="#" class="nav__logo">
          <img src="assets/images/logo_BGM.png" alt="image" style="height:70px; object-fit:contain; margin-top:-10px;">
        </a>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li><a href="{{ route('pengguna.index') }}" class="nav__link ">Home</a></li>
            <li><a href="{{ route('pengguna.quiz') }}" class="nav__link ">Quiz</a></li>
            <li><a href="{{ route('pengguna.budaya') }}"  class="nav__link active-link">Budaya</a></li>
            <li><a href="#Admin" class="nav__link ">Admin</a></li>
          </ul>

          {{-- close button --}}
          <div class="nav__close" id="nav-close">
              <i class="ri-close-large-line"></i>
          </div>
        </div>
  
        <div class="nav__buttons">
            <!-- theme button -->
            <i class="ri-moon-fill nav__theme" id="theme-button"></i>

            <i class="ri-calendar-event-line"></i>

            <!-- toggle button -->
            <div class="nav__toggle" id="nav-toggle">
              <i class="ri-apps-2-fill"></i>
            </div>
        </div>
      </nav>
    </header>

      <div class="wrap">
        <div class="card" role="main" aria-label="MalukuSynth AI interface">
          <h1 class="title">MalukuSynth AI</h1>
          <p class="sub">Unggah file MP3 atau rekam suara langsung untuk mendeteksi instrumen tradisional dan chord-nya.</p>

          <div class="controls" role="region" aria-label="Kontrol unggah dan rekam">

            <!-- File input (styled box) -->
            <label class="file-box" id="fileLabel" tabindex="0">
              <!-- up arrow svg -->
              {{-- <i class="ri-arrow-up-line"></i> --}}
              <svg class="icon svg-inline" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M12 3v12" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5 10.5L12 3l7 7.5" stroke="#ffffff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21 21H3" stroke="#ffffff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <div class="audio-p">Pilih File MP3</div>
              <small>Klik untuk memilih file</small>
              <input id="fileInput" type="file" accept="audio/*" style="display:none" />
              <div class="filename" id="fileName" aria-live="polite"></div>
            </label>

            <!-- Record button -->
            <button class="record-btn" id="recordBtn" type="button" aria-pressed="false">
              <svg class="icon svg-inline" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <circle cx="12" cy="8" r="4" stroke="#9b1a1a" stroke-width="1.6" fill="#ffb8b8"/>
                <path d="M19 11v1a7 7 0 0 1-14 0v-1" stroke="#9b1a1a" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 18v3" stroke="#9b1a1a" stroke-width="1.6" stroke-linecap="round"/>
              </svg>
              Suara Langsung
            </button>

            <!-- Start -->
            {{-- <button class="start-btn" id="startBtn" type="button">
              <svg class="icon svg-inline" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M5 12l14-7v14L5 12z" stroke="rgba(255,255,255,0.9)" stroke-width="0" fill="rgba(255,255,255,0.12)"/>
              </svg>
              Mulai
            </button> --}}

          </div>

          <div class="spotlight" aria-hidden="true"></div>
        </div>
      </div>


    {{-- jquery --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

    <script>
      // File input logic
      const fileInput = document.getElementById('fileInput');
      const fileLabel = document.getElementById('fileLabel');
      const fileName = document.getElementById('fileName');
      fileLabel.addEventListener('click', ()=> fileInput.click());
      fileLabel.addEventListener('keydown', (e)=>{
        if(e.key === 'Enter' || e.key === ' ') { e.preventDefault(); fileInput.click(); }
      });
      fileInput.addEventListener('change', (ev)=>{
        const f = ev.target.files && ev.target.files[0];
        if(!f) { fileName.textContent = ''; return; }
        fileName.textContent = `${f.name} — ${(f.size/1024/1024).toFixed(2)} MB`;
      });

      // Simple record button visual toggle (does not implement actual recording)
      const recordBtn = document.getElementById('recordBtn');
      recordBtn.addEventListener('click', ()=>{
        const pressed = recordBtn.getAttribute('aria-pressed') === 'true';
        recordBtn.setAttribute('aria-pressed', String(!pressed));
        if(!pressed){
          recordBtn.style.boxShadow = '0 10px 26px rgba(155,26,26,0.28)';
          recordBtn.innerHTML = `<svg class="icon svg-inline" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="9" y="6" width="6" height="12" rx="1.2" fill="#ffb8b8" stroke="#9b1a1a" stroke-width="1.6"/></svg> Sedang Rekam...`;
        } else {
          recordBtn.style.boxShadow = '0 6px 18px rgba(0,0,0,0.28)';
          recordBtn.innerHTML = `<svg class="icon svg-inline" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="8" r="4" stroke="#9b1a1a" stroke-width="1.6" fill="#ffb8b8"/><path d="M19 11v1a7 7 0 0 1-14 0v-1" stroke="#9b1a1a" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 18v3" stroke="#9b1a1a" stroke-width="1.6" stroke-linecap="round"/></svg> Suara Langsung`;
        }
      });

      // Start button placeholder
      document.getElementById('startBtn').addEventListener('click', ()=>{
        alert('Tombol Mulai diklik — di sini kamu bisa panggil API untuk memproses file atau rekaman.');
      });
    </script>
    {{-- Scroll Reveal --}}
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>

    {{-- swiper js --}}
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    
    <!-- main js-->
    <script src="{{ asset('assets/js/agendaBudaya.js') }}"></script>

</body>
</html>