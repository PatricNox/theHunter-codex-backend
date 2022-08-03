<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Ammunition as AmmunitionCollection;
use App\Http\Resources\Animal as AnimalCollection;
use App\Http\Resources\Map as MapCollection;
use App\Http\Resources\Weapon as WeaponCollection;
use App\Models\Ammunition;
use App\Models\AnimalClass;
use App\Models\Map;
use App\Models\Weapon;
use Illuminate\Http\Response;

class GameDataAPI extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of maps.
     *
     * @return \App\Http\Resources\Map
     */
    public function maps()
    {
        return MapCollection::collection(Map::all());
    }

    /**
     * Load data based on given map.
     *
     * @param  \App\Models\Map  $map
     * @return Illuminate\Http\JsonResponse
     */
    public function loadMap(Map $map) //: \Illuminate\Http\JsonResponse
    {
        $mapAnimalClasses = [];
        $map->animals->search(function ($animal) use (&$mapAnimalClasses) {
            array_push($mapAnimalClasses, $animal->animal_class_id);
        });
        $mapAnimalClasses = array_unique($mapAnimalClasses);

        // TODO - this
        $weapons = Weapon::whereRelation('animalClass', function ($query) use ($mapAnimalClasses) {
            return $query->whereIn('animal_classes.id', $mapAnimalClasses);
        })->get();

        $ammunitions = Ammunition::whereRelation('animalClass', function ($query) use ($mapAnimalClasses) {
            return $query->whereIn('animal_classes.id', $mapAnimalClasses);
        })->get();

        return;
        return response()->json([
            'animals' => AnimalCollection::collection($map->animals),
            'weapons' => WeaponCollection::collection($weapons),
            'ammunition' => AmmunitionCollection::collection($ammunitions),
        ], 200);
    }
}
