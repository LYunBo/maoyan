<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB
use DB;
class CenterController extends Controller
{
	//基本信息
	public function index(){
		//获取用户的id
		$id = session('id');
		// dd($id);
		// 把userid存到用户详情页
		$list = DB::table('information')->where('user_id','=',$id)->first();
		// dd($list);
		//查看基本信息
		return view('home.information.index',['list'=>$list]);
	}

	//个人订单
	public function order(){
		//获取用户id
		$id = session('id');
		// dd($id);
		$data = DB::table('order')->where('user_id','=',$id)->get();
		
	}

	//修改头像
	public function change(Request $request){
		// dd($request->all());
		// 打包好上传的数据
		$photo = $request->except('_token');
		//初始化名字
        $name = date('Ymd',time())+rand(1,10000);
       	//获取头像上传后缀
        $extp = $request->file('photo')->getClientOriginalExtension();
       	//预告头像路径名称
      	$upload = './UserPhoto/'.date('Y-m-d',time());
       	//把封面路径存好
      	$photo['photo'] = substr($upload,1).'/'.$name.'.'.$extp;
      	//获取id
      	$id = session('id');
      	if(DB::table('information')->where('user_id','=',$id)->update($photo)){
      		//把封面移动到指定的目录下(提前在Public下新建文件目录)
            $request->file('photo')->move($upload,$name.'.'.$extp);
            echo "<script>alert('头像修改成功');location='/information'</script>";
      	}else{
      		echo "<script>alert('头像修改失败');location:'/information'</script>";
      	}

	}

	//修改资料
	public function chmessage(Request $request){
		// dd($request->all());
		//打包好提交上来的数据
		$data = $request->except('_token','csrf');
		// dd($data);
		// 获取id
		$id = session('id');
		if(DB::table('information')->where('user_id','=',$id)->update($data)){
			echo "<script>alert('保存成功');location='/information'</script>";
		}else{
			echo "<script>alert('保存失败');location:'/information'</script>";
		}
	}
}
