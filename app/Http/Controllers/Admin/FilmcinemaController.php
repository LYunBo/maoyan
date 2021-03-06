<?php
// 电影院控制器
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\AdminCinema;
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
        // 便于列表页查看，将service服务列取出修改
        foreach($data as $v){
            $service = $v -> service;
            $service = explode(",",$service);
            $service1 = ["0" => "无","1" => "免押金","2" => '5元/副',"3" => '3元/副起步'];
            $service2 = ["0" => "无","1" => '1.3m（不含）以下2D\3D免费，需由1名成人陪同'];
            $service3 = ["0" => '无',"1" => '影院地下停车场可停车',"2" => '看电影免费停车3小时'];
            $service[0] = "3D眼镜——".$service1[$service[0]];
            $service[1] = "儿童优惠——".$service1[$service[1]];
            $service[2] = "停车——".$service1[$service[2]];
            $service = implode("*****//",$service);
            $v -> service = $service;
        }
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
    public function store(AdminCinema $request)
    {
        // 3D眼睛服务
        $service1 = $request -> input("service1");
        // 儿童优惠服务
        $service2 = $request -> input("service2");
        // 停车服务
        $service3 = $request -> input("service3");
        // 合并三个服务
        $service = $service1.",".$service2.",".$service3;
        // 省的id
        $city = $request -> input("city");
        // 市的id
        $city_id = $request -> input("citys");
        // 电影院名
        $name = $request -> input("name");
        // 电影院电话号码
        $cinema_phone = $request -> input("cinema_phone");
        // 电影院地址
        $address = $request -> input("address");
        // 电影院品牌
        $brand = $request -> input("brand");

        // 电影院封面
        $cover = $request -> file("cover");
        // 存储到/film/cinema/cover内
        // 获取到封面图的文件后缀名
        $cover_houzhui = $cover -> getClientOriginalExtension();
        // 自定义储存的路径
        $cover_path = "./film/cinema/cover/".time().rand(1000,9999);
        // 自定义文件名
        $cover_name = time().rand(1000,9999).".".$cover_houzhui;
        // 存储
        $cover_y = $cover -> move($cover_path,$cover_name);
        // 为了方便在数据库存储路径
        $cover_path = ltrim($cover_path,".");
        $path = $cover_path."/".$cover_name;


        // 电影院图集
        $covers = $request -> file("covers");
        $paths = "";
        foreach($covers as $v){
            // 存储到/film/cinema/covers内
            // 获取到封面图的文件后缀名
            $covers_houzhui = $v -> getClientOriginalExtension();
            // 自定义储存的路径
            $covers_path = "./film/cinema/covers/".time().rand(1000,9999);
            // 自定义文件名
            $covers_name = time().rand(1000,9999).".".$covers_houzhui;
            // 存储
            $covers_y = $v -> move($covers_path,$covers_name);
            // 为了方便在数据库存储路径
            $covers_path = ltrim($covers_path,".");
            $paths .= ",".$covers_path."/".$covers_name;
        }
        $paths = ltrim($paths,",");
        if ($data = DB::table("cinema") -> insert(["city_id" => $city_id,"name" => $name,"cinema_phone" => $cinema_phone,"address" => $address,"brand" => $brand,"service" => $service,"cover" => $path,"covers" => $paths])) {
            return redirect("/adminfilmcinema/create") -> with("success","添加成功");
        }else{
            return back() -> with("error","添加失败");
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
    *
    *删除电影院的图集一个或者全部 
    *
    **/
    public function del(Request $request){
        $id = $request -> input("id");
        $num = $request -> input("num");
        if (empty($num)) {
            if ($data_covers = DB::table("cinema") -> where("id","=",$id) -> update(["covers" => ""])) {
                return "1";
            }else{
                return "2";
            }
        }
        $data = DB::table("cinema") -> where("id","=",$id) -> get();
            
        $covers = $data[0] -> covers;
        $covers = explode(",",$covers);
        $covers_num = count($covers);
        for ($i=0; $i < $covers_num; $i++) { 
            if ($i != $num) {
                $covers_z[] = $covers[$i];
            }
        }
        $covers = implode(",",$covers_z);
        if ($data_covers = DB::table("cinema") -> where("id","=",$id) -> update(["covers" => $covers])) {
            return "1";
        }else{
            return "2";
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 显示修改页面
    public function edit($id)
    {
        $data = DB::table("cinema") -> where("id","=",$id) -> get();
        $city = DB::table("city") -> where("id","=",$data[0] -> city_id) -> get();
        $citys = DB::table("city") -> where("upid","=",$city[0] -> upid) -> get();
        $city_q = DB::table("city") -> where("upid","=",0) -> get();
        $covers = explode(",",$data[0] -> covers);
        if ($covers[0] != "") {
            $num = count($covers);
        }else{
            $num = 0;
        }
        $service = $data[0] -> service;
        $service = explode(",",$service);
        return view("admin.Film_cinema.edit",["city" => $city,"data" => $data,"citys" => $citys,"covers" => $covers,"num" => $num,"service" => $service,"city_q" => $city_q]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminCinema $request, $id)
    {
        // 3D眼睛服务
        $service1 = $request -> input("service1");
        // 儿童优惠服务
        $service2 = $request -> input("service2");
        // 停车服务
        $service3 = $request -> input("service3");
        // 合并三个服务
        $service = $service1.",".$service2.",".$service3;
        // 省的id
        $city = $request -> input("city");
        // 市的id
        $city_id = $request -> input("citys");
        // 电影院名
        $name = $request -> input("name");
        // 电影院电话号码
        $cinema_phone = $request -> input("cinema_phone");
        // 电影院地址
        $address = $request -> input("address");
        // 电影院品牌
        $brand = $request -> input("brand");

        // 电影院封面
        if ($request -> hasFile("cover")) {
            $cover = $request -> file("cover");
            // 存储到/film/cinema/cover内
            // 获取到封面图的文件后缀名
            $cover_houzhui = $cover -> getClientOriginalExtension();
            // 自定义储存的路径
            $cover_path = "./film/cinema/cover/".time().rand(1000,9999);
            // 自定义文件名
            $cover_name = time().rand(1000,9999).".".$cover_houzhui;
            // 存储
            $cover_y = $cover -> move($cover_path,$cover_name);
            // 为了方便在数据库存储路径
            $cover_path = ltrim($cover_path,".");
            $path = $cover_path."/".$cover_name;
        }else{
            $cover_data = DB::table("cinema") -> where("id","=",$id) -> get();
            $path = $cover_data[0] -> cover;
        }
        


        // 电影院图集
        if ($request -> hasFile("covers")) {
            $covers = $request -> file("covers");
            $paths = "";
            foreach($covers as $v){
                // 存储到/film/cinema/covers内
                // 获取到封面图的文件后缀名
                $covers_houzhui = $v -> getClientOriginalExtension();
                // 自定义储存的路径
                $covers_path = "./film/cinema/covers/".time().rand(1000,9999);
                // 自定义文件名
                $covers_name = time().rand(1000,9999).".".$covers_houzhui;
                // 存储
                $covers_y = $v -> move($covers_path,$covers_name);
                // 为了方便在数据库存储路径
                $covers_path = ltrim($covers_path,".");
                $paths .= ",".$covers_path."/".$covers_name;
            }
            $paths = ltrim($paths,",");
        }else{
            $covers_data = DB::table("cinema") -> where("id","=",$id) -> get();
            $paths = $covers_data[0] -> covers;
        }
        
        if ($data = DB::table("cinema") -> where("id","=",$id) -> update(["city_id" => $city_id,"name" => $name,"cinema_phone" => $cinema_phone,"address" => $address,"brand" => $brand,"service" => $service,"cover" => $path,"covers" => $paths])) {
            return back() -> with("success","添加成功");
        }else{
            if ($data != "0") {
                return back() -> with("error","添加失败");
            }else{
                return back() -> with("success","添加成功");
            }
        }
    }





    public function cinemadel(Request $request){
        $id = $request -> input("id");
        if ($data = DB::table("cinema") -> where("id","=",$id) -> delete()) {
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
