<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FilmCinemaController extends Controller
{
    public function index(){

    }

    public function film_show_cinema(Request $request){
    	// 判断是否有上传电影的id参数
    	if (!$request -> has("id")) {
    		// 没有返回首页
    		return redirect("/");
    	}
    	// 有先存起来
    	$id = $request -> input("id");
    	// 判断是否上传了二级的城市id参数
    	if ($request -> has("city_id")) {
    		$city["id"] = $request -> input("city_id");
    	}else{
	    	// 获取session的city值
	    	$city = session("citys");
	    }
	    // 判断是否有上传电影品牌
	    if ($request -> has("brand")) {
	    	$brand = $request -> input("brand");
	    }else{
	    	$brand = "";
	    }
	    
    	// 判断传过来的id是否为0，是则表示遍历电影院
    	if ($request -> input("id") == "0") {
    		// 判断特殊直辖市
    		if ($city["id"] == "1" || $city["id"] == "9") {
    			// 查询北京市或者上海市以下的区
    			$city_s = DB::table("city") -> where("upid","=",$city["id"]) -> get();
    			foreach($city_s as $v){
    				// 把所有的区的id存起来
    				$city_s_id[] = $v -> id;
    			}
    			// 查询时电影院的city_id是否在里面
    			$data = DB::table("cinema") -> whereIn("city_id",$city_s_id)  -> where("brand","like","%".$brand."%") -> get();
    		}else{
    			// 若不是直辖市，则直接city_id等于session存的id即可
	    		$data = DB::table("cinema") -> where("city_id","=",$city["id"]) -> get();
	    	}


	    	return view("home.Film_show_cinema.index",["id" => $id,"data" => $data,"film_scene_hi" => "","brand" => $brand]);
    	}
    	// var_dump($data); 要用
    	// var_dump($city_s); 要用
    	if ($request -> input("id") != "0") {
    		// 查询单个电影的
    		// 多表查询film和film_relation
	        $datas = DB::table("film") -> join("film_relation","film.relation_id","=","film_relation.id") -> select("film.*","film_relation.*") -> where("film.id","=",$id) -> get();
	        // 便于静态的遍历使用的数组
	        $status = ["0" => "大陆", "1" => "美国", "2" => "韩国", "3" => "日本", "4" => "中国香港", "5" => "中国台湾", "6" => "泰国", "7" => "印度", "8" => "法国", "9" => "英国", "10" => "俄罗斯", "11" => "意大利", "12" => "西班牙", "13" => "德国", "14" => "波兰", "15" => "澳大利亚", "16" => "伊朗", "17" => "其他"];
	        $statusz = ["0" => "爱情","1" => "喜剧","2" => "动画","3" => "剧情","4" => "恐怖","5" => "惊悚","6" => "科幻","7" => "动作","8" => "悬疑","9" => "犯罪","10" => "冒险","11" => "战争","12" => "奇幻","13" => "运动","14" => "家庭","15" => "古装","16" => "武侠","17" => "西部","18" => "历史","19" => "传记","20" => "歌舞","21" => "黑色电影","22" => "短片","23" => "纪录片","24" => "其他"];
	        // 类型一般不止一种，拆开来
	        $type = explode(",",$datas["0"] -> type_id);
	        foreach($type as $v){
	        	// 将对应的状态的中文值写入
	        	$types[] = $statusz[$v];
	        }
	        // 再合起来
	        $datas["0"] -> type_id = implode(",",$types);
	        // 直接替代区域的中文
	        $datas["0"] -> district_id = $status[$datas["0"] -> district_id];


	        // 查询上面的电影所在地区所拥有的电影院信息
	        // 要用的条件
	        // 这个是电影id $id

	        // 所在区域 定位地区所拥有的电影院
	        // 判断特殊直辖市
    		if ($city["id"] == "1" || $city["id"] == "9") {
    			// 查询北京市或者上海市以下的区
    			$city_s = DB::table("city") -> where("upid","=",$city["id"]) -> get();
    			foreach($city_s as $v){
    				// 把所有的区的id存起来
    				$city_s_id[] = $v -> id;
    			}
    			// 查询时电影院的city_id是否在里面
    			$data_cinema = DB::table("cinema") -> whereIn("city_id",$city_s_id) -> get();
    		}else{
    			// 若不是直辖市，则直接city_id等于session存的id即可
	    		$data_cinema = DB::table("cinema") -> where("city_id","=",$city["id"]) -> get();
	    	}
	    	
	    	// 查询该电影所拥有的所有电影场次
	    	$film_scene = DB::table("film_scene") -> where("film_id","=",$id) -> get();
    	}
    	// 获取到的数据是
    	// $data_cinema是所有的电影院
    	// $id是电影id
    	// $datas是电影信息
    	// $film_scene是对应电影id的所有电影场次
    	// $film_scene_s是对应电影id的剩余的所有电影场次

    	// 获取所有的场次日期
    	$film_scene_hi = array();
    	foreach($film_scene as $v){
    		if (!in_array($v -> hi,$film_scene_hi)) {
    			// 所有的电影日期
    			$film_scene_hi[] = $v -> hi;
    		}
    	}
    	// 具体日期以及选择了的日期
    	if ($request -> has("film_scene_hi_s")) {
    		$film_scene_hi_s = $request -> input("film_scene_hi_s");
    	}else{
    		$film_scene_hi_s = $film_scene_hi["0"];
    	}
    	// 电影场次的播放时间与上面一致
    	$film_scene_s = array();
    	foreach($film_scene as $v){
    		if ($v -> hi == $film_scene_hi_s) {
    			// 剩余的电影场次
    			$film_scene_s[] = $v;
    		}
    	}
    	// 电影品牌
    	// 获取所有的电影品牌
    	$data_cinema_brand = array();
    	foreach($data_cinema as $v){
    		if (in_array($v -> brand,$data_cinema_brand)) {
    			$data_cinema_brand[] = $v -> brand;
    		}
    	}
    	// 特殊厅



        // 这个区域的所有电影院是$data_cinema
        // 获取$film_scene_s对应的电影院的信息
        // 为了防止没有数据存到$data内
        $film_scene_s_cinema_id = array();
        foreach ($film_scene_s as $v) {
        	// 存储剩余电影场次的电影院id
        	if (!in_array($v -> cinema_id,$film_scene_s_cinema_id)) {
        		$film_scene_s_cinema_id[] = $v -> cinema_id;
        	}
        }
        $data = array();
        foreach($data_cinema as $v){
        	if (in_array($v -> id,$film_scene_s_cinema_id)) {
        		$data[] = $v;
        	}
        }
    	// 这个区域的所有电影院是$data_cinema
        // 获取$film_scene_s对应的电影院的信息
        // 为了防止没有数据存到$data内
        // $data = array();
        // foreach($data_cinema as $v){
        // 	if (in_array($v -> id,$film_scene_s)) {
        // 		$data[] = $v;
        // 	}
        // }
    	return view("home.Film_show_cinema.index",["id" => $id,"data" => $data,"datas" => $datas,"film_scene" => $film_scene,"film_scene_hi" => $film_scene_hi,"film_scene_hi_s" => $film_scene_hi_s,"city_id" => $city["id"],"brand" => $brand,"data_cinema_brand" => $data_cinema_brand]);
    	
    }
}

