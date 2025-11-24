<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://db.onlinewebfonts.com/c/89d11a443c316da80dcb8f5e1f63c86e?family=Bauhaus+93+V2" rel="stylesheet" type="text/css"/>

    {{-- REMIXICON --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css ">

    {{-- Swiper css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/chatBot.css') }}">

    <title>Baileo Go Mollucas</title>
</head>
<body>
  {{-- Header --}}
    <header class="header" id="header">
      <nav class="nav container">
        <a href="#" class="nav__logo">
          <img src="{{ asset('assets/images/logo_BGM.png') }}" alt="image" style="height:70px; object-fit:contain; margin-top:-10px;">
        </a>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li><a href="{{ route('pengguna.test') }}" class="nav__link ">Home</a></li>
            <li><a href="{{ route('pengguna.quiz') }}" class="nav__link ">Quiz</a></li>
            <li><a href="{{ route('pengguna.budaya') }}"  class="nav__link">Budaya</a></li>
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
        <p>Silakan bertanya tentang budaya, adat, musik, tarian, sejarah, bahasa, atau tradisi masyarakat Maluku.</p>

        <div class="chat-box" id="chat-box">
            {{-- Pesan awal BOT --}}
            <div class="msg-row left">
                <div class="avatar"></div>
                <div class="bubble">Halo gandong 👋, ada yang bisa BaileoBOT bantu?</div>
            </div>
        </div>

        {{-- Input --}}
        <div class="input-row">
            <input type="text" id="question" class="input-box" placeholder="Ketik pertanyaan tentang budaya Maluku...">
            <div class="send-btn" id="send-btn"><i class="ri-telegram-2-fill"></i></div>
        </div>

    </section>

    {{-- Scroll Reveal --}}
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>

    {{-- swiper js --}}
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

    {{-- Chat script --}}
   <script>
    document.getElementById("send-btn").addEventListener("click", sendQuestion);
    document.getElementById("question").addEventListener("keydown", function(e) {
        if (e.key === "Enter") sendQuestion();
    });

    let typingIndicator = null;

    function sendQuestion() {
        let question = document.getElementById("question").value.trim();
        if (question === "") return;

        appendUserMessage(question);
        document.getElementById("question").value = "";

        showTypingIndicator();

        fetch("{{ route('ask.baileobot') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ question: question })
        })
        .then(res => res.json())
        .then(data => {
            hideTypingIndicator();
            appendBotMessage(cleanText(data.answer));
        })
        .catch(() => {
            hideTypingIndicator();
            appendBotMessage("⚠ Terjadi kesalahan. Coba lagi nanti.");
        });
    }

    function cleanText(text) {
        if (!text) return "";

        return text
            .replace(/\*\*/g, "")   // hapus bold markdown
            .replace(/\*/g, "")     // hapus bullet "*"
            .replace(/^- /gm, "")   // hapus dash list
            .replace(/[#_]/g, "")   // hapus markdown lain
            .replace(/\n{2,}/g, "\n") // hapus spasi berlebih
            .trim();
    }

    function appendUserMessage(msg) {
        document.getElementById("chat-box").innerHTML += `
            <div class="msg-row right">
                <div class="bubble-right">${msg}</div>
            </div>`;
        scrollBottom();
    }

    function appendBotMessage(msg) {
        document.getElementById("chat-box").innerHTML += `
            <div class="msg-row left">
                <div class="avatar"></div>
                <div class="bubble">${msg}</div>
            </div>`;
        scrollBottom();
    }

    function showTypingIndicator() {
        typingIndicator = document.createElement("div");
        typingIndicator.className = "msg-row left";
        typingIndicator.innerHTML = `
            <div class="avatar"></div>
            <div class="bubble">
                <span id="typing-dots">BaileoBOT sedang mengetik</span>
            </div>
        `;
        document.getElementById("chat-box").appendChild(typingIndicator);

        let dotsText = document.getElementById("typing-dots");
        let dots = 0;
        typingIndicator.interval = setInterval(() => {
            dots = (dots + 1) % 4;
            dotsText.innerHTML = "BaileoBOT sedang mengetik" + ".".repeat(dots);
        }, 350);

        scrollBottom();
    }

    function hideTypingIndicator() {
        if (typingIndicator) {
            clearInterval(typingIndicator.interval);
            typingIndicator.remove();
            typingIndicator = null;
        }
    }

    function scrollBottom() {
        let chat = document.getElementById("chat-box");
        chat.scrollTop = chat.scrollHeight;
    }
</script>

</body>
</html>
