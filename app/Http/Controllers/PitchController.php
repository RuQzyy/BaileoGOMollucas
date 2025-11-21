<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PitchController extends Controller
{
    public function detect(Request $request)
    {
        // ─────────────────────────────────────────────
        // 1. INPUT: UPLOAD FILE AUDIO
        // ─────────────────────────────────────────────
        if ($request->hasFile('audio')) {
            $file = $request->file('audio');
            $path = $file->store('audio');
            $fullPath = storage_path('app/' . $path);
        }

        // ─────────────────────────────────────────────
        // 2. INPUT: MIC BLOB (Base64)
        // ─────────────────────────────────────────────
        elseif ($request->audio_blob) {

            $audioData = base64_decode($request->audio_blob);

            $filename = 'mic_'.time().'.wav';
            $path = 'audio/' . $filename;
            Storage::put($path, $audioData);

            $fullPath = storage_path('app/' . $path);
        }

        else {
            return response()->json([
                'status' => false,
                'message' => "Tidak ada audio yang dikirim."
            ]);
        }

        // ─────────────────────────────────────────────
        // JALANKAN PYTHON
        // ─────────────────────────────────────────────
        $pythonScript = base_path('tools/detect_pitch.py');
        $pythonCmd = env('PYTHON_CMD', 'python');

        $process = new Process([$pythonCmd, $pythonScript, $fullPath]);
        $process->setTimeout(60);

        try {
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            $output = $process->getOutput();
            $json = json_decode($output, true) ?? [];

            if (empty($json) || ($json['status'] ?? false) === false) {
                Storage::delete($path);
                return response()->json([
                    'status' => false,
                    'message' => $json['message'] ?? 'Nada tidak terdeteksi.'
                ]);
            }

            // ─────────────────────────────────────────────
            // PARSING HASIL PYTHON
            // ─────────────────────────────────────────────

            $frequency  = $json['frequency'] ?? null;  // ex: 245.8 Hz
            $noteFull   = $json['note'] ?? null;       // ex: B3

            // ✔ FIX PENTING → buat uppercase supaya cocok dengan config
            $noteLetter = $noteFull
                ? strtoupper(preg_replace('/\d+$/', '', $noteFull))
                : null;

            // ─────────────────────────────────────────────
            // LOAD CONFIG MALUKU
            // ─────────────────────────────────────────────
            $rules = config('musik', []);

            // TOTOBUANG
            $totobuang = $noteLetter ? ($rules['totobuang'][$noteLetter] ?? null) : null;

            // TIFA (berdasarkan frekuensi)
            $tifaRanges = $rules['tifa_ranges'] ?? [];
            $tifaPattern = null;

            if ($frequency && !empty($tifaRanges)) {
                foreach ($tifaRanges as $key => $range) {
                    if ($frequency >= $range[0] && $frequency < $range[1]) {
                        $tifaPattern = $rules['tifa'][$key] ?? null;
                        break;
                    }
                }
            }

            if (!$tifaPattern) {
                $tifaPattern = null; // tidak fallback
            }

            // SULING
            $suling = $noteLetter ? ($rules['suling'][$noteLetter] ?? null) : null;

            // delete audio file
            Storage::delete($path);

            // ─────────────────────────────────────────────
            // RESPONSE
            // ─────────────────────────────────────────────
            return response()->json([
                'status' => true,
                'frequency' => $frequency,
                'note' => $noteFull,
                'note_letter' => $noteLetter,
                'recommendations' => [
                    'totobuang' => $totobuang,
                    'tifa' => $tifaPattern,
                    'suling' => $suling,
                ]
            ]);

        } catch (\Exception $e) {

            Storage::delete($path);
            Log::error('Pitch detect error: '.$e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Error processing audio: '.$e->getMessage()
            ], 500);
        }
    }
}
