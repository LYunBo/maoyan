<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminFilminserts extends FormRequest
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
            "name" => "required|regex:/[^x00-xff]/",
            "ymd" => "required|regex:/^\d{4}-\d{1,2}-\d{1,2}$/",
            "times" => "required|regex:/^\d{1,3}$/",
            "years" => "required|regex:/^\d{4}$/",
            "director" => "required",
            "film_introduce" => "required",
            "playback_status" => "required",
            "type_id" => "required",
            "district_id" => "required"
            
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "电影名不为空",
            "name.regex" => "请输入正确的电影名",
            "ymd.required" => "上映时间不为空",
            "ymd.regex" => "请输入正确的上映时间:如2018-10-10",
            "times.required" => "电影时长不为空",
            "times.regex" => "请输入正确的电影时长:如120",
            "years.required" => "电影年份不为空",
            "years.regex" => "请输入正确的电影年份:如2018",
            "district_id.required" => "区域不为空",
            "director.required" => "导演名字不为空",
            "film_introduce.required" => "电影简介不为空",
            "playback_status.required" => "请选择上下架",
            "type_id.required" => "请选择电影类型"
            
        ];
    }
}
