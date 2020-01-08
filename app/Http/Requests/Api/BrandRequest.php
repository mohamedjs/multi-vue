<?php
namespace App\Http\Requests\Api;
use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\Models\Brand;
class BrandRequest extends FormRequest
{
    /**
     * Determine if the brand is authorized to make this request.
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
              'title' => 'required|array',
              'title.*' => 'required|string|max:255',
              'image' => 'required|mimes:jpeg,bmp,png',
            ];
          }
          case 'PUT':
          case 'PATCH':
          {
              return [
                'title' => 'required|array',
                'title.*' => 'required|string|max:255',
                'image' => isset($this->image) ? 'mimes:jpeg,bmp,png' : '',
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
