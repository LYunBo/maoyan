<?php

namespace App\Http\Controllers\Admin;

//导入请求类
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Request请求类  $request 请求对象
    public function index(Request $request)
    {
        //获取请求路径
        $path=$request->path();
        //获取完整的url地址
        $url=$request->url();
        //获取请求方式
        $method=$request->method();
        //检测请求方式
        $res=$request->isMethod("POST");

        //获取所有参数
        $allparam=$request->all();
        //获取单个name参数
        $name=$request->input('name');
        //获取指定的参数 name 和age
        $onlyparam=$request->only(['name','age']);
        //获取除了name参数之外的所有参数
        $exceptparam=$request->except(['name']);
        //设置默认值
        $names=$request->input('name','welcome you');
        //检测某个参数是否存在
        $data=$request->has('name');
        //设置cookie
        // return response("sm")->withCookie('o2o30','goods',1);
        //获取cookie
        $s=$request->cookie('o2o30');
        dd($s);
        //打印数据的同时 终止脚本代码
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view("Admin.Req.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "这是执行登录";
        //把所有的参数写入闪存里
        // $request->flash();
        //将部分参数写入闪存里
        // $request->flashOnly('email');
        //把除去email的参数之外的参数写入闪存里
        // $request->flashExcept('email');
        //检测用户名是否为空
        if($request->input('name')==null){
            //阻止表单提交的同时 把所有参数信息写入闪存里
            return back()->withInput();
        }else{
            //打印所有参数
            dd($request->all());
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
