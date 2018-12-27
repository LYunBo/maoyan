<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CommentController extends Controller
{
    //处理提交上来的
    public function tijiao(Request $request){
    	// dd($request->all());
    	//判断有没有登录
    	if(empty(session('id'))){
    		echo '<script>alert("请先登录,再留言");location="/hlogin"</script>';
    	}else{
    		//用户id
    		$id = session('id');
    		//打包好提交上来的数据
    		$data = $request->except('_token');
    		$data['user_id'] = $id;
    		$data['date'] = date('Y-m-d',time());
    		// dd($data);
    		if(DB::table('comment')->insert($data)){
    			echo '<script>alert("留言成功");</script>';
    			return back();
    		}
    	}
    }
}
