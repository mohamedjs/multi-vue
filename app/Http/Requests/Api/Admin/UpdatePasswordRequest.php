<?php

namespace App\Http\Requests\Api\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            "old_password" => [
                "required",
                function ($attribute, $value, $fail) {
                    if (!\Hash::check( $value, auth()->user()->password)) {
                        $fail("Error In Your Old Password ");
                    }
                }
            ],
            'password' => ['required', 'min:6', 'confirmed'],
        ];
    }
}
