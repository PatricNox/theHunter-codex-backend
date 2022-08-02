<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Map;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animals = $this->animalData();
        foreach ($animals as $animal) {
            $trophy = $this->getTrophyId($animal['trophy']);
            $model = Animal::create([
                'name' => $animal['name'],
                'trophy_id' => $trophy,
                'animal_class_id' => $animal['class'],
                'max_difficulty' => $animal['maxdifficulty'],
                'max_weight' => $animal['maxweight'],
                'is_dlc' => $animal['dlc'],
            ]);

            $model->ratings()->create([
                'bronze' => $animal['bronze'],
                'silver' => $animal['silver'],
                'gold' => $animal['gold'],
                'diamond' => $animal['diamond'],
            ]);

            foreach (explode(',', $animal['map']) as $mapId) {
                $model->maps()->attach(Map::find($mapId)->first());
            }
        }
    }

    private function getTrophyId($trophy): string
    {
        switch (strtolower($trophy)) {
            case 'weight':
                return 1;
            case 'combined':
                return 2;
            case 'tusks':
                return 3;
            case 'horns':
                return 4;
            case 'skull':
                return 5;
            case 'antlers':
                return 6;
            case 'length':
                return 7;
            default:
                break;
        }
    }

    private function animalData(): array
    {
        return [
            array("name" => "Mallard", "map" => "2,12", "trophy" => "Weight", "bronze" => "< 9.9", "silver" => "9.9", "gold" => "15.4", "diamond" => "19.6", "maxdifficulty" => "3", "maxweight" => "2.1kg", "class" => "1", "dlc" => "1"),
            array("name" => "Harlequin Duck", "map" => "6", "trophy" => "Weight", "bronze" => "< 5.3", "silver" => "5.3", "gold" => "6.4", "diamond" => "7.2", "maxdifficulty" => "3", "maxweight" => "750g", "class" => "1", "dlc" => "1"),
            array("name" => "Cinnamon Teal", "map" => "5", "trophy" => "Weight", "bronze" => "< 3.4", "silver" => "3.4", "gold" => "4.1", "diamond" => "4.6", "maxdifficulty" => "3", "maxweight" => "480g", "class" => "1", "dlc" => "1"),
            array("name" => "Canada Goose", "map" => "1,12", "trophy" => "Weight", "bronze" => "< 4.4", "silver" => "4.4", "gold" => "6.8", "diamond" => "8.5", "maxdifficulty" => "5", "maxweight" => "9.2kg", "class" => "1", "dlc" => "1"),
            array("name" => "Bobwhite Quail", "map" => "11", "trophy" => "Combined", "bronze" => "< 159", "silver" => "159", "gold" => "217", "diamond" => "260.5", "maxdifficulty" => "3", "maxweight" => "250g", "class" => "1", "dlc" => "1"),
            array("name" => "Ring-Necked Pheasant", "map" => "10", "trophy" => "Combined", "bronze" => "< 9.1", "silver" => "9.1", "gold" => "15.5", "diamond" => "20.3", "maxdifficulty" => "3", "maxweight" => "3kg", "class" => "1", "dlc" => "1"),
            array("name" => "Merriam's Turkey", "map" => "8,9", "trophy" => "Combined", "bronze" => "< 3.3", "silver" => "3.3", "gold" => "4", "diamond" => "4.6", "maxdifficulty" => "3", "maxweight" => "11kg", "class" => "1", "dlc" => "1"),
            array("name" => "Rio Grande Turkey", "map" => "10", "trophy" => "Combined", "bronze" => "< 3.3", "silver" => "3.3", "gold" => "4", "diamond" => "4.6", "maxdifficulty" => "3", "maxweight" => "11kg", "class" => "1", "dlc" => "1"),
            array("name" => "Eastern Wild Turkey", "map" => "11", "trophy" => "Combined", "bronze" => "< 2.5", "silver" => "2.5", "gold" => "3.7", "diamond" => "4.6", "maxdifficulty" => "3", "maxweight" => "11kg", "class" => "1", "dlc" => "1"),
            array("name" => "Eastern Cottontail Rabbit", "map" => "11", "trophy" => "Weight", "bronze" => "< 1.0", "silver" => "1.0", "gold" => "1.5", "diamond" => "1.9", "maxdifficulty" => "3", "maxweight" => "2.1kg", "class" => "1", "dlc" => "1"),
            array("name" => "European Rabbit", "map" => "1,9", "trophy" => "Weight", "bronze" => "< 1.2", "silver" => "1.2", "gold" => "1.9", "diamond" => "2.4", "maxdifficulty" => "3", "maxweight" => "2.6kg", "class" => "1", "dlc" => "0"),
            array("name" => "European Hare", "map" => "7", "trophy" => "Weight", "bronze" => "< 3.5", "silver" => "3.5", "gold" => "5", "diamond" => "6.5", "maxdifficulty" => "3", "maxweight" => "7kg", "class" => "1", "dlc" => "1"),
            array("name" => "White-tailed Jackrabbit", "map" => "2", "trophy" => "Weight", "bronze" => "< 2.8", "silver" => "2.8", "gold" => "4.8", "diamond" => "6.3", "maxdifficulty" => "3", "maxweight" => "6.8kg", "class" => "1", "dlc" => "1"),
            array("name" => "Scrub Hare", "map" => "4", "trophy" => "Weight", "bronze" => "< 2.3", "silver" => "2.3", "gold" => "4", "diamond" => "5.3", "maxdifficulty" => "3", "maxweight" => "5.8kg", "class" => "1", "dlc" => "1"),
            array("name" => "Antelope Jackrabbit", "map" => "10", "trophy" => "Weight", "bronze" => "< 2.8", "silver" => "2.8", "gold" => "4.8", "diamond" => "6.3", "maxdifficulty" => "3", "maxweight" => "4.7kg", "class" => "1", "dlc" => "1"),
            array("name" => "Siberian Musk Deer", "map" => "3", "trophy" => "Tusks", "bronze" => "< 60", "silver" => "60", "gold" => "168", "diamond" => "249", "maxdifficulty" => "3", "maxweight" => "17kg", "class" => "2", "dlc" => "1"),
            array("name" => "Red Fox", "map" => "1,6", "trophy" => "Weight", "bronze" => "< 4.6", "silver" => "4.6", "gold" => "10", "diamond" => "14", "maxdifficulty" => "9", "maxweight" => "15.4kg", "class" => "2", "dlc" => "0"),
            array("name" => "Gray Fox", "map" => "11", "trophy" => "Weight", "bronze" => "< 3.8", "silver" => "3.8", "gold" => "5.3", "diamond" => "6.4", "maxdifficulty" => "9", "maxweight" => "6.8kg", "class" => "2", "dlc" => "1"),
            array("name" => "Coyote", "map" => "2,10", "trophy" => "Weight", "bronze" => "< 38.3", "silver" => "38.3", "gold" => "48.9", "diamond" => "56.8", "maxdifficulty" => "9", "maxweight" => "27kg", "class" => "2", "dlc" => "0"),
            array("name" => "Side-striped Jackal", "map" => "4", "trophy" => "Weight", "bronze" => "< 16.7", "silver" => "16.7", "gold" => "23.8", "diamond" => "29.1", "maxdifficulty" => "9", "maxweight" => "14kg", "class" => "2", "dlc" => "1"),
            array("name" => "Common Raccoon", "map" => "11", "trophy" => "Weight", "bronze" => "< 5", "silver" => "5", "gold" => "9", "diamond" => "12", "maxdifficulty" => "5", "maxweight" => "13kg", "class" => "2", "dlc" => "1"),
            array("name" => "Roe Deer", "map" => "1,7", "trophy" => "Antlers", "bronze" => "< 41", "silver" => "41", "gold" => "64.3", "diamond" => "81.8", "maxdifficulty" => "3", "maxweight" => "35kg", "class" => "3", "dlc" => "0"),
            array("name" => "Axis Deer", "map" => "5", "trophy" => "Antlers", "bronze" => "< 72.8", "silver" => "72.8", "gold" => "155.3", "diamond" => "217.2", "maxdifficulty" => "5", "maxweight" => "75kg", "class" => "3", "dlc" => "1"),
            array("name" => "Springbok", "map" => "4", "trophy" => "Horns", "bronze" => "< 69.4", "silver" => "69.4", "gold" => "93", "diamond" => "110.6", "maxdifficulty" => "5", "maxweight" => "42kg", "class" => "3", "dlc" => "1"),
            array("name" => "Blackbuck", "map" => "5", "trophy" => "Horns", "bronze" => "< 71.8", "silver" => "71.8", "gold" => "106.3", "diamond" => "132.2", "maxdifficulty" => "5", "maxweight" => "51kg", "class" => "3", "dlc" => "1"),
            array("name" => "Chamois", "map" => "9", "trophy" => "Horns", "bronze" => "< 30.8", "silver" => "30.8", "gold" => "46.3", "diamond" => "58", "maxdifficulty" => "5", "maxweight" => "65kg", "class" => "3", "dlc" => "1"),
            array("name" => "Feral Goat", "map" => "9", "trophy" => "Horns", "bronze" => "< 89.4", "silver" => "89.4", "gold" => "157.6", "diamond" => "208.7", "maxdifficulty" => "5", "maxweight" => "50kg", "class" => "3", "dlc" => "1"),
            array("name" => "Eurasian Lynx", "map" => "3,12", "trophy" => "Skull", "bronze" => "< 18.5", "silver" => "18.5", "gold" => "23.8", "diamond" => "27.6", "maxdifficulty" => "9", "maxweight" => "45kg", "class" => "3", "dlc" => "1"),
            array("name" => "Mexican Bobcat", "map" => "10", "trophy" => "Skull", "bronze" => "< 18.5", "silver" => "18.5", "gold" => "23.7", "diamond" => "27.6", "maxdifficulty" => "9", "maxweight" => "45kg", "class" => "3", "dlc" => "1"),
            array("name" => "Fallow Deer", "map" => "1,9", "trophy" => "Antlers", "bronze" => "< 67.9", "silver" => "67.9", "gold" => "172.9", "diamond" => "251.7", "maxdifficulty" => "5", "maxweight" => "100kg", "class" => "4", "dlc" => "0"),
            array("name" => "Blacktail Deer", "map" => "2", "trophy" => "Antlers", "bronze" => "< 76.9", "silver" => "76.9", "gold" => "134.4", "diamond" => "177.5", "maxdifficulty" => "5", "maxweight" => "95kg", "class" => "4", "dlc" => "0"),
            array("name" => "Whitetail Deer", "map" => "2,10,11,12", "trophy" => "Antlers", "bronze" => "< 112", "silver" => "112", "gold" => "193.7", "diamond" => "255", "maxdifficulty" => "3, 10", "maxweight" => "110kg", "class" => "4", "dlc" => "0"),
            array("name" => "Sika Deer", "map" => "9", "trophy" => "Antlers", "bronze" => "< 53.2", "silver" => "53.2", "gold" => "136.4", "diamond" => "198.7", "maxdifficulty" => "5", "maxweight" => "75", "class" => "4", "dlc" => "1"),
            array("name" => "Pronghorn", "map" => "8", "trophy" => "Horns", "bronze" => "< 46", "silver" => "46", "gold" => "75.7", "diamond" => "98", "maxdifficulty" => "5", "maxweight" => "65kg", "class" => "4", "dlc" => "1"),
            array("name" => "Lesser Kudu", "map" => "4", "trophy" => "Horns", "bronze" => "< 107.8", "silver" => "107.8", "gold" => "132.8", "diamond" => "151.6", "maxdifficulty" => "5", "maxweight" => "105kg", "class" => "4", "dlc" => "1"),
            array("name" => "Southeastern Spanish Ibex", "map" => "7", "trophy" => "Horns", "bronze" => "< 49.7", "silver" => "49.7", "gold" => "72.5", "diamond" => "89.6", "maxdifficulty" => "5", "maxweight" => "87.5kg", "class" => "4", "dlc" => "1"),
            array("name" => "Gredos Ibex", "map" => "7", "trophy" => "Horns", "bronze" => "< 54.3", "silver" => "54.3", "gold" => "80.5", "diamond" => "100.1", "maxdifficulty" => "5", "maxweight" => "102kg", "class" => "4", "dlc" => "1"),
            array("name" => "Ronda Ibex", "map" => "7", "trophy" => "Horns", "bronze" => "< 69.2", "silver" => "69.2", "gold" => "91.4", "diamond" => "107.9", "maxdifficulty" => "5", "maxweight" => "70kg", "class" => "4", "dlc" => "1"),
            array("name" => "Beceite Ibex", "map" => "7", "trophy" => "Horns", "bronze" => "< 78", "silver" => "78", "gold" => "142.9", "diamond" => "191.6", "maxdifficulty" => "5", "maxweight" => "110kg", "class" => "4", "dlc" => "1"),
            array("name" => "Mountain Goat", "map" => "8", "trophy" => "Horns", "bronze" => "< 52.7", "silver" => "52.7", "gold" => "84.10", "diamond" => "107.60", "maxdifficulty" => "5", "maxweight" => "145kg", "class" => "4", "dlc" => "1"),
            array("name" => "Iberian Mouflon", "map" => "7", "trophy" => "Horns", "bronze" => "< 97", "silver" => "97", "gold" => "144.2", "diamond" => "179.6", "maxdifficulty" => "5", "maxweight" => "60kg", "class" => "4", "dlc" => "1"),
            array("name" => "Bighorn Sheep", "map" => "8,10", "trophy" => "Horns", "bronze" => "< 90.3", "silver" => "90.3", "gold" => "132.7", "diamond" => "164.6", "maxdifficulty" => "5", "maxweight" => "160kg", "class" => "4", "dlc" => "1"),
            array("name" => "Collared Peccary", "map" => "10", "trophy" => "Tusks", "bronze" => "< 37.5", "silver" => "37.5", "gold" => "98.5", "diamond" => "144.2", "maxdifficulty" => "5", "maxweight" => "31kg", "class" => "4", "dlc" => "1"),
            array("name" => "Wild Boar", "map" => "1,3,7", "trophy" => "Tusks", "bronze" => "< 37.5", "silver" => "37.5", "gold" => "98.5", "diamond" => "144.2", "maxdifficulty" => "5", "maxweight" => "240kg", "class" => "4", "dlc" => "0"),
            array("name" => "Feral Pig", "map" => "9", "trophy" => "Tusks", "bronze" => "< 37.5", "silver" => "37.5", "gold" => "98.5", "diamond" => "144.2", "maxdifficulty" => "5", "maxweight" => "205kg", "class" => "4", "dlc" => "1"),
            array("name" => "Warthog", "map" => "4", "trophy" => "Tusks", "bronze" => "< 24.6", "silver" => "24.6", "gold" => "43.8", "diamond" => "58.1", "maxdifficulty" => "5", "maxweight" => "150kg", "class" => "4", "dlc" => "1"),
            array("name" => "Wild Hog", "map" => "11", "trophy" => "Tusks", "bronze" => "< 37.5", "silver" => "37.5", "gold" => "98.5", "diamond" => "144.2", "maxdifficulty" => "5", "maxweight" => "205kg", "class" => "4", "dlc" => "1"),
            array("name" => "Puma", "map" => "5", "trophy" => "Skull", "bronze" => "< 32", "silver" => "32", "gold" => "36", "diamond" => "39", "maxdifficulty" => "9", "maxweight" => "105kg", "class" => "5", "dlc" => "1"),
            array("name" => "Mountain Lion", "map" => "8", "trophy" => "Skull", "bronze" => "< 32", "silver" => "32", "gold" => "36", "diamond" => "39", "maxdifficulty" => "9", "maxweight" => "105kg", "class" => "5", "dlc" => "1"),
            array("name" => "Gray Wolf", "map" => "6", "trophy" => "Skull", "bronze" => "< 32", "silver" => "32", "gold" => "36", "diamond" => "39", "maxdifficulty" => "9", "maxweight" => "80kg", "class" => "5", "dlc" => "1"),
            array("name" => "Iberian Wolf", "map" => "7", "trophy" => "Skull", "bronze" => "< 32", "silver" => "32", "gold" => "36", "diamond" => "39", "maxdifficulty" => "9", "maxweight" => "50kg", "class" => "5", "dlc" => "1"),
            array("name" => "Red Deer", "map" => "1,5,7,9", "trophy" => "Antlers", "bronze" => "< 90.5", "silver" => "90.5", "gold" => "182.2", "diamond" => "251", "maxdifficulty" => "9, 10", "maxweight" => "240kg, 260kg", "class" => "6", "dlc" => "0"),
            array("name" => "Mule Deer", "map" => "5,8,10", "trophy" => "Antlers", "bronze" => "< 98.3", "silver" => "98.3", "gold" => "220.5", "diamond" => "312.1", "maxdifficulty" => "5", "maxweight" => "210kg", "class" => "6", "dlc" => "1"),
            array("name" => "Reindeer", "map" => "3", "trophy" => "Antlers", "bronze" => "< 152.5", "silver" => "152.5", "gold" => "311.2", "diamond" => "430.2", "maxdifficulty" => "5", "maxweight" => "182kg", "class" => "6", "dlc" => "1"),
            array("name" => "Caribou", "map" => "6", "trophy" => "Antlers", "bronze" => "< 152.5", "silver" => "152.5", "gold" => "311.2", "diamond" => "430.2", "maxdifficulty" => "5", "maxweight" => "190kg", "class" => "6", "dlc" => "1"),
            array("name" => "Blue Wildebeest", "map" => "4", "trophy" => "Horns", "bronze" => "< 21.6", "silver" => "21.6", "gold" => "30.8", "diamond" => "37.6", "maxdifficulty" => "5", "maxweight" => "290kg", "class" => "6", "dlc" => "1"),
            array("name" => "American Aligator", "map" => "11", "trophy" => "Length", "bronze" => "< 226", "silver" => "226", "gold" => "378", "diamond" => "492", "maxdifficulty" => "9", "maxweight" => "530kg", "class" => "6", "dlc" => "1"),
            array("name" => "Black Bear", "map" => "2,8,11", "trophy" => "Skull", "bronze" => "< 14.4", "silver" => "14.4", "gold" => "19.2", "diamond" => "22.8", "maxdifficulty" => "9, 10", "maxweight" => "290kg, 409kg", "class" => "7", "dlc" => "0"),
            array("name" => "Eurasian Brown Bear", "map" => "3,12", "trophy" => "Skull", "bronze" => "< 18.6", "silver" => "18.6", "gold" => "23.7", "diamond" => "27.7", "maxdifficulty" => "9", "maxweight" => "482kg", "class" => "7", "dlc" => "1"),
            array("name" => "Grizzly Bear", "map" => "6", "trophy" => "Skull", "bronze" => "< 52.6", "silver" => "52.6", "gold" => "60.8", "diamond" => "66.9", "maxdifficulty" => "9", "maxweight" => "680kg", "class" => "7", "dlc" => "1"),
            array("name" => "Roosevelt Elk", "map" => "2", "trophy" => "Antlers", "bronze" => "< 128.7", "silver" => "128.7", "gold" => "272.7", "diamond" => "380.8", "maxdifficulty" => "5", "maxweight" => "500kg", "class" => "8", "dlc" => "0"),
            array("name" => "Rocky Mountain Elk", "map" => "8", "trophy" => "Antlers", "bronze" => "< 177.8", "silver" => "177.8", "gold" => "351.3", "diamond" => "481.4", "maxdifficulty" => "5", "maxweight" => "480kg", "class" => "8", "dlc" => "1"),
            array("name" => "Moose", "map" => "2,3,6,12", "trophy" => "Antlers", "bronze" => "< 86.2", "silver" => "86.2", "gold" => "194", "diamond" => "274.9", "maxdifficulty" => "5", "maxweight" => "620kg", "class" => "8", "dlc" => "0"),
            array("name" => "Gemsbok", "map" => "4", "trophy" => "Horns", "bronze" => "< 194.8", "silver" => "194.8", "gold" => "276.3", "diamond" => "337.5", "maxdifficulty" => "5", "maxweight" => "240kg", "class" => "8", "dlc" => "1"),
            array("name" => "European Bison", "map" => "1", "trophy" => "Horns", "bronze" => "< 63.2", "silver" => "63.2", "gold" => "181.6", "diamond" => "270.4", "maxdifficulty" => "5", "maxweight" => "920kg", "class" => "9", "dlc" => "0"),
            array("name" => "Plains Bison", "map" => "6,8", "trophy" => "Horns", "bronze" => "< 50.7", "silver" => "50.7", "gold" => "148.1", "diamond" => "221.1", "maxdifficulty" => "5", "maxweight" => "1200kg", "class" => "9", "dlc" => "1"),
            array("name" => "Cape Buffalo", "map" => "4", "trophy" => "Horns", "bronze" => "< 73.3", "silver" => "73.3", "gold" => "117.9", "diamond" => "151.3", "maxdifficulty" => "9", "maxweight" => "950kg", "class" => "9", "dlc" => "1"),
            array("name" => "Water Buffalo", "map" => "5", "trophy" => "Horns", "bronze" => "< 84.2", "silver" => "84.2", "gold" => "138.1", "diamond" => "167.5", "maxdifficulty" => "9", "maxweight" => "1250kg", "class" => "9", "dlc" => "1"),
            array("name" => "Lion", "map" => "4", "trophy" => "Skull", "bronze" => "< 38", "silver" => "38", "gold" => "44", "diamond" => "48.5", "maxdifficulty" => "9", "maxweight" => "270kg", "class" => "9", "dlc" => "1"),
            array("name" => "Goldeneye", "map" => "12", "trophy" => "Weight", "bronze" => "< 500", "silver" => "500", "gold" => "900", "diamond" => "1200", "maxdifficulty" => "3", "maxweight" => "1.3kg", "class" => "1", "dlc" => "1"),
            array("name" => "Tufted Duck", "map" => "12", "trophy" => "Weight", "bronze" => "< 704", "silver" => "704", "gold" => "852", "diamond" => "963", "maxdifficulty" => "3", "maxweight" => "1kg", "class" => "1", "dlc" => "1"),
            array("name" => "Eurasian Teal", "map" => "12", "trophy" => "Weight", "bronze" => "< 312", "silver" => "312", "gold" => "336", "diamond" => "354", "maxdifficulty" => "3", "maxweight" => "360g", "class" => "1", "dlc" => "1"),
            array("name" => "Eurasian Wigeon", "map" => "12", "trophy" => "Weight", "bronze" => "< 590", "silver" => "590", "gold" => "770", "diamond" => "905", "maxdifficulty" => "3", "maxweight" => "950g", "class" => "1", "dlc" => "1"),
            array("name" => "Tundra Bean Goose", "map" => "12", "trophy" => "Weight", "bronze" => "< 2.18", "silver" => "2.18", "gold" => "2.74", "diamond" => "3.16", "maxdifficulty" => "5", "maxweight" => "3.5kg", "class" => "1", "dlc" => "1"),
            array("name" => "Greylag Goose", "map" => "12", "trophy" => "Weight", "bronze" => "< 2.8", "silver" => "2.8", "gold" => "3.4", "diamond" => "3.85", "maxdifficulty" => "5", "maxweight" => "4kg", "class" => "1", "dlc" => "1"),
            array("name" => "Black Grouse", "map" => "12", "trophy" => "Weight", "bronze" => "< 85", "silver" => "85", "gold" => "105", "diamond" => "120", "maxdifficulty" => "3", "maxweight" => "1.25kg", "class" => "1", "dlc" => "1"),
            array("name" => "Hazel Grouse", "map" => "12", "trophy" => "Weight", "bronze" => "< 330", "silver" => "330", "gold" => "390", "diamond" => "435", "maxdifficulty" => "3", "maxweight" => "450g", "class" => "1", "dlc" => "1"),
            array("name" => "Western Capercaillie", "map" => "12", "trophy" => "Weight", "bronze" => "< 2.2", "silver" => "2.2", "gold" => "3.6", "diamond" => "4.64", "maxdifficulty" => "3", "maxweight" => "5kg", "class" => "1", "dlc" => "1"),
            array("name" => "Rock Ptarmigan", "map" => "12", "trophy" => "Weight", "bronze" => "< 492", "silver" => "492", "gold" => "616", "diamond" => "709", "maxdifficulty" => "3", "maxweight" => "750g", "class" => "1", "dlc" => "1"),
            array("name" => "Willot Ptarmigan", "map" => "12", "trophy" => "Weight", "bronze" => "< 506", "silver" => "506", "gold" => "658", "diamond" => "772", "maxdifficulty" => "3", "maxweight" => "810g", "class" => "1", "dlc" => "1"),
            array("name" => "Mountain Hare", "map" => "12", "trophy" => "Weight", "bronze" => "< 2.8", "silver" => "2.8", "gold" => "4.4", "diamond" => "5.6", "maxdifficulty" => "3", "maxweight" => "6kg", "class" => "1", "dlc" => "1"),
            array("name" => "Racoon Dog", "map" => "12", "trophy" => "Weight", "bronze" => "< 4.4", "silver" => "4.4", "gold" => "7.2", "diamond" => "9.29", "maxdifficulty" => "9", "maxweight" => "10kg", "class" => "2", "dlc" => "1"),
        ];
    }
}
