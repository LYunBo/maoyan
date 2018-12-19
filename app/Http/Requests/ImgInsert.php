<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImgInsert extends FormRequest
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
            //标题的规则
            'title'=>'required',
            //图集的规则
            'img'=>'required',
            //简介的规则
            'introduction'=>'required'
        ];
    }

    //自定义错误信息
    public function messages(){
        return[
            'title.required'=>'标题不能为空',
            'img.required'=>'图集至少要有一张图片',
            'introduction.required'=>'简介不能为空'
        ];
    }
}
