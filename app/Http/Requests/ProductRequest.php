<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:products,name',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'description_ct' => 'required',
            'category_id' => 'required',

            // 'image' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Không được bỏ trống',
            'name.unique' =>'Sản phẩm đã tồn tại',
            'price.required' =>'Không được bỏ trống',
            'description.required' =>'Không được bỏ trống',
            'description_ct.required' =>'Không được bỏ trống',
            'quantity.required' =>'Không được bỏ trống',
            'status.required' =>'Không được bỏ trống',
            'description_ct.required' =>'Không được bỏ trống',
            'category_id.required' =>'Không được bỏ trống',


            //  'image.required' =>'image  Không được bỏ trống'
        ];
    }
}
