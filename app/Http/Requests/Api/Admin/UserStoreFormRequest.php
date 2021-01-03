<?php
namespace App\Http\Requests\Api\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\Models\User;
class UserStoreFormRequest extends FormRequest
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
      $rules = [
        'name' => 'required|string|max:255',
        'user_name' => 'required|string|max:255',
        'email' => "required|email|unique:users",
        'phone' => 'unique:users',
        'password' => ['required', 'min:6', 'confirmed'],
        'image' => '',
        'bod' => '',
        'gender' => '',
        'user_type' => '',
        'website' => '',
        'status' => ''
      ];
      
      return $rules;
    }
    
}