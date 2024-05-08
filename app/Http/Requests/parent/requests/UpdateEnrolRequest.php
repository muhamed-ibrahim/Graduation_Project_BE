<?php

namespace App\Http\Requests\parent\requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEnrolRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'student_national_id' => 'required|integer',
            'birthdate' => 'date_format:Y-m-d|before:today',
            'gender' => 'required|in:male,female',
            'religion' => 'required',
            'schools' => 'required',

        ];
    }
}
