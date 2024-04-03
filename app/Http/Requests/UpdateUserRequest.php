<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email'=>'required|string|email|unique:users,email,'.$this->id.'|max:191',
            'name'=>'required|string',
            'user_cataloque_id'=>'gt:0',
        ];
    }
    public function messages():array{
        return [
            'email.required'=>'ban chua nhap email .',
            'email.email'=>'ban chua nhap email dung dinh dang . VD:abcxyz@gmail.com',  
            'email.unique'=>'Email da ton tai , vui long nhap lai ! ', 
            'email.string'=>'Email phải là dạng ký tự',
            'email.max'=>'Tên quá dài tối đa là 191 ký tự',
            'name.required'=>'Ban chua nhập họ tên',
            'name.string'=>'Họ tên là dạng ký tự',
            'user_cataloque_id.required'=>'Vui lòng chọn nhóm thành viên',
        ];
    }
}
