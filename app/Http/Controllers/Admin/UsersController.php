<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入底层DB
use DB;
//引入Hash对密码进行加密
use Hash;
//导入AdminUsersinsert校验类
use App\Http\Requests\Usersinsert;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //返回用户列表页
        $list = DB::table('user')->get();
        //返回共有多少条数据
        $tol = DB::table('user')->count();
        return view('admin.Users.index',['list'=>$list,'tol'=>$tol,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回用户添加页
        return view('admin.Users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersInert $request)
    {
        //返回以post提交上来的数据
        $data = $request->except('_token','repassword');
        var_dump($data); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //修改页面
        return view('admin.Users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //返回修改密码页
    public function pwd($id){
        //修改密码
        //用传过来的id查出相对应的数据遍历
        $res = DB::table('user')->where('id','=',$id)->first();
        return view('admin.Users.pwd',['res'=>$res]);
    }

    //do修改密码
    public function pwds(Request $request,$id){
        // echo $id;
        //把提交上来的数据出_token,repassword字段外对应数据表的字段
        $row = $request->except('_token','repassword');
        //把密码进行Hash加密
        $row['password'] = Hash::make($row['password']);
        // var_dump($row);
        //修改密码
        if(DB::table('user')->where('id','=',$id)->update($row)){
            return redirect('/adminusers');
        }else{
            return back();
        }
        
    }
}
