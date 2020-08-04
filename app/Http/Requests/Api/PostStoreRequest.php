<?php

namespace App\Http\Requests\Api;


class PostStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title"=>'required',
            "body" => "required",
            "image" => "required"
        ];
    }
}
