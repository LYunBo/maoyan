<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    //定义与模型关联的数据表
    protected $table = 'information';
    //主键
    protected $primaryKey = 'id';
    //设置是否需要自动维护时间戳
    public $timestamps = false;

    //赋值属性
    protected $fillable = ['user_id','user_name','sex','autograph','member','lifestate','job','hobby','birthday','photo'];

    //修改属性的方法
    // 对完成的数据(sex)做自动处理
    public function getSexAttribute($value){
    	$sex = [0=>'女',1=>'男',2=>'保密'];
    	return $sex[$value];
    }

    //对完成的数据(member)做自动处理
    public function getMemberAttribute($value){
    	$member = [0=>'普通会员',1=>'黄金会员'];
    	return $member[$value];
    }
}
