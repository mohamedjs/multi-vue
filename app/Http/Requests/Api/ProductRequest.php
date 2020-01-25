<?php
namespace App\Http\Requests\Api;
use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\Models\Product;
class ProductRequest extends FormRequest
{
    /**
     * Determine if the product is authorized to make this request.
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
              //'title.*' => 'required|string|max:255',
              'main_image' => 'required|mimes:jpeg,bmp,png',
              'price' =>'required',
              'special_price_type' =>'required',
              'special_price'=>'required',
              'special'=>'required',
              'active'=>'required',
              'description'=>'required',
              'short_description'=>'required',
              'special_price_end'=>'required',
              'special_price_start'=>'required',
              'meta_keyword'=>'required',
              'meta_title'=>'required',
              'meta_description'=>'required',
              'sku'=>'required',
              'category_id'=>'required',
              'brand_id'=>'required',
              'stock'=>'required',
              'min_stock'=>'required',
            ];
          }
          case 'PUT':
          case 'PATCH':
          {
              return [
                'title' => 'required',
                //'title.*' => 'required|string|max:255',
                'price' =>'required',
                'special_price_type' =>'required',
                'special_price'=>'required',
                'special'=>'required',
                'active'=>'required',
                'description'=>'required',
                'short_description'=>'required',
                'special_price_end'=>'required',
                'special_price_start'=>'required',
                'meta_keyword'=>'required',
                'meta_title'=>'required',
                'meta_description'=>'required',
                'sku'=>'required',
                'category_id'=>'required',
                'brand_id'=>'required',
                'stock'=>'required',
                'min_stock'=>'required',
                'main_image' => isset($this->image) ? 'mimes:jpeg,bmp,png' : '',
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
