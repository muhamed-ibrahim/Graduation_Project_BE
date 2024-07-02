<?php

namespace App\Http\Resources\parent;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolEventResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'description' => $this->description,
            'date' => $this->date,
            'time' => $this->time,
            'status' => $this->status,
            'school_name' => $this->school()->first()->name,

        ];
    }
}
