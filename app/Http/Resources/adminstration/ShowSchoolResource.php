<?php

namespace App\Http\Resources\adminstration;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowSchoolResource extends JsonResource
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
            'phone' => $this->phone,
            'image' => asset('/storage/school_logo/' . $this->image),
            'phone' => $this->phone,
            'address' => $this->address,
        ];
    }
}
