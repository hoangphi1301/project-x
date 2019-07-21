<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'avatar' => 'image|max:2048',
            'name'=>'required|min:3|max:50',
            'phone'=>'max:50'
        ];
    }

    public function messages(){
        return [
            'avatar.image'=>'Đây không phải file ảnh.',
            'avatar.max'=>'Kích thước File quá lớn.',
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên phải lớn hơn 3 ký tự',
            'name.max'=>'Tên quá dài',
            'phone.max'=>'Số điện thoại quá dài'
        ];
    }
}
