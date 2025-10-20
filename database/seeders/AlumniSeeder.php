<?php
namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    public function run(): void
    {
        Alumni::create([
            'nama' => 'Fahri Pratama',
            'foto' => null,
            'jurusan' => 'TJKT',
            'tahun_lulus' => 2020,
            'testimoni' => 'SMKN 2 KUDUS sekolah yang sangat bagus, saya dikasih hadiah mbg, makasih pak wowo. Ilmu yang didapat sangat berguna di dunia kerja.',
            'status' => true,
        ]);

        Alumni::create([
            'nama' => 'Fadlan Setiawan',
            'foto' => null,
            'jurusan' => 'TJKT',
            'tahun_lulus' => 2019,
            'testimoni' => 'Pengalaman belajar di SMKN 2 Kudus sangat membentuk karakter dan keterampilan saya. Terima kasih atas pendidikan yang luar biasa!',
            'status' => true,
        ]);
    }
}