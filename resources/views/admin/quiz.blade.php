@extends('layouts.admin')

@section('title', 'Manajemen Soal Quiz')

@section('content')
<div class="container mx-auto px-4 py-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manajemen Soal Quiz</h1>

        <button id="addBtn"
            class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
            Tambah Soal
        </button>
    </div>

    {{-- Alert --}}
    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white shadow rounded p-4 overflow-x-auto">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Kategori</th>
                    <th class="p-2 border">Soal</th>
                    <th class="p-2 border">Tipe</th>
                    <th class="p-2 border">Jawaban Benar</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quiz as $index => $q)
                <tr class="border">
                    <td class="p-2 border">{{ $quiz->firstItem() + $index }}</td>
                    <td class="p-2 border">{{ $q->category }}</td>
                    <td class="p-2 border">{{ Str::limit($q->question, 50) }}</td>
                    <td class="p-2 border">{{ $q->question_type }}</td>
                    <td class="p-2 border">{{ $q->correct_answer }}</td>
                    <td class="p-2 border flex gap-2">

                        {{-- Edit --}}
                        <button class="editBtn bg-yellow-500 text-white px-3 py-1 rounded text-sm"
                            data-id="{{ $q->id }}"
                            data-category="{{ $q->category }}"
                            data-type="{{ $q->question_type }}"
                            data-question="{{ $q->question }}"
                            data-a="{{ $q->option_a }}"
                            data-b="{{ $q->option_b }}"
                            data-c="{{ $q->option_c }}"
                            data-d="{{ $q->option_d }}"
                            data-correct="{{ $q->correct_answer }}"
                            data-explanation="{{ $q->explanation }}">
                            Edit
                        </button>

                        {{-- Delete --}}
                        <form action="{{ route('admin.quiz.destroy', $q->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus soal ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded text-sm">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $quiz->links() }}
        </div>
    </div>


    {{-- ========================================================= --}}
    {{-- SIMULASI QUIZ --}}
    {{-- ========================================================= --}}

    <h2 class="text-xl font-bold mt-10 mb-4">Simulasi Quiz</h2>

    <div id="quizSimulator" class="bg-white rounded shadow p-6 hidden">
        <div class="flex justify-between items-center mb-3">
            <span class="font-semibold">Timer:</span>
            <span id="timer" class="text-red-600 font-bold text-lg">30</span>
        </div>

        <div class="w-full bg-gray-300 rounded h-3 mb-4">
            <div id="progressBar" class="bg-blue-600 h-3 rounded" style="width: 0%"></div>
        </div>

        <h3 id="simQuestion" class="text-lg font-bold mb-3"></h3>

        <div id="simOptions" class="space-y-2 mb-4"></div>

        <button id="nextBtn"
            class="hidden bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Soal Berikutnya
        </button>

        <div id="quizResult" class="hidden mt-4 p-4 bg-green-200 rounded"></div>
    </div>

    <button id="startSim"
        class="mt-4 bg-purple-600 text-white px-4 py-2 rounded shadow hover:bg-purple-700">
        Mulai Simulasi Quiz
    </button>


</div>


{{-- ========================================================= --}}
{{-- MODAL --}}
{{-- ========================================================= --}}
<div id="modal"
    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-2xl rounded shadow p-6 relative">

        <h2 id="modalTitle" class="text-xl font-bold mb-4">Tambah Soal Quiz</h2>

        <form id="quizForm" method="POST">
            @csrf

            {{-- Category --}}
            <div class="mb-3">
                <label class="font-semibold">Kategori:</label>
                <input type="text" name="category" id="category" class="w-full border p-2 rounded">
            </div>

            {{-- Type --}}
            <div class="mb-3">
                <label class="font-semibold">Tipe Soal:</label>
                <select name="question_type" id="question_type" class="w-full border p-2 rounded">
                    <option value="text">Teks</option>
                    <option value="video">Video (URL)</option>
                    <option value="audio">Audio (URL)</option>
                </select>
            </div>

            {{-- Question --}}
            <div class="mb-3">
                <label class="font-semibold">Soal:</label>
                <textarea name="question" id="question" class="w-full border p-2 rounded"></textarea>
            </div>

            {{-- Options --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label>A:</label>
                    <input type="text" name="option_a" id="option_a" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label>B:</label>
                    <input type="text" name="option_b" id="option_b" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label>C:</label>
                    <input type="text" name="option_c" id="option_c" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label>D:</label>
                    <input type="text" name="option_d" id="option_d" class="w-full border p-2 rounded">
                </div>
            </div>

            {{-- Correct --}}
            <div class="mt-3">
                <label class="font-semibold">Jawaban Benar:</label>
                <select name="correct_answer" id="correct_answer" class="w-full border p-2 rounded">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </div>

            {{-- Explanation --}}
            <div class="mt-3">
                <label class="font-semibold">Penjelasan:</label>
                <textarea name="explanation" id="explanation" class="w-full border p-2 rounded"></textarea>
            </div>

            <div class="mt-4 flex justify-between">
                <button type="button" id="closeModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded">
                    Batal
                </button>

                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>


{{-- ========================================================= --}}
{{-- SCRIPT: modal + simulasi quiz --}}
{{-- ========================================================= --}}
<script>
document.addEventListener("DOMContentLoaded", () => {

    const modal = document.getElementById('modal');
    const addBtn = document.getElementById('addBtn');
    const closeModal = document.getElementById('closeModal');
    const form = document.getElementById('quizForm');

    // OPEN MODAL
    addBtn.addEventListener('click', () => {
        form.action = "{{ route('admin.quiz.store') }}";
        form.reset();
        form.querySelectorAll('input[name="_method"]').forEach(e => e.remove());

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });

    // CLOSE MODAL
    closeModal.addEventListener('click', () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    });

    // EDIT
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', () => {

            form.action = "/admin/quiz/" + btn.dataset.id;
            form.querySelectorAll('input[name="_method"]').forEach(e => e.remove());
            form.insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">');

            document.getElementById('category').value = btn.dataset.category;
            document.getElementById('question_type').value = btn.dataset.type;
            document.getElementById('question').value = btn.dataset.question;
            document.getElementById('option_a').value = btn.dataset.a;
            document.getElementById('option_b').value = btn.dataset.b;
            document.getElementById('option_c').value = btn.dataset.c;
            document.getElementById('option_d').value = btn.dataset.d;
            document.getElementById('correct_answer').value = btn.dataset.correct;
            document.getElementById('explanation').value = btn.dataset.explanation;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    });



    // =========================================================
    // SIMULASI QUIZ
    // =========================================================

    const startSim = document.getElementById("startSim");
    const quizBox = document.getElementById("quizSimulator");
    const simQuestion = document.getElementById("simQuestion");
    const simOptions = document.getElementById("simOptions");
    const nextBtn = document.getElementById("nextBtn");
    const quizResult = document.getElementById("quizResult");
    const timerBox = document.getElementById("timer");
    const progressBar = document.getElementById("progressBar");

    let current = 0;
    let timer;
    let timeLeft = 30;

    let questions = @json($quiz->items());


    function shuffle(array) {
        return array.sort(() => Math.random() - 0.5);
    }

    function loadQuestion() {
        quizResult.classList.add("hidden");
        nextBtn.classList.add("hidden");

        let q = questions[current];

        simQuestion.textContent = q.question;

        let options = [
            {key: "A", val: q.option_a},
            {key: "B", val: q.option_b},
            {key: "C", val: q.option_c},
            {key: "D", val: q.option_d},
        ];

        shuffle(options);

        simOptions.innerHTML = "";

        options.forEach(opt => {
            let btn = document.createElement("button");
            btn.className = "block w-full text-left p-3 border rounded hover:bg-gray-100";
            btn.textContent = opt.key + ". " + opt.val;

            btn.onclick = () => {
                clearInterval(timer);
                if (opt.key === q.correct_answer) {
                    quizResult.textContent = "Jawaban BENAR!";
                    quizResult.className = "mt-4 p-4 bg-green-300 rounded";
                } else {
                    quizResult.textContent = "Salah! Jawaban benar: " + q.correct_answer;
                    quizResult.className = "mt-4 p-4 bg-red-300 rounded";
                }

                quizResult.classList.remove("hidden");
                nextBtn.classList.remove("hidden");
            };

            simOptions.appendChild(btn);
        });

        // reset timer
        timeLeft = 30;
        timerBox.textContent = timeLeft;

        progressBar.style.width = "0%";

        timer = setInterval(() => {
            timeLeft--;
            timerBox.textContent = timeLeft;
            progressBar.style.width = ((30 - timeLeft) / 30 * 100) + "%";

            if (timeLeft <= 0) {
                clearInterval(timer);
                quizResult.textContent = "Waktu HABIS!";
                quizResult.className = "mt-4 p-4 bg-red-300 rounded";
                quizResult.classList.remove("hidden");
                nextBtn.classList.remove("hidden");
            }
        }, 1000);
    }

    startSim.addEventListener("click", () => {
        current = 0;
        quizBox.classList.remove("hidden");
        loadQuestion();
    });

    nextBtn.addEventListener("click", () => {
        current++;
        if (current >= questions.length) {
            quizBox.innerHTML = `
                <h2 class="text-xl font-bold">Selesai!</h2>
                <p class="mt-3">Anda telah mencoba semua soal.</p>
            `;
            return;
        }
        loadQuestion();
    });

});
</script>

@endsection
