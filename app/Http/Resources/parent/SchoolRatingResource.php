<?php

namespace App\Http\Resources\parent;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolRatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'school' => $this->school,
            'rating' => $this->rating,
            'parent' => $this->parent,
        ];
    }
}
