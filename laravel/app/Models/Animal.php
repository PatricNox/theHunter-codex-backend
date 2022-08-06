<?php

namespace App\Models;

class Animal extends Base\BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'trophy_id',
        'class_id',
        'max_difficulty',
        'max_weight',
        'is_dlc',
    ];

    /**
     * Get the maps for the animal.
     */
    public function maps()
    {
        return $this->belongsToMany(Map::class, 'animal_map');
    }

    /**
     * Get the trophy for the animal.
     */
    public function trophy()
    {
        return $this->belongsTo(Trophy::class);
    }

    /**
     * Get the ratings for the animal.
     */
    public function ratings()
    {
        return $this->hasOne(AnimalRating::class);
    }

    /**
     * Get the animal class for the animal.
     */
    public function animalClass()
    {
        return $this->belongsTo(AnimalClass::class);
    }

    /**
     * Get the weapons used for the animal.
     */
    public function getWeaponsAttribute()
    {
        $animalClass = $this->animalClass->id;
        return
            Weapon::whereRelation(
                'animalClass',
                function ($query) use ($animalClass) {
                    return $query->where('animal_classes.id', $animalClass);
                }
            )->get();
    }

    /**
     * Get the weapons used for the animal.
     */
    public function getAmmunitionAttribute()
    {
        $ammunition = [];
        foreach ($this->weapons as $weapon) {
            array_push($ammunition, $weapon->ammunition);
        }
    }
}
