<?php

namespace App\Models;

class Map extends Base\BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'map_id',
        'animal_id',
    ];

    /**
     * Get the animals for the map.
     */
    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'animal_map');
    }
}
