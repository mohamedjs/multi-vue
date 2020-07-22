<?php

namespace App\Http\Requests\Api\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VerifyRequest extends FormRequest
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
            'userId'  => [
                    function ($attribute, $value, $fail) {
                        if (! hash_equals((string) $value, (string) auth()->user()->getKey())) {
                            $fail("Not Valid Id");
                         }
                    }
                ],
            'email'  => [
                    function ($attribute, $value, $fail) {
                        if (! hash_equals((string) $value, sha1((string) auth()->user()->getEmailForVerification()))) {
                            $fail("Not Valid Email");
                         }
                    }
                ],
        ];
    }
}
