<?php
namespace Database\Seeders;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        Berita::create([
            'judul' => 'SMKN 2 Kudus Gelar Workshop Digital Marketing',
            'konten' => '<p>SMKN 2 Kudus menggelar workshop digital marketing untuk siswa kelas XII jurusan TJKT dan TAV dengan narasumber dari praktisi industri.</p>',
            'gambar' => null,
            'kategori' => 'Workshop',
            'slug' => 'workshop-digital-marketing',
            'status' => true,
            'user_id' => $user->id,
        ]);

        Berita::create([
            'judul' => 'Kunjungan Industri ke Perusahaan Teknologi',
            'konten' => '<p>Siswa jurusan TJKT melakukan kunjungan industri ke perusahaan teknologi ternama di Semarang untuk belajar langsung tentang dunia kerja.</p>',
            'gambar' => null,
            'kategori' => 'Kunjungan Industri',
            'slug' => 'kunjungan-industri-teknologi',
            'status' => true,
            'user_id' => $user->id,
        ]);
    }
}