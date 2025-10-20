<?php
namespace Database\Seeders;

use App\Models\Prestasi;
use Illuminate\Database\Seeder;

class PrestasiSeeder extends Seeder
{
    public function run(): void
    {
        Prestasi::create([
            'judul' => 'Juara 2 Lomba Debat Bahasa Inggris Tingkat Provinsi',
            'deskripsi' => 'Dua siswa SMKN 2 Kudus berhasil meraih juara 2 dalam lomba debat bahasa Inggris tingkat provinsi yang diikuti oleh 30 tim dari seluruh Jawa Tengah.',
            'gambar' => null,
            'peringkat' => 'Juara 2',
            'tingkat' => 'Provinsi Jawa Tengah',
            'slug' => 'juara-2-debat-bahasa-inggris',
            'status' => true,
        ]);

        Prestasi::create([
            'judul' => 'Juara 1 Lomba Robotika Regional Jawa Tengah',
            'deskripsi' => 'Tim robotika SMKN 2 Kudus berhasil meraih juara 1 dalam kompetisi robotika regional Jawa Tengah yang diikuti oleh 25 tim dari berbagai SMK.',
            'gambar' => null,
            'peringkat' => 'Juara 1',
            'tingkat' => 'Regional Jawa Tengah',
            'slug' => 'juara-1-robotika-regional',
            'status' => true,
        ]);
    }
}