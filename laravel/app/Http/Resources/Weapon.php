<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Weapon extends JsonResource
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
            'classes' => $this->animalClass->pluck('id')->toArray(),
            'name' => $this->name,
            'weaponNo' => $this->weapon_no,
            'type' => $this->type,
            'ammunition' => Ammunition::collection($this->ammunition),
        ];
    }
}
