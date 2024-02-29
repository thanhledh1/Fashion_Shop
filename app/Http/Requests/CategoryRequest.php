<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories,name,' . $this->route('id'),

        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'Tên đã tồn tại, Vui lòng chọn tên khác',
            'name.required' =>'Không được bỏ trống',

        ];
    }
}
