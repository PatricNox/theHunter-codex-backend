<?php

namespace App\Models;

class AnimalClass extends Base\BaseModel
{
    /**
     * Get the weapons that uses the class.
     */
    public function weapons()
    {
        return $this->belongsToMany(AnimalClass::class, 'weapon_animal_class');
    }

    /**
     * Get the ammunitions that uses the class.
     */
    public function ammunitions()
    {
        return $this->belongsToMany(AnimalClass::class, 'ammunition_animal_class');
    }
}
