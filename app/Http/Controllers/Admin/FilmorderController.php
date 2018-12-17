<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\AdminModel\Filmorder;
use App\Http\Requests\Filmorders;
class FilmorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 订单首页
    public function index(Request $request)
    {
        // 每次刷新页面时，都会判断未支付订单是否过期
        // 获取全部未支付的订单
        $datas = DB::table("order") -> where("payment","=","0") -> get();
        foreach($datas as $v){
            // 利用时间戳，判断是否超过半个小时即1800秒
            if (strtotime($v -> created_at) + 1800 < time()) {
                // 超过了则删除订单
                $ids = $v -> id;
                $datak = DB::table("order") -> where("id","=",$ids) -> update(["payment" => "2"]);
            }
        }
        // 搜索时输入的手机号码
        $name = $request -> input("name");
        // 获取订单列表,有输入手机号码则搜索，没有则全部内容
        $data = Filmorder::where("phone","like","%".$name."%")-> orderBy("id","asc") -> paginate(3);
        return view("admin.Film_order.list",["data" => $data,"request" => $request -> all()]);
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
    // 查看退单理由列
    public function show($id)
    {
        // 利用传过来的id准确获取数据
        $data = Filmorder::where("id","=",$id) -> get();
        // 直接输出内容
        if(empty($data[0] -> reason)){
            echo "没有退单理由";
        }else{
            echo $data[0] -> reason;
        }
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
        // 用传过来的id准确获取数据
        $data = Filmorder::where("id","=",$id) -> get();
        return view("admin.Film_order.edit",["data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //处理修改页面的数据
    public function update(Request $request, $id)
    {
        // 获取要修改的手机号
        $phone = $request -> input("phone");
        // 获取修改的，是否允许退单
        $ny = $request -> input("ny");
        // 存进数组内
        $arr = array("phone" => $phone,"ny" => $ny);
        // 修改数据
        if ($data = Filmorder::where("id","=",$id) -> update($arr)) {
            echo "修改成功，请刷新订单页面";
        }else{
            if ($data = 0) {
                echo "无修改变动";
            }else{
                echo "修改失败";
            }
        }
    }

    // 自定义删除
    public function del(Request $request){
        // 获取传过来的id
        $id = $request -> input("id");
        // 直接删除数据
        if ($data = Filmorder::destroy($id)) {
            return "1";
        }else{
            return "2";
        }
    }

    // 自定义删除:删除所有过期订单
    public function dels(Request $request){
        // 获取所有已过期和未支付的订单
        $data = Filmorder::where("payment","=","2") -> Orwhere("payment","=","0") -> get();
        foreach($data as $v){
            // 如果订单创建时间超过半小时，则删除
            // 过期的订单是一定超过了半小时的
            if ((strtotime($v -> created_at)+1800) < time()) {
                // 删除订单
                $id = $v -> id;
                $datas = Filmorder::destroy($id);
                echo "清除成功，ID:".$id;
            }
        }
        return redirect("/adminfilmorder");
    }

    // 自定义删除:删除所有已看过订单
    public function delss(Request $request){
        // 获取全部已支付的订单
        $data = Filmorder::where("payment","=","1") -> get();
        foreach($data as $v){
            // 获取订单内的电影场次id
            $film_id = $v -> film_id;
            // 用电影场次id获取电影场次
            $datas = DB::table("film_scene") -> where("id","=",$film_id) -> get();
            // 如果该场次为空
            if (empty($datas)) {
                // 直接删除该订单
                $id = $v -> id;
                $dataz = Filmorder::destroy($id);
                echo "清除成功，没有电影场次ID:".$film_id."，订单ID:".$id."<hr>";
            }else{
                // 如果不为空，则看完电影之后再删除
                // 获取电影场次中的电影id
                $filmid = $datas[0] -> film_id;
                // 将电影id去获得该电影
                $datafilm = DB::table("film") -> where("id","=",$filmid) -> get();
                // 获取电影的时长，加上电影场次的放映时间和观影时间
                $times = strtotime(($datas[0] -> hi).($datas[0] -> times)) + ($datafilm[0] -> times)*60;
                // 如果现在时间超过上面的时间，则删除订单
                if ($times < time()) {
                    $id = $v -> id;
                    $dataz = Filmorder::destroy($id);
                    echo "清除成功，没有电影场次ID:".$film_id."，订单ID:".$id."<hr>";
                    
                }
            }
            
        }
        return redirect("/adminfilmorder");
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
