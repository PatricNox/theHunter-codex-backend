<?php

namespace App\Models;

class Weapon extends Base\BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'weapon_type_id',
        'name',
        'weapon_no',
        'is_dlc',
    ];

    /**
     * Get the animal class for the ammunition.
     */
    public function type()
    {
        return $this->belongsTo(WeaponType::class);
    }

    /**
     * Get the animal class for the ammunition.
     */
    public function animalClass()
    {
        return $this->belongsToMany(AnimalClass::class, 'weapon_animal_class');
    }

    /**
     * Get the ammunition for the weapon.
     */
    public function ammunition()
    {
        return $this->belongsToMany(Ammunition::class);
    }
}
