<?php

namespace App\Http\Requests\Api;

use  Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
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


    public function validated()
    {
        if($this->user_id) {
            return array_merge($this->validator->validated(), [
                'user_id' => auth()->id()
            ]);
        }

        return Parent::validated();
    }

}