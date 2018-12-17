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
use App\AdminModel\message;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$mi = Hash::make('abc123');
        echo $mi;*/
        //返回搜索的关键词
        $key = $request->input('keyword');
        //返回用户列表页
        $list = Users::where('username','like','%'.$key.'%')->paginate(5);
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
        //
        // dd($id);
        // 用的到的id查用户详情表对应的信息
        $row = message::where('user_id','=',$id)->first();
        // dd($row);
         //查出用户关注的电影
        $love = DB::table('follow_film')->where('user_id','=',$id)->get();
        //查用户的历史电影
        $histroy = DB::table('pastfilm')->where('user_id','=',$id)->get();
        //返回用户信息列表页
        return view('admin.Users.message',['row'=>$row,'love'=>$love,'histroy'=>$histroy]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //查出用id查出的相对应的数据
        $list = Users::where('id','=',$id)->first();
        // var_dump($list);exit;
        //修改页面
        return view('admin.Users.edit',['list'=>$list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //返回打印回来的数据
        $result = $request->except('_token','_method');
        // var_dump($result);
        //修改数据
        if(Users::where('id','=',$id)->update($result)){
             // 返回到列表页,并存一个名为success的session让列表页提示
            return redirect('/adminusers')->with('success','修改成功');
        }else{
            //返回添加页,存个error的session并用闪存保存原来的数据
            return back()->withInput()->with('error','修改失败');
        }
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
             // 返回到列表页,并存一个名为success的session让列表页提示
            // echo 1;exit;
            return redirect('/adminusers')->with('success','修改成功');
        }else{
            //返回添加页,存个error的session并用闪存保存原来的数据
            // echo 1;exit;
            return back()->withInput()->with("error",'修改失败');
        }
        
    }

    //通过Ajax的get方法来的删除方法
    public function del(Request $request){
        // 获取id
        $id  = $request->input('id');
        // echo $id;exit;
        //通过传来的id删除数据表对应的数据
        if(Users::destroy($id)){
            // 返回状态1表示成功
            with('success','删除成功');
            echo 1;
        }else{
            //返回状态2表示失败
            echo 2;
        }
    }

    //通过ajax修改状态启动
    public function start(Request $request){
        //获取id
        $id = $request->input('id');
        //同过传来的id修改状态
        if(Users::where('id','=',$id)->update(['status'=>1])){
            //返回状态码
            echo 1;
        }else{
            echo 2;
        }
    }

    //通过ajax修改状态停用
    public function stop(Request $request){
        //获取id
        $id = $request->input('id');
        //同过传来的id修改状态
        if(Users::where('id','=',$id)->update(['status'=>0])){
            //返回状态码
            echo 1;
        }else{
            echo 2;
        }
    }
}
