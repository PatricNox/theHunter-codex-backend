<?php

namespace Database\Seeders;

use App\Models\Ammunition;
use App\Models\AnimalClass;
use App\Models\Weapon;
use App\Models\WeaponType;
use Illuminate\Database\Seeder;

class WeaponAndAmmunitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weapons = $this->weaponData();
        foreach ($weapons as $weapon) {
            $model = Weapon::create([
                'id' => $weapon['weapon_no'],
                'name' => $weapon['name'],
                'weapon_type_id' => WeaponType::where('name', $weapon['type'])->first()->id,
                'is_dlc' => $weapon['dlc'],
            ]);

            foreach (explode(',', $weapon['class']) as $class) {
                $model->animalClass()->attach(AnimalClass::find($class));
            }
        }


        $ammunitions = $this->ammunitionData();
        foreach ($ammunitions as $ammunition) {
            $model = Ammunition::create([
                'id' => $ammunition['ammunition_no'],
                'name' => $ammunition['name'],
            ]);

            foreach (explode(',', $ammunition['class']) as $class) {
                $model->animalClass()->attach(AnimalClass::find($class));
            }

            foreach (explode(',', $ammunition['weapon']) as $weapon) {
                $model->weapons()->attach(Weapon::find($weapon));
            }
        }
    }

    private function ammunitionData()
    {
        return array(
            array("name" => ".22LR Jacketed Hollow-Point", "ammunition_no" => "15", "class" => "1", "weapon" => "8,19,37"),
            array("name" => "12 GA Birdshot", "ammunition_no" => "37", "class" => "1", "weapon" => "22,23"),
            array("name" => "16 GA Birdshot", "ammunition_no" => "40", "class" => "1", "weapon" => "24,27"),
            array("name" => "20 GA Birdshot", "ammunition_no" => "43", "class" => "1", "weapon" => "25,26"),
            array("name" => "20 GA Steel Birdshot", "ammunition_no" => "46", "class" => "1", "weapon" => "25,26"),
            array("name" => "10 GA Brass Birdshot", "ammunition_no" => "49", "class" => "1", "weapon" => "28"),
            array("name" => ".410 Birdshot", "ammunition_no" => "63", "class" => "1", "weapon" => "39"),
            array("name" => ".22H Soft-Point", "ammunition_no" => "33", "class" => "1,2", "weapon" => "18"),
            array("name" => ".22H Polymer-Tip", "ammunition_no" => "34", "class" => "1,2", "weapon" => "18"),
            array("name" => "300 gr. Small Game Point", "ammunition_no" => "55", "class" => "1,2", "weapon" => "30,31,32,34,35"),
            array("name" => "350 Grain Broadhead", "ammunition_no" => "52", "class" => "1,2,3", "weapon" => "29,33"),
            array("name" => ".223 Soft-Point", "ammunition_no" => "1", "class" => "2,3,4", "weapon" => "1,20"),
            array("name" => ".223 Polymer-Tip", "ammunition_no" => "2", "class" => "2,3,4", "weapon" => "1,20"),
            array("name" => ".45 Hollow-Point", "ammunition_no" => "21", "class" => "2,3,4", "weapon" => "12"),
            array("name" => ".45 Round Nose", "ammunition_no" => "22", "class" => "2,3,4", "weapon" => "12"),
            array("name" => "16 GA Buckshot", "ammunition_no" => "41", "class" => "2,3,4", "weapon" => "24,27"),
            array("name" => "12 GA Buckshot", "ammunition_no" => "38", "class" => "2,3,4,5", "weapon" => "22,23"),
            array("name" => "20 GA Buckshot", "ammunition_no" => "44", "class" => "2,3,4,5", "weapon" => "25,26"),
            array("name" => ".45 Colt Flat Nose Hard-Cast", "ammunition_no" => "62", "class" => "2,3,4,5", "weapon" => "39"),
            array("name" => ".243 Soft-Point", "ammunition_no" => "3", "class" => "2,3,4,5,6", "weapon" => "2"),
            array("name" => ".243 Polymer-Tip", "ammunition_no" => "4", "class" => "2,3,4,5,6", "weapon" => "2"),
            array("name" => ".30-30 Hollow-Point", "ammunition_no" => "11", "class" => "2,3,4,5,6", "weapon" => "6"),
            array("name" => ".30-30 Soft-Point", "ammunition_no" => "12", "class" => "2,3,4,5,6", "weapon" => "6"),
            array("name" => ".357 Jacketed Hollow-Point", "ammunition_no" => "60", "class" => "2,3,4,5,6", "weapon" => "38"),
            array("name" => ".357 Nose Hard-Cast", "ammunition_no" => "61", "class" => "2,3,4,5,6", "weapon" => "38"),
            array("name" => "420 gr. Broadhead", "ammunition_no" => "56", "class" => "2,3,4,5,6,7", "weapon" => "30,31,32,34,35"),
            array("name" => "7.62x54R Soft-Point", "ammunition_no" => "18", "class" => "3,4,5,6,7", "weapon" => "10"),
            array("name" => ".50 Caliber Round", "ammunition_no" => "28", "class" => "3,4,5,6,7", "weapon" => "15"),
            array("name" => ".44 Flat Nose Hard-Cast", "ammunition_no" => "58", "class" => "3,4,5,7,8", "weapon" => "36"),
            array("name" => ".44 Jacketed Hollow-Point", "ammunition_no" => "59", "class" => "3,4,5,7,8", "weapon" => "36"),
            array("name" => "16 GA Slug", "ammunition_no" => "42", "class" => "4,5,6,7", "weapon" => "24,27"),
            array("name" => "20 GA Slug", "ammunition_no" => "45", "class" => "4,5,6,7", "weapon" => "25,26"),
            array("name" => "10 GA Brass Buckshot", "ammunition_no" => "50", "class" => "4,5,6,7", "weapon" => "28"),
            array("name" => "540 Grain Broadhead", "ammunition_no" => "53", "class" => "4,5,6,7", "weapon" => "29,33"),
            array("name" => ".270 Soft-Point", "ammunition_no" => "5", "class" => "4,5,6,7,8", "weapon" => "3"),
            array("name" => ".260 Polymer-Tip", "ammunition_no" => "6", "class" => "4,5,6,7,8", "weapon" => "3"),
            array("name" => ".30-06 Soft-Point", "ammunition_no" => "23", "class" => "4,5,6,7,8", "weapon" => "13"),
            array("name" => ".30-06 Polymer-Tip", "ammunition_no" => "24", "class" => "4,5,6,7,8", "weapon" => "13"),
            array("name" => "6.5mm Soft-Point", "ammunition_no" => "25", "class" => "4,5,6,7,8", "weapon" => "14"),
            array("name" => "6.5mm Polymer-Tip", "ammunition_no" => "26", "class" => "4,5,6,7,8", "weapon" => "14"),
            array("name" => ".50 Caliber Minié", "ammunition_no" => "27", "class" => "4,5,6,7,8", "weapon" => "15"),
            array("name" => ".30-06 Soft-Point", "ammunition_no" => "29", "class" => "4,5,6,7,8", "weapon" => "16"),
            array("name" => ".30-06 Polymer-Tip", "ammunition_no" => "30", "class" => "4,5,6,7,8", "weapon" => "16"),
            array("name" => ".303 British Soft-Point", "ammunition_no" => "31", "class" => "4,5,6,7,8", "weapon" => "17"),
            array("name" => ".303 British Polymer-Tip", "ammunition_no" => "32", "class" => "4,5,6,7,8", "weapon" => "17"),
            array("name" => ".308 Soft-Point", "ammunition_no" => "35", "class" => "4,5,6,7,8", "weapon" => "21"),
            array("name" => ".308 Polymer-Tip", "ammunition_no" => "36", "class" => "4,5,6,7,8", "weapon" => "21"),
            array("name" => "12 GA Slug", "ammunition_no" => "39", "class" => "4,5,6,7,8", "weapon" => "22,23"),
            array("name" => "7mm Mag. Soft-Point", "ammunition_no" => "7", "class" => "4,5,6,7,8,9", "weapon" => "4"),
            array("name" => "7mm Mag. Polymer-Tip", "ammunition_no" => "8", "class" => "4,5,6,7,8,9", "weapon" => "4"),
            array("name" => ".45-70 Hollow-Point", "ammunition_no" => "13", "class" => "4,5,6,7,8,9", "weapon" => "7"),
            array("name" => ".45-70 Soft-Point", "ammunition_no" => "14", "class" => "4,5,6,7,8,9", "weapon" => "7"),
            array("name" => ".454 Flat Nose Hard-Cast", "ammunition_no" => "64", "class" => "4,5,6,7,8,9", "weapon" => "40,41"),
            array("name" => ".454 Jacketed Hollow-Point", "ammunition_no" => "65", "class" => "4,5,6,7,8,9", "weapon" => "40,41"),
            array("name" => "9.3x74R Soft-Point", "ammunition_no" => "47", "class" => "5,6,7,8,9", "weapon" => "27"),
            array("name" => "9.3x74R Polymer-Tip", "ammunition_no" => "48", "class" => "5,6,7,8,9", "weapon" => "27"),
            array("name" => "10 GA Brass Slug", "ammunition_no" => "51", "class" => "6,7,8,9", "weapon" => "28"),
            array("name" => ".338 Mag. Soft-Point", "ammunition_no" => "9", "class" => "7,8,9", "weapon" => "5"),
            array("name" => ".338 Mag. Polymer-Tip", "ammunition_no" => "10", "class" => "7,8,9", "weapon" => "5"),
            array("name" => ".300 Magnum Soft-Point", "ammunition_no" => "19", "class" => "7,8,9", "weapon" => "11"),
            array("name" => ".300 Magnum Polymer-Tip", "ammunition_no" => "20", "class" => "7,8,9", "weapon" => "11"),
            array("name" => "600 gr. Broadhead", "ammunition_no" => "57", "class" => "7,8,9", "weapon" => "30,31,32,34,35"),
            array("name" => "700 Grain Broadhead", "ammunition_no" => "54", "class" => "8,9", "weapon" => "29,33"),
            array("name" => ".470 Nitro Express Soft Point", "ammunition_no" => "16", "class" => "9", "weapon" => "9"),
            array("name" => ".470 Nitro Express Full Metal Jacket", "ammunition_no" => "17", "class" => "9", "weapon" => "9"),
        );;
    }

    private function weaponData()
    {
        return [
            array("name" => "Virant .22LR Express", "weapon_no" => "8", "type" => "Rifle", "class" => "1", "dlc" => "1"),
            array("name" => "ZARZA-15 .22LR", "weapon_no" => "19", "type" => "Rifle", "class" => "1", "dlc" => "1"),
            array("name" => "Andersson .22LR", "weapon_no" => "37", "type" => "Handgun", "class" => "1", "dlc" => "0"),
            array("name" => "Kullman .22H Wasp", "weapon_no" => "18", "type" => "Rifle", "class" => "1,2", "dlc" => "1"),
            array("name" => "Mangiafico 410/45 Colt", "weapon_no" => "39", "type" => "Handgun", "class" => "1,2,3,4,5", "dlc" => "1"),
            array("name" => "Couso Model 1897 Vaquero", "weapon_no" => "24", "type" => "Shotgun", "class" => "1,2,3,4,5,6,7", "dlc" => "1"),
            array("name" => "Strecker SxS 20G Scarlett", "weapon_no" => "25", "type" => "Shotgun", "class" => "1,2,3,4,5,6,7", "dlc" => "1"),
            array("name" => "Nordin 20SA Serviceman", "weapon_no" => "26", "type" => "Shotgun", "class" => "1,2,3,4,5,6,7", "dlc" => "1"),
            array("name" => "Cacciatore 12G", "weapon_no" => "22", "type" => "Shotgun", "class" => "1,2,3,4,5,6,7,8", "dlc" => "0"),
            array("name" => "Caversham Steward 12G", "weapon_no" => "23", "type" => "Shotgun", "class" => "1,2,3,4,5,6,7,8", "dlc" => "0"),
            array("name" => "Grelck Drilling Rifle Classic", "weapon_no" => "27", "type" => "Shotgun", "class" => "1,2,3,4,5,6,7,8,9", "dlc" => "1"),
            array("name" => "Alexander Longbow", "weapon_no" => "29", "type" => "Bow", "class" => "1,2,3,4,5,6,7,8,9", "dlc" => "1"),
            array("name" => "Bearclaw Lite CB-60", "weapon_no" => "30", "type" => "Bow", "class" => "1,2,3,4,5,6,7,8,9", "dlc" => "1"),
            array("name" => "Crosspoint CB-165", "weapon_no" => "31", "type" => "Bow", "class" => "1,2,3,4,5,6,7,8,9", "dlc" => "1"),
            array("name" => "Hawk Edge CB-70", "weapon_no" => "32", "type" => "Bow", "class" => "1,2,3,4,5,6,7,8,9", "dlc" => "0"),
            array("name" => "Houyi Recurve Bow", "weapon_no" => "33", "type" => "Bow", "class" => "1,2,3,4,5,6,7,8,9", "dlc" => "1"),
            array("name" => "Koter CB-65 Bow", "weapon_no" => "34", "type" => "Bow", "class" => "1,2,3,4,5,6,7,8,9", "dlc" => "1"),
            array("name" => "Razorback Lite CB-60", "weapon_no" => "35", "type" => "Bow", "class" => "1,2,3,4,5,6,7,8,9", "dlc" => "0"),
            array("name" => "Miller Model 1891 Rancher", "weapon_no" => "28", "type" => "Shotgun", "class" => "1,4,5,6,7,8,9", "dlc" => "1"),
            array("name" => ".223 Docent", "weapon_no" => "1", "type" => "Rifle", "class" => "2,3,4", "dlc" => "0"),
            array("name" => "Vasquez Cyclone .45", "weapon_no" => "12", "type" => "Rifle", "class" => "2,3,4", "dlc" => "1"),
            array("name" => "ZARZA-15 .223", "weapon_no" => "20", "type" => "Rifle", "class" => "2,3,4", "dlc" => "1"),
            array("name" => "Ranger .243", "weapon_no" => "2", "type" => "Rifle", "class" => "2,3,4,5,6", "dlc" => "0"),
            array("name" => "Whitlock Model 86", "weapon_no" => "6", "type" => "Rifle", "class" => "2,3,4,5,6", "dlc" => "0"),
            array("name" => "Focoso 357", "weapon_no" => "38", "type" => "Handgun", "class" => "2,3,4,5,6", "dlc" => "0"),
            array("name" => "Solokhin MN1890 Assembly Line", "weapon_no" => "10", "type" => "Rifle", "class" => "3,4,5,6,7", "dlc" => "1"),
            array("name" => "Hudzik .50 Caplock Terra", "weapon_no" => "15", "type" => "Rifle", "class" => "3,4,5,6,7,8", "dlc" => "1"),
            array("name" => ".44 Panther Magnum", "weapon_no" => "36", "type" => "Handgun", "class" => "3,4,5,6,7,8", "dlc" => "0"),
            array("name" => ".270 Huntsman", "weapon_no" => "3", "type" => "Rifle", "class" => "4,5,6,7,8", "dlc" => "0"),
            array("name" => "Eckers .30-06 Prestige", "weapon_no" => "13", "type" => "Rifle", "class" => "4,5,6,7,8", "dlc" => "1"),
            array("name" => "Martensson 6.5mm Thunder", "weapon_no" => "14", "type" => "Rifle", "class" => "4,5,6,7,8", "dlc" => "1"),
            array("name" => "M1 Iwaniec Veteran", "weapon_no" => "16", "type" => "Rifle", "class" => "4,5,6,7,8", "dlc" => "1"),
            array("name" => "F.L. Sporter .303 Burnished", "weapon_no" => "17", "type" => "Rifle", "class" => "4,5,6,7,8", "dlc" => "1"),
            array("name" => "ZARZA-10 .308", "weapon_no" => "21", "type" => "Rifle", "class" => "4,5,6,7,8", "dlc" => "1"),
            array("name" => "7mm Regent Magnum", "weapon_no" => "4", "type" => "Rifle", "class" => "4,5,6,7,8,9", "dlc" => "0"),
            array("name" => "Coachmate Lever .45-70", "weapon_no" => "7", "type" => "Rifle", "class" => "4,5,6,7,8,9", "dlc" => "0"),
            array("name" => "Rhino 454", "weapon_no" => "40", "type" => "Handgun", "class" => "4,5,6,7,8,9", "dlc" => "0"),
            array("name" => "Sundberg 454", "weapon_no" => "41", "type" => "Handgun", "class" => "4,5,6,7,8,9", "dlc" => "0"),
            array("name" => "Rangemaster 338", "weapon_no" => "5", "type" => "Rifle", "class" => "7,8,9", "dlc" => "0"),
            array("name" => ".300 Canning Magnum Frontier", "weapon_no" => "11", "type" => "Rifle", "class" => "7,8,9", "dlc" => "1"),
            array("name" => "King 470DB Zenith", "weapon_no" => "9", "type" => "Rifle", "class" => "9", "dlc" => "1"),
        ];
    }
}
