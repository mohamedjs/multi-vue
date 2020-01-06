<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\State;
class StateRequest extends FormRequest
{
    /**
     * Determine if the state is authorized to make this request.
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
      switch($this->method())
      {
          case 'GET':
          case 'DELETE':
          {
              return [];
          }
          case 'POST':
          {
            return [
              'name' => 'required|string|max:255|unique:states',
              'country_id' => 'required',
            ];
          }
          case 'PUT':
          case 'PATCH':
          {
              return [
                'name' => 'required|string|max:255|unique:states,name,'.$this->state->id,
                'country_id' => 'required',
              ];
          }
          default:break;
      }
    }

    protected function formatValidationErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
