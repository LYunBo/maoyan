<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Projection extends FormRequest
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
            "cinema" => "required",
            "name" => "required",
            "seat" => "required",
            "couts" => "required",
            "type" => "required"
        ];
    }
    public function messages()
    {
        return [
            "cinema.required" => "已有电影选择不为空",
            "name.required" => "放映厅名字不为空",
            "seat.required" => "作为格式不为空",
            "couts.required" => "座位数量不为空",
            "type.required" => "放映厅类型不为空"
        ];
    }
}
