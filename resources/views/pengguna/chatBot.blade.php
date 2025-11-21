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
    <link rel="stylesheet" href="{{ asset('assets/css/chatBot.css') }}">
    
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

    <section class="chatBot">
        <div class="floor-glow"></div>
        <h1>BaileoBot</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque, iste? Reiciendis in repellendus soluta, laudantium fuga temporibus veniam id. Recusandae eveniet itaque culpa inventore aliquam architecto quas ex aliquid velit.</p>

        <div class="chat-box">
            <!-- Pesan dari orang lain -->
            <div class="msg-row left">
                <div class="avatar"></div>
                <div class="bubble">Halo, ada yang bisa saya bantu?</div>
            </div>

            <!-- Pesan dari kita -->
            <div class="msg-row right">
                <div class="bubble-right">Saya ingin tahu budaya Maluku.</div>
            </div>

            <!-- Pesan lain -->
            <div class="msg-row left">
                <div class="avatar"></div>
                <div class="bubble">Baik, mari saya jelaskan.</div>
            </div>

            <!-- Input -->
            <div class="input-row">
                <div class="input-box"></div>
                <div class="send-btn"><i class="ri-telegram-2-fill"></i></div>
            </div>

        </div>

    </section>


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