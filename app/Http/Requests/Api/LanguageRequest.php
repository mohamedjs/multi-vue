<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\Models\Language;
class LanguageRequest extends FormRequest
{
    /**
     * Determine if the language is authorized to make this request.
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
              'title' => 'required|max:255',
              'short_code' => 'required|max:255',
            ];
          }
          case 'PUT':
          case 'PATCH':
          {
              return [
                'title' => 'required|max:255|unique:languages,title,'.$this->language->id,
                'short_code' => 'required|max:255|unique:languages,short_code,'.$this->language->id,
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
