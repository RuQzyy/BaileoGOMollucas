<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://db.onlinewebfonts.com/c/89d11a443c316da80dcb8f5e1f63c86e?family=Bauhaus+93+V2" rel="stylesheet" type="text/css"/>

    {{-- REMIXICON --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">

    {{-- Swiper css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/agendaBudaya.css') }}">

    <title>{{ $event->judul }} – Baileo Go Mollucas</title>
</head>
<body>

{{-- HEADER --}}
<header class="header" id="header">
    <nav class="nav container">
        <a href="#" class="nav__logo">
            <img src="/assets/images/logo_BGM.png" alt="logo" style="height:70px; object-fit:contain; margin-top:-10px;">
        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                 <li><a href="{{ route('pengguna.test') }}" class="nav__link ">Home</a></li>
            <li><a href="{{ route('pengguna.quiz') }}" class="nav__link ">Quiz</a></li>
            <li><a href="{{ route('pengguna.budaya') }}"  class="nav__link active-link">Budaya</a></li>
            <li><a href="#Admin" class="nav__link ">Admin</a></li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class="ri-close-large-line"></i>
            </div>
        </div>

        <div class="nav__buttons">
            <i class="ri-moon-fill nav__theme" id="theme-button"></i>
            <i class="ri-calendar-event-line"></i>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-apps-2-fill"></i>
            </div>
        </div>
    </nav>
</header>

{{-- HERO SECTION --}}
<section class="hero-section" style="background-image: url('{{ asset('storage/' . $event->gambar) }}')">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1 class="hero-title">{{ $event->judul }}</h1>
        <p class="hero-desc">{{ $event->deskripsi_singkat }}</p>
    </div>
</section>

{{-- CONTENT SECTION --}}
<section class="content-section">
    <div class="content-wrapper">

        {{-- LEFT --}}
        <div class="content-left">
            <h2 class="content-title">{{ $event->sub_judul }}</h2>

            <div class="content-info">
                <p><i class="ri-map-pin-line"></i> {{ $event->lokasi }}</p>
                <p>
                    <i class="ri-calendar-2-line"></i>
                    {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                </p>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="content-right">
            <img src="{{ asset('storage/' . $event->gambar) }}" alt="Event Image">
        </div>
    </div>

    <div class="wrapper2">
        <img src="{{ asset('storage/' . $event->gambar) }}" alt="Event">
        <div class="text-boxx">
            <p>{{ $event->deskripsi }}</p>
        </div>
    </div>
</section>

{{-- LIHAT JUGA --}}
<div class="pembatas">
    <div class="judull">
        <h2>Lihat Juga</h2>
    </div>
</div>

<div class="coontainer">

    @foreach ($otherEvents as $item)
    <div class="carrd" onclick="window.location='{{ route('pengguna.agendaBudaya.list', $item->id) }}'">
        <div class="imgBx">
            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
        </div>
        <div class="coontent">
            <h2>{{ $item->judul }}</h2>
            <p>{{ Str::limit($item->deskripsi_singkat, 120) }}</p>
            <a href="{{ route('pengguna.agendaBudaya.detail', $item->id) }}">Read More</a>
        </div>
    </div>
    @endforeach

</div>

{{-- FOOTER --}}
<footer>
    <svg class="footer-wave-design" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#F26B3A" fill-opacity="1"
            d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>

    <div class="footer-container">

        <div class="footer-section about">
            <a href="#" class="footer__logo">
                <img src="/assets/images/logo2.png" alt="image" class="footer__logo-img">
                <span>BaileoGO<br>Mollucas</span>
            </a>
        </div>

        <div class="footer-section links2">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="{{ route('pengguna.index') }}">Home</a></li>
                <li><a href="#">Quiz</a></li>
                <li><a href="#">Budaya</a></li>
            </ul>
        </div>

        <div class="footer-section resources">
            <h2>Resource</h2>
            <ul>
                <li><a href="#">Tarian Tradisional</a></li>
                <li><a href="#">Pakaian Tradisional</a></li>
                <li><a href="#">Makanan Khas Maluku</a></li>
                <li><a href="#">Musik Tradisional</a></li>
            </ul>
        </div>

        <div class="footer-section newsletter">
            <h2>Maps Maluku</h2>
            <div class="map-mask" onclick="window.location='{{ route('pengguna.budaya') }}'">
                <img src="/assets/images/mapss2.png" alt="maps">
            </div>
        </div>

    </div>

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

{{-- SCRIPTS --}}
<script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/agendaBudaya.js') }}"></script>

</body>
</html>
