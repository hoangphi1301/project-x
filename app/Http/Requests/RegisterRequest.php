<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3|max:50',
            'email'=>'required|email|unique:users',
            'phone'=>'max:50',
            'position'=>'required',
            'password'=>'required|min:6|max:50',
            're_password'=>'same:password'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên phải lớn hơn 3 ký tự',
            'name.max'=>'Tên quá dài',
            'email.required'=>'Bạn chưa nhập Email',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email này đã có người sử dụng',
            'phone.max'=>'Số điện thoại quá dài',
            'position.required'=>'Chưa nhập chức vụ',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu phải lớn hơn 6 ký tự',
            'password.max'=>'Mật khẩu quá dài',
            're_password.same'=>'Mật khẩu không khớp'
        ];
    }
}
