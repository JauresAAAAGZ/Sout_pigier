<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurys;
use App\Models\Professeur;

class JurysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurys = [
            ['NumJury' => 'J-001', 'President' => 'Diallo Awa', 'Examinateur' => 'Koffi Jean', 'Rapporteur' => 'Mensah Paul'],
            ['NumJury' => 'J-002', 'President' => 'Amegan Kodjo', 'Examinateur' => 'Toure Fatou', 'Rapporteur' => 'Koffi Jean'],
        ];

        $professeurs = Professeur::all();

        foreach ($jurys as $jury) {
            $created = Jurys::create($jury);
            $created->professeurs()->attach($professeurs->random(min(3, $professeurs->count()))->pluck('id'));
        }
    }
}
