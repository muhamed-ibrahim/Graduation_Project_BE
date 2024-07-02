<?php

namespace App\Http\Requests\parent\requests;

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class EnrolRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected function failedValidation(Validator $validator)
    {
        if ($this->is('api/*')) {
            $reponse = ApiResponse::sendResponse(422, 'Not Valid', $validator->errors());
            throw new ValidationException($validator, $reponse);
        }
    }
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
            'nationality' => 'required|string',
            'student_national_id' => 'required|integer',
            'image' => 'required|image',
            'birthdate' => 'date_format:Y-m-d|before:today',
            'gender' => 'required|in:male,female',
            'religion' => 'required|string',
            'childbirth_certificate' => 'required|image',
            'schools' => 'required',

        ];
    }
}
