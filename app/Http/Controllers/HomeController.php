<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cultures = [
            (object)[
                'id' => 1,
                'title' => 'Tari Baris Gede',
                'category' => 'Tarian Bali',
                'image' => 'dummyCardImage.jpg' 
            ],
            (object)[
                'id' => 2,
                'title' => 'Tari Kecak',
                'category' => 'Tarian Bali',
                'image' => 'dummyCardImage.jpg' 
            ],
            (object)[
                'id' => 3,
                'title' => 'Tari Legong',
                'category' => 'Tarian Bali',
                'image' => 'dummyCardImage.jpg' 
            ],
            (object)[
                'id' => 4,
                'title' => 'Pawai Budaya',
                'category' => 'Budaya Bali',
                'image' => 'dummyCardImage.jpg' 
            ],
        ];

        return view('welcome', compact('cultures'));
    }

    public function show($id)
    {
        // return "Ini halaman detail untuk ID: " . $id;
        return view('detail-material');
    }

    public function about(){
        return view('about');
    }
}