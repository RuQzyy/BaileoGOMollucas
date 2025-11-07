<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://db.onlinewebfonts.com/c/89d11a443c316da80dcb8f5e1f63c86e?family=Bauhaus+93+V2" rel="stylesheet" type="text/css"/>
   
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"
    />
     <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/dash.css') }}">
    
    <title>Baileo Go Mollucas</title>
</head> 
<body>
    <header>
        <a href="/" class="logo">BaileoGoMollucas</a>
        <ul class="nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">Bahsa & Quiz</a></li>
            <li><a href="#">Eksplor Budaya</a></li>
        </ul>
        <a href="#" class="menu"><ion-icon name="grid-outline"></ion-icon></a>
    </header>

    <ul class="nav-mobile">
        <li><a href="#">Home</a></li>
        <li><a href="#">Bahsa & Quiz</a></li>
        <li><a href="#">Eksplor Budaya</a></li>
    </ul>

    <!-- Slider main container -->
    <div class="swiper banner-swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <!-- Home Page Slides -->
            <div class="swiper-slide">
                <div class="banner">
                    <img src="assets/images/bambu3.jpg" alt="">
                    <div class="shade">
                        <img src="assets/images/con_map.png" alt="" class="map">
                    </div>
                    <div class="content-left">
                        <h1>Mal</h1>
                        <div class="description">
                            <h3>Jelajahi Pesona Budaya Maluku</h3>
                            <p>Dari rempah, laut, hingga tradisi — temukan kekayaan yang menjadikan Maluku begitu istimewa.</p>
                            <a href="#">Kenali Sekarang</a>
                        </div>
                    </div>
                    <div class="content-right">
                        <h1>u<span>k</span>u</h1>
                        <p class="text-side">pesona tropis di timur nusantara</p>
                    </div>
                </div>
            </div>
            <!-- Great barrier Reef Slides -->
            <div class="swiper-slide">
                <div class="banner">
                    <img src="assets/images/maluku_island.jpg" alt="">
                    <div class="shade"></div>
                </div>
            </div>
                
            <!-- Rain Rorest Slides -->
            <div class="swiper-slide">
                <div class="banner">
                    <img src="assets/images/cele.png" alt="">
                    <div class="shade">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="control">
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </div>
    <div class="event">
        <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis officiis distinctio ea laboriosam aut autem dolorum, aspernatur cumque magni porro id accusamus repellat sequi explicabo cum! Ratione hic officia laudantium?</h3>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

      
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
      <!-- Additional JS Files -->
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
    
</body>
</html>