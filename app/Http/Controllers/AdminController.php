<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budaya;
use App\Models\Event;
use App\Models\Bahasa;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $totalBudaya = Budaya::count();
        $totalEvent = Event::count();
        $totalBahasa = Bahasa::count();
        $latestEvents = Event::orderBy('tanggal', 'asc')->take(3)->get();

        return view('admin.dashboard', compact('totalBudaya', 'totalEvent', 'totalBahasa', 'latestEvents'));
    }

    public function budaya()
    {
        return view('admin.budaya');
    }

    public function event()
    {
        return view('admin.event');
    }

    public function bahasa()
    {
        return view('admin.bahasa');
    }

    public function baileobot()
    {
        return view('admin.baileobot');
    }

    /**
     * Fitur utama BaileoBOT — auto deteksi model Gemini dan deteksi topik pertanyaan.
     */
    public function askBaileobot(Request $request)
{
    $question = trim($request->input('question', ''));

    if ($question === '') {
        return response()->json(['answer' => 'Pertanyaan tidak boleh kosong.']);
    }

    $apiKey = config('services.gemini.key');
    if (!$apiKey) {
        return response()->json(['answer' => 'API key Gemini tidak ditemukan. Periksa .env dan config/services.php']);
    }

    /**
     * ============================================================
     *   🔍 FILTER TOPIK — Tidak wajib sebut kata "Maluku"
     *   Namun hanya menjawab budaya/adat/musik/tarian/sejarah
     * ============================================================
     */

    $lower = strtolower($question);

    // topik budaya secara umum
    $budayaTopics = [
        'budaya','adat','upacara','tarian','tari','musik','alat musik',
        'tradisi','sejarah','pakaian','rumah adat','kuliner','cerita rakyat',
        'bahasa','dialek','mitos','legenda','suku','ritual'
    ];

    // wilayah Maluku (otomatis relevan)
    $malukuAreas = [
        'maluku','ambon','seram','buru','tanimbar','aru','saparua',
        'haruku','lease','kei','ternate','tidore','mollucas'
    ];

    $isRelevant = false;

    foreach ($budayaTopics as $t) {
        if (str_contains($lower, $t)) {
            $isRelevant = true;
            break;
        }
    }

    foreach ($malukuAreas as $w) {
        if (str_contains($lower, $w)) {
            $isRelevant = true;
            break;
        }
    }

    if (!$isRelevant) {
        return response()->json([
            'answer' => "Maaf gandong 🙏, BaileoBOT hanya bisa jawab pertanyaan seputar budaya, adat, bahasa, sejarah, dan kehidupan masyarakat Maluku ❤️"
        ]);
    }

    /**
     * ============================================================
     *   🔥 STEP 1 — Ambil daftar model Gemini yang tersedia
     *   (sesuai permintaan kamu)
     * ============================================================
     */
    try {
        $listUrl = "https://generativelanguage.googleapis.com/v1/models?key={$apiKey}";
        $listResp = Http::get($listUrl);

        Log::info('ListModels response status: ' . $listResp->status());
        Log::info('ListModels response body: ' . $listResp->body());

        if ($listResp->failed()) {
            return response()->json([
                'answer' => 'Gagal memanggil ListModels. Periksa API key.',
                'status' => $listResp->status(),
            ], 500);
        }

        $models = $listResp->json()['models'] ?? [];
        $selectedModel = null;

        $preferred = ['gemini-1.5-flash', 'gemini-1.5-pro', 'gemini-pro', 'text-bison-001'];

        foreach ($models as $model) {
            $name = $model['name'] ?? '';
            foreach ($preferred as $pref) {
                if (stripos($name, $pref) !== false) {
                    $selectedModel = $name;
                    break 2;
                }
            }
        }

        if (!$selectedModel && count($models) > 0) {
            $selectedModel = $models[0]['name'];
        }

    } catch (\Exception $e) {
        Log::error('Error ListModels: ' . $e->getMessage());
        return response()->json(['answer' => 'Gagal komunikasi dengan Google API: ' . $e->getMessage()]);
    }

    if (!$selectedModel) {
        return response()->json(['answer' => 'Tidak ada model Gemini yang tersedia.']);
    }

    /**
     * ============================================================
     *   🔥 STEP 2 — Kirim Prompt ke model terpilih (versi lama)
     * ============================================================
     */

    $prompt = "
Kamu adalah BaileoBOT, asisten budaya Maluku yang ramah.
Jawablah dengan jelas, sopan, dan mudah dipahami.

Pertanyaan:
{$question}
";

    $endpoints = [
        "https://generativelanguage.googleapis.com/v1beta/{$selectedModel}:generateContent?key={$apiKey}",
        "https://generativelanguage.googleapis.com/v1/{$selectedModel}:generateContent?key={$apiKey}",
    ];

    $answer = null;
    $lastError = null;

    foreach ($endpoints as $endpoint) {
        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])
                ->post($endpoint, [
                    'contents' => [[
                        'parts' => [['text' => $prompt]],
                    ]],
                ]);

            Log::info("Tried endpoint: {$endpoint}");
            Log::info("Status: " . $response->status());
            Log::info("Body: " . $response->body());

            if ($response->successful()) {
                $json = $response->json();
                $answer = $json['candidates'][0]['content']['parts'][0]['text']
                    ?? $json['output'][0]['content'][0]['text']
                    ?? null;

                if ($answer) break;

            } else {
                $lastError = [
                    'status' => $response->status(),
                    'body'   => $response->body(),
                ];
            }

        } catch (\Exception $e) {
            $lastError = ['exception' => $e->getMessage()];
            Log::error('Exception saat memanggil Gemini: ' . $e->getMessage());
        }
    }

    if ($answer) {
        return response()->json(['answer' => $answer]);
    }

    return response()->json([
        'answer' => 'Gagal menghubungi API Gemini. Cek laravel.log.',
        'debug' => $lastError,
    ], 500);
}

}
