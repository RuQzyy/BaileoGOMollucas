<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index()
    {
        $quiz = Quiz::orderBy('id', 'DESC')->paginate(10);
        return view('admin.quiz', compact('quiz'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category'       => 'required|string|max:100',
            'question_type'  => 'required|in:text,video,audio',
            'question'       => 'required',
            'media_file'     => 'nullable|file|mimes:mp4,mp3,wav',
            'option_a'       => 'required',
            'option_b'       => 'required',
            'option_c'       => 'nullable',
            'option_d'       => 'nullable',
            'correct_answer' => 'required|in:A,B,C,D',
            'explanation'    => 'nullable',
        ]);

        $mediaPath = null;

        // =====================================================
        //          SIMPAN FILE LANGSUNG KE PUBLIC/
        // =====================================================
        if ($request->hasFile('media_file')) {

            $extension = $request->file('media_file')->getClientOriginalExtension();
            $folder = $request->question_type === 'video' ? 'videos' : 'audios';

            // Buat nama file unik
            $filename = time() . '_' . uniqid() . '.' . $extension;

            // Simpan ke public/videos atau public/audios
            $request->file('media_file')->move(public_path($folder), $filename);

            // Path untuk database
            $mediaPath = $folder . '/' . $filename;
        }

        Quiz::create([
            'category'       => $request->category,
            'question_type'  => $request->question_type,
            'question'       => $request->question,
            'media_url'      => $mediaPath,
            'option_a'       => $request->option_a,
            'option_b'       => $request->option_b,
            'option_c'       => $request->option_c,
            'option_d'       => $request->option_d,
            'correct_answer' => $request->correct_answer,
            'explanation'    => $request->explanation,
        ]);

        return back()->with('success', 'Soal quiz berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category'       => 'required|string|max:100',
            'question_type'  => 'required|in:text,video,audio',
            'question'       => 'required',
            'media_file'     => 'nullable|file|mimes:mp4,mp3,wav',
            'option_a'       => 'required',
            'option_b'       => 'required',
            'option_c'       => 'nullable',
            'option_d'       => 'nullable',
            'correct_answer' => 'required|in:A,B,C,D',
            'explanation'    => 'nullable',
        ]);

        $quiz = Quiz::findOrFail($id);

        $mediaPath = $quiz->media_url;

        // =====================================================
        //             HANDLE RE-UPLOAD FILE
        // =====================================================
        if ($request->hasFile('media_file')) {

            $extension = $request->file('media_file')->getClientOriginalExtension();
            $folder = $request->question_type === 'video' ? 'videos' : 'audios';

            $filename = time() . '_' . uniqid() . '.' . $extension;

            $request->file('media_file')->move(public_path($folder), $filename);

            $mediaPath = $folder . '/' . $filename;
        }

        $quiz->update([
            'category'       => $request->category,
            'question_type'  => $request->question_type,
            'question'       => $request->question,
            'media_url'      => $mediaPath,
            'option_a'       => $request->option_a,
            'option_b'       => $request->option_b,
            'option_c'       => $request->option_c,
            'option_d'       => $request->option_d,
            'correct_answer' => $request->correct_answer,
            'explanation'    => $request->explanation,
        ]);

        return back()->with('success', 'Soal quiz berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return back()->with('success', 'Soal quiz berhasil dihapus!');
    }
}
