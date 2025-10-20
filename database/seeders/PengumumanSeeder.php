<?php
namespace Database\Seeders;

use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        Pengumuman::create([
            'judul' => 'ASESMEN SUMATIF TENGAH SEMESTER GANJIL 2025',
            'konten' => '<p>Pelaksanaan asesmen tengah semester akan dimulai tanggal 20 Oktober 2025. Siswa diharapkan mempersiapkan diri sebaik mungkin agar memperoleh hasil yang optimal.</p>',
            'gambar' => null,
            'slug' => 'asesmen-sumatif-tengah-semester-ganjil-2025',
            'status' => true,
            'user_id' => $user->id,
        ]);

        Pengumuman::create([
            'judul' => 'UJIAN KOMPETENSI KEAHLIAN (UKK)',
            'konten' => '<p>Ujian praktik bagi siswa kelas XII akan dimulai pada bulan Maret 2026, sesuai dengan jadwal yang telah ditetapkan oleh masing-masing jurusan. Pastikan seluruh perlengkapan praktik telah siap.</p>',
            'gambar' => null,
            'slug' => 'ujian-kompetensi-keahlian-ukk',
            'status' => true,
            'user_id' => $user->id,
        ]);
    }
}