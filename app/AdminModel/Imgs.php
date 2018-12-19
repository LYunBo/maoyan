<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Imgs extends Model
{
    //关联的数据表
    protected $table = 'imgs';
    //设置是否自动维护时间戳
    public $timestamps = false;
    //绑定数据
    protected $fillable = ['title','nice','img','status','introduction'];
}
