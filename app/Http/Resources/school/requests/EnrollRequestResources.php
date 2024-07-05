<?php

namespace App\Http\Resources\school\requests;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EnrollRequestResources extends JsonResource
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
            'type' => $this->type,
            'name' => $this->name,
            'student_national_id' => $this->student_national_id,
            'nationality' => $this->nationality,
            'image' => asset('/storage/requests/EnrollReqimage/' . $this->image),
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'religion' => $this->religion,
            'state' => $this->state,
            'request_status' => optional($this->Schools()->withPivot('status')->find($this->pivot->school_id))->pivot->status,
            'country' => $this->country,
            'childbirth_certificate' => asset('/storage/requests/EnrollReqChildcertificate/' . $this->childbirth_certificate),
            'created_at_date' => $this->created_at->format('Y-m-d'),
            'created_at_time' => $this->created_at->format('H:i:s'),
            'parent_name' => $this->parent()->first()->name,
            'parent_email' => $this->parent()->first()->email,
            'parent_national_id' => $this->parent()->first()->national_id,
            'parent_nationality' => $this->parent()->first()->nationality,
            'parent_religion' => $this->parent()->first()->religion,
            'parent_job' => $this->parent()->first()->job,
            'parent_address' => $this->parent()->first()->address,
            'parent_phone' => $this->parent()->first()->phone,
            'parent_birthdate' => $this->parent()->first()->birthdate,
            'parent_national_id_image' => $this->parent()->first()->national_id_image,

        ];
    }
}
