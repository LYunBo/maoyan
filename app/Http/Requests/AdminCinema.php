<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCinema extends FormRequest
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
            "cinema_phone" => "required",
            "service1" => "required",
            "service2" => "required",
            "service3" => "required",
            "city" => "required",
            "citys" => "required",
            "address" => "required",
            "brand" => "required",
        ];
    }
    public function messages(){
        return [
            "name.required" => "电影院名不为空",
            "name.regex" => "请正确电影院名",
            "cinema_phone.required" => "电影院电话号码不为空",
            "cinema_phone.regex" => "请正确输入电影院电话号码",
            "service1.required" => "请选择好电影院服务",
            "service2.required" => "请选择好电影院服务",
            "service3.required" => "请选择好电影院服务",
            "city.required" => "请选择电影院所在省",
            "city_id.required" => "请选择电影院所在市",
            "address.required" => "电影院详细地址不为空",
            "brand.required" => "电影院品牌不为空",
        ];
    }
}
