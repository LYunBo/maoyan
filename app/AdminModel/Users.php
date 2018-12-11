<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //与模型关联的数据表
    protected $table = 'user';
    //改模型是否被自动维护时间戳
    public $timestamps = true;

    //批量赋值的属性
    protected $fillable = ['username','password','email','phone'];
    
}
