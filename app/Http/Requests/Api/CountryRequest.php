<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\Country;
class CountryRequest extends FormRequest
{
    /**
     * Determine if the country is authorized to make this request.
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
              'name' => 'required|string|max:255|unique:countries',
              'code' => 'required|string|max:255|unique:countries',
              'phonecode' => 'required|string|max:255|unique:countries'
            ];
          }
          case 'PUT':
          case 'PATCH':
          {
              return [
                'name' => 'required|string|max:255|unique:countries,name,'.$this->country->id,
                'code' => 'required|string|max:255|unique:countries,code,'.$this->country->id,
                'phonecode' => 'required|string|max:255|unique:countries,phonecode,'.$this->country->id,
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
