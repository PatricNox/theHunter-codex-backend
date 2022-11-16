<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Caller;
use Illuminate\Database\Seeder;

class CallersAndScentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->callersAndScentsData() as $data) {
            $caller = $data["caller"];
            $animal = $data["animal"];
            $dlc = $data["dlc"] ? true : false;

            $caller = Caller::create([ 'name' => $caller, 'is_dlc' => $dlc ]);
            logger($animal);
            $animal = Animal::where("name", "LIKE", "%$animal%")->firstOrFail();

            $animal->callers()->attach($caller);
        }
    }

    private function callersAndScentsData()
    {
        return [
            ["caller" => "Antler Rattler", "animal" => "Fallow Deer", "dlc" => ""],
            ["caller" => "Antler Rattler", "animal" => "Reindeer", "dlc" => ""],
            ["caller" => "Antler Rattler", "animal" => "Caribou", "dlc" => ""],
            ["caller" => "Antler Rattler", "animal" => "Lesser Kudu", "dlc" => ""],
            ["caller" => "Antler Rattler", "animal" => "Gemsbok", "dlc" => ""],
            ["caller" => "Antler Rattler", "animal" => "Blackbuck", "dlc" => ""],
            ["caller" => "Axis Deer \"Screamer\" Caller", "animal" => "Axis Deer", "dlc" => "986850/theHunter_Call_of_the_Wild__Parque_Fernando/"],
            ["caller" => "Beacon Deluxe Duck Caller", "animal" => "Mallard", "dlc" => ""],
            ["caller" => "Beacon Deluxe Duck Caller", "animal" => "Cinnamon Teal", "dlc" => ""],
            ["caller" => "Buck \"Snort Wheeze\" Caller", "animal" => "Whitetail Deer", "dlc" => "894600/theHunter_Call_of_the_Wild__Vurhonga_Savanna/"],
            ["caller" => "Buck \"Snort Wheeze\" Caller", "animal" => "Springbok", "dlc" => "894600/theHunter_Call_of_the_Wild__Vurhonga_Savanna/"],
            ["caller" => "Buck \"Snort Wheeze\" Caller", "animal" => "Blue Wildebeest", "dlc" => "894600/theHunter_Call_of_the_Wild__Vurhonga_Savanna/"],
            ["caller" => "Buck \"Snort Wheeze\" Caller", "animal" => "Lesser Kudu", "dlc" => "894600/theHunter_Call_of_the_Wild__Vurhonga_Savanna/"],
            ["caller" => "Buck \"Snort Wheeze\" Caller", "animal" => "Sika Deer", "dlc" => "894600/theHunter_Call_of_the_Wild__Vurhonga_Savanna/"],
            ["caller" => "Dear \"Bleat\" Caller", "animal" => "Whitetail Deer", "dlc" => ""],
            ["caller" => "Dear \"Bleat\" Caller", "animal" => "Blacktail Deer", "dlc" => ""],
            ["caller" => "Dear \"Bleat\" Caller", "animal" => "Mule Deer", "dlc" => ""],
            ["caller" => "Dear \"Bleat\" Caller", "animal" => "Sika Deer", "dlc" => ""],
            ["caller" => "Deer \"Grunt\" Caller", "animal" => "Whitetail Deer", "dlc" => ""],
            ["caller" => "Deer \"Grunt\" Caller", "animal" => "Blacktail Deer", "dlc" => ""],
            ["caller" => "Deer \"Grunt\" Caller", "animal" => "Sika Deer", "dlc" => ""],
            ["caller" => "Elk Caller", "animal" => "Roosevelt Elk", "dlc" => ""],
            ["caller" => "Elk Caller", "animal" => "Rocky Mountain Elk", "dlc" => ""],
            ["caller" => "Moose Caller", "animal" => "Moose", "dlc" => ""],
            ["caller" => "Predator \"Distressed Fawn\" Caller", "animal" => "Black Bear", "dlc" => ""],
            ["caller" => "Predator \"Distressed Fawn\" Caller", "animal" => "Grizzly Bear", "dlc" => ""],
            ["caller" => "Predator \"Distressed Fawn\" Caller", "animal" => "Brown Bear", "dlc" => ""],
            ["caller" => "Predator \"Distressed Fawn\" Caller", "animal" => "Puma", "dlc" => ""],
            ["caller" => "Predator \"Distressed Fawn\" Caller", "animal" => "Mountain Lion", "dlc" => ""],
            ["caller" => "Predator \"Distressed Fawn\" Caller", "animal" => "Lion", "dlc" => ""],
            ["caller" => "Predator \"Distressed Fawn\" Caller", "animal" => "Gray Wolf", "dlc" => ""],
            ["caller" => "Predator \"Distressed Fawn\" Caller", "animal" => "Iberian Wolf", "dlc" => ""],
            ["caller" => "Predator \"Jackrabbit\" Caller", "animal" => "Red Fox", "dlc" => ""],
            ["caller" => "Predator \"Jackrabbit\" Caller", "animal" => "Eurasian Lynx", "dlc" => ""],
            ["caller" => "Predator \"Jackrabbit\" Caller", "animal" => "Coyote", "dlc" => ""],
            ["caller" => "Predator \"Jackrabbit\" Caller", "animal" => "Side-striped Jackal", "dlc" => ""],
            ["caller" => "Predator \"Jackrabbit\" Caller", "animal" => "Gray Wolf", "dlc" => ""],
            ["caller" => "Predator \"Jackrabbit\" Caller", "animal" => "Iberian Wolf", "dlc" => ""],
            ["caller" => "Predator \"Jackrabbit\" Caller", "animal" => "Lion", "dlc" => ""],
            ["caller" => "Raccoon \"Squall\" Caller", "animal" => "Common Raccoon", "dlc" => ""],
            ["caller" => "Red Deer Caller", "animal" => "Red Deer", "dlc" => ""],
            ["caller" => "Red Deer Caller", "animal" => "Sika Deer", "dlc" => ""],
            ["caller" => "Roe Deer Caller", "animal" => "Roe Deer", "dlc" => ""],
            ["caller" => "Short Reed Canada Goose Caller", "animal" => "Canada Goose", "dlc" => ""],
            ["caller" => "Wild Boar Caller", "animal" => "Wild Boar", "dlc" => ""],
            ["caller" => "Wild Boar Caller", "animal" => "Warthog", "dlc" => ""],
            ["caller" => "Wild Boar Caller", "animal" => "Feral Pig", "dlc" => ""],
            ["caller" => "Wild Turkey Crow Caller", "animal" => "Eastern Wild Turkey", "dlc" => "1316840/theHunter_Call_of_the_Wild__Silver_Ridge_Peaks/"],
            ["caller" => "Wild Turkey Crow Caller", "animal" => "Merriam's Turkey", "dlc" => "1316840/theHunter_Call_of_the_Wild__Silver_Ridge_Peaks/"],
            ["caller" => "Wild Turkey Crow Caller", "animal" => "Rio Grande Turkey", "dlc" => "1316840/theHunter_Call_of_the_Wild__Silver_Ridge_Peaks/"],
            ["caller" => "Wild Turkey Mouth Caller", "animal" => "Eastern Wild Turkey", "dlc" => "1316840/theHunter_Call_of_the_Wild__Silver_Ridge_Peaks/"],
            ["caller" => "Wild Turkey Mouth Caller", "animal" => "Merriam's Turkey", "dlc" => "1316840/theHunter_Call_of_the_Wild__Silver_Ridge_Peaks/"],
            ["caller" => "Wild Turkey Mouth Caller", "animal" => "Rio Grande Turkey", "dlc" => "1316840/theHunter_Call_of_the_Wild__Silver_Ridge_Peaks/"],
            ["caller" => "Blacktail Deer Scent", "animal" => "Blacktail Deer", "dlc" => ""],
            ["caller" => "Elk Scent", "animal" => "Roosevelt Elk", "dlc" => ""],
            ["caller" => "Elk Scent", "animal" => "Rocky Mountain Elk", "dlc" => ""],
            ["caller" => "Moose Scent", "animal" => "Moose", "dlc" => ""],
            ["caller" => "Mule Deer Scent", "animal" => "Mule Deer", "dlc" => ""],
            ["caller" => "Musk Deer Scent", "animal" => "Siberian Musk Deer", "dlc" => ""],
            ["caller" => "Red Deer Scent", "animal" => "Red Deer", "dlc" => ""],
            ["caller" => "Red Deer Scent", "animal" => "Sika Deer", "dlc" => ""],
            ["caller" => "Roe Deer Scent", "animal" => "Roe Deer", "dlc" => ""],
            ["caller" => "Whitetail Deer Scent", "animal" => "Whitetail Deer", "dlc" => ""],
            ["caller" => "Wild Boar Scent", "animal" => "Wild Boar", "dlc" => ""],
            ["caller" => "Beacon Deluxe Eurasian Teal Caller", "animal" => "Eurasian Teal", "dlc" => "1931910/theHunter_Call_of_the_Wild__Revontuli_Coast/"],
            ["caller" => "Beacon Deluxe Eurasian Wigeon Caller", "animal" => "Eurasian Wigeon", "dlc" => "1931910/theHunter_Call_of_the_Wild__Revontuli_Coast/"],
            ["caller" => "Beacon Deluxe Eurasian Greylag Caller", "animal" => "Greylag Goose", "dlc" => "1931910/theHunter_Call_of_the_Wild__Revontuli_Coast/"],
            ["caller" => "Hazel Grouse Caller", "animal" => "Hazel Grouse", "dlc" => "1931910/theHunter_Call_of_the_Wild__Revontuli_Coast/"],
            ["caller" => "Beacon Deluxe Bean Goose Caller", "animal" => "Bean Goose", "dlc" => "1931910/theHunter_Call_of_the_Wild__Revontuli_Coast/"],
        ];
    }
}
