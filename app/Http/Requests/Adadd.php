<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Adadd extends FormRequest
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
            'ad_name'=>'required',
            
            'title'=>'required',
            'img'=>'required',
            
            //电话
            'phone'=>'required|regex:/\d{11}/'
        ];
    }

     //自定义错误信息
    public function messages(){
        return [
            'ad_name.required'=>'广告商名字不能为空',
            
            'title.required'=>'标题不能为空',
            
            'img.required'=>'图片不能为空',
            
            
            
            //电话
            'phone.required'=>'电话不能为空',
            'phone.regex'=>'电话不符合规则'
        ];
    }
}
