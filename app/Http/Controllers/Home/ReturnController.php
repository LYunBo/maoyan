<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB
use DB;

use Hash;

use Mail;
class ReturnController extends Controller
{
	public function index(){
	    //返回找回密码页面
	    return view('home.Back.index');
	}

	//验证是否存在账号
	public function check(Request $request){
		//获取值
		$val = $request->input('check');
		// echo $val;
		$res = DB::table('user')->where('phone','=',$val)->first();
		$res1 = DB::table('user')->where('email','=',$val)->first();
		if($res){
			session(['phoneid'=>$res->id]);
			//为手机号码
			echo 1;
			return redirect('/pcheck');
		}elseif($res1){
			//为邮箱
			session(['emailid'=>$res1->id]);
			return redirect('/echeck');
		}else{
			//没有这个账号
			return back()->with('error','没有此用户');
		}
	}

	//手机号验证重置密码
	public function phone(){
		return view('home.Back.phone');
	}

	//邮箱验证重置密码
	public function email(){
		return view('home.Back.email');
	}

	//重置密码
	public function dochange(Request $request){
		// dd($request->all());
		// echo session('phoneid');
		// 获取修改的密码
		$pass = $request->input('password');
		//获取id
		if(empty(session('phoneid'))){
			$id = session('emailid');
		}else{
			$id = session('phoneid');
		}
		//吧密码做加密
		$password = Hash::make($pass);
		if(DB::table('user')->where('id','=',$id)->update(['password'=>$password])){
			session()->pull('phoneid');
			session()->pull('emailid');
			return redirect('/changesuccess');
		}else{
			echo "<script>alert('修改失败');location='/returnpass'</script>";
		}
	}

	//发送邮箱重置密码
	public function sendMail(Request $request){
		// dd($request->all());
		//获取邮箱
		$email = $request->input('email');
		//获取token
		$token = $request->input('_token');
		//获取id
		$id = session('emailid');
		//在闭包函数内部使用闭包函数外部的变量 必须use 导入 a 是模板
		Mail::send('a',['id'=>$id,'token'=>$token],function($message)use($email){
		//发送主题
		$message->subject('用户密码重置');
		//接收方
		$message->to($email);

		});

		echo "<script>alert('邮件发送成功请去邮箱查看');location='/'</script>";
	}
	
	//返回密码重置密码
	public function emailchange($id){
		// echo $id;
		return view('home.Back.doemail');
	}
	//返回成功页面
	public function success(){
		return view('home.Back.success');
	}
}
