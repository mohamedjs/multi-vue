<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\Models\Setting;
class SettingRequest extends FormRequest
{
    /**
     * Determine if the setting is authorized to make this request.
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
              'key' => 'required|unique:settings',
              'type_id' => 'required',
              'value' => ($this->type_id == 3 ? 'required||mimes:jpeg,bmp,png' : ($this->type_id == 4 ?  'required||mimes:webm,avi,flv,mp4' : ($this->type_id == 5 ?  'required||mimes:mpga,wav': 'required')))
            ];
          }
          case 'PUT':
          case 'PATCH':
          {
              return [
                'key' => 'required|unique:settings,key,'.$this->setting->id,
                'type_id' => 'required',
                'value' =>   ($this->type_id == 3 ? 'required||mimes:jpeg,bmp,png' : ($this->type_id == 4 ?  'required||mimes:webm,avi,flv,mp4' : ($this->type_id == 5 ?  'required||mimes:mpga,wav': 'required')))
              ];
          }
          default:break;
      }
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
