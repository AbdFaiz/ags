<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create tags
        Tag::create([
            'name' => 'Teknologi',
            'description' => 'Artikel tentang teknologi terbaru',
            'slug' => 'teknologi',
        ]);

        Post::create([
            'title' => 'Mengenal Teknologi Sinyal Satelit pada Sistem Adidata',
            'thumbnail' => null,
            'content' => '
                <p>Dalam dunia keamanan kendaraan, kekuatan sinyal adalah segalanya. Sistem <strong>Adidata Global Sistem</strong> menggunakan integrasi multi-GNSS yang memungkinkan perangkat menangkap sinyal dari satelit GPS, GLONASS, dan Galileo secara bersamaan.</p>
                
                <h3>Mengapa Ini Penting?</h3>
                <p>Banyak perangkat pelacak standar kehilangan jejak saat kendaraan memasuki area "Urban Canyon" atau gedung parkir bawah tanah. Dengan modul terbaru kami, tingkat akurasi tetap terjaga hingga radius 2,5 meter bahkan dalam kondisi cuaca ekstrem.</p>
                
                <ul>
                    <li><strong>Anti-Jamming:</strong> Perlindungan dari alat pengacak sinyal.</li>
                    <li><strong>Real-time Update:</strong> Transmisi data setiap 5-10 detik.</li>
                    <li><strong>Low Power Consumption:</strong> Tidak menguras daya aki kendaraan.</li>
                </ul>

                <blockquote>
                    "Keamanan bukan tentang seberapa mahal alatnya, tapi seberapa cepat data sampai ke tangan pemiliknya."
                </blockquote>

                <p>Kami terus berkomitmen untuk menghadirkan pembaruan perangkat lunak secara berkala guna memastikan setiap unit yang terpasang tetap kompatibel dengan jaringan seluler generasi terbaru.</p>
            ',
        ]);

        // Hubungkan tag ke post
        $post = Post::first();
        $tag = Tag::where('name', 'Teknologi')->first();
        $post->tags()->attach($tag);
    }
}
