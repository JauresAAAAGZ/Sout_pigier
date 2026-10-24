<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Professeur;

class ProfesseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professeurs = [
            ['Nom_Professeur' => 'Koffi', 'Prenom_Professeur' => 'Jean', 'Grade' => 'Maître de conférences'],
            ['Nom_Professeur' => 'Diallo', 'Prenom_Professeur' => 'Awa', 'Grade' => 'Professeur'],
            ['Nom_Professeur' => 'Mensah', 'Prenom_Professeur' => 'Paul', 'Grade' => 'Docteur'],
            ['Nom_Professeur' => 'Toure', 'Prenom_Professeur' => 'Fatou', 'Grade' => 'Maître assistant'],
            ['Nom_Professeur' => 'Amegan', 'Prenom_Professeur' => 'Kodjo', 'Grade' => 'Professeur'],
        ];

        foreach ($professeurs as $professeur) {
            Professeur::create($professeur);
        }
    }
}
