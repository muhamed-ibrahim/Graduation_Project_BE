<?php

namespace App\Http\Resources\school\requests;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransferRequestResource extends JsonResource
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
            "name" =>  $this->name,
            "student_national_id" => $this->student_national_id,
            "nationality" => $this->nationality,
            "image" => asset('/storage/requests/TransReqimage/' . $this->image),
            "birthdate" => $this->birthdate,
            "gender" => $this->gender,
            "religion" => $this->religion,
            "state" => $this->state,
            "country" => $this->country,
            "childbirth_certificate" => asset('/storage/requests/TransReqChildcertificate/' . $this->childbirth_certificate),
            "parent_id" => $this->parent_id,
            "old_school" => $this->old_school,
            "new_school" => $this->new_school,

        ];
    }
}
