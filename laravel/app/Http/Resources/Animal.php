<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Animal extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'trophy' => $this->trophy->type,
            'ratings' => new AnimalRating($this->ratings),
            'maxDifficulty' => $this->max_difficulty,
            'maxWeight' => $this->max_weight,
            'class' => $this->animalClass->id, // probably need migration fix
            'isDLC' => $this->is_dlc,
        ];
    }
}
