<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Projection;
class ProjectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 播放厅列表
    public function index(Request $request)
    {
        // 传过来的电影院名
        $name = $request -> input("name");
        // 利用join来将projection_hall表和cinema表链接在一起
        $data = DB::table("projection_hall") -> join("cinema","projection_hall.cinema_id","=","cinema.id") -> select("projection_hall.*","cinema.name as cinema_name") -> where("cinema.name","like","%".$name."%") -> paginate(3);
        $types = ["1" => "IMAX厅","2" => "CGS中国巨幕厅","3" => "杜比全景声厅","4" => "RealD厅","5" => "RealD","6" => "6FL厅","7" => "LUXE巨幕厅","8" => "4DX厅","9" => "DTS:X","10" => "临境音厅","11" => "儿童厅","12" => "4K厅","13" => "4D厅","14" => "巨幕厅"];
        foreach($data as $v){
            $v -> type = $types[$v -> type];
        }
        $counts = DB::table("projection_hall") -> count();
        return view("admin.Projection_hall.list",["data" => $data,"counts" => $counts,"request" => $request -> all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table("cinema") -> get();
        return view("admin.Projection_hall.add",["data" => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Projection $request)
    {
        // 获取的电影院id
        $cinema_id = $request -> input("cinema");
        // 播放厅名字
        $name = $request -> input("name");
        // 座位格式
        $seat = $request -> input("seat");
        // 座位数量
        $couts = $request -> input("couts");
        // 播放厅类型
        $type = $request -> input("type");
        if ($data = DB::table("projection_hall") -> insert(["cinema_id" => $cinema_id,"name" => $name,"seat" => $seat,"couts" => $couts,"type" => $type])) {
            return redirect("/adminfilmprojection/create") -> with("success","成功");
        }else{
            return back() -> with("error","失败");
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
        // 利用join来将projection_hall表和cinema表链接在一起
        $data1 = DB::table("projection_hall") -> join("cinema","projection_hall.cinema_id","=","cinema.id") -> select("projection_hall.*","cinema.name as cinema_name") -> where("projection_hall.id","=",$id) -> get();
        $data = DB::table("cinema") -> get();
        // var_dump($data);
        // var_dump($data1);
        return view("admin.Projection_hall.edit",["data" => $data,"data1" => $data1]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改放映厅信息
    public function update(Projection $request, $id)
    {
        // 获取的电影院id
        $cinema_id = $request -> input("cinema");
        // 播放厅名字
        $name = $request -> input("name");
        // 座位格式
        $seat = $request -> input("seat");
        // 座位数量
        $couts = $request -> input("couts");
        // 播放厅类型
        $type = $request -> input("type");
        // 修改数据
        if ($data = DB::table("projection_hall") -> where("id","=",$id) -> update(["cinema_id" => $cinema_id,"name" => $name,"seat" => $seat,"couts" => $couts,"type" => $type])) {
            return back() -> with("success","成功");
        }else{
            return back() -> with("error","失败");
        }
    }


    // 自定义删除方法
    public function del(Request $request){
        $id = $request -> input("id");
        if ($data = DB::table("projection_hall") -> where("id","=",$id) -> delete()) {
            return "1";
        }else{
            return "2";
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
}
