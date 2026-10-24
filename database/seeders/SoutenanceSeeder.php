<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Soutenance;

class SoutenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $soutenances = [
            ['Nom_Soutenance' => 'Soutenance Session 1', 'Date_Soutenance' => '2024-06-10', 'Heure_Soutenance' => '09:00', 'Salle_Soutenance' => 'Salle A'],
            ['Nom_Soutenance' => 'Soutenance Session 2', 'Date_Soutenance' => '2024-06-12', 'Heure_Soutenance' => '14:00', 'Salle_Soutenance' => 'Salle B'],
            ['Nom_Soutenance' => 'Soutenance Session 3', 'Date_Soutenance' => '2024-06-14', 'Heure_Soutenance' => '10:30', 'Salle_Soutenance' => 'Salle C'],
        ];

        foreach ($soutenances as $soutenance) {
            Soutenance::create($soutenance);
        }
    }
}
