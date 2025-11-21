<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    /**
     * Halaman utama (index) — semua CRUD di sini.
     */
    public function index()
    {
        $quiz = Quiz::orderBy('id', 'DESC')->paginate(10);
        return view('admin.quiz', compact('quiz'));
    }

    /**
     * Store a newly created quiz.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'       => 'required|string|max:100',
            'question_type'  => 'required|in:text,video,audio',
            'question'       => 'required',
            'media_url'      => 'nullable|string',
            'option_a'       => 'required',
            'option_b'       => 'required',
            'option_c'       => 'nullable',
            'option_d'       => 'nullable',
            'correct_answer' => 'required|in:A,B,C,D',
            'explanation'    => 'nullable',
        ]);

        Quiz::create($request->all());

        return back()->with('success', 'Soal quiz berhasil ditambahkan!');
    }

    /**
     * Update a quiz.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category'       => 'required|string|max:100',
            'question_type'  => 'required|in:text,video,audio',
            'question'       => 'required',
            'media_url'      => 'nullable|string',
            'option_a'       => 'required',
            'option_b'       => 'required',
            'option_c'       => 'nullable',
            'option_d'       => 'nullable',
            'correct_answer' => 'required|in:A,B,C,D',
            'explanation'    => 'nullable',
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->update($request->all());

        return back()->with('success', 'Soal quiz berhasil diperbarui!');
    }

    /**
     * Delete a quiz.
     */
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return back()->with('success', 'Soal quiz berhasil dihapus!');
    }
}
