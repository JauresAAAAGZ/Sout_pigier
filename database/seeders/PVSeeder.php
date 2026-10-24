<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PV;
use App\Models\Jurys;

class PVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurys = Jurys::all();

        foreach ($jurys as $index => $jury) {
            $created = PV::create(['Num_PV' => 'PV-' . str_pad($index + 1, 3, '0', STR_PAD_LEFT)]);
            $created->jury_id = $jury->id;
            $created->save();
        }
    }
}
