<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Memoire;
use App\Models\Jurys;

class MemoireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurys = Jurys::all();

        $memoires = [
            ['Theme' => 'Développement d\'une application de gestion de soutenances', 'Nombre_Pages' => 65, 'Date_Depot' => '2024-05-02'],
            ['Theme' => 'Mise en place d\'un réseau local sécurisé', 'Nombre_Pages' => 48, 'Date_Depot' => '2024-05-05'],
            ['Theme' => 'Analyse financière des PME locales', 'Nombre_Pages' => 72, 'Date_Depot' => '2024-05-08'],
            ['Theme' => 'Digitalisation des processus comptables', 'Nombre_Pages' => 55, 'Date_Depot' => '2024-05-10'],
        ];

        foreach ($memoires as $memoire) {
            $created = Memoire::create($memoire);
            $created->jury_id = $jurys->random()->id;
            $created->save();
        }
    }
}
