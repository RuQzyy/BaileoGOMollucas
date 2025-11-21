const questions = [
            {
                text: "Ikan asar adalah olahan ikan dengan cara…",
                options: ["Dipanggang Asap", "Ditunggu mati", "Direbus", "Dikukus"],
                correct: 0,
                explanation: "Ikan asar dibuat dengan cara dipanggang lalu diasap. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam rem reiciendis temporibus a nihil consequatur eveniet placeat. Obcaecati quia earum quibusdam porro atque distinctio, exercitationem odio unde deserunt, qui doloribus."
            },

            {
                text: "Tari lenso berasal dari daerah…",
                options: ["Ambon", "Papua", "Bali", "NTT"],
                correct: 0,
                explanation: "Tari Lenso berasal dari Maluku, khususnya Ambon."
            },

            {
                text: "Kain adat dari Maluku adalah…",
                options: ["Kain Tenun", "Kain Lenso", "Kain Ulos", "Kain Batik"],
                correct: 1,
                explanation: "Kain Lenso adalah kain adat khas Maluku."
            },

            {
                text: "Makanan khas Maluku berbahan dasar sagu adalah…",
                options: ["Papeda", "Rendang", "Gudeg", "Pempek"],
                correct: 0,
                explanation: "Papeda adalah makanan khas Maluku dan Papua."
            },
            {
                text: "Makanan khas Maluku berbahan dasar sagu adalah…",
                options: ["Papeda", "Rendang", "Gudeg", "Pempek"],
                correct: 0,
                explanation: "Papeda adalah makanan khas Maluku dan Papua."
            },
            {
                text: "Makanan khas Maluku berbahan dasar sagu adalah…",
                options: ["Papeda", "Rendang", "Gudeg", "Pempek"],
                correct: 0,
                explanation: "Papeda adalah makanan khas Maluku dan Papua."
            },
            {
                text: "Makanan khas Maluku berbahan dasar sagu adalah…",
                options: ["Papeda", "Rendang", "Gudeg", "Pempek"],
                correct: 0,
                explanation: "Papeda adalah makanan khas Maluku dan Papua."
            },
            {
                text: "Makanan khas Maluku berbahan dasar sagu adalah…",
                options: ["Papeda", "Rendang", "Gudeg", "Pempek"],
                correct: 0,
                explanation: "Papeda adalah makanan khas Maluku dan Papua."
            },
        ];


        let index = 0;
        let score = 0;

        const progressBar = document.getElementById("progressBar");
        const questionNumber = document.getElementById("questionNumber");
        const questionText = document.getElementById("questionText");
        const optionsList = document.getElementById("optionsList");
        const explanation = document.getElementById("explanation");
        const nextBtn = document.getElementById("nextBtn");

        /* Generate 20 progress segments */
        for (let i = 0; i < questions.length; i++) {
            const segment = document.createElement("span");
            progressBar.appendChild(segment);
        }

        function loadQuestion() {
            const q = questions[index];

            questionNumber.textContent = `Pertanyaan ${index+1}/${questions.length}`;
            questionText.textContent = q.text;
            optionsList.innerHTML = "";
            explanation.style.display = "none";
            nextBtn.style.display = "none";

            /* Update progress bar */
            document.querySelectorAll(".quiz-progress span").forEach((p, i) => {
                p.classList.toggle("active", i <= index);
            });

            q.options.forEach((opt, i) => {
                const div = document.createElement("div");
                div.className = "option";
                div.textContent = opt;

                div.onclick = () => selectAnswer(div, i);

                optionsList.appendChild(div);
            });
        }

        function selectAnswer(optionDiv, selectedIndex) {
            const q = questions[index];

            /* Disable all */
            document.querySelectorAll(".option").forEach(op => op.style.pointerEvents = "none");

            if (selectedIndex === q.correct) {
                optionDiv.classList.add("correct");
                score++;
            } else {
                optionDiv.classList.add("wrong");
                document.querySelectorAll(".option")[q.correct].classList.add("correct");
            }

            explanation.innerHTML = `
                <span class="label">Jawaban:</span>
                <span class="value">${q.explanation}</span>
            `;
            explanation.classList.add("space");

            explanation.style.display = "block";
            nextBtn.style.display = "block";
        }

        nextBtn.onclick = () => {
            index++;
            if (index >= questions.length) {
                showResult();
            } else {
                loadQuestion();
            }
        };

        function showResult() {
            document.querySelector(".quiz-card").innerHTML = `
                <h2 style="text-align:center; color:#ff5a1f;">Nilai Kamu</h2>
                <h1 style="font-size:3rem; text-align:center; margin-top:10px;">${score}/${questions.length}</h1>
            `;
        }

        loadQuestion();