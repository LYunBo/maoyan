<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Filmscene;
class FilmsceneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 电影场次列表
    public function index(Request $request)
    {
        // 搜索的时候搜索电影名
        $name = $request -> input("name");
        // 将四张表关联起来
        // film_scene,cinema,projection_hall,film
        $data = DB::table("film_scene") -> join("cinema","film_scene.cinema_id","=","cinema.id") -> join("projection_hall","film_scene.projection_hall_id","=","projection_hall.id") -> join("film","film_scene.film_id","=","film.id") -> select("film_scene.*","cinema.name as cinema_name","projection_hall.name as projection_name","projection_hall.type as projection_type","film.name as film_name") -> where("film.name","like","%".$name."%") -> orderBy("film_scene.id","asc") -> paginate(3);
        // 计算查询到的数据有多少条
        $counts = count($data);
        // 便于查看 
        $languages = ["1" =>"国语2D","2" =>"国语3D","3" =>"原版2D","4" =>"原版3D","5" =>"英语2D","6" => "英语3D","7" => "日语2D","8" => "日语3D"];
        foreach($data as $v){
            $v -> language = $languages[$v -> language];
        }
        $types = ["1" => "IMAX厅","2" => "CGS中国巨幕厅","3" => "杜比全景声厅","4" => "RealD厅","5" => "RealD","6" => "6FL厅","7" => "LUXE巨幕厅","8" => "4DX厅","9" => "DTS:X","10" => "临境音厅","11" => "儿童厅","12" => "4K厅","13" => "4D厅","14" => "巨幕厅"];
        foreach($data as $v){
            $v -> projection_type = $types[$v -> projection_type];
        }
        return view("admin.Film_scene.list",["data" => $data,"request" => $request -> all(),"counts" => $counts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 添加页面
    public function create(Request $request)
    {
        // 选完省之后城市的数据
        if ($request -> has("city_upid")) {
            $citys = DB::table("city") -> where("upid","=",$request -> input("city_upid")) -> get();
            return $citys;
        }
        // 在这个城市内的电影院的数据
        if ($request -> has("city_idss")) {
            $citys = DB::table("city") -> where("id","=",$request -> input("city_idss")) -> get();
            $city_id = $citys[0] -> id;
            $cinema = DB::table("cinema") -> where("city_id","=",$city_id) -> get();
            return $cinema;
        }
        // 在这个电影院的放映厅的数据
        if ($request -> has("cinema_id")) {
            $projection_hall = DB::table("projection_hall") -> where("cinema_id","=",$request -> input("cinema_id")) -> get();
                return $projection_hall;
        }
        $language = ["1" =>"国语2D","2" =>"国语3D","3" =>"原版2D","4" =>"原版3D","5" =>"英语2D","6" => "英语3D","7" => "日语2D","8" => "日语3D"];
        // 查询所有已有的电影
        $film = DB::table("film") -> get(); 
        // 查询所有已有的电影院
        $cinema = DB::table("cinema") -> get();
        // 查询所有的已有的省
        $city = DB::table("city") -> where("upid","=","0") -> get();
        return view("admin.Film_scene.add",["language" => $language,"film" => $film,"cinema" => $cinema,"city" => $city]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 对添加页面的数据处理
    public function store(Filmscene $request)
    {
        // 电影院id
        $cinema_id = $request -> input("cinema_id");
        // 观影时间
        $times = $request -> input("times");
        // 放映时间
        $hi = $request -> input("hi");
        // 语言版本
        $language = $request -> input("language");
        // 播放厅
        $projection_hall_id = $request -> input("projection_hall_id");
        // 出售价格
        $price = $request -> input("price");
        // 电影id 
        $film_id = $request -> input("film_id");
        if ($data = DB::table("film_scene") -> insert(["cinema_id" => $cinema_id ,"times" => $times ,"hi" => $hi ,"language" => $language ,"projection_hall_id" => $projection_hall_id ,"price" => $price ,"film_id" => $film_id ])) {
            return redirect("/adminfilmscene/create") -> with("success","成功");
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
    // 加载修改页面
    public function edit($id)
    {
        // 需要的公告数据
        $language = ["1" =>"国语2D","2" =>"国语3D","3" =>"原版2D","4" =>"原版3D","5" =>"英语2D","6" => "英语3D","7" => "日语2D","8" => "日语3D"];
        $film = DB::table("film") -> get(); 
        $cinema = DB::table("cinema") -> get();
        $city = DB::table("city") -> where("upid","=","0") -> get();

        // 加载自己的数据
        $data = DB::table("film_scene") -> join("cinema","film_scene.cinema_id","=","cinema.id") -> join("projection_hall","film_scene.projection_hall_id","=","projection_hall.id") -> join("film","film_scene.film_id","=","film.id") -> select("film_scene.*","cinema.name as cinema_name","cinema.city_id","projection_hall.name as projection_name","projection_hall.type as projection_type","film.name as film_name") -> where("film_scene.id","=",$id) -> get();
        $city_citys = DB::table("city") -> where("id","=",$data[0] -> city_id) -> get();
        $city_provincial = DB::table("city") -> where("id","=",$city_citys[0] -> upid) -> get();
        return view("admin.Film_scene.edit",["language" => $language,"film" => $film,"cinema" => $cinema,"city" => $city,"data" => $data,"city_citys" => $city_citys,"city_provincial" => $city_provincial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 自定义删除
    public function del(Request $request){
        $id = $request -> input("id");
        if ($data = DB::table("film_scene") -> where("id","=",$id) -> delete()) {
            return "1";
        }else{
            return "2";
        }
    }
    public function update(Filmscene $request, $id)
    {
        // 电影院id
        $cinema_id = $request -> input("cinema_id");
        // 观影时间
        $times = $request -> input("times");
        // 放映时间
        $hi = $request -> input("hi");
        // 语言版本
        $language = $request -> input("language");
        // 播放厅
        $projection_hall_id = $request -> input("projection_hall_id");
        // 出售价格
        $price = $request -> input("price");
        // 电影id 
        $film_id = $request -> input("film_id");
        if ($data = DB::table("film_scene") -> where("id","=",$id) -> update(["cinema_id" => $cinema_id ,"times" => $times ,"hi" => $hi ,"language" => $language ,"projection_hall_id" => $projection_hall_id ,"price" => $price ,"film_id" => $film_id ])) {
            return back() -> with("success","成功");
        }else{
            if ($data == 0) {
                return back() -> with("success","成功");
            }else{
                return back() -> with("error","失败");
            }
        }
    }

    // 清除所有时间已过的电影场次
    public function dels(Request $request){
        echo "kakna";
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
