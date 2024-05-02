<?php

namespace App\Http\Requests\school;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffProfileRequest extends FormRequest
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
            'staff_name' => ['required', 'string'],
            'staff_phone' => ['required', 'min:11', 'numeric'],
            'staff_address' => ['required', 'string'],
        ];
    }
}
