<?php
namespace App\Http\Requests\Api\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

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
        'image' => '',
        'address'=> Rule::exists('address','id')->where(function(Builder $builder) {
          return $builder->where('user_id',$this->user()->id);
        })
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
    
        
    /**
     * messages
     *
     * function can with it make custom message for validation
     * 
     * @return void
     */
    public function messages()
    {
      return [
        'email.required' => 'You Should Enter Email'
      ];
    }
    
    
    /**
     * attributes
     *
     * function can with it custom attributes to show it like we want 
     * 
     * @return void
     */
    public function attributes()
    {
      return [
        'user_name' => 'User Name'
      ]
    }
}