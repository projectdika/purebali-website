<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ["Tari Bali", "Benda Kesenian", "Aksara Bali", "Adat Istiadat"];

        foreach($categories as $categoryName) {
            Category::create([
                "name" => $categoryName,
            ]);
        }
    }
}
