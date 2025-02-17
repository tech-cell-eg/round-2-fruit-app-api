<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'meal_id'     => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'price'       => $this->price,
            'image_url'   => $this->image_url ? url($this->image_url) : "no have image"
        ];
    }
}
