<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=> $this->id,
            "created_at"=> $this->created_at->format('d/m/Y'),
            "updated_at"=> $this->updated_at->format('d/m/Y'),
            "name"=> $this->name,
            "price"=> $this->price,
            "min_age"=> $this->min_age,
            "image"=> $this->image,
            "genre" => $this->genre->name,


        ];
    }
}
