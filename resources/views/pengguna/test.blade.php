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
            <li><a href="{{ route('pengguna.index') }}" class="nav__link active-link">Home</a></li>
            <li><a href="{{ route('pengguna.quiz') }}" class="nav__link ">Quiz</a></li>
            <li><a href="{{ route('pengguna.budaya') }}"  class="nav__link ">Budaya</a></li>
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
    @foreach ($budayaCarousel as $item)
    <div class="item">
        <img src="{{ asset('storage/' . $item->gambar) }}" alt="">
        <div class="content">
            <div class="author">BUDAYA MALUKU</div>
            <div class="title">{{ $item->kategori }}</div>
            <div class="topic">{{ $item->nama }}</div>

            <div class="buttons">
    <a href="{{ route('pengguna.budaya.show', $item->id) }}">
        <button type="button">SEE MORE</button>
    </a>
</div>

        </div>
    </div>
@endforeach

</div>
<div class="thumbnail">
    @foreach ($budayaThumbnail as $b)
    <a href="{{ route('pengguna.budaya.show', $b->id) }}" class="thumbnail-link" style="text-decoration:none; color:inherit;">
        <div class="item">
            <img src="{{ asset('storage/' . $b->gambar) }}" alt="">
            <div class="content">
                <div class="title">
                    {{ $b->nama }}
                </div>
                <div class="des">
                    <i class="ri-map-pin-2-fill">{{ $b->lokasi ?? 'Maluku' }}</i>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>



      {{-- arrows --}}
      <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
      </div>
      <div class="time"></div>
    </div>

    <div class="layout-wrapper">

      <!-- LEFT 25% -->
      <div class="left-info">
        <h1>Telusuri Budaya Maluku</h1>
        <p>Kenali lebih dekat kekayaan tradisi dan tarian dari bumi para raja.</p>
      </div>

     <!-- RIGHT 75% -->
<div class="right-gallery">
  <div class="gallery">

    @foreach ($randomBudaya as $item)
      <a href="{{ route('pengguna.budaya.show', $item->id) }}" class="gcard">
        <img src="{{ asset('storage/' . $item->gambar) }}">
        <div class="ginfo">
          <h3>{{ $item->nama }}</h3>
          <p>{{ $item->lokasi }}</p>
        </div>
      </a>
    @endforeach

  </div>
</div>

    </div>

    {{-- pengetahuan --}}
    <div class="container3">
        <!-- LEFT IMAGE / MASK -->
        <div class="left2">
            <div class="masked-img"></div>
        </div>


        <!-- RIGHT CONTENT -->
        <div class="right2">
            <h3>Surga Di Timur Nusantara</h3>
            <h1 class="title2">MALUKU</h1>

            <p class="desc2">
              Maluku adalah sebuah kepulauan di Indonesia bagian timur yang terkenal dengan keindahan lautnya, kekayaan rempah-rempah, serta keragaman suku dan tradisi yang masih terjaga hingga kini. Terletak di antara Sulawesi dan Papua, wilayah ini membentang luas di tengah Laut Banda dan dikenal sebagai daerah yang kaya sejarah, budaya, serta memiliki peran penting sejak masa perdagangan rempah dunia.
            </p>

            <div class="info2">
                <div class="info-box">
                    <h2 class="h2">1.400+</h2>
                    <span>Pulau</span>
                </div>

                <div class="info-box">
                    <h2 class="h2">11</h2>
                    <span>Suku</span>
                </div>

                {{-- <button class="btn2">MORE INFO</button> --}}
            </div>

            <!-- VERTICAL ICONS -->
            <div class="icons">
              <a href="{{ route('pengguna.test') }}" class="icon2">
                  <i class="ri-treasure-map-fill"></i>
              </a>

              <a href="{{ route('pengguna.quiz') }}" class="icon2">
                  <i class="ri-brain-2-line"></i>
              </a>

              <a href="{{ route('pengguna.budaya') }}" class="icon2">
                  <i class="ri-hourglass-fill"></i>
              </a>
          </div>

        </div>
    </div>

    {{-- budaya home --}}
    <section class="awesome">
        <div class="awesome-content">
          <h2>Mengapa Budaya Maluku Begitu Unik?</h2>
          <p>
            Budaya Maluku itu unik karena penuh nilai persaudaraan, seperti tradisi pela gandong yang mengajarkan hubungan antar-desa layaknya keluarga. Musik, tarian, hingga cerita adatnya juga masih dijaga, sementara rempah seperti pala dan cengkih menjadi bukti betapa pentingnya Maluku sejak dulu. Semua ini membuat budaya Maluku kaya, hidup, dan punya karakter yang kuat.
          </p>
          <button class="btn-awesome">Belajar Budaya</button>
        </div>

        <div class="awesome-image-wrapper">
          <img src="assets/images/alifuru.jpg" alt="lenso" class="awesome-masked-image">
        </div>
    </section>

    {{-- kegiatan kami --}}
    {{-- <div class="blog-posts-container">
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
    </div> --}}

    {{-- card halaman --}}
    <div class="halamans">
      <h1>Jelajahi</h1>
      <div class="content2">
        <div class="scards">
          <div class="cardd">
            <div class="sbox">
              <i class="ri-translate"></i>
              <h3>Translate Bahasa</h3>
              <p>Belajar bahasa Ambon dengan menggunakan translate bahasa</p>
              <a href="{{ route('pengguna.quiz') }}">Belajar</a>
            </div>
          </div>
          <div class="cardd">
            <div class="sbox">
              <i class="ri-question-mark"></i>
              <h3>Quiz</h3>
              <p>Uji pengetahuanmu dengan mengikut quiz buaday maluku</p>
              <a href="{{ route('pengguna.soalQuiz') }}">Muali Quiz</a>
            </div>
          </div>
          <div class="cardd">
            <div class="sbox">
              <i class="ri-book-open-fill"></i>
              <h3>Belajar Budaya Maluku</h3>
              <p>Pelajari lebih jauh mengenai budaya maluku</p>
              <a href="{{ route('pengguna.budaya') }}">Belajar</a>
            </div>
          </div>
        </div>
      </div>
    </div>

 {{-- acara adat --}}
<section class="latest-stories">
  <div class="header-row">
    <h2>Kegiatan Budaya</h2>

    <a href="{{ route('pengguna.agendaBudaya.list') }}">
        <button class="btn-awesome">View More</button>
    </a>
  </div>

  <div class="stories-grid">

    <!-- LEFT BIG STORY -->
    @if ($bigStory)
    <a href="{{ route('pengguna.agendaBudaya.detail', $bigStory->id) }}" class="big-story story-link">
        <img src="{{ asset('storage/'.$bigStory->gambar) }}" alt="big story">

        <div class="big-story-text">
          <span class="category">{{ $bigStory->sub_judul }}</span>

          <h3>{{ $bigStory->judul }}</h3>

          <div class="story-info-row">
            <p class="story-desc">{{ $bigStory->deskripsi_singkat }}</p>

            <div class="story-meta">
              <span class="meta-cal">
                <i class="ri-calendar-2-line"></i>
                {{ \Carbon\Carbon::parse($bigStory->tanggal)->format('d M') }}
                -
                @if ($bigStory->tanggal_berakhir)
                  {{ \Carbon\Carbon::parse($bigStory->tanggal_berakhir)->format('d M') }}
                @else
                  {{ \Carbon\Carbon::parse($bigStory->tanggal)->format('d M') }}
                @endif
              </span>

              <span class="meta-place">
                <i class="ri-map-pin-fill"></i>
                {{ $bigStory->lokasi }}
              </span>
            </div>
          </div>
        </div>
    </a>
    @else
      <p>Tidak ada event mendatang.</p>
    @endif


    <!-- RIGHT SMALL STORIES -->
    <div class="small-stories">
      @forelse($smallStories as $story)

        <a href="{{ route('pengguna.agendaBudaya.detail', $story->id) }}" class="small-story story-link">
          <img src="{{ asset('storage/'.$story->gambar) }}" alt="">

          <div>
            <span class="category">{{ $story->judul }}</span>
            <h4>{{ $story->sub_judul }}</h4>

            <p>{{ \Carbon\Carbon::parse($story->tanggal)->format('M d, Y') }}</p>
          </div>
        </a>

      @empty
        <p class="text-gray-500">Belum ada event yang selesai.</p>
      @endforelse
    </div>

  </div>
</section>




    {{-- wisata --}}
    <section class="mosaic-section">
      <div class="mosaic-section-wrapper">

        <!-- LEFT: MOSAIC -->
        <div class="mosaic">

          <!-- left column -->
          <div class="col col-left">
            <div class="cell left-top">
              <img src="assets/images/lenso2.jpg" alt="img1">
            </div>
            <div class="cell left-bottom">
              <img src="assets/images/oke.jpg" alt="img3">
            </div>
          </div>

          <!-- right column -->
          <div class="col col-right">
            <div class="cell right-top">
              <img src="assets/images/baileo.jpg" alt="img2">
            </div>
            <div class="cell right-bottom">
              <img src="assets/images/malukuu.jpg" alt="img4">
            </div>
          </div>
        </div>

        <!-- RIGHT: TEXT CONTENT -->
        <div class="right-content">
          <h2 class="right-title">Explore, Learn, and Play<br>with Maluku Culture!</h2></h2>

          <div class="right-underline"></div>

          <p class="right-text">
            Temukan cara seru untuk mengenal Maluku melalui kuis interaktif, belajar kosa kata
            Bahasa Ambon, hingga memahami tradisi, sejarah, dan kekayaan budayanya.
            Semua dirancang agar kamu bisa belajar dengan mudah, menyenangkan, dan penuh wawasan!
          </p>

          <a href="{{ route('pengguna.budaya') }}" class="right-btn">Read More...</a>
        </div>

      </div>
    </section>

    {{-- slider card akhir --}}
    <section class="carousel2">
      {{-- carousel cards 1 --}}
    <div class="carousel__content">
    @foreach ($randomSlider->take(6) as $item)
        <article class="carousel__card">
            <div class="carousel__image">
                <img src="{{ asset('storage/' . $item->gambar) }}" class="carousel__img">
            </div>
            <h3 class="carousel__name">{{ $item->nama }}</h3>
            <p>{{ $item->kategori }}</p>
        </article>
    @endforeach
</div>

<div class="carousel__content carousel__reverse">
    @foreach ($randomSlider->slice(6, 6) as $item)
        <article class="carousel__card">
            <div class="carousel__image">
                <img src="{{ asset('storage/' . $item->gambar) }}" class="carousel__img">
            </div>
            <h3 class="carousel__name">{{ $item->nama }}</h3>
            <p>{{ $item->kategori }}</p>
        </article>
    @endforeach
</div>


    </section>

    {{-- mask akhir --}}
    {{-- <div class="hero">
      <div class="hero-content">
        <h1>World-class venture studio building sustainable solutions</h1>
        <p>We provide distinct solutions that are tailored to the founder needs at each stage of their journey to scale.</p>

        <div class="buttons">
          <a href="#" class="btn btn-fill">Get onboarded</a>
          <a href="#" class="btn btn-outline">Learn more</a>
        </div>
      </div>

      <div class="hero-illustration">
        <img src="assets/images/mapss2.png" alt="forest" class="masked-img">
      </div>
    </div> --}}

    {{-- slider tokoh --}}
    {{-- <section id="tranding">
      <div class="containerr">
        <h1 class="text-center section-heading">Kenali Maluku Lebih Dekat</h1>
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

    {{-- Modal Maps--}}
@include('components.maps')

</body>
</html>
