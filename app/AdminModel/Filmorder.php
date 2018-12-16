<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Filmorder extends Model
{
    protected $table = "order";
    public $timestamps = true;
    protected $fillable = ["user_id","film_id","order_number","price","payment","eturn_goods","reason","created_at","updated_at","num","phone","seat_num"];
    public function getPaymentAttribute($value){
    	$status = ["0" => "未支付","1" => "已支付","2" => "已过期"];
    	return $status[$value];
    }
    public function getEturnGoodsAttribute($value){
    	$status = ["0" => "出售正常","1" => "申请退票"];
    	return $status[$value];
    }
    public function getNyAttribute($value){
    	$status = ["0" => "否","1" => "是"];
    	return $status[$value];
    }

}
