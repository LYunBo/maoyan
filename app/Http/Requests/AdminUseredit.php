<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUseredit extends FormRequest
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
            //用户名不能为空规则设置   required 输入的数据不能为空  regex正则规则                      unique 数据唯一(表名,字段)
            'admin_user'=>'required|regex:/\w{3,12}/',
            //密码和重复密码
            'admin_password'=>'required|regex:/\w{6,16}/',
            'repwd'=>'required|regex:/\w{6,16}/|same:admin_password',
            //邮箱
            'email'=>'required|email',
            //电话
            'phone'=>'required|regex:/\d{11}/'
        ];
    }

    //自定义错误信息
    public function messages(){
        return [
            'admin_user.required'=>'用户名不能为空',
            'admin_user.regex'=>'用户名必须为4-12任意的数字字母下划线',
            // 'admin_user.unique'=>'用户名重复',
            'admin_password.required'=>'密码不能为空',
            'admin_password.regex'=>'密码必须为6-16位的任意数字字母下划线',
            'repwd.required'=>'重复密码不能为空',
            'repwd.regex'=>'重复密码必须为6-16位的任意数字字母下划线',
            'repwd.same'=>'两次密码不一致',
            //邮箱
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不符合',
            //电话
            'phone.required'=>'电话不能为空',
            'phone.regex'=>'电话不符合规则'
        ];
    }
}
