<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>WoOx Travel - Special Deals</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-woox-travel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ route('pengguna.index') }}" class="logo"
                            style="display:flex; align-items:flex-start;">
                            <img src="assets/images/logo.png" alt=""
                                style="height:140px; object-fit:contain; margin-top:-40px;">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li>
                                <a href="{{ route('pengguna.index') }}"
                                    class="{{ request()->routeIs('pengguna.index') ? 'active' : '' }}">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pengguna.about') }}"
                                    class="{{ request()->routeIs('pengguna.about') ? 'active' : '' }}">
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pengguna.deals') }}"
                                    class="{{ request()->routeIs('pengguna.deals') ? 'active' : '' }}">
                                    Deals
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pengguna.reservation') }}"
                                    class="{{ request()->routeIs('pengguna.reservation') ? 'active' : '' }}">
                                    Reservation
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pengguna.reservation') }}"
                                    class="{{ request()->routeIs('pengguna.reservation') ? 'active' : '' }}">
                                    Book Yours
                                </a>
                            </li>
                        </ul>


                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4>Discover Our Weekly Offers</h4>
                <h2>Amazing Prices &amp; More</h2>

                <!-- ✅ Search form dipindahkan ke sini -->
                <div class="search-form" style="margin-top: 40px;">
                    <form id="search-form" name="gs" method="submit" role="search" action="#">
                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                                <fieldset>
                                    <select name="Location" class="form-select" id="chooseLocation">
                                        <option selected>Destinations</option>
                                        <option value="Italy">Italy</option>
                                        <option value="France">France</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Australia">Australia</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Singapore">Singapore</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-2">
                                <fieldset>
                                    <button class="border-button">Search Results</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ✅ Search form selesai -->
            </div>
        </div>
    </div>
</div>



    <div class="amazing-deals">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading text-center">
                        <h2>Best Weekly Offers In Each City</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image">
                                    <img src="assets/images/deals-01.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="content">
                                    <span class="info">*Limited Offer Today</span>
                                    <h4>Glasgow City Lorem</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="fa fa-clock"></i>
                                            <span class="list">5 Days</span>
                                        </div>
                                        <div class="col-6">
                                            <i class="fa fa-map"></i>
                                            <span class="list">Daily Places</span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet dire consectetur adipiscing elit.</p>
                                    <div class="main-button">
                                        <a href="reservation.html">Make a Reservation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image">
                                    <img src="assets/images/deals-02.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="content">
                                    <span class="info">*Today & Tomorrow Only</span>
                                    <h4>Venezia Italy Ipsum</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="fa fa-clock"></i>
                                            <span class="list">5 Days</span>
                                        </div>
                                        <div class="col-6">
                                            <i class="fa fa-map"></i>
                                            <span class="list">Daily Places</span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet dire consectetur adipiscing elit.</p>
                                    <div class="main-button">
                                        <a href="reservation.html">Make a Reservation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image">
                                    <img src="assets/images/deals-03.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="content">
                                    <span class="info">**Undefined</span>
                                    <h4>Glasgow City Lorem</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="fa fa-clock"></i>
                                            <span class="list">5 Days</span>
                                        </div>
                                        <div class="col-6">
                                            <i class="fa fa-map"></i>
                                            <span class="list">Daily Places</span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet dire consectetur adipiscing elit.</p>
                                    <div class="main-button">
                                        <a href="reservation.html">Make a Reservation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image">
                                    <img src="assets/images/deals-04.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <div class="content">
                                    <span class="info">*Offer Until 24th March</span>
                                    <h4>Glasgow City Lorem</h4>
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="fa fa-clock"></i>
                                            <span class="list">5 Days</span>
                                        </div>
                                        <div class="col-6">
                                            <i class="fa fa-map"></i>
                                            <span class="list">Daily Places</span>
                                        </div>
                                    </div>
                                    <p>This free CSS template is provided by Template Mo website.</p>
                                    <div class="main-button">
                                        <a href="reservation.html">Make a Reservation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <ul class="page-numbers">
                        <li><a href="#"><i class="fa fa-arrow-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2>Tertarik Mempelajari Budaya Maluku?</h2>
                    <h4>Jelajahi warisan budaya Maluku dan temukan nilai-nilai luhur di balik setiap tradisi.</h4>
                </div>
                <div class="col-lg-4">
                    <div class="border-button">
                        <a href="{{ route('pengguna.about') }}">Mulai Belajar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="custom-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved.
                    <br>Design: <a href="https://templatemo.com" target="_blank"
                        title="free CSS templates">TemplateMo</a> Distribution: <a
                        href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
        </div>
    </div>
</footer>



    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Additional JS Files -->
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        $(".option").click(function() {
            $(".option").removeClass("active");
            $(this).addClass("active");
        });
    </script>

</body>

</html>
