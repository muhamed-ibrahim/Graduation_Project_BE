<?php

namespace App\Http\Resources\school;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'nationality' => $this->nationality,
            'national_id' => $this->national_id,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'level' => $this->level,
            'address' => $this->address,
            'state' => $this->state,
            'country' => $this->country,
            'parent_name' => $this->parent()->first()->name,
            'parent_job' => $this->parent()->first()->job,


        ];
    }
}
