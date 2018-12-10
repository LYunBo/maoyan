<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 电影列表页面
    public function index()
    {
        // 获取film电影表数据
        $data = DB::table("film") -> get();
        // 查看film表数据有多少条
        $counts = DB::table("film") -> count();
        // 传参
        return view("admin.Film.list",["data" => $data,"counts" => $counts]);
    }

    // 电影详情
    public function films($id)
    {
        // 获取电影详情film_relation表的信息
        $data = DB::table("film_relation") -> get();
        // 循环获取film_relation内的演员人员id，performer_id字段
        foreach($data as $kk){
            $str = $kk -> performer_id;
        }
        // 将获取的演员id变成数组
        $str = explode(",",$str);
        // 将演员id的字段来查询演员表performer，获取演员信息
        $str = DB::table("performer") -> whereIn("id",$str) -> get();
        return view("admin.Film.film_relation",["data" => $data,"str" => $str]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 添加电影页面
    public function create()
    {
        return view("admin.Film.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request -> get("name");//电影名称
        // $request -> get("ymd");//放映时间
        // $request -> get("times");//电影时长
        // $request -> get("years");//电影年代
        // $request -> get("district_id");//区域
        // $request -> get("type_id");//类型
        // $request -> get("playback_status");//状态
        // $request -> get("film_img");//电影图集
        // $request -> get("cover");//电影封面
        // $request -> get("director");//导演名字
        // $request -> get("director_img");//导演头像
        // $request -> file("performer_img");//演员头像
        // 获取文件名字的方法
        // $name = pathinfo($request -> file("performer_img"));
        // $name = $name['filename'];
        // $request -> get("film_introduce");//电影简介
        
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
