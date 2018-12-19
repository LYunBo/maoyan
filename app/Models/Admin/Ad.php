<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //lavave 里 一个模型类对应一个数据表
    //规定属性	admin_user 后台用户表
    protected $table="ad";
    //该模型是否被自动维护时间戳
    public $timestamps=true;
    //可以被批量赋值的属性
    protected $fillable=['ad_name','title','img','phone'];
}
