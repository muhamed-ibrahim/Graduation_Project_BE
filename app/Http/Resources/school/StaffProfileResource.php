<?php

namespace App\Http\Resources\school;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->staff_name,
            'email' => $this->email,
            'phone' => $this->staff_phone,
            'address' => $this->staff_address,
            'school_name' => $this->School()->first()->name,
            'school_image' => asset('/storage/school_logo/' . $this->School()->first()->image),
            'school_address' => $this->School()->first()->address,
            'adminstartion_name' => $this->School()->first()->adminstration()->first()->name,
            'adminstartion_state' => $this->School()->first()->adminstration()->first()->state,
            'adminstartion_phone' => $this->School()->first()->adminstration()->first()->phone,
            'adminstartion_address' => $this->School()->first()->adminstration()->first()->address,
        ];
    }
}
