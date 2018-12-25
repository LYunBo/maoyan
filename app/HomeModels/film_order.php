<?php

namespace App\HomeModels;

use Illuminate\Database\Eloquent\Model;
  
class film_order extends Model
{
    //定义与模型关联的数据表
    protected $table = 'order';

     //主键
    protected $primaryKey = 'id';

    //设置是否需要自动维护时间戳
    public $timestamps = true;

    //赋值属性
    protected $fillable = ["user_id","film_id","order_number","price","payment" => "1","num","phone","seat_num"];
}
