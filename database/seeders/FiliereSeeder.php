<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Filiere;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filieres = [
            ['Intitule_Filiere' => 'Génie Logiciel', 'Niveau_Filiere' => 'Licence 3'],
            ['Intitule_Filiere' => 'Réseaux et Télécoms', 'Niveau_Filiere' => 'Master 1'],
            ['Intitule_Filiere' => 'Gestion des Entreprises', 'Niveau_Filiere' => 'Licence 2'],
            ['Intitule_Filiere' => 'Finance Comptabilité', 'Niveau_Filiere' => 'Master 2'],
        ];

        foreach ($filieres as $filiere) {
            Filiere::create($filiere);
        }
    }
}
