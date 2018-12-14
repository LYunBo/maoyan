<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Filmscene extends FormRequest
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
            "cinema_id" => "required",
            "times" => "required",
            "hi" => "required",
            "language" => "required",
            "projection_hall_id" => "required",
            "price" => "required",
            "film_id" => "required"
        ];
    }
    public function messages(){
        return [
            "cinema_id.required" => "请选择电影院",
            "times.required" => "请输入观影时间",
            "hi.required" => "请输入放映时间",
            "language.required" => "请选择语言版本",
            "projection_hall_id.required" => "请选择放映厅",
            "price.required" => "请输入售价n元/张，只需要输入纯数字即可",
            "film_id.required" => "请选择电影"
        ];
    }
}
