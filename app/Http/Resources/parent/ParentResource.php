<?php

namespace App\Http\Resources\parent;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParentResource extends JsonResource
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
            'email' => $this->email,
            'national_id' => $this->national_id,
            'nationality' => $this->nationality,
            'phone' => $this->phone,
            'address' => $this->address,
            'national_id_image' => asset('/storage/parents/' . $this->national_id_image),
            'gender' => $this->gender,
            'religion' => $this->religion,
            'birthdate' => $this->birthdate,
            'last_login' => $this->last_login

        ];
    }
}
