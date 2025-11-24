// ==========================================
// AMBIL DATA QUIZ DARI BACKEND (/pengguna/quiz/data)
// ==========================================
let questions = [];
let index = 0;
let score = 0;

const progressBar = document.getElementById("progressBar");
const questionNumber = document.getElementById("questionNumber");
const questionText = document.getElementById("questionText");
const optionsList = document.getElementById("optionsList");
const explanation = document.getElementById("explanation");
const nextBtn = document.getElementById("nextBtn");
const mediaContainer = document.getElementById("mediaContainer");

// Fetch data dari backend (✔ FIX route)
fetch('/pengguna/quiz/data')
    .then(res => res.json())
    .then(data => {
        questions = data.map(q => ({
            text: q.question,
            options: [q.option_a, q.option_b, q.option_c, q.option_d],
            correct: ["A", "B", "C", "D"].indexOf(q.correct_answer),
            explanation: q.explanation,

            // backend memakai question_type
            media_type: q.question_type,
            media_url: q.media_url
        }));

        initQuiz();
    })
    .catch(err => console.error("Gagal load quiz:", err));


// ==========================================
// MULAI QUIZ SETELAH DATA TERLOAD
// ==========================================
function initQuiz() {
    for (let i = 0; i < questions.length; i++) {
        const segment = document.createElement("span");
        progressBar.appendChild(segment);
    }

    loadQuestion();
}


// ==========================================
// LOAD SOAL
// ==========================================
function loadQuestion() {
    const q = questions[index];

    questionNumber.textContent = `Pertanyaan ${index + 1}/${questions.length}`;
    questionText.textContent = q.text;

    optionsList.innerHTML = "";
    explanation.style.display = "none";
    nextBtn.style.display = "none";

    // Update progress
    document.querySelectorAll(".quiz-progress span").forEach((p, i) => {
        p.classList.toggle("active", i <= index);
    });

    // ========= MEDIA DISPLAY ==========
    mediaContainer.innerHTML = "";

 if (q.media_type && q.media_url) {

    let url = q.media_url; // <-- gunakan langsung

    if (q.media_type === "video") {
        mediaContainer.innerHTML = `
            <video controls class="quiz-media">
                <source src="${url}" type="video/mp4">
                Browser Anda tidak mendukung video.
            </video>
        `;
    }

    if (q.media_type === "audio") {
        mediaContainer.innerHTML = `
            <audio controls class="quiz-media">
                <source src="${url}" type="audio/mpeg">
            </audio>
        `;
    }
}


    // Opsi jawaban
    q.options.forEach((opt, i) => {
        if (!opt) return;
        const div = document.createElement("div");
        div.className = "option";
        div.textContent = opt;
        div.onclick = () => selectAnswer(div, i);
        optionsList.appendChild(div);
    });
}


// ==========================================
// PILIH JAWABAN
// ==========================================
function selectAnswer(optionDiv, selectedIndex) {
    const q = questions[index];

    document.querySelectorAll(".option").forEach(op => op.style.pointerEvents = "none");

    if (selectedIndex === q.correct) {
        optionDiv.classList.add("correct");
        score++;
    } else {
        optionDiv.classList.add("wrong");
        document.querySelectorAll(".option")[q.correct].classList.add("correct");
    }

    explanation.innerHTML = `
        <span class="label">Penjelasan:</span>
        <span class="value">${q.explanation}</span>
    `;
    explanation.style.display = "block";
    nextBtn.style.display = "block";
}


// ==========================================
// NEXT BUTTON
// ==========================================
nextBtn.onclick = () => {
    index++;
    if (index >= questions.length) {
        showResult();
    } else {
        loadQuestion();
    }
};


// ==========================================
// RESULT
// ==========================================
function showResult() {
    document.querySelector(".quiz-card").innerHTML = `
        <h2 style="text-align:center; color:#ff5a1f;">Nilai Kamu</h2>
        <h1 style="font-size:3rem; text-align:center; margin-top:10px;">
            ${score}/${questions.length}
        </h1>
    `;
}
