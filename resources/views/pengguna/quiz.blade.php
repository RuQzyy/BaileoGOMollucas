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
    <link rel="stylesheet" href="{{ asset('assets/css/quiz.css') }}">

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
            <li><a href="{{ route('pengguna.test') }}" class="nav__link ">Home</a></li>
            <li><a href="{{ route('pengguna.quiz') }}" class="nav__link active-link">Quiz</a></li>
            <li><a href="{{ route('pengguna.budaya') }}" class="nav__link ">Budaya</a></li>
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

            <!-- toggle button -->
            <div class="nav__toggle" id="nav-toggle">
              <i class="ri-apps-2-fill"></i>
            </div>
        </div>
      </nav>
    </header>

  <!-- HOME SECTION -->
  <section class="home section" id="home">
    <img src="assets/images/batik_pala.png" class="home__bg">

    <section class="trans" id="trans">
      <div class="trans__container">
        <div class="trans__box">
            <div class="trans__select">
              <i class="ri-global-line"></i>
              <select id="fromLang" class="select__trans">
                <option value="id">Bahasa Indonesia</option>
                <option value="ambon">Bahasa Ambon</option>
              </select>
            </div>

            <!-- === Voice Input Button === -->
            <i id="micBtn" class="ri-mic-fill voice-btn" title="Ucapkan"></i>

            <textarea id="fromText" placeholder="Tulis teks di sini..."></textarea>
        </div>

        <div class="trans__swap">
          <i class="ri-arrow-left-right-line"></i>
        </div>

        <div class="trans__box">
            <div class="trans__select">
              <i class="ri-global-line"></i>
              <select id="toLang" class="select__trans">
                <option value="ambon">Bahasa Ambon</option>
                <option value="id">Bahasa Indonesia</option>
              </select>
            </div>

            <!-- === Voice Output Button === -->
            <i id="speakBtn" class="ri-volume-up-fill voice-btn" title="Putar suara"></i>

            <textarea id="toText" placeholder="Hasil terjemahan..." readonly></textarea>
        </div>
      </div>
    </section>
  </section>

    <!-- SECTION QUIZ -->
    <section class="translate section" id="translate">
        <div class="translate__container container grid">
            <div class="translate__data">
            <h2 class="translate__title">Uji Pengetahuan Budayamu</h2>
            <p class="translate__description">
                Ikuti Quiz Untuk Mengujiji Pengetahuan Budayamu
            </p>
            <a href="{{ route('pengguna.soalQuiz') }}" class="button">Mulai Quiz</a>
            </div>

            <div class="translate__img">
              <img src="assets/images/quiz_icon.png" alt="Budaya Maluku" class="img_animation">
            </div>
        </div>
    </section>

    <footer>

      <svg class="footer-wave-design" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#F26B3A" fill-opacity="1"
          d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
      </svg>

      <div class="footer-container">

        <!-- LOGO -->
        <div class="footer-section about">
          <a href="#" class="footer__logo">
            <img src="assets/images/logo2.png" alt="image" class="footer__logo-img">
            <span>BaileoGO<br>Mollucas</span>
          </a>
        </div>

        <!-- LINKS -->
        <div class="footer-section links2">
          <h2>Quick Links</h2>
          <ul>
            <li><a href="{{ route('pengguna.test') }}">Home</a></li>
            <li><a href="{{ route('pengguna.quiz') }}">Quiz</a></li>
            <li><a href="{{ route('pengguna.budaya') }}">Budaya</a></li>
          </ul>
        </div>

        <!-- RESOURCE -->
        <div class="footer-section resources">
          <h2>Resource</h2>
          <ul>
            <li><a href="{{ route('pengguna.budaya') }}">Tarian Tradisional</a></li>
            <li><a href="{{ route('pengguna.budaya') }}">Pakaian Tradisional</a></li>
            <li><a href="{{ route('pengguna.budaya') }}">Makanan Khas Maluku</a></li>
            <li><a href="{{ route('pengguna.budaya') }}">Musik Tradisional</a></li>
          </ul>
        </div>

        <!-- MAPS MASK -->
        <div class="footer-section newsletter">
          <h2>Maps Maluku</h2>

          <div class="map-mask" onclick="openMapModal()">
            <img src="assets/images/mapss2.png" alt="maps">
        </div>
        </div>

      </div>

      <!-- BOTTOM -->
      <div class="footer-bottom">
        <div class="social-icons">
          <a href="#"><i class="ri-facebook-circle-fill"></i></a>
          <a href="#"><i class="ri-instagram-fill"></i></a>
          <a href="#"><i class="ri-twitter-x-fill"></i></a>
        </div>

        <p>
          <i class="ri-copyright-line"></i>
          2025 <span class="brand-name"><a href="{{ route('pengguna.index') }}">BaileoGOMollucas</a></span>
        </p>
      </div>

    </footer>
   {{-- Scroll Up --}}
    <a href="" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>

 <a href="{{ route('pengguna.chatBot') }}" target="_blank" class="chatbot">
    <i class="ri-robot-2-fill"></i>
</a>


    {{-- Script bawaan --}}
  <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
  <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/quiz.js') }}"></script>

  {{-- === LOGIKA TERJEMAHAN + VOICE FEATURE === --}}
  <script>
    document.addEventListener('DOMContentLoaded', () => {

      const fromText = document.getElementById('fromText');
      const toText = document.getElementById('toText');
      const swapBtn = document.querySelector('.trans__swap');
      const fromLang = document.getElementById('fromLang');
      const toLang = document.getElementById('toLang');
      const kamus = @json($bahasa);

      /* ===================== TERJEMAHAN DINAMIS ===================== */
      function translate() {
        let input = fromText.value.toLowerCase();
        let result = input;

        if (fromLang.value === 'id' && toLang.value === 'ambon') {
          kamus.forEach(item => result = result.replace(new RegExp(`\\b${item.indonesia}\\b`, 'gi'), item.ambon));
        } else if (fromLang.value === 'ambon' && toLang.value === 'id') {
          kamus.forEach(item => result = result.replace(new RegExp(`\\b${item.ambon}\\b`, 'gi'), item.indonesia));
        }
        toText.value = result;
      }
      fromText.addEventListener('input', translate);

      swapBtn.addEventListener('click', () => {
        [fromLang.value, toLang.value] = [toLang.value, fromLang.value];
        [fromText.value, toText.value] = [toText.value, fromText.value];
        translate();
      });

      /* ===================== 🌟 VOICE INPUT (Speech-to-Text) ===================== */
      const micBtn = document.getElementById('micBtn');
      const recognition = window.SpeechRecognition || window.webkitSpeechRecognition ?
        new (window.SpeechRecognition || window.webkitSpeechRecognition)() : null;

      if (recognition) {
        recognition.lang = "id-ID";
        recognition.continuous = false;

        micBtn.addEventListener('click', () => {
          micBtn.classList.add("voice-active");
          recognition.start();
        });

        recognition.onresult = e => {
          fromText.value += (fromText.value ? " " : "") + e.results[0][0].transcript;
          translate();
        };

        recognition.onend = () => micBtn.classList.remove("voice-active");
      }

      /* ===================== 🔊 TEXT-TO-SPEECH ===================== */
      const speakBtn = document.getElementById('speakBtn');
      speakBtn.addEventListener("click", () => {
        let msg = new SpeechSynthesisUtterance(toText.value);
        msg.lang = toLang.value === "id" ? "id-ID" : "id-ID"; // tetap Indonesia karena belum ada TTS Ambon
        window.speechSynthesis.speak(msg);
      });

    });
  </script>

  {{-- Modal Maps--}}
@include('components.maps')

</body>
</html>
