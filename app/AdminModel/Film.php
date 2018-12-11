<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = "film_relation";
    public $timestamps = false;
    protected $fillable = ["district_id"];

    public function getDistrict_IdAttribute($value){
		$district_id = ["0" => "大陆", "1" => "美国", "2" => "韩国", "3" => "日本", "4" => "中国香港", "5" => "中国台湾", "6" => "泰国", "7" => "印度", "8" => "法国", "9" => "英国", "10" => "俄罗斯", "11" => "意大利", "12" => "西班牙", "13" => "德国", "14" => "波兰", "15" => "澳大利亚", "16" => "伊朗", "17" => "其他"];
		return $district_id[$value];
    }

}
