<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\Models\Coupon;
class CouponRequest extends FormRequest
{
    /**
     * Determine if the coupon is authorized to make this request.
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
              'value' => 'required|min:1',
              'number' => 'required',
              'expire_date' => 'required|after:'.date('Y-m-d')
            ];
          }
          case 'PUT':
          case 'PATCH':
          {
              return [
                'value' => 'required|min:1',
                'number' => '',
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
