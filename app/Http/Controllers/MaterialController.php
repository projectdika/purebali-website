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

    public function index(Request $request)
    {
        $query = Material::with('category');
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        $materials = $query->latest()->paginate(9);
        return view('admin.material.index', compact('materials'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.material.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'picture'     => 'required|image|mimes:jpg,png,jpeg|max:1024',
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

            $picturePath = $request->file('picture')->store('materials', 'public');

            $material = Material::create([
                'title'       => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'user_id'     => Auth::id(),
                'status'      => $request->status, // 0 atau 1
                'picture'     => $picturePath,
            ]);

            $quiz = Quiz::create([
                'material_id' => $material->id,
                'title'       => $material->title . ' Quiz',
            ]);

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
                ->with('success', 'Materi dan Quiz berhasil dibuat.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    public function show(Material $material)
    {
        $material->load([
            'category',
            'user',
            'quiz.questions.options' 
        ]);

        return view('admin.material.show', compact('material'));
    }

    public function edit(Material $material)
    {
        $categories = Category::all();
        $material->load(['quiz.questions.options']);

        $questionsData = [];
        if ($material->quiz && $material->quiz->questions->count()) {
            foreach ($material->quiz->questions as $question) {
                $options = $question->options->pluck('option_text')->toArray();
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

            if ($request->hasFile('picture')) {
                if ($material->picture && Storage::disk('public')->exists($material->picture)) {
                    Storage::disk('public')->delete($material->picture);
                }
                $picturePath = $request->file('picture')->store('materials', 'public');
            } else {
                $picturePath = $material->picture;
            }


            $material->update([
                'title'       => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'status'      => $request->status,
                'picture'     => $picturePath,
            ]);

            if ($material->quiz) {
                $quiz = $material->quiz;

                foreach ($quiz->attempts as $attempt) {
                    $attempt->answers()->delete();
                    $attempt->delete();
                }

                foreach ($quiz->questions as $question) {
                    $question->options()->delete();
                    $question->delete();
                }

                $quiz->delete();
            }

            $quiz = Quiz::create([
                'material_id' => $material->id,
                'title'       => $material->title . ' Quiz',
            ]);

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

    public function destroy(Material $material)
    {
        try {

            if ($material->picture && Storage::disk('public')->exists($material->picture)) {
                Storage::disk('public')->delete($material->picture);
            }

            if ($material->quiz) {
                foreach ($material->quiz->questions as $question) {

                    $question->options()->delete();

                    $question->delete();
                }

                $material->quiz->delete();
            }


            $material->delete();

            return redirect()->route('dashboard.materials.index')
                ->with('success', 'Materi berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}
