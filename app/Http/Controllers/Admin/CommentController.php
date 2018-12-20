<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB
use DB;
use helper;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索的关键词
        $key = $request->input('keyword');
        //查找相对应的数据表
        $list = DB::table('comment')->where('content','like','%'.$key.'%')->paginate(5);
        //返回评论列表页
        return view('admin.Comment.index',['list'=>$list,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

      /*
    Ajax  显示
     */
    public function fb(Request $request){
        //获取id
        $id = $request->input('id');
        //同过传来的id修改状态
        if(DB::table('comment')->where('id','=',$id)->update(['status'=>1])){
            //返回状态码
            echo 1;
        }else{
            echo 0;
        }
    }

     /*
    Ajax  隐藏
     */
    public function xj(Request $request){
        //获取id
        $id = $request->input('id');
        //同过传来的id修改状态
        if(DB::table('comment')->where('id','=',$id)->update(['status'=>0])){
            //返回状态码
            echo 1;
        }else{
            echo 0;
        }
    }

}
