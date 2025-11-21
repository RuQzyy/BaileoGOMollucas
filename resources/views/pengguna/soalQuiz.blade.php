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
    <link rel="stylesheet" href="{{ asset('assets/css/soalQuiz.css') }}">
    
    <title>Baileo Go Mollucas</title>
</head> 
<body>
 

    {{-- Quiz --}}
    <div class="quiz-wrapper">

        <!-- PROGRESS BAR -->
        <div class="quiz-progress" id="progressBar">
            <!-- 20 garis -->
        </div>

        
        <div class="top-row">
                <a href="{{ route('pengguna.quiz') }}" class="back-btn">Kembali</a>

                <!-- LOGO KANAN -->
                <img class="quiz-logo" src="assets/images/logo_BGM.png" alt="logo">
            </div>

        <div class="quiz-card">

            

            <h2 class="question-number" id="questionNumber">Pertanyaan 1/20</h2>
            <h3 class="question-text" id="questionText">
                Ikan asar adalah olahan ikan dengan cara…
            </h3>

            <div class="options" id="optionsList">
                <!-- opsi muncul via JS -->
            </div>

            <p class="explanation" id="explanation"> Jawaban: </p>

            <button class="next-btn" id="nextBtn">Pertanyaan Selanjutnya →</button>
        </div>
    </div>


    {{-- jquery --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

    {{-- Scroll Reveal --}}
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>

    {{-- swiper js --}}
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    
    <!-- main js-->
    <script src="{{ asset('assets/js/soalQuiz.js') }}"></script>
</body>
</html>