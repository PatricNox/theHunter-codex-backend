<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Raid extends JsonResource
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
            'expansion' => $this->expansion->id,
            'mediaUrl' => $this->media_url,
            'bosses' => RaidBoss::collection($this->bosses),
        ];
    }
}
