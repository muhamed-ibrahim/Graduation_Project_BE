<?php

namespace App\Http\Resources\school;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ManagerProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->manager_name,
            'email' => $this->email,
            //'image' => asset('/storage/school_manager/' . $this->image),
            'phone' => $this->manager_phone,
            'address' => $this->manager_address,
            'school_id' => $this->School()->first()->id,
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
