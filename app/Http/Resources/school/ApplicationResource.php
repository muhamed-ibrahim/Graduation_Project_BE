<?php

namespace App\Http\Resources\School;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name"=> $this->name,
            "email"=> $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'subject' => $this->subject,
            'birthdate' => $this->birthdate,
            'status' => $this->status,
            "cv"=> asset('/storage/applications/' . $this->cv),
            "school_id"=> $this->school_id,
            "created_at"=> $this->created_at,
            "updated_at"=> $this->updated_at,
        ];
    }
}
