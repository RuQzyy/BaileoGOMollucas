<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- REMIXICON --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css ">

    <link rel="stylesheet" href="{{ asset('assets/css/bud.css') }}">
    
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo">Baileo</div>
        <ul class="menu">
            <li>Home</li>
            <li>Quiz</li>
            <li>Budaya</li>
        </ul>
        <div class="search">
             <i class="ri-search-2-line"></i>
        </div>
    </header>

    {{-- slider --}}
    <div class="slider">
        {{-- list --}}
        <div class="list">
            <div class="item active">
                <img src="assets/images/lenso.jpg" alt="">
                <div class="content">
                    <p>design</p>
                    <h2>Slider 01</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, minima adipisci nam quae nulla accusantium quasi minus possimus beatae laborum, debitis perspiciatis harum praesentium ea quisquam ut cupiditate aperiam dicta!</p>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/cakalele.jpg" alt="">
                <div class="content">
                    <p>design</p>
                    <h2>Slider 02</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, minima adipisci nam quae nulla accusantium quasi minus possimus beatae laborum, debitis perspiciatis harum praesentium ea quisquam ut cupiditate aperiam dicta!</p>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/cakalele0.jpg" alt="">
                <div class="content">
                    <p>design</p>
                    <h2>Slider 03</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, minima adipisci nam quae nulla accusantium quasi minus possimus beatae laborum, debitis perspiciatis harum praesentium ea quisquam ut cupiditate aperiam dicta!</p>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/pukul.png" alt="">
                <div class="content">
                    <p>design</p>
                    <h2>Slider 04</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, minima adipisci nam quae nulla accusantium quasi minus possimus beatae laborum, debitis perspiciatis harum praesentium ea quisquam ut cupiditate aperiam dicta!</p>
                </div>
            </div>
            <div class="item">
                <img src="assets/images/oke.jpg" alt="">
                <div class="content">
                    <p>design</p>
                    <h2>Slider 05</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, minima adipisci nam quae nulla accusantium quasi minus possimus beatae laborum, debitis perspiciatis harum praesentium ea quisquam ut cupiditate aperiam dicta!</p>
                </div>
            </div>
        </div>
        {{-- button arrow --}}
        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        {{-- thumbnal --}}
        <div class="thumbnail">
            <div class="item active">
                <img src="assets/images/lenso.jpg" alt="">
                <div class="content">
                    Name Slider
                </div>
            </div>
            <div class="item">
                <img src="assets/images/cakalele.jpg" alt="">
                <div class="content">
                    Name Slider
                </div>
            </div>
            <div class="item">
                <img src="assets/images/cakalele0.jpg" alt="">
                <div class="content">
                    Name Slider
                </div>
            </div>
            <div class="item">
                <img src="assets/images/pukul.png" alt="">
                <div class="content">
                    Name Slider
                </div>
            </div>
            <div class="item">
                <img src="assets/images/oke.jpg" alt="">
                <div class="content">
                    Name Slider
                </div>
            </div>
        </div>



    </div>













    <script src="{{ asset('assets/js/bud.js') }}"></script>
</body>
</html>