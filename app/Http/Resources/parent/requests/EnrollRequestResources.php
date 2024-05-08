<?php

namespace App\Http\Resources\parent\requests;

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
            'student_national_id'=> $this->student_national_id,
            'nationality'=> $this->nationality,
            'image'=> asset('/storage/requests/EnrollReqimage/' .$this->image),
            'birthdate'=> $this->birthdate,
            'gender'=> $this->gender,
            'religion'=> $this->religion,
            'state' => $this->state,
            'country' => $this->country,
            'childbirth_certificate'=> $this->childbirth_certificate,
            'childbirth_certificate'=> asset('/storage/requests/EnrollReqChildcertificate/' .$this->childbirth_certificate),
            'created_at' => $this->created_at,
            'schools' => $this->Schools()->withPivot('status')->get()->toArray(),
            'adminstration'=>$this->Schools()->first()->adminstration()->first(),

        ];
    }
}
