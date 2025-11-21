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
    <link rel="stylesheet" href="{{ asset('assets/css/agendaBudaya.css') }}">
    
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

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1 class="hero-title">judul</h1>
            <p class="hero-desc">lorem ipsum descripsikan</p>
        </div>
    </section>

    <section class="content-section">
        <div class="content-wrapper">

            <!-- LEFT -->
            <div class="content-left">
                <h2 class="content-title">Judul Acara</h2>

                <div class="content-info">
                    <p><i class="ri-map-pin-line"></i> Ambon</p>
                    <p><i class="ri-time-line"></i> 18.30 WIT</p>
                </div>
            </div>

            <!-- RIGHT (GAMBAR) -->
            <div class="content-right">
                <img src="/assets/images/lenso2.jpg" alt="Image">
            </div>
        </div>
        <div class="wrapper2">
            <img src="/assets/images/lenso2.jpg" alt="">
            <div class="text-boxx">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque dolores hic consequuntur magnam eligendi quidem, assumenda vel, culpa molestiae eaque commodi aperiam molestias id eum tempore ratione blanditiis, totam vitae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum obcaecati, sequi sunt doloremque unde exercitationem, architecto veniam aperiam corporis blanditiis rerum eos esse maxime quibusdam quia illum totam. Exercitationem, non? Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum alias nostrum repellendus, assumenda quas dolores quasi libero perspiciatis quidem suscipit ducimus nam sunt voluptate temporibus eius beatae enim. Voluptatibus, perferendis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam ducimus, aut adipisci corrupti animi sint ratione! Quis natus ducimus consequatur modi voluptatum, illo doloremque accusamus dolor iusto quae dignissimos doloribus! <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus et explicabo, quam earum delectus blanditiis eaque. Iusto quia nobis, soluta illum tenetur reiciendis ipsum cumque harum magnam aliquid necessitatibus quos! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore quas, impedit ullam maiores voluptatem temporibus, odit nulla soluta tempora possimus aliquam dicta? Quisquam, ullam hic repudiandae perspiciatis nisi in vel! Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque molestias alias necessitatibus, eligendi numquam eveniet, nostrum reiciendis aliquam exercitationem dolore totam eaque nisi error odio! Ab, asperiores at? Quod, officia.</p>
            </div>
        </div>
    </section>

    <div class="pembatas">
      <div class="judull">
          <h2>Lihat Juga</h2>
      </div>
    </div>

    <div class="coontainer">
      
      <div class="carrd">
        <div class="imgBx">
          <img src="/assets/images/lenso2.jpg" alt="">
        </div>
        <div class="coontent">
          <h2>Judul</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores ratione exercitationem natus, eaque ad maxime doloremque rem eius velit cumque atque magnam illo fugit dolor aliquam modi fugiat placeat libero.</p>
          <a href="#">Read More</a>
        </div>
      </div>
      <div class="carrd">
        <div class="imgBx">
          <img src="/assets/images/lenso2.jpg" alt="">
        </div>
        <div class="coontent">
          <h2>Judul</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores ratione exercitationem natus, eaque ad maxime doloremque rem eius velit cumque atque magnam illo fugit dolor aliquam modi fugiat placeat libero.</p>
          <a href="#">Read More</a>
        </div>
      </div>
      <div class="carrd">
        <div class="imgBx">
          <img src="/assets/images/lenso2.jpg" alt="">
        </div>
        <div class="coontent">
          <h2>Judul</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores ratione exercitationem natus, eaque ad maxime doloremque rem eius velit cumque atque magnam illo fugit dolor aliquam modi fugiat placeat libero.</p>
          <a href="#">Read More</a>
        </div>
      </div>
    </div>
    





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
            <li><a href="{{ route('pengguna.index') }}">Home</a></li>
            <li><a href="#">Quiz</a></li>
            <li><a href="#">Budaya</a></li>
          </ul>
        </div>

        <!-- RESOURCE -->
        <div class="footer-section resources">
          <h2>Resource</h2>
          <ul>
            <li><a href="#">Tarian Tradisional</a></li>
            <li><a href="#">Pakaian Tradisional</a></li>
            <li><a href="#">Makanan Khas Maluku</a></li>
            <li><a href="#">Musik Tradisional</a></li>
          </ul>
        </div>

        <!-- MAPS MASK -->
        <div class="footer-section newsletter">
          <h2>Maps Maluku</h2>

          <div class="map-mask" onclick="window.location='{{ route('pengguna.budaya') }}'">
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

    <a href="#chatbot" target="_blank" class="chatbot">
        <i class="ri-telegram-2-fill"></i>
    </a>

    {{-- jquery --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

    {{-- Scroll Reveal --}}
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>

    {{-- swiper js --}}
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    
    <!-- main js-->
    <script src="{{ asset('assets/js/agendaBudaya.js') }}"></script>

</body>
</html>