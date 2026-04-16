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

    // 🔷 SHOW
    public function show(Material $material)
    {
        $material->load('quiz.questions.options');

        return view('dashboard.materials.show', compact('material'));
    }

    // 🔷 EDIT (optional, kalau mau edit full nested nanti kompleks)
    public function edit(Material $material)
    {
        $categories = Category::all();
        $material->load('quiz.questions.options');

        return view('admin.materials.edit', compact('material', 'categories'));
    }

    // 🔷 UPDATE (simple dulu)
    public function update(Request $request, Material $material)
    {
        $material->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.materials.index')
            ->with('success', 'Materi berhasil diupdate');
    }

    // 🔷 DELETE
    public function destroy(Material $material)
    {
        $material->delete();

        return redirect()->route('admin.materials.index')
            ->with('success', 'Materi berhasil dihapus');
    }
}