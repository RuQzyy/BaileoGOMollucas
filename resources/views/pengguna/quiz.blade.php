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
            <li><a href="{{ route('pengguna.index') }}" class="nav__link ">Home</a></li>
            <li><a href="{{ route('pengguna.quiz') }}" class="nav__link active-link">Quiz</a></li>
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

    {{-- main --}}
    <!-- HOME SECTION -->
    <section class="home section" id="home">
        <img src="assets/images/batik_pala.png" alt="image" class="home__bg">
        {{-- <div class="home__blur"></div> --}}

        <div>
            <img src="assets/images/cakalele.jpg" alt="image">
            {{-- <div class="home__blur"></div> --}}
        </div>
    </section>
        <!-- Translate Section -->
        <section class="trans" id="trans">
            <div class="trans__container">
                <div class="trans__box">
                        <div class="trans__select">
                            <i class="ri-global-line"></i>
                            <select id="fromLang">
                                <option value="id">Bahasa Indonesia</option>
                                <option value="ambon">Bahasa Ambon</option>
                            </select>
                        </div>
                    <textarea id="fromText" placeholder="Tulis teks di sini..."></textarea>
                </div>

                <div class="trans__swap">
                    <i class="ri-arrow-left-right-line"></i>
                </div>

                <div class="trans__box">
                    <div class="trans__select">
                        <i class="ri-global-line"></i>
                        <select id="toLang">
                            <option value="ambon">Bahasa Ambon</option>
                            <option value="id">Bahasa Indonesia</option>
                        </select>
                    </div>
                <textarea id="toText" placeholder="Hasil terjemahan..." readonly></textarea>
                </div>
            </div>
        </section>

    <!-- SECTION QUIZ -->
    <section class="translate section" id="translate">
        <div class="translate__container container grid">
            <div class="translate__data">
            <h2 class="translate__title">Quiz Pengetahuan Budayamu</h2>
            <p class="translate__description">
                Ikuti Quiz Untuk Mengujiji Pengetahuan Budayamu
            </p>
            <a href="#budaya" class="button">Mulai Quiz</a>
            </div>

            <div class="translate__img">
            <img src="assets/images/budaya.png" alt="Budaya Maluku">
            </div>
        </div>
    </section>

    </main>
    <section id="projects">
        <div class="con">
            <h2 class="section__title"> Jelajahi Budaya</h2>
                {{-- menu link --}}
                <div class="items-link">
                    <span class="item-link menu-active" data-name="sejarah">Sejarah</span>
                    <span class="item-link " data-name="tokoh">Tokoh</span>
                    <span class="item-link " data-name="rumah">Rumah Adat</span>
                    <span class="item-link " data-name="pakaian">Pakaian </span>
                    <span class="item-link " data-name="musik">Musik </span>
                    <span class="item-link " data-name="alat">Alat Musik </span>
                    <span class="item-link " data-name="makanan">Makanan </span>
                    <span class="item-link " data-name="cerita">Cerita Rakyat</span>
                </div>
                {{-- filter --}}
                    <div class="budaya">
                        <div class="project-img" data-name="rumah">
                            <img src="assets/images/logo_BGM.png" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="rumah">
                            <img src="assets/images/logo_BGM.png" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="rumah">
                            <img src="assets/images/logo_BGM.png" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="sejarah">
                            <img src="assets/images/logo_BGM.png" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="pakaian">
                            <img src="assets/images/logo_BGM.png" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="tokoh">
                            <img src="assets/images/logo_BGM.png" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="musik">
                            <img src="assets/images/bambu.jpg" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="musik">
                            <img src="assets/images/bambu.jpg" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="musik">
                            <img src="assets/images/bambu.jpg" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="alat">
                            <img src="assets/images/eunwooo.jpeg" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="alat">
                            <img src="assets/images/bambu.jpg" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="alat">
                            <img src="assets/images/bambu.jpg" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="makanan">
                            <img src="assets/images/logo_BGM.png" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="makanan">
                            <img src="assets/images/logo_BGM.png" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="makanan">
                            <img src="assets/images/logo_BGM.png" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="cerita">
                            <img src="assets/images/logo_BGM.png" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="cerita">
                            <img src="assets/images/logo_BGM.png" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="project-img" data-name="cerita">
                            <img src="assets/images/logo_BGM.png" alt="">
                            <div class="overlay">
                                <h4>Nama Rumah</h4>
                                <div class="action-aria">
                                    <a href="#" class="btn">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>




    {{-- Footer --}}
    <footer class="footer">
      <div class="footer__container container grid">
        <a href="#" class="footer__logo">
          <img src="assets/images/logo2.png" alt="image" class="footer__logo-img">
          <span>BaileoGO<br>Mollucas</span>
        </a>

        <div class="footer__content grid">
          <div>
            <h3 class="footer__title">About</h3>

            <ul class="footer__links">
              <li>
                <a href="#" class="footer__link">About Us</a>
              </li>

              <li>
                <a href="#" class="footer__link">Features</a>
              </li>

              <li>
                <a href="#" class="footer__link">News & Blog</a>
              </li>

            </ul>
          </div>

          <div>
            <h3 class="footer__title">Social</h3>

            <div class="footer__social">
              <a href="#" target="_blank" class="footer__social-link">
                <i class="ri-facebook-circle-fill"></i>
              </a>
              <a href="#" target="_blank" class="footer__social-link">
                <i class="ri-instagram-fill"></i>
              </a>
              <a href="#" target="_blank" class="footer__social-link">
                <i class="ri-twitter-x-fill"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <span class="footer__copy">
        &#169; Baileo GO Mollucas
      </span>
    </footer>

   {{-- Scroll Up --}}
<a href="" class="scrollup" id="scroll-up">
  <i class="ri-arrow-up-line"></i>
</a>

{{-- Scroll Reveal --}}
<script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>

{{-- Swiper JS --}}
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/quiz.js') }}"></script>

{{-- === SIMULASI TERJEMAHAN OTOMATIS === --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
  const fromText = document.getElementById('fromText');
  const toText = document.getElementById('toText');
  const swapBtn = document.querySelector('.trans__swap');
  const fromLang = document.getElementById('fromLang');
  const toLang = document.getElementById('toLang');
  const kamus = @json($bahasa); // ← ambil data kamus dari controller

  // 🔹 Tombol Tukar Bahasa
  if (swapBtn) {
    swapBtn.addEventListener('click', () => {
      const tempText = fromText.value;
      const tempLang = fromLang.value;
      fromText.value = toText.value;
      toText.value = tempText;
      fromLang.value = toLang.value;
      toLang.value = tempLang;
    });
  }

  // 🔹 Terjemahan Otomatis Saat Mengetik
  if (fromText) {
    fromText.addEventListener('input', () => {
      let inputText = fromText.value.toLowerCase();
      let outputText = inputText;

      if (fromLang.value === 'id' && toLang.value === 'ambon') {
        kamus.forEach(item => {
          const regex = new RegExp(`\\b${item.indonesia}\\b`, 'gi');
          outputText = outputText.replace(regex, item.ambon);
        });
      } else if (fromLang.value === 'ambon' && toLang.value === 'id') {
        kamus.forEach(item => {
          const regex = new RegExp(`\\b${item.ambon}\\b`, 'gi');
          outputText = outputText.replace(regex, item.indonesia);
        });
      }

      toText.value = outputText;
    });
  }
});
</script>

{{-- === MODAL UNTUK DETAIL (TIDAK DIUBAH) === --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('infoModal');
  const closeBtn = document.querySelector('.modal .close');
  const lihatBtns = document.querySelectorAll('.btn');

  if (!modal) return;

  lihatBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const card = btn.closest('.project-img');
      const title = card.querySelector('h4')?.innerText || '';
      const imgSrc = card.querySelector('img')?.getAttribute('src') || '';

      modal.querySelector('.modal-title').innerText = title;
      modal.querySelector('.modal-img').setAttribute('src', imgSrc);
      modal.querySelector('.modal-desc').innerText =
        'Deskripsi detail tentang ' + title + ' akan muncul di sini.';
      modal.style.display = 'flex';
    });
  });

  closeBtn?.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  window.addEventListener('click', (e) => {
    if (e.target === modal) {
      modal.style.display = 'none';
    }
  });
});
</script>



</body>
</html>
