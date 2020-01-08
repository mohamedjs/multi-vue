<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\Models\Advertisement;
class AdvertismentRequest extends FormRequest
{
    /**
     * Determine if the advertisment is authorized to make this request.
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
              'ads_url' => 'required|url|max:255',
              'image' => 'required|mimes:jpeg,bmp,png,svg',
            ];
          }
          case 'PUT':
          case 'PATCH':
          {
              return [
                'ads_url' => 'required|url|max:255',
                'image' => isset($this->image) ? 'mimes:jpeg,bmp,png,svg' : '',
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
