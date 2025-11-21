@extends('layouts.admin')

@section('title', 'BaileoBOT | BaileoGO Mollucas')

@section('content')
<header class="mb-6 flex justify-between items-center">
  <div class="flex items-center space-x-3">
    <button id="menuBtn" class="lg:hidden p-2 bg-white rounded-lg shadow hover:bg-gray-100">
      <i data-lucide="menu" class="w-5 h-5 text-gray-700"></i>
    </button>
    <div>
      <h2 class="text-xl lg:text-2xl font-bold text-blue-700">BaileoBOT 🤖</h2>
      <p class="text-gray-600 text-xs lg:text-sm mt-1">
        Asisten cerdas yang siap menjawab pertanyaan seputar budaya Maluku 🌺
      </p>
    </div>
  </div>
</header>

<!-- 💬 Chat Container -->
<div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 flex flex-col h-[75vh]">

  <!-- Area Chat -->
  <div id="chatContainer"
       class="flex-1 overflow-y-auto space-y-4 mb-4 p-3 bg-gray-50 rounded-lg border border-gray-100">
    <div class="flex items-start space-x-3">
      <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">B</div>
      <div class="bg-blue-100 text-gray-800 px-4 py-2 rounded-xl max-w-[75%] shadow-sm leading-relaxed">
        Halo! Saya <strong>BaileoBOT</strong> 😄 <br>
        Silakan ajukan pertanyaan tentang budaya Maluku!
      </div>
    </div>
  </div>

  <!-- Input Chat -->
  <form id="chatForm" class="flex items-center gap-3">
    <input type="text" id="userInput"
           class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
           placeholder="Tulis pertanyaan Anda di sini..." autocomplete="off" required>
    <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg flex items-center gap-2 shadow-md transition">
      <i data-lucide="send" class="w-4 h-4"></i> Kirim
    </button>
  </form>
</div>

<!-- 🔧 Script -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  lucide.createIcons();

  const chatForm = document.getElementById('chatForm');
  const chatContainer = document.getElementById('chatContainer');
  const userInput = document.getElementById('userInput');

  chatForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const question = userInput.value.trim();
    if (!question) return;

    // tampilkan chat user
    addMessage(question, 'user');
    userInput.value = '';

    // indikator mengetik
    const loadingEl = addMessage('Sedang mengetik...', 'bot', true);

    try {
      const response = await fetch("{{ route('admin.baileobot.ask') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ question })
      });

      const data = await response.json();
      loadingEl.remove();
      addMessage(data.answer, 'bot');
    } catch (error) {
      loadingEl.remove();
      addMessage("Terjadi kesalahan saat menghubungi BaileoBOT. Silakan coba lagi.", 'bot');
    }
  });

  // Tambah pesan ke layar
  function addMessage(text, sender, isLoading = false) {
    const wrapper = document.createElement('div');
    wrapper.className = `flex items-start space-x-3 ${sender === 'user' ? 'justify-end' : ''}`;

    const formattedText = formatText(text);

    wrapper.innerHTML = sender === 'user'
      ? `<div class="bg-blue-600 text-white px-4 py-2 rounded-xl max-w-[75%] shadow-sm leading-relaxed">${formattedText}</div>`
      : `<div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">B</div>
         <div class="bg-gray-100 text-gray-800 px-4 py-2 rounded-xl max-w-[75%] shadow-sm leading-relaxed">${isLoading ? '<em>' + text + '</em>' : formattedText}</div>`;

    chatContainer.appendChild(wrapper);
    chatContainer.scrollTop = chatContainer.scrollHeight;
    return wrapper;
  }

  // Format teks agar rapi (Markdown sederhana)
  function formatText(text) {
    if (!text) return '';
    const safeText = escapeHTML(text)
      .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>') // bold markdown
      .replace(/\n/g, '<br>'); // baris baru
    return safeText;
  }

  // Sanitasi teks (hindari XSS)
  function escapeHTML(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
  }
});
</script>

<style>
#chatContainer strong {
  font-weight: 600;
  color: #1e3a8a;
}
#chatContainer p {
  margin-bottom: 0.4rem;
  line-height: 1.6;
}
</style>
@endsection
