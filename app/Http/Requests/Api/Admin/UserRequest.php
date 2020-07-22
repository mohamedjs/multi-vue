<?php
namespace App\Http\Requests\Api\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\Models\User;
class UserRequest extends FormRequest
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
        'image' => ''
      ] ;

      if ($this->isMethod('post')) {
        $rules['email'] = "required|email|unique:users";
        $rules['phone'] = 'unique:users';
      }
      if ($this->isMethod('patch')) {
        $rules['email'] = 'required|string|email|max:255|unique:users,email,'.$this->user->id;
        $rules['phone'] = 'unique:users,phone,'.$this->user->id;
      }

      return $rules;
    }
    
}