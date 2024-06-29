<?php

namespace App\Http\Requests\parent\auth;

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
            'job' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string|in:male,female',
            'national_id' => 'required|string|unique:users|digits:14',
            'nationality' => 'required|string',
            'national_id_image' => 'required|image',
            'religion' => 'required|string',
            'birthdate' => 'required|date',
            'password' => 'required|string|min:8',
            'lat' => 'required',
            'lng' => 'required',
        ];
    }
}
