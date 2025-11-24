<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://db.onlinewebfonts.com/c/89d11a443c316da80dcb8f5e1f63c86e?family=Bauhaus+93+V2" rel="stylesheet">

    {{-- REMIXICON --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">

    {{-- CSS Quiz --}}
    <link rel="stylesheet" href="{{ asset('assets/css/soalQuiz.css') }}">

    <title>Baileo Go Mollucas - Quiz</title>

    <style>
        #mediaContainer {
            width: 100%;
            margin-top: 15px;
            margin-bottom: 10px;
            text-align: center;
        }

        video, audio {
            width: 100%;
            max-width: 350px;
            border-radius: 8px;
        }

        .explanation {
            display: none;
            margin-top: 12px;
            padding: 12px;
            background: #f0f8ff;
            border-left: 4px solid #007bff;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
        }
    </style>
</head>

<body>

    {{-- Quiz Wrapper --}}
    <div class="quiz-wrapper">

        <!-- PROGRESS BAR -->
        <div class="quiz-progress" id="progressBar"></div>

        <div class="top-row">
            <a href="{{ route('pengguna.quiz') }}" class="back-btn">Kembali</a>

            <img class="quiz-logo" src="{{ asset('assets/images/logo_BGM.png') }}" alt="logo">
        </div>

        <div class="quiz-card">

            <h2 class="question-number" id="questionNumber">Pertanyaan</h2>

            <h3 class="question-text" id="questionText">Loading...</h3>

            <!-- MEDIA -->
            <div id="mediaContainer"></div>

            <!-- OPSI -->
            <div class="options" id="optionsList"></div>

            <!-- PENJELASAN -->
            <p class="explanation" id="explanation"></p>

            <!-- NEXT -->
            <button class="next-btn" id="nextBtn" style="display:none;">
                Pertanyaan Selanjutnya →
            </button>

        </div>
    </div>

    <!-- DATA QUIZ dari BACKEND → JS -->
    <script>
        window.rawQuestions = @json($quizzes);
    </script>

    {{-- Scroll Reveal --}}
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>

    {{-- Swiper JS --}}
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

    {{-- MAIN QUIZ LOGIC --}}
    <script src="{{ asset('assets/js/soalQuiz.js') }}"></script>

</body>
</html>
