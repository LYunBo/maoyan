<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use Hash;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //退出
        //销毁session
        $request->session()->pull('id');
        $request->session()->pull('admin_user');
        $request->session()->pull('level');

        // dd(Hash::make('123456'));
        //加载登录页面
        return view('admin.Login.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取用户名和密码
        $user=$request->input('admin_user');
        $pwd=$request->input('admin_password');

        // 获取对应名字用户名信息
        $U=DB::table('admin_user')->where('admin_user','=',$user)->first();
        // dd($U);
        

        // 检测用户名
        if($U){
            //检测状态是否开启
            if($U->statuss==1){
                // 检测密码
                if(Hash::check($pwd,$U->admin_password)){
                    //都正确则将信息写入到session
                    session(['id'=>$U->id]);
                    session(['admin_user'=>$U->admin_user]);
                    session(['level'=>$U->level]);

                    return redirect('/admin')->with('success','欢迎登录');
                   
                }else{
                    return back()->with('error','用户名或密码错误');
                }
            }else{
                return back()->with('stop','该用户已封禁或未通过审核');
            }
                
        }else{
            return back()->with('error','用户名或密码错误');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
