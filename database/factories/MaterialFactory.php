<?php

namespace Database\Factories;

use App\Models\Material;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    protected $model = Material::class;

    public function definition()
    {
        $titles = [
            'Tari Baris Gede', 'Tari Kecak', 'Tari Legong Keraton', 'Tari Pendet',
            'Tari Barong', 'Tari Topeng Sidakarya', 'Gamelan Semar Pegulingan',
            'Upacara Melasti', 'Ngaben Massal', 'Omed-omedan', 'Makepung',
            'Mesuryak', 'Tari Rejang', 'Tari Sanghyang Dedari', 'Tari Joged Bumbung'
        ];

        return [
            'title'       => $this->faker->unique()->randomElement($titles),
            'description' => $this->faker->paragraphs(6, true),
            // Gambar dari picsum agar tidak perlu file lokal, tapi tetap bisa pakai Storage::url
            'picture'     => 'https://picsum.photos/seed/' . $this->faker->unique()->word . '/800/600',
            'status'      => $this->faker->boolean(80),
            'user_id'     => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
