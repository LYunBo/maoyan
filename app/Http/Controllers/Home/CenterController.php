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
	    //查看基本信息
	    return view('home.information.index');
	}

	//个人订单
	public function order(){
		//获取用户id
		$id = session('id');
		dd($id);
	}
}
