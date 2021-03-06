<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入模型类
use App\HomeModels\Register;
//引入Hash
use Hash;
use DB;
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
    	// dd($data);\
        $user = Register::create($data);
        //获取$id
        $id = $user->id;
    	// 加入数据库
    	if($id>0){
            if(DB::table('information')->insert(['user_id'=>$id])){
    		  echo "<script>alert('注册成功');location='/hlogin'</script>";
            }
    	}else{
    		return back()->with('error','注册失败');
    	}
    }

    //验证手机号码
    public function checkphone(Request $request){
        //获取手机号
        $phone = $request->input('phone');
        //判断是否已经注册
        // echo $phone;
        if(DB::table('user')->where('phone','=',$phone)->first()){
            echo 2;
        }else{
            echo 1;
        }
    }

    //验证邮箱
    public function checkemail(Request $request){
        //获取手机号
        $email = $request->input('email');
        //判断是否已经注册
        // echo $phone;
        if(DB::table('user')->where('email','=',$email)->first()){
            echo 2;
        }else{
            echo 1;
        }
    }
}
