<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImgsUpdate extends FormRequest
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
            //修改 标题的规则
            'title'=>'required',
            //简介 的规则
            'introduction'=>'required'
        ];
    }

    //自定义错误信息
    public function messages(){
        return[
            'title.required'=>'标题不能为空',
            'introduction.required' =>'简介不能为空'
        ];
    }
}
