<?php
// 电影院控制器
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FilmcinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 电影院列表页
    public function index(Request $request)
    {
        // 搜索的时候穿过来的名字
        $name = $request -> input("name");
        // 查询数据
        $data = DB::table("cinema") -> where("name","like","%".$name."%") -> paginate(3);
        // 电影院内的取出城市id
        foreach($data as $v){
            // 市
            $city = DB::table("city") -> where("id","=",$v -> city_id) -> get();
            if (($city[0] -> upid) != "0") {
                // 县
                $citys = DB::table("city") -> where("id","=",$city[0] -> upid) -> get();
                if (($citys[0] -> upid) != "0") {
                    // 镇
                    $cityss = DB::table("city") -> where("id","=",$citys[0] -> upid) -> get();
                    // 将查到的镇的中文添加到city_id下
                    $v -> city_id = ($cityss[0] -> name).",".($citys[0] -> name).",".$city[0] -> name;
                }else{
                    // 将查到的县的中文添加到city_id下
                    $v -> city_id = ($citys[0] -> name).",".$city[0] -> name;
                }
            }else{
                // 将查到的市的中文添加到city_id下
                $v -> city_id = $city[0] -> name;
            }
        }
        // 查到的电影院总数量
        $counts = DB::table("cinema") -> count();
        return view("admin.Film_cinema.list",['data' => $data,"counts" => $counts,"request" => $request -> all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 电影院添加页面
    public function create(Request $request)
    {
        // 到添加页面，由于要用到city这张表的数据，要提前查询数据
        if ($request -> input("city_upid") > "0") {
            // 这里是ajax提交时来找的数据
            // 县和镇的数据
            $upid = $request -> input("city_upid");
            $city = DB::table("city") -> where("upid","=",$upid) -> get();
            return $city;
        }else{
            // 这是第一次过来时，没用ajax的，直接显示页面的时候，查找市的数据
            $city = DB::table("city") -> where("upid","=","0") -> get();
            return view("admin.Film_cinema.add",["city" => $city]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 添加页的数据处理
    public function store(Request $request)
    {
        $city = $request -> input("city");
        $citys = $request -> input("citys");
        
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
