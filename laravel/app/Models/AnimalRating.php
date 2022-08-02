<?php

namespace App\Models;

class AnimalRating extends Base\BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'animal_id',
        'bronze',
        'silver',
        'gold',
        'diamond',
    ];
}
