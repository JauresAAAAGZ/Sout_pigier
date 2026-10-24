<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Memoire;
use App\Models\Professeur;
use App\Models\Jurys;
use App\Models\Soutenance;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filieres = Filiere::all();
        $memoires = Memoire::all();
        $professeurs = Professeur::all();
        $jurys = Jurys::all();
        $soutenances = Soutenance::all();

        $etudiants = [
            ['Matricule' => 'ET-2024-001', 'Nom' => 'Kouassi', 'Prenom' => 'Marie', 'Niveau_Etude' => 'Licence 3', 'Date_Naissance' => '2000-03-14', 'Lieu_Naissance' => 'Abidjan'],
            ['Matricule' => 'ET-2024-002', 'Nom' => 'Traore', 'Prenom' => 'Ibrahim', 'Niveau_Etude' => 'Master 1', 'Date_Naissance' => '1999-07-22', 'Lieu_Naissance' => 'Bamako'],
            ['Matricule' => 'ET-2024-003', 'Nom' => 'Adjei', 'Prenom' => 'Grace', 'Niveau_Etude' => 'Licence 2', 'Date_Naissance' => '2001-01-09', 'Lieu_Naissance' => 'Accra'],
            ['Matricule' => 'ET-2024-004', 'Nom' => 'Sow', 'Prenom' => 'Moussa', 'Niveau_Etude' => 'Master 2', 'Date_Naissance' => '1998-11-30', 'Lieu_Naissance' => 'Dakar'],
        ];

        foreach ($etudiants as $etudiant) {
            $created = Etudiant::create($etudiant);
            $created->filiere_id = $filieres->random()->id;
            $created->memoire_id = $memoires->random()->id;
            $created->professeur_id = $professeurs->random()->id;
            $created->jury_id = $jurys->random()->id;
            $created->soutenance_id = $soutenances->random()->id;
            $created->save();
        }
    }
}
