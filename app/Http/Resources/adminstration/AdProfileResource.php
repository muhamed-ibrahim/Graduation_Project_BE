<?php

namespace App\Http\Resources\adminstration;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdProfileResource extends JsonResource
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
            'image' => asset('/storage/adminstration_admins/' . $this->image),
            'phone' => $this->phone,
            'address' => $this->address,
            'adminstration_name' => $this->adminstration()->first()->name,
            'adminstration_address' => $this->adminstration()->first()->address,
            'adminstration_State' => $this->adminstration()->first()->state,
            'adminstration_Phone' => $this->adminstration()->first()->phone,

        ];
    }
}
