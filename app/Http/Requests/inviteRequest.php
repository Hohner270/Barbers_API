<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Domains\Models\Email\EmailAddress;

class inviteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function toDomain()
    {
        // $this->email = new EmailAddress($this->email);
    }
}
