<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB
use DB;
//引入校验类
use App\Http\Requests\ImgInsert;
class ImgsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //搜索的关键字
        $key = $request->input('keyword');
        //分页
        $page = DB::table('imgs')->paginate(3);
        //查询关联的数据表
        $list = DB::table('imgs')->where('title','like','%'.$key.'%')->where('introduction','like','%'.$key.'%')->get();
        //查询共有多少条数据
        $tol = DB::table('imgs')->where('title','like','%'.$key.'%')->count();
        //返回图集列表
        return view('admin.Imgs.index',['list'=>$list,'tol'=>$tol,'request'=>$request->all(),'page'=>$page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回添加列表
        return view('admin.Imgs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImgInsert $request)
    {
        //查看返回的数据
        // dd($request->all());
        echo $request -> input("title");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //查看返回来的id相对应的图片
        $img = DB::table('img')->where('id','=',$id)->first();
        //查看图片的页面
        return view('admin.Imgs.img');
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
