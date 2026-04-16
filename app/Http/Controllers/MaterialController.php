<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{

    public function index()
    {
        $materials = Material::latest()->get();
        return view('admin.material.index', compact('materials'));
    }

    // 🔷 CREATE
    public function create()
    {
        $categories = Category::all();
        return view('admin.material.create', compact('categories'));
    }

    // 🔷 STORE (INI BAGIAN PALING PENTING 🔥)
   public function store(Request $request)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'required|string',
        'picture'     => 'required|image|mimes:jpg,png,jpeg|max:1024',
        'status'      => 'required|in:0,1',  // ubah jadi 0/1
        'category_id' => 'required|exists:categories,id',

        'questions'                      => 'required|array|min:1',
        'questions.*.question_text'      => 'required|string',
        'questions.*.correct_answer'     => 'required|integer|min:0|max:3',
        'questions.*.options'            => 'required|array|size:4',
        'questions.*.options.*'          => 'required|string', // setiap opsi harus string
    ]);

    DB::beginTransaction();
    try {
        // Upload gambar
        $picturePath = $request->file('picture')->store('materials', 'public');

        // 1. Material
        $material = Material::create([
            'title'       => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id'     => Auth::id(),
            'status'      => $request->status, // 0 atau 1
            'picture'     => $picturePath,
        ]);

        // 2. Quiz
        $quiz = Quiz::create([
            'material_id' => $material->id,
            'title'       => $material->title . ' Quiz',
        ]);

        // 3. Questions & Options
        foreach ($request->questions as $qData) {
            $question = Question::create([
                'quiz_id'        => $quiz->id,
                'question_text'  => $qData['question_text'],
                'correct_answer' => $qData['correct_answer'], // indeks jawaban benar
            ]);

            foreach ($qData['options'] as $optionText) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $optionText,
                ]);
            }
        }

        DB::commit();

        return redirect()->route('dashboard.materials.index')
            ->with('success', 'Materi dan Quiz berhasil dibuat.');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withInput()
            ->with('error', 'Gagal menyimpan: ' . $e->getMessage());
    }
}

// 🔷 SHOW - Menampilkan detail satu materi beserta quiz dan pertanyaannya
public function show(Material $material)
{
    $material->load([
        'category',
        'user',
        'quiz.questions.options' // eager load nested relations
    ]);

    return view('admin.material.show', compact('material'));
}

// 🔷 EDIT - Form edit materi + quiz
public function edit(Material $material)
{
    $categories = Category::all();
    $material->load(['quiz.questions.options']);

    // Siapkan data questions untuk Alpine.js
    $questionsData = [];
    if ($material->quiz) {
        foreach ($material->quiz->questions as $question) {
            $options = $question->options->pluck('option_text')->toArray();
            // Pastikan selalu 4 opsi, jika kurang tambahkan string kosong
            while (count($options) < 4) {
                $options[] = '';
            }
            $questionsData[] = [
                'id'             => $question->id,
                'question_text'  => $question->question_text,
                'options'        => $options,
                'correct_answer' => (int) $question->correct_answer,
            ];
        }
    }

    // Jika tidak ada pertanyaan, beri satu placeholder kosong
    if (empty($questionsData)) {
        $questionsData[] = [
            'id'             => 1,
            'question_text'  => '',
            'options'        => ['', '', '', ''],
            'correct_answer' => 0,
        ];
    }

    return view('admin.material.edit', compact('material', 'categories', 'questionsData'));
}

// 🔷 UPDATE - Proses update materi dan quiz (replace quiz lama dengan baru)
public function update(Request $request, Material $material)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'required|string',
        'picture'     => 'nullable|image|mimes:jpg,png,jpeg|max:1024',
        'status'      => 'required|in:0,1',
        'category_id' => 'required|exists:categories,id',

        'questions'                      => 'required|array|min:1',
        'questions.*.question_text'      => 'required|string',
        'questions.*.correct_answer'     => 'required|integer|min:0|max:3',
        'questions.*.options'            => 'required|array|size:4',
        'questions.*.options.*'          => 'required|string',
    ]);

    DB::beginTransaction();
    try {
        // Update gambar jika ada file baru
        if ($request->hasFile('picture')) {
            // Hapus gambar lama
            if ($material->picture && Storage::disk('public')->exists($material->picture)) {
                Storage::disk('public')->delete($material->picture);
            }
            $picturePath = $request->file('picture')->store('materials', 'public');
        } else {
            $picturePath = $material->picture;
        }

        // 1. Update data material
        $material->update([
            'title'       => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'status'      => $request->status,
            'picture'     => $picturePath,
        ]);

        // 2. Hapus quiz lama beserta semua pertanyaan dan opsi (cascade delete di database atau manual)
        if ($material->quiz) {
            // Karena relasi questions dan options menggunakan foreign key dengan cascade, cukup hapus quiz
            $material->quiz->delete();
        }

        // 3. Buat quiz baru
        $quiz = Quiz::create([
            'material_id' => $material->id,
            'title'       => $material->title . ' Quiz',
        ]);

        // 4. Simpan questions dan options baru
        foreach ($request->questions as $qData) {
            $question = Question::create([
                'quiz_id'        => $quiz->id,
                'question_text'  => $qData['question_text'],
                'correct_answer' => $qData['correct_answer'],
            ]);

            foreach ($qData['options'] as $optionText) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $optionText,
                ]);
            }
        }

        DB::commit();

        return redirect()->route('dashboard.materials.index')
            ->with('success', 'Materi dan Quiz berhasil diperbarui.');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withInput()
            ->with('error', 'Gagal memperbarui: ' . $e->getMessage());
    }
}

// 🔷 DELETE - Hapus materi beserta quiz, pertanyaan, dan opsi
public function destroy(Material $material)
{
    try {
        // Hapus gambar dari storage
        if ($material->picture && Storage::disk('public')->exists($material->picture)) {
            Storage::disk('public')->delete($material->picture);
        }

         if ($material->quiz) {
            foreach ($material->quiz->questions as $question) {
                // Hapus opsi
                $question->options()->delete();
                // Hapus pertanyaan
                $question->delete();
            }
            // Hapus quiz
            $material->quiz->delete();
        }

        // Hapus material (quiz dan children akan terhapus otomatis jika foreign key menggunakan cascade)
        $material->delete();

        return redirect()->route('dashboard.materials.index')
            ->with('success', 'Materi berhasil dihapus.');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal menghapus: ' . $e->getMessage());
    }
}
}