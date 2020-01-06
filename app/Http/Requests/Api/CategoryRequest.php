<?php
namespace App\Http\Requests\Api;
use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\Category;
class CategoryRequest extends FormRequest
{
    /**
     * Determine if the category is authorized to make this request.
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
              'title' => 'required|string|max:255',
              'coding' => 'required|unique:categories',
              'image' => 'required|mimes:jpeg,bmp,png',
            ];
          }
          case 'PUT':
          case 'PATCH':
          {
              return [
                'title' => 'required|string|max:255',
                'coding' => 'required|unique:categories,coding,'.$this->category->id,
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
