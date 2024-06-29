<?php

namespace App\Http\Resources\parent;

use Carbon\Carbon;
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
            'last_login' => $this->last_login ? Carbon::parse($this->last_login)->format('Y-m-d') : null,
            'last_login_day' => $this->last_login ? Carbon::parse($this->last_login)->format('l') : null,
        ];
    }
}
