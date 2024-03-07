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
            'name' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
            'group_id' => 'required',
            'gender' => 'required',
            'image' => 'required',
            'address' => 'required',


        ];
    }


    public function messages()
    {
        return [
            'name.required' =>'Không được bỏ trống',
            'password.required' =>'Không được bỏ trống',
            'email.required' =>'Không được bỏ trống',
            'email.unique' =>'E mail đã tồn tại',
            'phone.required' =>'Không được bỏ trống',
            'birthday.required' =>'Không được bỏ trống',
            'group_id.required' =>'Không được bỏ trống',
            'gender.required' =>'Không được bỏ trống',
             'image.required' =>'  Không được bỏ trống',
             'address.required' =>'  Không được bỏ trống'

        ];
    }
}
