<?php

namespace App\Http\Resources\parent;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChildResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'birthdate' => $this->birthdate,
            'image' => $this->image,
            'parent_id' => $this->parent_id,
            'parent' => new ParentResource($this->parent),
            'gender' => $this->gender,
            'childbirth_certificate' => $this->childbirth_certificate,
            'school_id' => $this->school_id,
            'school' => $this->school,
        ];
    }
}
