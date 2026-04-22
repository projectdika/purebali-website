<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MaterialSeeder extends Seeder
{
    public function run()
    {

        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'         => 'Admin',
                'password'     => Hash::make('password'),
                'phone_number' => '+628214599933',
                'role' => 'admin'
            ]
        );

        $categoryNames = ['Tarian Bali', 'Upacara Adat', 'Musik Tradisional', 'Seni Pertunjukan'];
        foreach ($categoryNames as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        // menghapus data lama
        Option::query()->delete();
        Question::query()->delete();
        Quiz::query()->delete();
        Material::query()->delete();

        // gambar dummy
        $sourceDir = resource_path('dummy/materials');
        $targetDir = storage_path('app/public/materials');

        // folder tujuan jika belum ada
        if (!File::exists($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
        }

        // cek apakah ada file di folder dummy
        $dummyImages = File::exists($sourceDir) ? File::files($sourceDir) : [];
        $useLocalImages = count($dummyImages) > 0;

        // Data material
        $materialsData = [
            [
                'title' => 'Tari Kecak',
                'description' => 'Tari Kecak adalah pertunjukan seni khas Bali yang diciptakan pada tahun 1930-an. Tarian ini tidak menggunakan alat musik, melainkan paduan suara "cak" dari para penari laki-laki yang duduk melingkar. Cerita yang dibawakan biasanya mengambil dari epos Ramayana.',
                'status' => 1,
                'category' => 'Tarian Bali',
            ],
            [
                'title' => 'Tari Baris Gede',
                'description' => 'Tari Baris Gede merupakan tarian sakral dan monumental yang menjadi bagian inti dalam upacara Dewa Yadnya. Tarian ini dibawakan secara berkelompok oleh 9 hingga 60 penari laki-laki dengan atribut senjata tradisional.',
                'status' => 1,
                'category' => 'Tarian Bali',
            ],
            [
                'title' => 'Upacara Melasti',
                'description' => 'Melasti adalah upacara penyucian pratima dan benda sakral ke laut yang dilaksanakan menjelang Hari Raya Nyepi. Umat Hindu Bali berbondong-bondong menuju pantai dengan pakaian putih.',
                'status' => 1,
                'category' => 'Upacara Adat',
            ],
            [
                'title' => 'Ngaben',
                'description' => 'Ngaben adalah upacara pembakaran jenazah umat Hindu di Bali yang bertujuan untuk mengembalikan roh leluhur ke alam asalnya. Upacara ini biasanya meriah dan penuh simbolisme.',
                'status' => 1,
                'category' => 'Upacara Adat',
            ],
            [
                'title' => 'Gamelan Gong Kebyar',
                'description' => 'Gong Kebyar adalah salah satu jenis gamelan Bali yang paling populer, dikenal dengan tempo dinamis, perubahan mendadak, dan permainan yang ekspresif.',
                'status' => 1,
                'category' => 'Musik Tradisional',
            ],
            [
                'title' => 'Tari Legong',
                'description' => 'Tari Legong adalah tarian klasik Bali yang sangat halus dan rumit, biasanya dibawakan oleh dua atau tiga gadis muda dengan gerakan mata dan tangan yang luwes.',
                'status' => 1,
                'category' => 'Tarian Bali',
            ],
            [
                'title' => 'Omed-omedan',
                'description' => 'Omed-omedan adalah tradisi tarik-menarik dan ciuman massal yang dilakukan oleh pemuda-pemudi di Banjar Kaja, Denpasar, sehari setelah Nyepi sebagai wujud kasih sayang dan kebersamaan.',
                'status' => 1,
                'category' => 'Upacara Adat',
            ],
            [
                'title' => 'Makepung',
                'description' => 'Makepung adalah balapan kerbau tradisional yang berasal dari Kabupaten Jembrana, Bali. Tradisi ini awalnya dilakukan oleh para petani untuk mengisi waktu luang.',
                'status' => 1,
                'category' => 'Seni Pertunjukan',
            ],
            [
                'title' => 'Tari Pendet',
                'description' => 'Tari Pendet adalah tarian selamat datang yang biasanya dibawakan oleh sekelompok wanita dengan membawa bokor berisi bunga. Awalnya tarian ini bersifat sakral, namun kini sering dipentaskan untuk penyambutan.',
                'status' => 1,
                'category' => 'Tarian Bali',
            ],
            [
                'title' => 'Mesuryak',
                'description' => 'Mesuryak adalah tradisi unik di Desa Bongan, Tabanan, di mana warga melempar uang ke udara saat upacara Ngaben sebagai simbol melepas kepergian roh dengan suka cita.',
                'status' => 0,
                'category' => 'Upacara Adat',
            ],
        ];


        foreach ($materialsData as $data) {
            $category = Category::where('name', $data['category'])->first();

            if ($useLocalImages) {
                $randomImage = $dummyImages[array_rand($dummyImages)];
                $extension = $randomImage->getExtension();
                $newFileName = Str::random(20) . '.' . $extension;
                $targetPath = $targetDir . '/' . $newFileName;

                File::copy($randomImage->getPathname(), $targetPath);

                $picturePath = 'materials/' . $newFileName;
            } else {
                $picturePath = 'https://picsum.photos/seed/' . Str::slug($data['title']) . '/800/600';
            }

            $material = Material::create([
                'title'       => $data['title'],
                'description' => $data['description'],
                'picture'     => $picturePath,
                'status'      => $data['status'],
                'user_id'     => $admin->id,
                'category_id' => $category->id,
            ]);

            $quiz = Quiz::create([
                'material_id' => $material->id,
                'title'       => $material->title . ' Quiz',
            ]);

            $questionCount = rand(3, 5);
            for ($i = 0; $i < $questionCount; $i++) {
                $questionText = $this->generateQuestionText($material->title);
                $correctAnswer = rand(0, 3);

                $question = Question::create([
                    'quiz_id'        => $quiz->id,
                    'question_text'  => $questionText,
                    'correct_answer' => $correctAnswer,
                ]);

                $options = $this->generateOptions($material->title);
                foreach ($options as $optText) {
                    Option::create([
                        'question_id' => $question->id,
                        'option_text' => $optText,
                    ]);
                }
            }
        }

        $this->command->info('✅ 10 Material dengan gambar lokal dan quiz berhasil dibuat!');
    }

    private function generateQuestionText($title)
    {
        $templates = [
            "Apa fungsi utama dari $title?",
            "Di mana $title biasanya dipentaskan?",
            "Siapa yang biasanya menarikan/melakukan $title?",
            "Kapan $title pertama kali diciptakan?",
            "Apa ciri khas dari $title?",
            "Apa makna filosofis di balik $title?",
            "Alat musik apa yang mengiringi $title?",
            "Berapa jumlah peserta dalam $title?",
        ];
        return $templates[array_rand($templates)];
    }

    private function generateOptions($title)
    {
        $pool = [
            'Bali', 'Jawa', 'Lombok', 'Sumatera',
            'Upacara adat', 'Pertunjukan wisata', 'Ritual sakral', 'Hiburan rakyat',
            'Laki-laki', 'Perempuan', 'Anak-anak', 'Semua umur',
            'Abad ke-10', 'Abad ke-15', 'Abad ke-19', 'Abad ke-20',
            'Gerakan dinamis', 'Gerakan lambat', 'Gerakan mata', 'Gerakan tangan',
            'Gamelan', 'Gong', 'Suara manusia', 'Angklung',
            '9-60 orang', '1-5 orang', '5-10 orang', 'Lebih dari 100 orang',
        ];
        shuffle($pool);
        return array_slice($pool, 0, 4);
    }
}
