<?php

namespace App\Http\Resources\adminstration;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $scoresFormatted = $this->scores->groupBy(function ($score) {
            return $score->termSubject->grade->id;
        })->map(function ($scoresByGrade, $grade_id) {
            return [
                'GradeID' => $grade_id,
                'GradeName' => $scoresByGrade->first()->termSubject->grade->grade_name,
                'terms' => $scoresByGrade->groupBy(function ($score) {
                    return $score->termSubject->term->id;
                })->map(function ($scoresByTerm, $term_id) {
                    return [
                        'TermID' => $term_id,
                        'TermName' => $scoresByTerm->first()->termSubject->term->term_name,
                        'scores' => $scoresByTerm->map(function ($score) {
                            return [
                                'score_id' => $score->id,
                                'score_subject' => $score->termSubject->subject->subject_name,
                                'Score' => $score->score,
                            ];
                        }),
                    ];
                })->values(),
            ];
        })->values();

        $parentDetails = [
            'name' => $this->parent->name,
            'national_id' => $this->parent->national_id,
            'email' => $this->parent->email,
            'job' => $this->parent->job,
            'phone' => $this->parent->phone,
            'nationality' => $this->parent->nationality,
            'gender' => $this->parent->gender,
        ];


        return [
            "id" => $this->id,
            "name" => $this->name,
            "nationality" => $this->nationality,
            "national_id" => $this->national_id,
            "image" => asset('/storage/student_data/st-image/' . $this->image),
            "gender" => $this->gender,
            "religion" => $this->religion,
            "date_of_birth" => $this->date_of_birth,
            "address" => $this->address,
            "state" => $this->state,
            "country" => $this->country,
            "childbirth_certificate" => asset('/storage/student_data/st-certficate/' . $this->childbirth_certificate),
            'stage_name' => $this->stage->stage_name,
            'grade_name' => $this->grade->grade_name,
            'parent' => $parentDetails,
            'Scores' => $scoresFormatted,
        ];
    }
}
