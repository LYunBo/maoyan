<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class HotNews extends Model
{
    //与模型关联的数据表
    protected $table = 'hotnews';
    //模型是否被自动维护时间戳
    public $timestamps = true;

    //批量赋值的属性
    protected $fillable = ['title','content','cover','browse','film_id','nice','status'];
}
