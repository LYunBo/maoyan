<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入底层DB
use DB;
//引入Hash对密码进行加密
use Hash;
//导入AdminUsersinsert校验类
use App\Http\Requests\UsersInsert;
//导入要调用的模型类
use App\AdminModel\Users;
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
        $list = Users::paginate(5);
        //返回共有多少条数据
        $tol = Users::count();
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
    public function store(UsersInsert $request)
    {
        //返回以post提交上来的数据
        $data = $request->except('_token','repassword');
        //吧密码用Hash来加密
        $data['password'] = Hash::make($data['password']);
        // var_dump($data);
        if(Users::create($data)){
            // 返回到列表页,并存一个名为success的session让列表页提示
            return redirect('/adminusers')->with('success','添加成功');
        }else{
            //返回添加页,存个error的session并用闪存保存原来的数据
            return back()->withInput()->with('error','添加失败,请按要求填写');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //\
        dd($id);
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
        $res = Users::where('id','=',$id)->first();
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
        if(Users::where('id','=',$id)->update($row)){
            // echo 1;exit;
            return redirect('/adminusers')->with('success','修改成功');
        }else{
            // echo 1;exit;
            return back()->withInput()->with("error",'修改失败');
        }
        
    }
}
