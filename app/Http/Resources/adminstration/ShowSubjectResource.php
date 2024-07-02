<?php

namespace App\Http\Resources\adminstration;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowSubjectResource extends JsonResource
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
            'type' => $this->subject()->first()->type,
            'subject' => $this->subject()->first()->subject_name,

        ];
    }
}
