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
            'Hirschfelden Hunting Reserve' => ['is_dlc' => 0, 'media_url' => "hirschfelden.png"],
            'Layton Lake District' => ['is_dlc' => 0, 'media_url' => "layton.png"],
            'Medved Taiga National Park' => ['is_dlc' => 1, 'media_url' => "medved.png"],
            'Vurhonga Savanna Reserve' => ['is_dlc' => 1, 'media_url' => "vurhonga.png"],
            'Parque Fernando' => ['is_dlc' => 1, 'media_url' => "parque.png"],
            'Yukon Valley' => ['is_dlc' => 1, 'media_url' => "yukon.png"],
            'Cuatro Colinas Game Reserve' => ['is_dlc' => 1, 'media_url' => "cuatro.png"],
            'Silver Ridge Peaks' => ['is_dlc' => 1, 'media_url' => "silver.png"],
            'Te Awaroa National Park' => ['is_dlc' => 1, 'media_url' => "awaroa.png"],
            'Rancho del Arroyo' => ['is_dlc' => 1, 'media_url' => "rancho.png"],
            'Mississippi Acres Preserve' => ['is_dlc' => 1, 'media_url' => "mississippi.png"],
            'Revontuli Coast' => ['is_dlc' => 1, 'media_url' => "revontuli.png"],
        ];

        foreach ($maps as $map => $data) {
            Map::create([
                'name' => $map,
                'media_url' => $data['media_url'],
                'is_dlc' => $data['is_dlc']
            ]);
        }
    }
}
