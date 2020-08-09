<?php

namespace App\Http\Requests\Api;


class UserRegisterFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required",
            "email"  => "required",
            'password' => "required"
        ];
    }
}
