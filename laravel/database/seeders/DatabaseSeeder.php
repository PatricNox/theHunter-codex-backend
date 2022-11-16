<?php

namespace Database\Seeders;

use App\Models\AnimalClass;
use App\Models\Trophy;
use App\Models\WeaponType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->baseDataSeed();
        $this->call(MapSeeder::class);
        $this->call(AnimalSeeder::class);
        $this->call(WeaponAndAmmunitionSeeder::class);
        $this->call(CallersAndScentsSeeder::class);
    }

    private function baseDataSeed()
    {
        // There's 9 classes per initial instructions.
        for ($i = 0; $i < 9; $i++) {
            AnimalClass::create();
        }

        // Obtained from provided data sheet.
        $types = ['rifle', 'handgun', 'shotgun', 'bow'];
        foreach ($types as $type) {
            WeaponType::create(['name' => $type]);
        }

        // Obtained from provided data sheet.
        $trophies = ['weight', 'combined', 'tusks', 'horns', 'skull', 'antlers', 'length'];
        foreach ($trophies as $trophy) {
            Trophy::create(['type' => $trophy]);
        }
    }
}
