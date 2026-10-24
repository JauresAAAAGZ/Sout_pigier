<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            FiliereSeeder::class,
            ProfesseurSeeder::class,
            JurysSeeder::class,
            SoutenanceSeeder::class,
            MemoireSeeder::class,
            EtudiantSeeder::class,
            PVSeeder::class,
        ]);
    }
}
