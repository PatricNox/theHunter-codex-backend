<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Map as MapCollection;
use App\Http\Resources\Animal;
use App\Models\Map;

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
     * @return Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function loadMap(Map $map): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return Animal::collection($map->animals);
    }
}
