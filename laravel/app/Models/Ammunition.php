<?php

namespace App\Models;

class Ammunition extends Base\BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'ammunition_no',
    ];

    /**
     * Get the weapon for the ammunition.
     */
    public function weapons()
    {
        return $this->belongsToMany(Weapon::class, 'ammunition_weapon');
    }

    /**
     * Get the animal class for the ammunition.
     */
    public function animalClass()
    {
        return $this->belongsToMany(AnimalClass::class, 'ammunition_animal_class');
    }
}
