<?php

namespace App\Http\Requests\adminstration;

use App\Helpers\ApiResponse;
use App\Models\SchoolManager;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ManagerRequest extends FormRequest
{

    protected function failedValidation(Validator $validator)
    {
        if ($this->is('api/*')) {
            $reponse = ApiResponse::sendResponse(422, 'Not Valid', $validator->errors());
            throw new ValidationException($validator, $reponse);
        }
    }
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
            'manager_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(SchoolManager::class)->ignore($this->id)],
            'manager_phone' => ['required', 'min:11', 'numeric'],
            'manager_address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
