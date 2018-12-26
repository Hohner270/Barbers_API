<?php

namespace App\Http\Requests\Stylists;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use App\Http\Responders\Stylists\CreateStylistResponder;

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
    public function rules()
    {
        return [
            'token'                 => 'required',
            'name'                  => 'required',
            'email'                 => 'required|max:255|email|unique:users,email',
            'password'              => 'required|min:8|max:60|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $responder = \App::make(CreateStylistResponder::class);
        throw new HttpResponseException($responder(null));
    }
}
