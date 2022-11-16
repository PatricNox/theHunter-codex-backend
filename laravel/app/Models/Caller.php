<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caller extends Base\BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'is_dlc',
    ];

    /**
     * Get the animals for the caller.
     */
    public function animals()
    {
        return $this->belongsToMany(Animal::class);
    }
}
