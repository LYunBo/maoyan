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
            // "name" => "required|regex:/[^x00-xff]/",
            // "ymd" => "required|regex://",
            // "times" => "required|regex://",
            // "years" => "required|regex://",
            // "district_id" => "required|regex://",
            // "type_id" => "required|regex://",
            // "playback_status" => "required|regex://",
            // "film_img" => "required|regex://",
            // "cover" => "required|regex://",
            // "director" => "required|regex://",
            // "director_img" => "required|regex://",
            // "performer_img" => "required",
            // "film_introduce" => "required"
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "电影名不为空",
            "name.regex" => "请输入正确的电影名",
            
        ];
    }
}
