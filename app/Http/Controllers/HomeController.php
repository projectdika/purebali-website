<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Halaman Home (Landing Page)
     * Menampilkan slider budaya terkini
     */
    public function index()
    {
        // Ambil 6 material terbaru yang statusnya aktif
        $materials = Material::with('category')
            ->where('status', true)
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('materials'));
    }

    /**
     * Halaman Daftar Semua Budaya (Balinese Cultures)
     * Mendukung pencarian berdasarkan judul
     */
    public function cultures(Request $request)
    {
        $query = Material::with('category')
            ->where('status', true);

        // Fitur pencarian
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan kategori (jika diperlukan nanti)
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        $materials = $query->latest()->paginate(9); // 9 item per halaman
        $categories = Category::all(); // Untuk dropdown filter (opsional)

        return view('balinese-cultures', compact('materials', 'categories'));
    }

    /**
     * Halaman Detail Material (untuk user)
     */
    public function show($id)
    {
        $material = Material::with(['category', 'user', 'quiz.questions.options'])
            ->where('status', true)
            ->findOrFail($id);

        // Ambil quiz jika ada
        $quiz = $material->quiz;

        return view('detail-material', compact('material', 'quiz'));
    }
}