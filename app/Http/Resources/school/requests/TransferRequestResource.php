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
            'parent_name'=> $this->parent()->first()->name,
            'parent_email'=> $this->parent()->first()->email,
            'parent_national_id' => $this->parent()->first()->national_id,
            'parent_nationality' => $this->parent()->first()->nationality,
            'parent_religion'=> $this->parent()->first()->religion,
            'parent_job'=> $this->parent()->first()->job,
            'parent_address'=> $this->parent()->first()->address,
            'parent_phone'=> $this->parent()->first()->phone,
            'parent_birthdate'=> $this->parent()->first()->birthdate,
            'parent_national_id_image'=> $this->parent()->first()->national_id_image,
            "old_school" => $this->old_school,
            "new_school" => $this->new_school,
            "status" => $this->status,

        ];
    }
}
