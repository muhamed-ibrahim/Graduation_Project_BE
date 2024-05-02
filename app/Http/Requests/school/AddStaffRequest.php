<?php

namespace App\Http\Requests\school;

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class AddStaffRequest extends FormRequest
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
            'staff_name'  => ['required', 'string'],
            'email'  => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'staff_phone'  => ['required', 'min:11', 'numeric'],
            'staff_address'  => ['required', 'string'],
            'birthdate'  => ['required','date_format:Y-m-d','before:today'],
            'staff_role'  => ['required', 'string'],
        ];
    }
}
