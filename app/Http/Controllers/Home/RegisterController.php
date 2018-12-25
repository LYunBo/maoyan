<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入模型类
use App\HomeModels\Register;
//引入Hash
use Hash;
class RegisterController extends Controller
{
    //注册首页
    public function index(){
    	return view('home.Register.index');
    }

    //添加用户
    public function add(Request $request){
    	// dd($request->all());
    	//打包好提交的数据
    	$data = $request->except('_token');
    	// dd($data);
    	// 做密码得封装
    	unset($data['password2']);
    	unset($data['code']);
    	// dd($data);
    	$data['password'] = Hash::make($data['password']);
    	// dd($data);
    	// 加入数据库
    	if(Register::create($data)){
    		echo "<script>alert('注册成功');location='/hlogin'</script>";
    	}else{
    		return back()->with('error','注册失败');
    	}
    }
}