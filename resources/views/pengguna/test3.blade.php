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
    <link rel="stylesheet" href="{{ asset('assets/css/test.css') }}">
    
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

    {{-- carousel --}}
    <div class="carousel">
      {{-- list item --}}
      <div class="list">
        <div class="item">
          <img src="assets/images/bambu.jpg" alt="">
          <div class="content">
            <div class="author">BUDAYA MALUKU</div>
            <div class="title">BAMBU</div>
            <div class="topic">GILA</div>
            {{-- <div class="des">
              “Bambu Gila adalah tradisi khas Maluku yang dibawakan melalui ritual pawang, membuat sebatang bambu bergerak liar seolah memiliki kekuatan tak terlihat. Warisan budaya kuno ini menjadi simbol kuat hubungan masyarakat Maluku dengan alam dan leluhur.”
            </div> --}}
            <div class="buttons">
              <button>SEE MORE</button>
              <button>SUBSCRIBE</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="assets/images/hd_orlapei.jpg" alt="">
          <div class="content">
            <div class="author">BUDAYA MALUKU</div>
            <div class="title">TARI</div>
            <div class="topic">ORLAPEI</div>
            {{-- <div class="des">
              “Tarian Orlapei adalah tarian penyambutan khas Maluku yang mengekspresikan sukacita dan rasa hormat kepada tamu kehormatan. Dibawakan oleh muda-mudi secara berpasangan, tarian ini diiringi musik tradisional seperti tifa, suling bambu, ukulele, dan gitar. Orlapei juga mencerminkan nilai keterbukaan dan kehangatan masyarakat Maluku dalam menerima tamu.”
            </div> --}}
            <div class="buttons">
              <button>SEE MORE</button>
              <button>SUBSCRIBE</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="assets/images/hd_cakalele0.jpeg" alt="">
          <div class="content">
            <div class="author">BUDAYA MALUKU</div>
            <div class="title">TARI</div>
            <div class="topic">CAKALELE</div>
            {{-- <div class="des">
              “Tarian Cakalele adalah tarian tradisional Maluku yang melambangkan keberanian dan semangat perjuangan. Ditampilkan dalam upacara adat dan perayaan penting, tarian ini berakar dari makna ‘roh yang mengamuk’ sebagai simbol kekuatan dan warisan leluhur.”
            </div> --}}
            <div class="buttons">
              <button>SEE MORE</button>
              <button>SUBSCRIBE</button>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="assets/images/lenso2.jpg" alt="">
          <div class="content">
            <div class="author">BUDAYA MALUKU</div>
            <div class="title">TARI</div>
            <div class="topic">LENSO</div>
            {{-- <div class="des">
              “Tarian Lenso adalah tarian tradisional Maluku yang menggunakan sapu tangan sebagai ciri khas. Tarian ini tampil dalam berbagai acara adat dan perayaan, mencerminkan keceriaan serta akulturasi budaya yang kaya di Maluku.”
            </div> --}}
            <div class="buttons">
              <button>SEE MORE</button>
              <button>SUBSCRIBE</button>
            </div>
          </div>
        </div>
      </div>
      {{-- thumbnail --}}
      <div class="thumbnail">
        <div class="item">
          <img src="assets/images/bambu.jpg" alt="">
          <div class="content">
            <div class="title">
              Bambu Gila
            </div>
            <div class="des">
              <i class="ri-map-pin-2-fill">Ternate, Maluku</i>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="assets/images/hd_orlapei.jpg" alt="">
          <div class="content">
            <div class="title">
              Orlapei
            </div>
            <div class="des">
              <i class="ri-map-pin-2-fill">Maluku</i>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="assets/images/hd_cakalele0.jpeg" alt="">
          <div class="content">
            <div class="title">
              Tari Cakalele
            </div>
            <div class="des">
              <i class="ri-map-pin-2-fill">Maluku</i>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="assets/images/lenso2.jpg" alt="">
          <div class="content">
            <div class="title">
              Tari Lenso
            </div>
            <div class="des">
              <i class="ri-map-pin-2-fill">Maluku</i>
            </div>
          </div>
        </div>
      </div>
      {{-- arrows --}}
      <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
      </div>
      <div class="time"></div>
    </div>


    {{-- kegiatan kami --}}
    <div class="blog-posts-container">
      <div class="blog-post">
        <div class="thumbnaill">
          <img src="assets/images/lenso2.jpg" alt="">
        </div>
        <div class="text-content">
          <div class="label">Acara Budaya</div>
          <h3 class="post-title">Cakalele</h3>
          <div class="summary">
              <div class="timee"><i class="ri-calendar-2-line"></i> 30 January - 02 February</div>
              <div class="timee"><i class="ri-time-fill"></i> 18.30</div>
              <div class="location"><i class="ri-map-pin-fill"></i>Ambon</div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi vitae fugit quas officiis deserunt mollitia dolorum maxime excepturi enim corporis, rerum veritatis perferendis. Eius, molestiae soluta ut facilis debitis mollitia.</p>
          </div>
          <a class="read-more-btn" href="#">Read More...</a>
        </div>
      </div>
      {{-- <div class="blog-post">
        <div class="thumbnaill">
          <img src="assets/images/lenso2.jpg" alt="">
        </div>
        <div class="text-content">
          <div class="label">Masterclass</div>
          <h3 class="post-title">Cakalele</h3>
          <div class="summary">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate nulla saepe itaque, necessitatibus excepturi adipisci non dolorum enim distinctio voluptate facere sit corrupti perferendis mollitia nostrum illo doloribus beatae harum!
          </div>
          <a class="read-more-btn" href="#">Read More...</a>
        </div>
      </div> --}}
    </div>

    {{-- interactive map --}}
    <div class="titlle">
      <h1>Server Location</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias hic aspernatur maxime nesciunt quaerat tempora sit, totam quis quia unde eum enim, aliquam atque non pariatur dicta rem debitis quos?</p>
    </div>

    {{-- slider tokoh --}}
    <div class="wrapper">
    <!-- KIRI 30% -->
    <div class="left-info">
        <h2>Sejarah Tokoh Maluku</h2>
        <p>
            Maluku memiliki banyak tokoh bersejarah yang berjasa bagi bangsa Indonesia.
            Mereka adalah simbol perjuangan, keberanian, dan keteguhan hati masyarakat Maluku.
            Dari Sultan Baabullah hingga Martha Christina Tiahahu, setiap tokoh memiliki
            kisah perjuangan yang menginspirasi.
        </p>
    </div>

    <!-- KANAN 70% (SLIDER KAMU) -->
    <div class="right-slider">

        <section id="tranding">
            <div class="containerr">
                <h1 class="text-center section-heading">Tokoh Di Maluku</h1>
            </div>

            <div class="containerr ">
                <div class="swiper tranding-slider">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide tranding-slide">
                            <div class="tranding-slide-img">
                                <img src="assets/images/sultan-baabullah.jpeg" alt="Tranding">
                            </div>
                            <div class="tranding-slide-content">
                                <h1 class="tokohUp">Tokoh</h1>
                                <div class="tranding-slider-content-bottom">
                                    <h2 class="tokoh-name">Sultan Baabullah</h2>
                                    <h3 class="asal"><span>Maluku</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide tranding-slide">
                            <div class="tranding-slide-img">
                                <img src="assets/images/KS_Tubun.jpeg" alt="Tranding">
                            </div>
                            <div class="tranding-slide-content">
                                <h1 class="tokohUp">Tokoh</h1>
                                <div class="tranding-slider-content-bottom">
                                    <h2 class="tokoh-name">AIP. TK. II Brig.Pol. KS Tubun</h2>
                                    <h3 class="asal"><span>Maluku</span></h3>
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
                                    <h2 class="tokoh-name">Martha Christina Tijahahu</h2>
                                    <h3 class="asal"><span>Maluku</span></h3>
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
                                    <h2 class="tokoh-name">Kapitan Pattimura</h2>
                                    <h3 class="asal"><span>Maluku</span></h3>
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
                                    <h2 class="tokoh-name">Nuku Muhammad Amiruddin</h2>
                                    <h3 class="asal"><span>Maluku</span></h3>
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
                                    <h2 class="tokoh-name">Dr. Johannes Leimena</h2>
                                    <h3 class="asal"><span>Maluku</span></h3>
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
        </section>

    </div>
</div>

    
    {{-- <section class="slider-container">
      <div class="slider-images">
        <div class="slider-img">
          <img src="assets/images/sultan-baabullah.jpeg" alt="1">
          <h1>Sultan Baabullah</h1>
          <div class="details">
            <h2>Sultan Baabullah</h2>
            <p><p>yuyun</p></p>  
          </div>
        </div>
        <div class="slider-img">
          <img src="assets/images/KS_Tubun.jpeg" alt="2">
          <h1>AIP. TK. II Brig.Pol. KS Tubun</h1>
          <div class="details">
            <h2>AIP. TK. II Brig.Pol. KS Tubun</h2>
            <p>yuyun</p>  
          </div>
        </div>
        <div class="slider-img">
          <img src="assets/images/martha-christina-tijahahu.jpeg" alt="3">
          <h1>Martha Christina Tijahahu</h1>
          <div class="details">
            <h2>Martha Christina Tijahahu</h2>
            <p>yuyun</p>  
          </div>
        </div>
        <div class="slider-img active">
          <img src="assets/images/ilustrasi-kapitan-pattimura.jpeg" alt="4">
          <h1>Kapitan Pattimura</h1>
          <div class="details">
            <h2>Kapitan Pattimura</h2>
            <p>yuyun</p>
          </div>
        </div>
        <div class="slider-img">
          <img src="assets/images/nuku-muhammad-amiruddin.jpeg" alt="5">
          <h1>Nuku Muhammad Amiruddin</h1>
          <div class="details">
            <h2>Nuku Muhammad Amiruddin</h2>
            <p>yuyun</p>
          </div>
        </div>
        <div class="slider-img">
          <img src="assets/images/dr-johannes-leimena.jpeg" alt="6">
          <h1>Dr. Johannes Leimena</h1>
          <div class="details">
            <h2>Dr. Johannes Leimena</h2>
            <p>yuyun</p>
          </div>
        </div>
        <div class="slider-img">
          <img src="assets/images/dr-johannes-leimena.jpeg" alt="7">
          <h1>Dr. Johannes Leimena</h1>
          <div class="details">
            <h2>Dr. Johannes Leimena</h2>
            <p>yuyun</p>
          </div>
        </div>
      </div>
    </section> --}}


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
                <a href="{{ route('pengguna.index') }}" class="footer__link">Home</a>
              </li>
              
              <li>
                <a href="{{ route('pengguna.quiz') }}" class="footer__link">Quiz</a>
              </li>
              
              <li>
                <a href="{{ route('pengguna.budaya') }}" class="footer__link">Budaya</a>
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
    <script src="{{ asset('assets/js/test.js') }}"></script>

    {{-- <script>
      jQuery(document).ready(function($){
        $('.slider-img').on('click', function(){
          $('.slider-img').removeClass('active');
          $(this).addClass('active');
        })
      });
    </script> --}}

</body>
</html>