<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email'=>'required|string|email|unique:users|max:191',
            'fullname'=>'required|string',
            'user_cataloque_id'=>'required|integer|gt:0',
            'password'=>'required|string|min:6',
            're_password'=>'required|string|same:password',
        ];
    }
    public function messages():array{
        return [
            'email.required'=>'ban chua nhap email .',
            'email.email'=>'ban chua nhap email dung dinh dang . VD:abcxyz@gmail.com',  
            'email.unique'=>'Email da ton tai , vui long nhap lai ! ', 
            'email.string'=>'Email phải là dạng ký tự',
            'email.max'=>'Tên quá dài tối đa là 191 ký tự',
            'fullname.required'=>'Ban chua nhập họ tên',
            'fullname.string'=>'Họ tên là dạng ký tự',
            'user_cataloque_id.required'=>'Vui lòng chọn nhóm thành viên',
            'password.required'=>'ban chua nhap password.',
            're_password.required'=>'ban chua nhap lai password',
            're_password.same'=>'Mật khẩu không khớp',
        ];
    }
}
