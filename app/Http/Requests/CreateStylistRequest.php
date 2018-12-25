<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateStylistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'token'                 => 'required',
            'name'                  => 'required',
            'email'                 => 'required|email|max:255',
            'password'              => 'required|min:8|max:60|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        
    }
}