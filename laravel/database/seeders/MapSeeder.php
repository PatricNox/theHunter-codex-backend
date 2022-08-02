<?php

namespace Database\Seeders;

use App\Models\Map;
use Illuminate\Database\Seeder;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maps = [
            'Hirschfelden Hunting Reserve' => 0,
            'Layton Lake District' => 0,
            'Medved Taiga National Park' => 1,
            'Vurhonga Savanna Reserve' => 1,
            'Parque Fernando' => 1,
            'Yukon Valley' => 1,
            'Cuatro Colinas Game Reserve' => 1,
            'Silver Ridge Peaks' => 1,
            'Te Awaroa National Park' => 1,
            'Rancho del Arroyo' => 1,
            'Mississippi Acres Preserve' => 1,
            'Revontuli Coast' => 1,
        ];

        foreach ($maps as $map => $is_dlc) {
            Map::create(['name' => $map, 'is_dlc' => $is_dlc]);
        }
    }
}
