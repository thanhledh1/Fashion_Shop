<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'password' => 'required|min:6',
            'email'=>'required|unique:users,email',
        ];
    }
    public function messages()
    {
        return [

            'password.required' => ':attribute bắt buộc nhập',
            'password.min' => ':attribute bắt buộc :min kí tự trở lên',


            //emai
            'email.required' => ':attribute bắt buộc nhập'

        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',

        ];
    }
}
