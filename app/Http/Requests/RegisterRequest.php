<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|unique:customers,email',
            'phone' => 'required',
            // 'password' => 'required',


        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Không được bỏ trống',
            'address.required' =>' address Không được bỏ trống',
            'email.required' =>' email Không được bỏ trống',
            'email.unique' => 'Email đã được sử dụng.',
            'phone.required' =>' phone Không được bỏ trống',
            // 'password.required' =>'password Không được bỏ trống',
        ];
    }
}
