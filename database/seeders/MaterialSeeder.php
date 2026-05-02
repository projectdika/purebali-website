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
                'role'         => 'admin',
            ]
        );

        $categoryNames = ['Tarian Bali', 'Upacara Adat', 'Musik Tradisional', 'Seni Pertunjukan'];
        foreach ($categoryNames as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        Option::query()->delete();
        Question::query()->delete();
        Quiz::query()->delete();
        Material::query()->delete();

        $sourceDir = resource_path('dummy/materials');
        $targetDir = storage_path('app/public/materials');

        if (!File::exists($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
        }

        $materialsData = [

            // ═══════════════════════════════════════
            //  TARIAN BALI (5 materi)
            // ═══════════════════════════════════════

            [
                'title'    => 'Tari Kecak',
                'picture'  => 'tari-kecak.png',
                'status'   => 1,
                'category' => 'Tarian Bali',
                'description' => '<p>Tari Kecak adalah pertunjukan seni dramatari khas Bali yang diciptakan pada tahun 1930-an oleh seniman Jerman Walter Spies bersama penari Bali bernama Wayan Limbak. Tarian ini mengisahkan cerita Ramayana, khususnya adegan penculikan Dewi Sita oleh Rahwana dan pertempuran Rama dibantu oleh pasukan kera yang dipimpin Hanoman.</p><p>Yang membuat Tari Kecak begitu unik adalah tidak digunakannya alat musik gamelan sebagai pengiring. Sebagai gantinya, puluhan hingga ratusan penari laki-laki duduk melingkar dan melantunkan suara <strong>"cak cak cak"</strong> secara bersahutan membentuk harmoni yang memukau. Pertunjukan ini biasanya digelar di pura atau teater terbuka saat matahari terbenam, menciptakan suasana yang sangat magis dan dramatis.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Siapa yang menciptakan Tari Kecak pada tahun 1930-an?',
                        'correct_answer' => 2,
                        'options'        => ['I Wayan Dibia dan seorang seniman Belanda', 'Raja Bali dan seniman Jepang', 'Walter Spies dan Wayan Limbak', 'Ida Bagus Ngurah dan Walter Spies'],
                    ],
                    [
                        'question_text'  => 'Cerita apa yang dibawakan dalam Tari Kecak?',
                        'correct_answer' => 1,
                        'options'        => ['Mahabharata', 'Ramayana', 'Arjuna Wiwaha', 'Sutasoma'],
                    ],
                    [
                        'question_text'  => 'Apa yang digunakan sebagai iringan musik dalam Tari Kecak?',
                        'correct_answer' => 3,
                        'options'        => ['Gamelan Gong Kebyar', 'Angklung', 'Kendang dan Suling', 'Suara manusia "cak"'],
                    ],
                ],
            ],

            [
                'title'    => 'Tari Legong',
                'picture'  => 'tari-legong.jpg',
                'status'   => 1,
                'category' => 'Tarian Bali',
                'description' => '<p>Tari Legong adalah salah satu tarian klasik Bali yang paling dikenal di seluruh dunia. Tarian ini biasanya dibawakan oleh dua atau tiga penari perempuan muda dengan kostum yang sangat indah dan warna-warni, dihiasi hiasan kepala dari bunga emas yang megah. Gerakan dalam Tari Legong sangat halus, luwes, dan penuh ekspresi, terutama pada gerakan mata (sledet), jari tangan, dan langkah kaki yang terkoordinasi dengan sempurna.</p><p>Tari Legong berasal dari tradisi keraton Bali dan konon terinspirasi dari mimpi seorang pangeran yang melihat bidadari menari di kahyangan. Tarian ini diiringi oleh Gamelan Semar Pagulingan yang merdu dan biasanya mengangkat kisah cinta atau cerita dari kesusastraan klasik Bali. Legong telah diakui sebagai salah satu warisan budaya dunia yang tak ternilai harganya.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Berapa jumlah penari yang biasanya membawakan Tari Legong?',
                        'correct_answer' => 0,
                        'options'        => ['Dua atau tiga penari perempuan', 'Lima penari laki-laki', 'Sepuluh penari campuran', 'Satu penari perempuan'],
                    ],
                    [
                        'question_text'  => 'Gamelan apa yang biasanya mengiringi Tari Legong?',
                        'correct_answer' => 2,
                        'options'        => ['Gamelan Gong Kebyar', 'Gamelan Angklung', 'Gamelan Semar Pagulingan', 'Gamelan Gambuh'],
                    ],
                    [
                        'question_text'  => 'Gerakan khas Tari Legong yang paling menonjol adalah?',
                        'correct_answer' => 1,
                        'options'        => ['Gerakan kaki yang cepat dan melompat', 'Gerakan mata (sledet) dan jari tangan yang halus', 'Gerakan kepala yang berputar', 'Gerakan badan yang kaku dan tegak'],
                    ],
                ],
            ],

            [
                'title'    => 'Tari Baris Gede',
                'picture'  => 'tari-baris-gede.jpg',
                'status'   => 1,
                'category' => 'Tarian Bali',
                'description' => '<p>Tari Baris Gede adalah tarian sakral dan monumental yang merupakan bagian inti dalam upacara Dewa Yadnya di Bali. Tarian ini melambangkan pasukan prajurit yang siap membela kebenaran dan kemuliaan. Kata "Baris" sendiri berasal dari kata <em>berbaris</em> yang mencerminkan formasi para prajurit yang teratur dan gagah.</p><p>Tarian ini dibawakan secara berkelompok oleh 8 hingga 60 penari laki-laki yang mengenakan kostum lengkap berupa pakaian perang tradisional dengan atribut senjata seperti tombak, keris, atau tameng. Karena sifatnya yang sakral, Tari Baris Gede hanya boleh dipentaskan di dalam lingkungan pura pada saat upacara keagamaan berlangsung, bukan untuk pertunjukan hiburan semata.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Apa makna kata "Baris" dalam Tari Baris Gede?',
                        'correct_answer' => 0,
                        'options'        => ['Berbaris, mencerminkan formasi prajurit', 'Berlari, mencerminkan kecepatan', 'Berperang, mencerminkan keberanian', 'Berdoa, mencerminkan kesucian'],
                    ],
                    [
                        'question_text'  => 'Di mana Tari Baris Gede boleh dipentaskan?',
                        'correct_answer' => 3,
                        'options'        => ['Di panggung hiburan umum', 'Di hotel dan resort', 'Di mana saja', 'Di lingkungan pura saat upacara keagamaan'],
                    ],
                    [
                        'question_text'  => 'Berapa jumlah penari dalam Tari Baris Gede?',
                        'correct_answer' => 1,
                        'options'        => ['1 hingga 5 penari', '8 hingga 60 penari laki-laki', 'Tepat 100 penari', '3 hingga 7 penari perempuan'],
                    ],
                ],
            ],

            [
                'title'    => 'Tari Pendet',
                'picture'  => 'tari-pendet.jpg',
                'status'   => 1,
                'category' => 'Tarian Bali',
                'description' => '<p>Tari Pendet adalah tarian Bali yang awalnya merupakan tarian persembahan sakral di pura, dipersembahkan kepada para dewa sebagai ungkapan rasa syukur dan penghormatan. Tarian ini dibawakan oleh sekelompok wanita yang membawa bokor berisi bunga-bunga harum yang nantinya akan ditaburkan sebagai simbol penyambutan dan penghormatan kepada tamu atau dewa yang hadir.</p><p>Seiring perkembangan zaman, Tari Pendet kemudian diadaptasi menjadi tarian selamat datang untuk menyambut tamu kehormatan dalam berbagai acara resmi maupun pariwisata. I Wayan Rindi dan Ni Ketut Reneng adalah dua tokoh yang berjasa mengembangkan Tari Pendet menjadi tarian penyambutan yang kita kenal sekarang. Meskipun telah berkembang, esensi keindahan, keanggunan, dan ketulusan tetap menjadi jiwa dari tarian ini.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Apa fungsi awal Tari Pendet sebelum berkembang menjadi tarian penyambutan?',
                        'correct_answer' => 2,
                        'options'        => ['Tarian hiburan untuk raja', 'Tarian perang untuk mengusir musuh', 'Tarian persembahan sakral di pura', 'Tarian pendidikan untuk anak-anak'],
                    ],
                    [
                        'question_text'  => 'Apa yang dibawa penari dalam Tari Pendet?',
                        'correct_answer' => 0,
                        'options'        => ['Bokor berisi bunga-bunga harum', 'Tombak dan tameng', 'Kipas dan selendang', 'Lilin dan dupa'],
                    ],
                    [
                        'question_text'  => 'Siapa yang berjasa mengembangkan Tari Pendet menjadi tarian penyambutan?',
                        'correct_answer' => 3,
                        'options'        => ['Walter Spies dan Wayan Limbak', 'I Made Bandem dan I Gusti Ngurah', 'Ni Luh Sutari dan I Ketut Mandra', 'I Wayan Rindi dan Ni Ketut Reneng'],
                    ],
                ],
            ],

            [
                'title'    => 'Tari Barong',
                'picture'  => 'tari-barong.jpg',
                'status'   => 1,
                'category' => 'Tarian Bali',
                'description' => '<p>Tari Barong adalah pertunjukan dramatari Bali yang menggambarkan pertarungan abadi antara kebaikan dan kejahatan. Barong adalah makhluk mitologi Bali yang melambangkan kebaikan, biasanya digambarkan sebagai singa besar yang dijaga oleh dua penari di bagian kepala dan ekornya. Tarian ini merupakan salah satu tarian paling sakral di Bali dan hingga kini masih dipentaskan dalam berbagai upacara keagamaan.</p><p>Dalam pertunjukannya, Barong berhadapan dengan Rangda, sosok ratu iblis yang melambangkan kejahatan dan kekuatan gelap. Para pengikut Barong yang kerasukan mencoba menyerang Rangda dengan keris, namun kesaktian Rangda membuat mereka balik mengarahkan keris ke tubuh mereka sendiri. Pertarungan ini tidak pernah memiliki pemenang mutlak, melambangkan bahwa kebaikan dan kejahatan adalah dua kekuatan yang selalu hadir dan harus dijaga keseimbangannya dalam kehidupan.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Apa yang dilambangkan oleh Barong dalam Tari Barong?',
                        'correct_answer' => 1,
                        'options'        => ['Kejahatan dan kekuatan gelap', 'Kebaikan dan pelindung', 'Dewa perang', 'Roh leluhur'],
                    ],
                    [
                        'question_text'  => 'Siapa lawan Barong dalam pertunjukan Tari Barong?',
                        'correct_answer' => 2,
                        'options'        => ['Hanoman', 'Rahwana', 'Rangda', 'Kala'],
                    ],
                    [
                        'question_text'  => 'Apa pesan filosofis dari pertarungan Barong melawan Rangda yang tidak pernah memiliki pemenang?',
                        'correct_answer' => 0,
                        'options'        => ['Kebaikan dan kejahatan harus selalu dijaga keseimbangannya', 'Kejahatan selalu mengalahkan kebaikan', 'Kebaikan selalu mengalahkan kejahatan', 'Pertarungan tidak ada gunanya'],
                    ],
                ],
            ],

            // ═══════════════════════════════════════
            //  UPACARA ADAT (5 materi)
            // ═══════════════════════════════════════

            [
                'title'    => 'Upacara Ngaben',
                'picture'  => 'ngaben.jpg',
                'status'   => 1,
                'category' => 'Upacara Adat',
                'description' => '<p>Ngaben adalah upacara pembakaran jenazah yang merupakan salah satu ritual terpenting dalam agama Hindu Bali. Upacara ini bertujuan untuk membebaskan roh orang yang telah meninggal dari ikatan duniawi dan membantu perjalanannya menuju alam yang lebih tinggi, atau bahkan menuju kelahiran kembali (reinkarnasi). Bagi masyarakat Bali, kematian bukanlah akhir dari segalanya, melainkan sebuah transisi roh menuju kehidupan berikutnya.</p><p>Prosesi Ngaben sangatlah meriah dan megah, melibatkan seluruh anggota keluarga dan masyarakat sekitar. Jenazah diarak menggunakan wadah berbentuk menara tinggi yang disebut <strong>bade</strong> dan sarkofagus berbentuk lembu yang disebut <strong>petulangan</strong> menuju tempat pembakaran. Meskipun ini adalah upacara kematian, suasananya tidak penuh kesedihan melainkan lebih terasa seperti perayaan karena masyarakat Bali meyakini bahwa membantu roh leluhur pergi dengan bahagia adalah kewajiban yang mulia.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Apa tujuan utama dari Upacara Ngaben?',
                        'correct_answer' => 1,
                        'options'        => ['Menghormati raja yang telah wafat', 'Membebaskan roh dari ikatan duniawi', 'Memperingati hari kematian setiap tahun', 'Mengusir roh jahat dari desa'],
                    ],
                    [
                        'question_text'  => 'Apa nama wadah berbentuk menara tinggi yang digunakan dalam prosesi Ngaben?',
                        'correct_answer' => 0,
                        'options'        => ['Bade', 'Petulangan', 'Pralingga', 'Bebaturan'],
                    ],
                    [
                        'question_text'  => 'Apa nama sarkofagus berbentuk lembu yang digunakan dalam Ngaben?',
                        'correct_answer' => 3,
                        'options'        => ['Bade', 'Pelangkiran', 'Sanggar', 'Petulangan'],
                    ],
                ],
            ],

            [
                'title'    => 'Upacara Melasti',
                'picture'  => 'melasti.jpg',
                'status'   => 1,
                'category' => 'Upacara Adat',
                'description' => '<p>Melasti adalah upacara penyucian diri dan benda-benda sakral yang dilaksanakan oleh umat Hindu Bali menjelang Hari Raya Nyepi. Upacara ini biasanya digelar tiga atau empat hari sebelum Nyepi, di mana umat Hindu berbondong-bondong menuju laut, danau, atau sumber mata air suci sambil membawa pratima (simbol-simbol dewa) serta perlengkapan pura untuk disucikan.</p><p>Kata <em>melasti</em> berasal dari kata "mala" (kotoran) dan "asti" (membersihkan), yang secara harfiah berarti membersihkan segala kotoran dan dosa. Prosesi ini sangat indah dan khidmat; ribuan umat berpakaian serba putih membawa berbagai benda sakral dengan diiringi musik gamelan dan suara doa yang merdu. Upacara Melasti merupakan salah satu pemandangan paling memukau di Bali yang menarik perhatian wisatawan dari seluruh dunia.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Kapan Upacara Melasti dilaksanakan?',
                        'correct_answer' => 0,
                        'options'        => ['Tiga atau empat hari sebelum Nyepi', 'Sehari setelah Nyepi', 'Saat Hari Raya Galungan', 'Setiap bulan purnama'],
                    ],
                    [
                        'question_text'  => 'Apa arti harfiah kata "Melasti"?',
                        'correct_answer' => 2,
                        'options'        => ['Berdoa kepada dewa laut', 'Menyambut tahun baru Saka', 'Membersihkan segala kotoran dan dosa', 'Merayakan panen raya'],
                    ],
                    [
                        'question_text'  => 'Ke mana umat Hindu Bali pergi dalam Upacara Melasti?',
                        'correct_answer' => 1,
                        'options'        => ['Ke gunung suci', 'Ke laut, danau, atau sumber mata air suci', 'Ke pura besar di pusat kota', 'Ke rumah kepala adat'],
                    ],
                ],
            ],

            [
                'title'    => 'Upacara Galungan',
                'picture'  => 'galungan.jpg',
                'status'   => 1,
                'category' => 'Upacara Adat',
                'description' => '<p>Galungan adalah hari raya suci umat Hindu Bali yang dirayakan setiap 210 hari sekali berdasarkan kalender Pawukon, tepatnya pada Rabu Kliwon Dungulan. Hari raya ini memperingati kemenangan Dharma (kebaikan) atas Adharma (kejahatan), sekaligus menjadi momen untuk menyambut kedatangan roh-roh leluhur yang diyakini turun ke bumi untuk mengunjungi keluarganya.</p><p>Salah satu ciri khas Galungan yang paling ikonik adalah pemasangan <strong>penjor</strong> di depan setiap rumah — bambu tinggi yang dihias dengan janur, buah-buahan, dan bunga sebagai simbol kesyukuran dan kemakmuran. Suasana Bali saat Galungan sangat meriah dan penuh warna; jalanan dihiasi barisan penjor yang melengkung indah, masyarakat mengenakan pakaian adat, dan seluruh pura dipenuhi dengan sesaji dan doa-doa. Galungan dirayakan selama sepuluh hari dan ditutup dengan Hari Raya Kuningan.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Seberapa sering Hari Raya Galungan dirayakan?',
                        'correct_answer' => 3,
                        'options'        => ['Setiap 100 hari sekali', 'Setiap tahun sekali', 'Setiap 365 hari sekali', 'Setiap 210 hari sekali'],
                    ],
                    [
                        'question_text'  => 'Apa yang dilambangkan oleh penjor yang dipasang saat Galungan?',
                        'correct_answer' => 1,
                        'options'        => ['Simbol kematian leluhur', 'Simbol kesyukuran dan kemakmuran', 'Simbol kekuatan militer', 'Simbol batas wilayah desa'],
                    ],
                    [
                        'question_text'  => 'Hari raya apa yang menutup perayaan Galungan setelah sepuluh hari?',
                        'correct_answer' => 2,
                        'options'        => ['Nyepi', 'Saraswati', 'Kuningan', 'Siwaratri'],
                    ],
                ],
            ],

            [
                'title'    => 'Upacara Nyepi',
                'picture'  => 'nyepi.jpeg',
                'status'   => 1,
                'category' => 'Upacara Adat',
                'description' => '<p>Nyepi adalah Hari Tahun Baru Saka yang dirayakan oleh umat Hindu Bali dengan cara yang sangat unik dan berbeda dari perayaan tahun baru di seluruh dunia. Alih-alih dirayakan dengan kemeriahan dan keramaian, Nyepi justru diisi dengan keheningan total selama 24 jam penuh. Seluruh aktivitas di Bali berhenti total — tidak ada kendaraan berlalu lalang, tidak ada lampu menyala, tidak ada aktivitas di luar rumah, bahkan Bandara Internasional Ngurah Rai pun ditutup.</p><p>Nyepi didasarkan pada empat larangan yang disebut <strong>Catur Brata Penyepian</strong>: Amati Geni (tidak menyalakan api/listrik), Amati Karya (tidak bekerja), Amati Lelungan (tidak bepergian), dan Amati Lelanguan (tidak bersenang-senang). Sehari sebelum Nyepi, digelar prosesi <em>Pengrupukan</em> yang diramaikan dengan pawai ogoh-ogoh — patung raksasa simbol kejahatan yang kemudian dibakar sebagai simbol membuang sifat buruk sebelum memasuki tahun baru.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Apa yang dimaksud dengan Catur Brata Penyepian?',
                        'correct_answer' => 0,
                        'options'        => ['Empat larangan yang harus dipatuhi saat Nyepi', 'Empat doa yang dibacakan saat Nyepi', 'Empat hari perayaan sebelum Nyepi', 'Empat jenis sesaji untuk Nyepi'],
                    ],
                    [
                        'question_text'  => 'Apa nama patung raksasa yang diarak saat malam sebelum Nyepi?',
                        'correct_answer' => 2,
                        'options'        => ['Barong', 'Rangda', 'Ogoh-ogoh', 'Pratima'],
                    ],
                    [
                        'question_text'  => 'Apa yang dimaksud dengan Amati Geni dalam Catur Brata Penyepian?',
                        'correct_answer' => 1,
                        'options'        => ['Tidak boleh makan dan minum', 'Tidak menyalakan api atau listrik', 'Tidak boleh berbicara', 'Tidak boleh tidur'],
                    ],
                ],
            ],

            [
                'title'    => 'Upacara Otonan',
                'picture'  => 'otonan.jpg',
                'status'   => 1,
                'category' => 'Upacara Adat',
                'description' => '<p>Otonan adalah upacara adat Bali yang dirayakan sebagai hari ulang tahun seseorang berdasarkan kalender Bali (Pawukon), yang berlangsung setiap 210 hari sekali. Berbeda dengan perayaan ulang tahun pada umumnya, Otonan bukan sekadar perayaan, melainkan sebuah ritual keagamaan yang bertujuan untuk mensyukuri kelahiran, memohon perlindungan dari Tuhan dan leluhur, serta membersihkan diri secara spiritual.</p><p>Dalam upacara Otonan, keluarga menyiapkan berbagai sesaji dan banten (persembahan) yang dipersembahkan kepada Ida Sang Hyang Widhi Wasa dan para leluhur. Orang yang berulang tahun akan didoakan dan disucikan oleh seorang pemangku (pendeta) dengan percikan air suci (tirta) dan asap dupa. Otonan pertama bayi merupakan yang paling istimewa dan biasanya dirayakan dengan sangat meriah oleh seluruh keluarga besar.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Seberapa sering Otonan dirayakan menurut kalender Bali?',
                        'correct_answer' => 3,
                        'options'        => ['Setiap 365 hari sekali', 'Setiap 100 hari sekali', 'Setiap 30 hari sekali', 'Setiap 210 hari sekali'],
                    ],
                    [
                        'question_text'  => 'Siapa yang memimpin ritual dalam Upacara Otonan?',
                        'correct_answer' => 1,
                        'options'        => ['Kepala keluarga tertua', 'Pemangku (pendeta)', 'Balian (dukun adat)', 'Bendesa adat'],
                    ],
                    [
                        'question_text'  => 'Apa tujuan utama dari Upacara Otonan?',
                        'correct_answer' => 0,
                        'options'        => ['Mensyukuri kelahiran dan memohon perlindungan', 'Merayakan keberhasilan panen', 'Menandai usia dewasa seseorang', 'Memperingati hari kematian leluhur'],
                    ],
                ],
            ],

            // ═══════════════════════════════════════
            //  MUSIK TRADISIONAL (5 materi)
            // ═══════════════════════════════════════

            [
                'title'    => 'Gamelan Gong Kebyar',
                'picture'  => 'gong-kebyar.jpg',
                'status'   => 1,
                'category' => 'Musik Tradisional',
                'description' => '<p>Gamelan Gong Kebyar adalah jenis ansambel gamelan Bali yang paling populer dan paling sering dijumpai di seluruh penjuru Bali. Lahir pada sekitar tahun 1915 di Bali Utara, Gong Kebyar dikenal dengan karakter musiknya yang sangat dinamis, ekspresif, dan penuh energi. Kata <em>kebyar</em> dalam bahasa Bali berarti "berkilat" atau "meledak", yang menggambarkan perubahan tempo dan dinamika musik yang sangat mendadak dan dramatis.</p><p>Instrumen utama dalam Gamelan Gong Kebyar meliputi gangsa (metalofon), reyong (gong kecil berjejer), kendang (gendang), gong, kajar, dan berbagai instrumen pelengkap lainnya. Satu set Gong Kebyar bisa terdiri dari 25 hingga 40 instrumen yang dimainkan oleh pemain yang sama jumlahnya. Gamelan ini menjadi iringan utama berbagai tarian Bali modern dan pertunjukan seni, serta sering dilombakan dalam festival-festival seni bergengsi di Bali.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Apa arti kata "kebyar" dalam Gamelan Gong Kebyar?',
                        'correct_answer' => 2,
                        'options'        => ['Tenang dan mengalir', 'Lambat dan khidmat', 'Berkilat atau meledak', 'Lembut dan merdu'],
                    ],
                    [
                        'question_text'  => 'Di mana Gamelan Gong Kebyar lahir sekitar tahun 1915?',
                        'correct_answer' => 0,
                        'options'        => ['Bali Utara', 'Bali Selatan', 'Bali Timur', 'Bali Barat'],
                    ],
                    [
                        'question_text'  => 'Apa nama instrumen metalofon utama dalam Gamelan Gong Kebyar?',
                        'correct_answer' => 1,
                        'options'        => ['Kendang', 'Gangsa', 'Reyong', 'Kajar'],
                    ],
                ],
            ],

            [
                'title'    => 'Gamelan Angklung Bali',
                'picture'  => 'angklung-bali.jpg',
                'status'   => 1,
                'category' => 'Musik Tradisional',
                'description' => '<p>Gamelan Angklung Bali adalah salah satu jenis gamelan tertua di Bali yang memiliki keunikan tersendiri dibandingkan dengan Angklung dari Jawa Barat. Di Bali, Angklung adalah ansambel gamelan yang menggunakan instrumen berbilah empat nada (tetratonik), berbeda dengan gamelan Bali lainnya yang umumnya memiliki lima nada (pentatonik). Gamelan ini memiliki suara yang jernih, ringan, dan menenangkan.</p><p>Gamelan Angklung Bali secara tradisional digunakan untuk mengiringi upacara kematian, terutama dalam prosesi Ngaben dan Pitra Yadnya. Namun seiring waktu, Angklung juga dimainkan dalam berbagai upacara lainnya dan bahkan pertunjukan seni. Di beberapa daerah seperti Karangasem dan Buleleng, Gamelan Angklung masih dijaga dengan sangat baik dan diwariskan dari generasi ke generasi sebagai bagian tak terpisahkan dari identitas budaya desa setempat.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Berapa jumlah nada yang dimiliki instrumen dalam Gamelan Angklung Bali?',
                        'correct_answer' => 1,
                        'options'        => ['Lima nada (pentatonik)', 'Empat nada (tetratonik)', 'Tujuh nada (diatonik)', 'Enam nada (heksatonik)'],
                    ],
                    [
                        'question_text'  => 'Dalam upacara apa Gamelan Angklung Bali secara tradisional digunakan?',
                        'correct_answer' => 3,
                        'options'        => ['Upacara pernikahan', 'Upacara panen raya', 'Upacara kelahiran bayi', 'Upacara kematian seperti Ngaben'],
                    ],
                    [
                        'question_text'  => 'Di daerah mana Gamelan Angklung Bali masih sangat dijaga kelestariannya?',
                        'correct_answer' => 0,
                        'options'        => ['Karangasem dan Buleleng', 'Kuta dan Seminyak', 'Nusa Dua dan Jimbaran', 'Ubud dan Kintamani'],
                    ],
                ],
            ],

            [
                'title'    => 'Gamelan Gambuh',
                'picture'  => 'gambuh.jpg',
                'status'   => 1,
                'category' => 'Musik Tradisional',
                'description' => '<p>Gamelan Gambuh dianggap sebagai induk dari semua jenis gamelan dan tari klasik Bali yang ada saat ini. Gamelan ini merupakan ansambel paling tua dan paling lengkap di Bali, dengan usia yang diperkirakan sudah lebih dari seribu tahun. Instrumen dominan dalam Gamelan Gambuh adalah seruling (suling) panjang berukuran sekitar 80 cm yang menghasilkan suara melodik yang dalam dan kaya, serta rebab (biola gesek bersenar dua) sebagai instrumen melodi lainnya.</p><p>Gamelan Gambuh biasanya mengiringi Dramatari Gambuh, sebuah pertunjukan teater total yang menggabungkan tari, musik, nyanyian, dan dialog dalam satu kesatuan. Dramatari Gambuh mengisahkan cerita dari Panji, kisah cinta dan petualangan seorang pangeran Jawa. Karena kerumitannya yang sangat tinggi, Gambuh kini hanya tersisa di beberapa desa seperti Batuan, Pedungan, dan Tampaksiring, dan telah diakui oleh UNESCO sebagai warisan budaya tak benda yang perlu dilestarikan.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Apa kedudukan Gamelan Gambuh di antara gamelan-gamelan Bali lainnya?',
                        'correct_answer' => 0,
                        'options'        => ['Dianggap sebagai induk dari semua gamelan dan tari klasik Bali', 'Dianggap sebagai gamelan termuda di Bali', 'Dianggap sebagai gamelan paling populer di Bali', 'Dianggap sebagai gamelan yang berasal dari Jawa'],
                    ],
                    [
                        'question_text'  => 'Instrumen apa yang menjadi ciri khas dominan dalam Gamelan Gambuh?',
                        'correct_answer' => 2,
                        'options'        => ['Kendang besar', 'Gangsa dan reyong', 'Suling panjang sekitar 80 cm', 'Gong besar'],
                    ],
                    [
                        'question_text'  => 'Kisah apa yang dibawakan dalam Dramatari Gambuh?',
                        'correct_answer' => 3,
                        'options'        => ['Kisah Mahabharata', 'Kisah Ramayana', 'Kisah Sutasoma', 'Kisah Panji'],
                    ],
                ],
            ],

            [
                'title'    => 'Instrumen Rindik',
                'picture'  => 'rindik.jpg',
                'status'   => 1,
                'category' => 'Musik Tradisional',
                'description' => '<p>Rindik adalah alat musik perkusi tradisional Bali yang terbuat dari bilahan bambu yang disusun di atas rangka kayu. Cara memainkannya adalah dengan dipukul menggunakan dua buah pemukul (panggul) yang ujungnya dilapisi karet atau kain. Suara yang dihasilkan Rindik sangat khas — ringan, ceria, dan merdu, sering digambarkan seperti suara air yang mengalir atau angin sepoi-sepoi.</p><p>Rindik paling sering dimainkan berpasangan dalam sebuah pertunjukan yang disebut <em>joged bumbung</em> — sebuah tarian pergaulan yang sangat populer di kalangan masyarakat Bali. Dalam joged bumbung, penari perempuan akan mengajak penonton untuk menari bersama secara bergantian, menciptakan suasana yang riang dan menghibur. Rindik juga sering digunakan sebagai musik penyambutan tamu di hotel-hotel dan resort di Bali sebagai representasi keramahan budaya Bali.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Terbuat dari bahan apa instrumen Rindik?',
                        'correct_answer' => 1,
                        'options'        => ['Logam perunggu', 'Bilahan bambu', 'Kayu jati', 'Kulit binatang'],
                    ],
                    [
                        'question_text'  => 'Apa nama pertunjukan tarian pergaulan yang diiringi Rindik?',
                        'correct_answer' => 2,
                        'options'        => ['Tari Pendet', 'Tari Janger', 'Joged Bumbung', 'Tari Oleg'],
                    ],
                    [
                        'question_text'  => 'Di mana Rindik sering digunakan selain dalam pertunjukan tradisional?',
                        'correct_answer' => 3,
                        'options'        => ['Di lapangan sepak bola', 'Di pasar tradisional', 'Di balai banjar saat rapat', 'Sebagai musik penyambutan tamu di hotel dan resort'],
                    ],
                ],
            ],

            [
                'title'    => 'Gender Wayang',
                'picture'  => 'gender-wayang.jpg',
                'status'   => 1,
                'category' => 'Musik Tradisional',
                'description' => '<p>Gender Wayang adalah ansambel gamelan Bali yang sangat istimewa karena terdiri dari hanya empat instrumen gender — metalofon dengan bilahan perunggu yang digantung di atas resonator bambu. Instrumen ini dimainkan dengan dua buah pemukul sekaligus, satu di setiap tangan, yang membutuhkan koordinasi dan keahlian teknis yang sangat tinggi. Suara yang dihasilkan sangat kaya dan kompleks karena seorang pemain bisa memainkan melodi sekaligus mengiringinya dalam satu instrumen.</p><p>Sesuai namanya, Gender Wayang adalah iringan utama untuk pertunjukan <strong>Wayang Kulit</strong> di Bali. Keempat instrumen gender dimainkan berpasangan — dua pemain memainkan instrumen bernada lebih tinggi (gender barangan) dan dua pemain lainnya memainkan instrumen bernada lebih rendah (gender pemade). Gender Wayang juga memiliki fungsi sakral yang penting; ia digunakan dalam berbagai upacara keagamaan seperti Manusa Yadnya dan Pitra Yadnya untuk menciptakan suasana yang khidmat dan koneksi dengan dunia spiritual.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Berapa jumlah instrumen dalam ansambel Gender Wayang?',
                        'correct_answer' => 0,
                        'options'        => ['Empat instrumen gender', 'Delapan instrumen', 'Dua instrumen', 'Dua belas instrumen'],
                    ],
                    [
                        'question_text'  => 'Pertunjukan apa yang menjadi iringan utama Gender Wayang?',
                        'correct_answer' => 2,
                        'options'        => ['Tari Kecak', 'Tari Legong', 'Wayang Kulit', 'Tari Barong'],
                    ],
                    [
                        'question_text'  => 'Apa keunikan cara memainkan instrumen gender dalam Gender Wayang?',
                        'correct_answer' => 1,
                        'options'        => ['Dimainkan dengan kaki', 'Menggunakan dua pemukul sekaligus, satu di setiap tangan', 'Dimainkan dengan cara ditiup', 'Dimainkan oleh satu orang saja untuk semua instrumen'],
                    ],
                ],
            ],

            // ═══════════════════════════════════════
            //  SENI PERTUNJUKAN (5 materi)
            // ═══════════════════════════════════════

            [
                'title'    => 'Wayang Kulit Bali',
                'picture'  => 'wayang-kulit.jpg',
                'status'   => 1,
                'category' => 'Seni Pertunjukan',
                'description' => '<p>Wayang Kulit Bali adalah seni pertunjukan tradisional yang menggunakan boneka kulit (wayang) yang digerakkan oleh seorang dalang di balik layar kain putih yang diterangi lampu. Wayang Kulit Bali memiliki karakter yang khas; selain mengangkat cerita dari Mahabharata dan Ramayana, dalang Bali juga menyelipkan unsur-unsur humor, kritik sosial, dan ajaran filsafat Hindu dalam setiap pertunjukannya.</p><p>Dalang dalam Wayang Kulit Bali bukan sekadar seorang seniman biasa, melainkan juga seorang yang dianggap memiliki kemampuan spiritual. Dalang harus menguasai berbagai bahasa (Bali halus, Kawi, dan Indonesia), memahami sastra klasik, dan bisa menggerakkan puluhan wayang dengan dua tangan sekaligus sembari menyuarakan berbagai karakter. Pertunjukan Wayang Kulit Bali yang sakral disebut <em>Wayang Lemah</em>, digelar siang hari tanpa layar untuk mengiringi upacara keagamaan.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Apa nama pertunjukan Wayang Kulit Bali yang bersifat sakral dan digelar siang hari?',
                        'correct_answer' => 3,
                        'options'        => ['Wayang Peteng', 'Wayang Cenk Blonk', 'Wayang Wong', 'Wayang Lemah'],
                    ],
                    [
                        'question_text'  => 'Cerita apa yang sering diangkat dalam Wayang Kulit Bali?',
                        'correct_answer' => 0,
                        'options'        => ['Mahabharata dan Ramayana', 'Kisah Panji dan Sutasoma', 'Kisah dewa-dewi Yunani', 'Kisah raja-raja Majapahit'],
                    ],
                    [
                        'question_text'  => 'Apa yang membuat seorang dalang Bali dianggap istimewa?',
                        'correct_answer' => 2,
                        'options'        => ['Hanya perlu menguasai satu bahasa', 'Hanya perlu bisa menggerakkan wayang', 'Menguasai berbagai bahasa, sastra klasik, dan dianggap memiliki kemampuan spiritual', 'Hanya perlu menjadi keturunan bangsawan'],
                    ],
                ],
            ],

            [
                'title'    => 'Topeng Bali',
                'picture'  => 'topeng-bali.jpg',
                'status'   => 1,
                'category' => 'Seni Pertunjukan',
                'description' => '<p>Topeng Bali adalah seni pertunjukan dramatari yang menggunakan topeng sebagai media ekspresi utama. Setiap topeng yang digunakan mewakili karakter tertentu — mulai dari tokoh raja yang agung, patih yang bijaksana, punakawan yang lucu, hingga tokoh antagonis yang menakutkan. Keistimewaan Topeng Bali adalah kemampuan penari untuk menyampaikan emosi dan cerita hanya melalui gerakan tubuh dan topeng, karena beberapa topeng menutup seluruh wajah sehingga ekspresi wajah tidak dapat dilihat.</p><p>Topeng Bali dibagi menjadi beberapa jenis berdasarkan konteks pertunjukannya. <strong>Topeng Pajegan</strong> adalah topeng sakral yang dimainkan oleh seorang penari tunggal yang harus memerankan semua karakter dalam satu pertunjukan untuk keperluan upacara. <strong>Topeng Panca</strong> dimainkan oleh lima orang penari dan lebih bersifat hiburan. Topeng dibuat dari kayu pule atau kayu stigi pilihan dan diukir dengan sangat detail, menjadikannya juga sebagai karya seni kerajinan tangan yang bernilai tinggi.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Apa jenis topeng sakral yang dimainkan oleh satu penari tunggal untuk upacara?',
                        'correct_answer' => 1,
                        'options'        => ['Topeng Panca', 'Topeng Pajegan', 'Topeng Keras', 'Topeng Tua'],
                    ],
                    [
                        'question_text'  => 'Berapa orang penari dalam pertunjukan Topeng Panca?',
                        'correct_answer' => 3,
                        'options'        => ['Satu orang', 'Tiga orang', 'Empat orang', 'Lima orang'],
                    ],
                    [
                        'question_text'  => 'Dari bahan apa topeng Bali biasanya dibuat?',
                        'correct_answer' => 0,
                        'options'        => ['Kayu pule atau kayu stigi', 'Logam perak', 'Tanah liat yang dibakar', 'Kulit binatang'],
                    ],
                ],
            ],

            [
                'title'    => 'Sanghyang Dedari',
                'picture'  => 'sanghyang-dedari.jpg',
                'status'   => 1,
                'category' => 'Seni Pertunjukan',
                'description' => '<p>Sanghyang Dedari adalah salah satu bentuk tari sakral Bali yang paling mistis dan langka. Tarian ini hanya dipentaskan dalam konteks upacara keagamaan tertentu, terutama untuk menolak bala dan mengusir wabah penyakit dari suatu desa. Penari dalam Sanghyang Dedari adalah dua gadis muda yang belum akil balik, yang dipercaya memiliki kesucian sehingga layak untuk dijadikan media masuknya roh bidadari (dedari).</p><p>Hal yang paling memukau dari Sanghyang Dedari adalah bahwa kedua penari menarikan tarian yang sangat kompleks dalam keadaan <em>kerasukan</em> (trance), dengan mata tertutup rapat. Tanpa latihan sebelumnya dan tanpa melihat, mereka bergerak secara sinkron dan sempurna, yang diyakini sebagai bukti bahwa roh bidadari benar-benar hadir dalam diri mereka. Pertunjukan ini dipimpin oleh seorang pemangku yang bertugas memanggil roh dan kemudian memulihkan penari ke kondisi normal setelah pertunjukan selesai.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Siapa yang menjadi penari dalam Sanghyang Dedari?',
                        'correct_answer' => 2,
                        'options'        => ['Dua pria dewasa yang sudah menikah', 'Para pemangku pura', 'Dua gadis muda yang belum akil balik', 'Sekelompok wanita tua'],
                    ],
                    [
                        'question_text'  => 'Kondisi apa yang dialami penari saat membawakan Sanghyang Dedari?',
                        'correct_answer' => 0,
                        'options'        => ['Kerasukan (trance) dengan mata tertutup', 'Kondisi normal dengan mata terbuka', 'Menghafal gerakan yang sudah dilatih berbulan-bulan', 'Melihat bayangan melalui cermin'],
                    ],
                    [
                        'question_text'  => 'Untuk tujuan apa Sanghyang Dedari biasanya dipentaskan?',
                        'correct_answer' => 3,
                        'options'        => ['Menyambut wisatawan asing', 'Memperingati hari kemerdekaan', 'Merayakan panen raya', 'Menolak bala dan mengusir wabah penyakit'],
                    ],
                ],
            ],

            [
                'title'    => 'Makepung',
                'picture'  => 'makepung.jpg',
                'status'   => 1,
                'category' => 'Seni Pertunjukan',
                'description' => '<p>Makepung adalah tradisi balapan kerbau yang berasal dari Kabupaten Jembrana di Bali Barat dan telah menjadi ikon budaya daerah tersebut. Tradisi ini awalnya lahir dari kegiatan para petani yang membalap kerbau mereka sebagai hiburan dan kebanggaan setelah musim tanam selesai. Dalam setiap balapan, dua pasang kerbau akan menarik sebuah cikar (kereta kecil dari kayu) dengan joki yang berdiri di atasnya sambil memegang tali kendali kerbau.</p><p>Makepung telah berkembang menjadi sebuah event budaya yang sangat ditunggu-tunggu dan dikemas secara profesional. Kini terdapat dua kelompok besar yang bersaing, yaitu kelompok <strong>Ijo Gading Barat</strong> dan <strong>Ijo Gading Timur</strong>, yang saling berhadapan dalam turnamen bergilir sepanjang musim. Para pemilik kerbau dengan bangga merawat, menghias, dan melatih kerbau mereka untuk mencapai kecepatan terbaik. Selain menjadi daya tarik wisata, Makepung juga berfungsi sebagai sarana menjaga persatuan dan kebersamaan masyarakat Jembrana.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Dari daerah mana tradisi Makepung berasal?',
                        'correct_answer' => 1,
                        'options'        => ['Kabupaten Karangasem', 'Kabupaten Jembrana', 'Kabupaten Badung', 'Kabupaten Gianyar'],
                    ],
                    [
                        'question_text'  => 'Apa nama kereta kecil dari kayu yang ditarik kerbau dalam Makepung?',
                        'correct_answer' => 3,
                        'options'        => ['Andong', 'Dokar', 'Bendi', 'Cikar'],
                    ],
                    [
                        'question_text'  => 'Apa nama dua kelompok yang bersaing dalam turnamen Makepung?',
                        'correct_answer' => 0,
                        'options'        => ['Ijo Gading Barat dan Ijo Gading Timur', 'Kelompok Utara dan Kelompok Selatan', 'Tim Merah dan Tim Putih', 'Singa Barat dan Singa Timur'],
                    ],
                ],
            ],

            [
                'title'    => 'Janger',
                'picture'  => 'janger.jpeg',
                'status'   => 1,
                'category' => 'Seni Pertunjukan',
                'description' => '<p>Janger adalah seni pertunjukan hiburan rakyat yang lahir di Bali sekitar tahun 1920-an. Pertunjukan ini menampilkan dua kelompok penari — sekelompok penari laki-laki muda yang disebut <strong>Kecak</strong> dan sekelompok penari perempuan muda yang disebut <strong>Janger</strong> — yang duduk berhadapan dalam dua barisan sambil bernyanyi dan bergerak bersahut-sahutan. Janger dikenal dengan nyanyian-nyanyiannya yang ceria, riang, dan penuh semangat muda.</p><p>Yang membuat Janger menarik adalah kemampuannya untuk terus berkembang dan beradaptasi dengan zaman. Cerita yang dibawakan bisa sangat beragam, mulai dari cerita rakyat Bali tradisional hingga kisah-kisah modern. Bahkan terkadang dialog dan lagu-lagunya mengandung humor dan sindiran yang mengundang tawa penonton. Di beberapa desa, Janger masih aktif dilestarikan oleh sekaa (kelompok seni) muda-mudi sebagai wadah ekspresi seni sekaligus mempererat hubungan sosial antar pemuda desa.</p>',
                'questions' => [
                    [
                        'question_text'  => 'Sekitar tahun berapa seni pertunjukan Janger lahir di Bali?',
                        'correct_answer' => 2,
                        'options'        => ['Tahun 1800-an', 'Tahun 1850', 'Tahun 1920-an', 'Tahun 1970-an'],
                    ],
                    [
                        'question_text'  => 'Bagaimana formasi penari dalam pertunjukan Janger?',
                        'correct_answer' => 1,
                        'options'        => ['Semua penari berbaris satu baris memanjang', 'Dua kelompok duduk berhadapan dalam dua barisan', 'Penari membentuk lingkaran besar', 'Satu penari utama di tengah dikelilingi penari lain'],
                    ],
                    [
                        'question_text'  => 'Apa nama kelompok penari laki-laki dalam Janger?',
                        'correct_answer' => 3,
                        'options'        => ['Baris', 'Joged', 'Sanghyang', 'Kecak'],
                    ],
                ],
            ],

        ];

        // ── Proses setiap materi ───────────────────────────────────────────
        foreach ($materialsData as $data) {
            $category = Category::where('name', $data['category'])->first();

            $sourcePath = $sourceDir . '/' . $data['picture'];

            if (File::exists($sourcePath)) {
                $extension   = pathinfo($data['picture'], PATHINFO_EXTENSION);
                $newFileName = Str::random(20) . '.' . $extension;
                File::copy($sourcePath, $targetDir . '/' . $newFileName);
                $picturePath = 'materials/' . $newFileName;
            } else {
                $this->command->warn("⚠️  Gambar tidak ditemukan: {$data['picture']} — menggunakan placeholder.");
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

            foreach ($data['questions'] as $q) {
                $question = Question::create([
                    'quiz_id'        => $quiz->id,
                    'question_text'  => $q['question_text'],
                    'correct_answer' => $q['correct_answer'],
                ]);

                foreach ($q['options'] as $optText) {
                    Option::create([
                        'question_id' => $question->id,
                        'option_text' => $optText,
                    ]);
                }
            }

            $this->command->info("✅  {$data['title']}");
        }

        $this->command->info('');
        $this->command->info('Seeding selesai! Total: ' . count($materialsData) . ' materi.');
    }
}
