<?php

namespace App\Http\Resources\school;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'name' => $this->name,
            'nationality' => $this->nationality,
            'national_id' => $this->national_id,
            "image" => asset('/storage/student_data/st-image/' . $this->image),
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'grade_id' => $this->grade->id,
            'grade_name' => $this->grade->grade_name,
            'stage_name' => $this->stage->stage_name,
            'stage_id' => $this->stage->id,
            'address' => $this->address,
            'state' => $this->state,
            'country' => $this->country,
            "childbirth_certificate" => asset('/storage/student_data/st-certficate/' . $this->childbirth_certificate),
            'parent_name' => $this->parent()->first()->name,
            'parent_job' => $this->parent()->first()->job,


        ];
    }
}
