<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
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
              'name' => 'required|string|max:255',
              'address' => 'required|string|max:255',
              'category_id' =>'required',
              'area_id' => 'required',
              'image' => 'required|mimes:jpeg,bmp,png',
            ];
          }
          case 'PUT':
          case 'PATCH':
          {
              return [
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'category_id' =>'required',
                'area_id' => 'required',
                'image' => isset($this->image) ? 'mimes:jpeg,bmp,png' : '',
              ];
          }
          default:break;
      }
    }
}
