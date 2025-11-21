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
    <link rel="stylesheet" href="{{ asset('assets/css/budaya.css') }}">
    
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

    {{-- slider rekomendasi --}}
    {{-- <section id="tranding">
      <div class="containerr">
        <h1 class="text-center section-heading">Rekomendasi Tempat Wisata</h1>
        <p class="con-p">Nikmati pengalaman wisata yang menenangkan di sudut-sudut indah Kota Ambon. </p>
      </div>
       <div class="containerr ">
        <div class="swiper tranding-slider">
          <div class="swiper-wrapper">
            <div class="swiper-slide tranding-slide">
              <div class="tranding-slide-img">
                <img src="assets/images/wisata.jpg" alt="Tranding">
              </div>
              <div class="tranding-slide-content">
                <h1 class="tokohUp">Wisata</h1>
                <div class="tranding-slider-content-bottom">
                  <h2 class="tokoh-name">
                    Pantai Ora
                  </h2>
                  <h3 class="asal">
                    <span>Maluku</span>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide tranding-slide">
              <div class="tranding-slide-img">
                <img src="assets/images/ikan_kuah.jpeg" alt="Tranding">
              </div>
              <div class="tranding-slide-content">
                <h1 class="tokohUp">Makanan Khas</h1>
                <div class="tranding-slider-content-bottom">
                  <h2 class="tokoh-name">
                    Ikan Kuah Kuning
                  </h2>
                  <h3 class="asal">
                    <span>Maluku</span>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide tranding-slide">
              <div class="tranding-slide-img">
                <img src="assets/images/martha-christina-tijahahu.jpeg" alt="Tranding">
              </div>
              <div class="tranding-slide-content">
                <h1 class="tokohUp">Tokoh</h1>
                <div class="tranding-slider-content-bottom">
                  <h2 class="tokoh-name">
                    Martha Christina Tijahahu
                  </h2>
                  <h3 class="asal">
                    <span>Maluku</span>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide tranding-slide">
              <div class="tranding-slide-img">
                <img src="assets/images/ilustrasi-kapitan-pattimura.jpeg" alt="Tranding">
              </div>
              <div class="tranding-slide-content">
                <h1 class="tokohUp">Tokoh</h1>
                <div class="tranding-slider-content-bottom">
                  <h2 class="tokoh-name">
                    Kapitan Pattimura
                  </h2>
                  <h3 class="asal">
                    <span>Maluku</span>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide tranding-slide">
              <div class="tranding-slide-img">
                <img src="assets/images/nuku-muhammad-amiruddin.jpeg" alt="Tranding">
              </div>
              <div class="tranding-slide-content">
                <h1 class="tokohUp">Tokoh</h1>
                <div class="tranding-slider-content-bottom">
                  <h2 class="tokoh-name">
                    Nuku Muhammad Amiruddin
                  </h2>
                  <h3 class="asal">
                    <span>Maluku</span>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide tranding-slide">
              <div class="tranding-slide-img">
                <img src="assets/images/nuku-muhammad-amiruddin.jpeg" alt="Tranding">
              </div>
              <div class="tranding-slide-content">
                <h1 class="tokohUp">Tokoh</h1>
                <div class="tranding-slider-content-bottom">
                  <h2 class="tokoh-name">
                    Nuku Muhammad Amiruddin
                  </h2>
                  <h3 class="asal">
                    <span>Maluku</span>
                  </h3>
                </div>
              </div>
            </div>
            <div class="swiper-slide tranding-slide">
              <div class="tranding-slide-img">
                <img src="assets/images/dr-johannes-leimena.jpeg" alt="Tranding">
              </div>
              <div class="tranding-slide-content">
                <h1 class="tokohUp">Tokoh</h1>
                <div class="tranding-slider-content-bottom">
                  <h2 class="tokoh-name">
                    Dr. Johannes Leimena
                  </h2>
                  <h3 class="asal">
                    <span>Maluku</span>
                  </h3>
                </div>
              </div>
            </div>
          </div>

          <div class="tranding-slider-control">
            <div class="swiper-button-prev slider-arrow">
              <i class="ri-arrow-left-wide-fill"></i>
            </div>
            <div class="swiper-button-next slider-arrow">
              <i class="ri-arrow-right-wide-fill"></i>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
       </div>
    </section> --}}

    <section class="heritage-slider">
        <div class="containerr">
          <h1 class="text-center section-heading">Rekomendasi Tempat Wisata</h1>
          <p class="con-p">Nikmati pengalaman wisata yang menenangkan di sudut-sudut indah Kota Ambon. </p>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                <!-- CARD 1 -->
                <div class="swiper-slide">
                    <div class="slide-wrapper">
                        <img src="assets/images/wisata.jpg" alt="">
                        <div class="caption">
                            <h3>judul1</h3>
                            <p>Benteng bersejarah peninggalan VOC<br>yang dibangun pada abad ke-17</p>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="swiper-slide">
                    <div class="slide-wrapper">
                        <img src="assets/images/wisata.jpg" alt="">
                        <div class="caption">
                            <h3>judul 2</h3>
                            <p>Benteng bersejarah peninggalan VOC<br>yang dibangun pada abad ke-17</p>
                        </div>
                    </div>
                </div>

                <!-- CARD TENGAH BESAR -->
                <div class="swiper-slide">
                    <div class="slide-wrapper">
                        <img src="assets/images/wisata.jpg" alt="">
                        <div class="caption">
                            <h3>judul 3</h3>
                            <p>Benteng bersejarah peninggalan VOC<br>yang dibangun pada abad ke-17</p>
                        </div>
                    </div>
                </div>

                <!-- CARD 4 -->
                <div class="swiper-slide">
                    <div class="slide-wrapper">
                        <img src="assets/images/wisata.jpg" alt="">
                        <div class="caption">
                            <h3>judul 4</h3>
                            <p>Benteng bersejarah peninggalan VOC<br>yang dibangun pada abad ke-17</p>
                        </div>
                    </div>
                </div>

                <!-- CARD 5 -->
                <div class="swiper-slide">
                    <div class="slide-wrapper">
                        <img src="assets/images/wisata.jpg" alt="">
                        <div class="caption">
                            <h3>judul 5</h3>
                            <p>Benteng bersejarah peninggalan VOC<br>yang dibangun pada abad ke-17</p>
                        </div>
                    </div>
                </div>
                <!-- CARD 5 -->
                <div class="swiper-slide">
                    <div class="slide-wrapper">
                        <img src="assets/images/wisata.jpg" alt="">
                        <div class="caption">
                            <h3>judul 6</h3>
                            <p>Benteng bersejarah peninggalan VOC<br>yang dibangun pada abad ke-17</p>
                        </div>
                    </div>
                </div>
                <!-- CARD 5 -->
                <div class="swiper-slide">
                    <div class="slide-wrapper">
                        <img src="assets/images/wisata.jpg" alt="">
                        <div class="caption">
                            <h3>judul 7</h3>
                            <p>Benteng bersejarah peninggalan VOC<br>yang dibangun pada abad ke-17</p>
                        </div>
                    </div>
                </div>
                <!-- CARD 5 -->
                <div class="swiper-slide">
                    <div class="slide-wrapper">
                        <img src="assets/images/wisata.jpg" alt="">
                        <div class="caption">
                            <h3>judul 8</h3>
                            <p>Benteng bersejarah peninggalan VOC<br>yang dibangun pada abad ke-17</p>
                        </div>
                    </div>
                </div>

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
                        <li class="dropdown-list-item" data-name="rumah">Rumah Adat</li>
                        <li class="dropdown-list-item" data-name="pakaian">Pakaian Tradisional</li>
                        <li class="dropdown-list-item" data-name="musik">Musik Tradisional</li>
                        <li class="dropdown-list-item" data-name="alat">Alat Musik Tradisional</li>
                        <li class="dropdown-list-item" data-name="makan">Makan Tradisional</li>
                        <li class="dropdown-list-item" data-name="sejarah">Sejarah</li>
                        <li class="dropdown-list-item" data-name="cerita">Cerita Rakyat</li>
                        <li class="dropdown-list-item" data-name="tokoh">Tokoh</li>
                    </ul>
                </div>
                

                {{-- search box input --}}
                <div class="search-box">
                    <input type="text" id="search-input" placeholder="Cari">
                    <i class="ri-search-2-line"></i>
                </div>
            </div>    

                {{-- menu link --}}
                {{-- <div class="items-link">
                    <span class="item-link menu-active" data-name="rumah">Rumah Adat</span>
                    <span class="item-link " data-name="pakaian">Pakaian </span>
                    <span class="item-link " data-name="musik">Musik </span>
                    <span class="item-link " data-name="alat">Alat Musik </span>
                    <span class="item-link " data-name="makanan">Makanan </span>
                    <span class="item-link " data-name="cerita">Cerita Rakyat</span>
                </div> --}}
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
                        <div class="project-img" data-name="pakaian"> 
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
                        <div class="project-img" data-name="pakaian"> 
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
                                <h4>eunwoo adalah jodohnya yuyun</h4>
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
                    <div id="no-result-message" class="no-result" style="display:none;">
                        <p>Maaf, data belum ada <i class="ri-emotion-sad-line"></i><br>Apakah kamu ingin menanyakan di <a href="#chatbot" class="ask-chatbot">ChatBot?</a></p>
                    </div>
            </div>
        </section> 
        <!-- Modal container -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-body">
                <img class="modal-img" src="" alt="">
                <div class="modal-info">
                    <h3 class="modal-title">Nama Rumah</h3>
                    <p class="modal-location"><i class="ri-map-pin-2-fill"></i>Lokasi rumah</p>
                    <div class="modal-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium qui itaque, ducimus a porro iste alias dicta sequi ea quos atque beatae recusandae modi doloribus inventore praesentium maiores veritatis sed! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse, nihil facere doloribus vero rerum aliquid rem quo, iure excepturi molestias neque id beatae repudiandae explicabo quasi consequatur sit voluptatem repellat. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente suscipit in odio ullam illum esse quas nulla, rerum nostrum repellat accusamus velit, cum consequatur placeat architecto repellendus modi officia dolor! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi asperiores voluptatum quaerat labore quod, vero saepe minima pariatur rerum temporibus quisquam accusantium dolor libero praesentium nihil possimus error ea culpa! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum in, hic, deserunt delectus magni praesentium molestias iure ab consequatur veniam pariatur soluta officiis minus, molestiae itaque dolorem fuga suscipit temporibus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis optio sequi necessitatibus? Sint earum, fuga nesciunt similique perferendis quam exercitationem consectetur quisquam assumenda, soluta adipisci nostrum temporibus! Ea, non consequatur!</p>
                    </div>
                </div>
                </div>
            </div>
        </div>




    
    {{-- Footer --}}
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



    {{-- Scroll Reveal --}}
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>

    {{-- swiper js --}}
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    
    <!-- main js-->
    <script src="{{ asset('assets/js/budaya.js') }}"></script>

    <script>
        // Ambil elemen modal
        const modal = document.getElementById('myModal');
        const closeBtn = document.querySelector('.modal .close');

        // Tombol "Lihat"
        const lihatBtns = document.querySelectorAll('.btn');

        lihatBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
            e.preventDefault();

            // Contoh isi modal (nanti bisa diganti dengan data dari database)
            const card = btn.closest('.project-img');
            const title = card.querySelector('h4').innerText;
            const imgSrc = card.querySelector('img').getAttribute('src');

            // Update isi modal
            modal.querySelector('.modal-title').innerText = title;
            modal.querySelector('.modal-img').setAttribute('src', imgSrc);
            modal.querySelector('.modal-description p').innerText =
                'Deskripsi detail tentang ' + title + ' akan muncul di sini.';

            // Tampilkan modal
            modal.style.display = 'flex';
            });
        });

        // Tutup modal jika klik tombol X
        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // Tutup modal jika klik area luar
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
            modal.style.display = 'none';
            }
        });
    </script>


    
</body>
</html>