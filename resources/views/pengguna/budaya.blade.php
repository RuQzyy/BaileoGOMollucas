<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://db.onlinewebfonts.com/c/89d11a443c316da80dcb8f5e1f63c86e?family=Bauhaus+93+V2" rel="stylesheet"
        type="text/css" />

    {{-- Favicon --}}
    <link rel="stylesheet" href="">

    {{-- REMIXICON --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css ">

    {{-- Swiper css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/budaya.css') }}">

    <title>Baileo Go Mollucas</title>
</head>

<body>
    {{-- Header --}}
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                <img src="assets/images/logo_BGM.png" alt="image"
                    style="height:70px; object-fit:contain; margin-top:-10px;">
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li><a href="{{ route('pengguna.test') }}" class="nav__link ">Home</a></li>
                    <li><a href="{{ route('pengguna.quiz') }}" class="nav__link ">Quiz</a></li>
                    <li><a href="{{ route('pengguna.budaya') }}" class="nav__link active-link">Budaya</a></li>
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
    <main class="main">
        {{-- home --}}
        <section class="home section" id="home">
            <img src="assets/images/oke.jpg" alt="image" class="home__bg">
            <div class="home__blur"></div>

            <div class="home__container container grid">
                <div class="home__data">
                    <h1 class="home__title">Jelajahi <br>Budaya<br> Maluku</h1>

                    <p class="home__description">
                        Budaya yang lahir dari laut, hutan, dan sejarah panjang peradaban kepulauan. Temukan keindahan
                        dan nilai luhur Maluku yang hidup dalam setiap tarian, bahasa, dan karya seni.
                    </p>
                    {{-- <a href="#belajar" class="button button__opa-30">
                  Kenali Sekarang
                  <i class="ri-arrow-right-long-line"></i>
                </a> --}}
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

        {{-- gallery --}}
    </main>


    </section>

    <section class="heritage-slider">
        <div class="containerr">
            <h1 class="text-center section-heading">Rekomendasi Tempat Wisata</h1>
            <p class="con-p">Nikmati pengalaman wisata yang menenangkan di sudut-sudut indah Kota Ambon. </p>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                @foreach ($budayaWisata as $b)
                    <div class="swiper-slide" onclick="window.location='{{ route('pengguna.wisata', $b->id) }}'"
                        style="cursor: pointer;">

                        <div class="slide-wrapper">
                            <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->nama }}">
                            <div class="caption">
                                <h3>{{ $b->nama }}</h3>
                                <p>{{ $b->deskripsi_singkat ?? Str::limit($b->deskripsi, 90) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>




            <!-- PANAH -->
            <div class="swiper-button-prev"><i class="ri-arrow-left-s-fill"></i></div>
            <div class="swiper-button-next"><i class="ri-arrow-right-s-fill"></i></div>

        </div>

        <!-- TOMBOL LIHAT SEMUA -->
        <div class="lihat-semua">
            <a href="#">Lihat Semua →</a>
        </div>

    </section>




    <section id="projects">
        <div class="con">
            <h2 class="section__title"> Jelajahi Budaya</h2>

            {{-- search bar start --}}
            <div class="search-bar">

                {{-- dropdown --}}
                <div class="dropdown">
                    <div id="drop-text" class="dropdown-text">
                        <span id="span">Semua</span>
                        <i id="icon" class="ri-arrow-down-s-line"></i>
                    </div>

                    <ul id="list" class="dropdown-list">
                        <li class="dropdown-list-item" data-name="semua">Semua</li>

                        @foreach ($kategori as $item)
                            <li class="dropdown-list-item" data-name="{{ strtolower($item->kategori) }}">
                                {{ $item->kategori }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- search box --}}
                <div class="search-box">
                    <input type="text" id="search-input" placeholder="Cari">
                    <i class="ri-search-2-line"></i>
                </div>
            </div>

            {{-- filter --}}
            <div class="budaya">

             @foreach ($budaya as $b)
<div class="project-img">
    <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->nama }}">
    <div class="overlay">
        <h4>{{ $b->nama }}</h4>
        <div class="action-aria">
            <a href="{{ route('pengguna.budaya.show', $b->id) }}" class="btn">Lihat</a>
        </div>
    </div>
</div>
@endforeach




            </div>

            {{-- jika hasil pencarian kosong --}}
            <div id="no-result-message" class="no-result" style="display:none;">
                <p>
                    Maaf, data belum ada <i class="ri-emotion-sad-line"></i><br>
                    Apakah kamu ingin menanyakan di <a href="#chatbot" class="ask-chatbot">ChatBot?</a>
                </p>
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

    {{-- Scroll Reveal --}}
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>

    {{-- swiper js --}}
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

    <!-- main js-->
    <script src="{{ asset('assets/js/budaya.js') }}"></script>

    {{-- Modal Maps --}}
    @include('components.maps')


</body>

</html>
