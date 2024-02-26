<?php

namespace App\Http\Requests\adminstration;

use App\Models\AdAdmin;
use App\Helpers\ApiResponse;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;


class UpdateProfile extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(AdAdmin::class)->ignore($this->user()->id)],
            'phone' => ['required','min:11','numeric'],
        ];
    }
}
