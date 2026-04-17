<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $materials = Material::with('category')
            ->where('status', true)
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('materials'));
    }

    public function cultures(Request $request)
    {
        $query = Material::with('category')
            ->where('status', true);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        $materials = $query->latest()->paginate(9);
        $categories = Category::all();

        return view('balinese-cultures', compact('materials', 'categories'));
    }

    public function show($id)
    {
        $material = Material::with(['category', 'user', 'quiz.questions.options'])
            ->where('status', true)
            ->findOrFail($id);

        $quiz = $material->quiz;

        return view('detail-material', compact('material', 'quiz'));
    }
}
