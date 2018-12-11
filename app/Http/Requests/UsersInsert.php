<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersInsert extends FormRequest
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
            //用户名做规则设置
            'username' => 'required|regex:/^[a-zA-Z][a-zA-Z0-9_]{4,15}$/|unique:user',
            //密码规则设置
            'password' => 'required|regex:/^[a-zA-Z]\w{5,17}$/',
            'repassword' => 'required|same:password',
            //手机规则设置
            'phone' => 'required|regex:/\d{11}/',
            //邮箱规则设置
            'email' => 'required|email' 
        ];
    }

    //自定义错误消息
    public function messages(){
        return[
            'username.required'=>'用户名不能为空',
            'username.regex'=>'请按格式填写',
            'password.required'=>'密码不能为空',
            'password.regex'=>'请按格式填写',
            'repassword.required'=>'密码不能为空',
            'repassword.same'=>'与密码不一致',
            'phone.required'=>'手机不能为空',
            'phone.regex'=>'请按格式填写',
            'eamil.required'=>'邮箱不能为空',
            'email.email'=>'请按格式填写',
        ];
    }
}
