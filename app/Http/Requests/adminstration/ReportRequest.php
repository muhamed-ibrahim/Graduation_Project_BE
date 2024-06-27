<?php

namespace App\Http\Requests\adminstration;

use App\Helpers\ApiResponse;
use App\Rules\DateBetweenRule;
use App\Rules\timeBetweenRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;


class ReportRequest extends FormRequest
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
            'subject' => ['required', 'string'],
            'description' => ['required'],
            'schools' => ['required'],

        ];
    }
}
