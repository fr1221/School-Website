<?php
namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Seeder;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        Ekstrakurikuler::create([
            'nama' => 'Pramuka',
            'deskripsi' => 'Membentuk karakter, kedisiplinan, dan jiwa nasionalisme.',
            'gambar' => null,
            'pembina' => 'Budi Santoso, S.Pd.',
            'status' => true,
        ]);

        Ekstrakurikuler::create([
            'nama' => 'Basket',
            'deskripsi' => 'Mengembangkan kemampuan olahraga dan kerjasama tim.',
            'gambar' => null,
            'pembina' => 'Rudi Hermawan, S.Pd.',
            'status' => true,
        ]);

        Ekstrakurikuler::create([
            'nama' => 'Robotik',
            'deskripsi' => 'Mengembangkan logika dan teknologi robotika.',
            'gambar' => null,
            'pembina' => 'Ahmad Fauzi, S.T.',
            'status' => true,
        ]);
    }
}