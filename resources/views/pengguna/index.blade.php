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
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <title>Baileo Go Mollucas</title>
</head>
<body>
  {{-- Header --}}
    <header class="header" id="header">
      <nav class="nav container">
        <a href="{{ route('pengguna.index') }}" class="nav__logo">
          <img src="assets/images/logo_BGM.png" alt="image" style="height:70px; object-fit:contain; margin-top:-10px;">
        </a>
          <div class="cursor">

          </div>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li><a href="{{ route('pengguna.index') }}" class="nav__link active-link">Home</a></li>
            <li><a href="{{ route('pengguna.quiz') }}" class="nav__link ">Quiz</a></li>
            <li><a href="#" class="nav__link ">Admin</a></li>
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
    <main class="main">
      {{-- home --}}
      <section class="home section" id="home">
          <img src="assets/images/oke.jpg" alt="image" class="home__bg">
          <div class="home__blur"></div>

          <div class="home__container container grid">
            <div class="home__data">
                <h1 class="home__title">Jelajahi <br>Budaya<br> Maluku</h1>

                <p class="home__description">
                  Budaya yang lahir dari laut, hutan, dan sejarah panjang peradaban kepulauan. Temukan keindahan dan nilai luhur Maluku yang hidup dalam setiap tarian, bahasa, dan karya seni.
                </p>
                <a href="{{ route('pengguna.quiz') }}" class="button button__opa-30">
                  Kenali Sekarang
                  <i class="ri-arrow-right-long-line"></i>
                </a>
            </div>
            <div class="home__swiper swiper">
              <div class="swiper-wrapper">
                <article class="home__article swiper-slide">
                  <img src="assets/images/cakalele0.jpg" alt="image" class="home__img">
                </article>

                <article class="home__article swiper-slide">
                  <img src="assets/images/lenso.jpg" alt="image" class="home__img">
                </article>

                <article class="home__article swiper-slide">
                  <img src="assets/images/cakalele.jpg" alt="image" class="home__img">
                </article>

                <article class="home__article swiper-slide">
                  <img src="assets/images/pukul.png" alt="image" class="home__img">
                </article>
              </div>

              <!-- navigation buttons -->
              <div class="swiper-button-prev">
                <i class="ri-arrow-left-long-line"></i>
              </div>
              <div class="swiper-button-next">
                <i class="ri-arrow-right-long-line"></i>
              </div>
            </div>
          </div>
      </section>
      {{-- bahasa --}}
      <section class="bahasa section" id="bahasa">
          <h2 class="section__title">Adat & Tradisi <br> Maluku</h2>

          <div class="bahasa__container container grid">
            <article class="bahasa__card">
              <img src="assets/images/baileo_maluku.jpg" alt="image" class="bahasa__img">
              <div class="bahasa__data">
                <h3 class="deskripsi__bahasa">31-05-2025</h3>
                <h2 class="bahasa_title">Baileo</h2>
                <p class="bahasa__country">
                  <i class="ri-map-pin-2-fill">Maluku, Indonesia</i>
                  <span></span>
                </p>
              </div>
            </article>
            <article class="bahasa__card">
              <img src="assets/images/cakalele.jpg" alt="image" class="bahasa__img">
              <div class="bahasa__data">
                <h3 class="deskripsi__bahasa">Tarian Tradisional</h3>
                <h2 class="bahasa_title">Cakalele</h2>
                <p class="bahasa__country">
                  <i class="ri-map-pin-2-fill">Maluku, Indonesia</i>
                  <span></span>
                </p>
              </div>
            </article>
            <article class="bahasa__card">
              <img src="assets/images/cele2.png" alt="image" class="bahasa__img" >
              <div class="bahasa__data">
                <h3 class="deskripsi__bahasa">Pakaian Tradisional</h3>
                <h2 class="bahasa_title">Cakalele</h2>
                <p class="bahasa__country">
                  <i class="ri-map-pin-2-fill">Maluku, Indonesia</i>
                  <span></span>
                </p>
              </div>
            </article>
          </div>
      </section>
      {{-- quiz --}}
      <section class="quiz section" id="quiz">
        <h2 class="section__title">Belajar Bahasa <br> Jelajahi Budaya</h2>

        <div class="quiz__container container grid">
          <img src="assets/images/oke.jpg" alt="image" class="quiz__img">
          <div class="quiz__swiper swiper">
            <div class="swiper-wrapper">
              <div class="quiz__card swiper-slide">
                <h2 class="quiz__title">Tarian Tradisional</h2>
                <p class="quiz__description">
                  Cakalele adalah salah satu tarian trandisional dari maluku
                </p>
                <div class="quiz__profile">
                  <img src="assets/images/bambu.jpg" alt="image">

                  <div class="quiz__info">
                    <h3>Warisan Budaya</h3>
                    <p>papeda</p>
                  </div>
                </div>
              </div>

              <div class="quiz__card swiper-slide">
                <h2 class="quiz__title">Rumah Adat</h2>
                <p class="quiz__description">
                  baileo merupakan rumah adat maluku
                </p>
                <div class="quiz__profile">
                  <img src="assets/images/yuyun.jpg" alt="image">

                  <div class="quiz__info">
                    <h3>Warisan Budaya</h3>
                    <p>Yuyun</p>
                  </div>
                </div>
              </div>

              <div class="quiz__card swiper-slide">
                <h2 class="quiz__title">Makanan Khas Maluku</h2>
                <p class="quiz__description">
                  papeda adalah salah satu makanan khas maluku
                </p>
                <div class="quiz__profile">
                  <img src="assets/images/eunwooo.jpeg" alt="image">

                  <div class="quiz__info">
                    <h3>Warisan Budaya</h3>
                    <p>Eunwoo</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-prev">
              <i class="ri-arrow-left-long-fill"></i>
            </div>

            <div class="swiper-button-next">
              <i class="ri-arrow-right-long-fill"></i>
            </div>

          </div>
        </div>
      </section>
      {{-- budaya --}}
      <section class="gallery section" id="gallery">
          <h2 class="section__title">Budaya</h2>

          <div class="gallery__container container grid">
            <article class="gallery__card" onclick="window.location.href='{{ route('pengguna.quiz') }}'">
              <img src="assets/images/bambu.jpg" alt="image" class="gallery__img">
              <div class="gallery__shadow"></div>

              <div class="gallery__data">
                <h3 class="gallery__subtitle">Tarian </h3>
                <h2 class="galley__title">Tradisional</h2>
              </div>
            </article>

            <article class="gallery__card" onclick="window.location.href='{{ route('pengguna.quiz') }}'">
              <img src="assets/images/bambu.jpg" alt="image" class="gallery__img">
              <div class="gallery__shadow"></div>

              <div class="gallery__data">
                <h3 class="gallery__subtitle">Musik </h3>
                <h2 class="galley__title">Tradisional</h2>
              </div>
            </article>

          </div>

      </section>

    </main>


    {{-- Footer --}}
    <footer class="footer">
      <div class="footer__container container grid">
        <a href="{{ route('pengguna.index') }}" class="footer__logo">
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

    {{-- swiper js --}}
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

    <!-- main js-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
