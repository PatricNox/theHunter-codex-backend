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
            'name' => $this->name,
            'weaponNo' => $this->weapon_no,
            'type' => $this->type,
            'class' => $this->animalClass,
            'ammunition' => Ammunition::collection($this->ammunition),
        ];
    }
}
