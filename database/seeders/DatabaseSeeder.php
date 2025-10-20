<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@smkn2kudus.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Create Editor User
        \App\Models\User::create([
            'name' => 'Editor Website',
            'email' => 'editor@smkn2kudus.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'editor',
        ]);

        // Create sample data
        $this->call([
            PengumumanSeeder::class,
            BeritaSeeder::class,
            PrestasiSeeder::class,
            AlumniSeeder::class,
            EkstrakurikulerSeeder::class,
        ]);
    }
}