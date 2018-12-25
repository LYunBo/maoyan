<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use helper;
use payment;
class FilmCinemaController extends Controller
{
    public function index(Request $request){
        // 获取电影id
        if ($request -> has("film_id")) {
            $film_id = $request -> input("film_id");
        }else{
            $film_id = "0";
        }
        // 获取电影院id
        $cinema_id = $request -> input("cinema_id");
        // 查询电影院数据
        $data_cinema = DB::table("cinema") -> where("id","=",$cinema_id) -> get();
        // 查询该电影院的所有电影场次
        $data_scene = DB::table("film_scene") -> join("film","film_scene.film_id","=","film.id") -> join("film_relation","film.relation_id","=","film_relation.id") -> join("projection_hall","film_scene.projection_hall_id","=","projection_hall.id") -> select("film.*","film_relation.*","film_scene.*","film.times as timess","projection_hall.name as projection_hall_name") -> where("film_scene.cinema_id","=",$cinema_id) -> get();
        $type = ["0" => "爱情","1" => "喜剧","2" => "动画","3" => "剧情","4" => "恐怖","5" => "惊悚","6" => "科幻","7" => "动作","8" => "悬疑","9" => "犯罪","10" => "冒险","11" => "战争","12" => "奇幻","13" => "运动","14" => "家庭","15" => "古装","16" => "武侠","17" => "西部","18" => "历史","19" => "传记","20" => "歌舞","21" => "黑色电影","22" => "短片","23" => "纪录片","24" => "其他"];
        $language_s = ["1" => "国语2D","2" => "国语3D","3" => "原版2D","4" => "原版3D","5" => "英语2D","6" => "英语3D","7" => "日语2D","8" => "日语3D"
        ];
        foreach($data_scene as $v){
            $type_s = explode(",",$v -> type_id);
            foreach($type_s as $k => $value){
                $type_s[$k] = $type[$value];
            }
            $v -> type_id = implode(",",$type_s);
            $v -> language = $language_s[$v -> language];
        }
        // 将电影场次按电影id分开
        $data_scene_film_id = array();
        $i = 0;
        foreach($data_scene as $v){
            if (!in_array($v -> film_id,$data_scene_film_id)) {
                $data_scene_film_id[] = $v -> film_id;
            }
        }
        $data_scene_film_id_s = array();
        foreach($data_scene_film_id as $k => $v){
            foreach($data_scene as $value){
                if ($value -> film_id == $v) {
                    $data_scene_film_id_s[$k][] = $value;
                }
            }
        }

        
        // 存储电影场次，按时间不同分第二层
        $data_scene_hi_s = array();
        // 将电影场次的时间存起来
        foreach($data_scene_film_id_s as $k => $v){
            // 预先准备两个空数组预防报错
            // 存储电影场次的不同时间
            $data_scene_hi = array();
            foreach($v as $value){
                if (!in_array($value -> hi,$data_scene_hi)) {
                    $data_scene_hi[] = $value -> hi;
                } 
            }
            // var_dump($v);
            foreach($data_scene_hi as $key => $v_s){
                foreach($v as $value){
                    if ($value -> hi == $v_s) {
                        $data_scene_hi_s[$k][$key][] = $value;
                    }
                }
            }
            // var_dump($data_scene_hi_s);
        }

        // 将电影院的服务拆开来
        // 3D眼镜
        $service1 = ["0" => "无","1" => "免押金","2" => "5元/副","3" => "3元/副起步"];
        // 儿童优惠
        $service2 = ["0" => "无","1" => "1.3m（不含）以下2D\3D免费，需由1名成人陪同"];
        // 停车
        $service3 = ["0" => "无","1" => "影院地下停车场可停车","2" => "看电影免费停车3小时"];
        $service = explode(",",$data_cinema[0] -> service);
        $service[0] = $service1[$service[0]];
        $service[1] = $service2[$service[1]];
        $service[2] = $service3[$service[2]];
        // 电影信息$film
        // 电影院信息$data_cinema
        // 电影院的三个服务
        // 电影$data_scene_hi_s，按电影id分开后再按时间分开，三维数组
        // var_dump($data_scene_hi_s[0]);
        return view("home.Film_scene.index",["data_cinema" => $data_cinema,"service" => $service,"data" => $data_scene_hi_s,"film_id" => $film_id]);
    }

    public function film_show_cinema(Request $request){
        // 特殊厅
        // 这是所有的放映厅
        $projection_hall_type =array(
        "1" => "IMAX厅","2" => "CGS中国巨幕厅","3" => "杜比全景声厅","4" => "RealD厅","5" => "RealD","6" => "6FL厅","7" => "LUXE巨幕厅","8" => "4DX厅","9" => "DTS:X","10" => "临境音厅","11" => "儿童厅","12" => "4K厅","13" => "4D厅","14" => "巨幕厅");
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
	    // 获取所有定位的下一级城市
	    $city_all_s = DB::table("city") -> where("upid","=",session("citys")["id"]) -> get();
	    // 判断是否有上传电影品牌
	    if ($request -> has("brand")) {
	    	$brand = $request -> input("brand");
	    }else{
	    	$brand = "";
	    }
	    
	    // 判断是否上传类型id参数
	    if ($request -> has("type_id")) {
	    	$type_id = $request -> input("type_id");
	    }else{
	    	$type_id = "";
	    }

	    // 电影品牌
    	// 获取所有的电影品牌
    	$data_cinema_brand = array();
    	$data_all_cinema = DB::table("cinema") -> get();
    	foreach($data_all_cinema as $v){
    		// var_dump($v -> brand);
    		if (!in_array($v -> brand,$data_cinema_brand)) {
    			$data_cinema_brand[] = $v -> brand;
    		}
    	}
    	// 判断传过来的id是否为0，是则表示遍历电影院
    	if ($request -> input("id") == "0") {
    		// 判断特殊直辖市
    		if (session("citys")["id"] == "1" || session("citys")["id"] == "9") {
    			// 查询北京市或者上海市以下的区
    			$city_s = DB::table("city") -> where("upid","=",session("citys")["id"]) -> get();
    			foreach($city_s as $v){
    				if ($v -> id == $city["id"]) {
    					$city_s_id = array();
    					$city_s_id[] = $city["id"];
    					break;
    				}
    				// 把所有的区的id存起来
    				$city_s_id[] = $v -> id;
    			}
    			if (empty($type_id)) {
    				// 查询时电影院的city_id是否在里面
	    			$data_cinema = DB::table("cinema") -> where("brand","like","%".$brand."%") -> whereIn("city_id",$city_s_id) -> where("brand","like","%".$brand."%") -> get();
    			}else{
	    			// 查询时电影院的city_id是否在里面
	    			$data_cinema = DB::table("cinema") -> where("brand","like","%".$brand."%") -> whereIn("city_id",$city_s_id) -> where("brand","like","%".$brand."%") -> get();
	    		}	
    		}else{
                $city_name = DB::table("city") -> where("id","=",$city["id"]) -> get();
                if ($city_name["0"] -> id != session("citys")["id"]) {
                    $data_cinema = DB::table("cinema") -> where("brand","like","%".$brand."%") -> where("address","like",$city_name["0"] -> name."%") -> get();
                }else{
                    $data_cinema = DB::table("cinema") -> where("brand","like","%".$brand."%") -> where("city_id","=",$city["id"]) -> get();
                }
	    	}

            $data_cinema_id = array();
            foreach($data_cinema as $v){
                // 先把电影院id存起来
                $data_cinema_id[] = $v -> id;
            }
            // 处理电影院播放厅的选择
            if (!empty($type_id)) {
                $projection_hall = DB::table("projection_hall") -> where("type","=",$type_id) -> get();
                $data_cinema_id_type = array();
                foreach($projection_hall as $v){
                    if (in_array($v -> cinema_id,$data_cinema_id)) {
                        $data_cinema_id_type[] = $v -> cinema_id;
                    }
                }
                $data_cinema = DB::table("cinema") -> whereIn("id",$data_cinema_id_type) -> get();
            }
            $data = $data_cinema;
	    	return view("home.Film_show_cinema.index",["id" => $id,"data" => $data,"film_scene_hi" => "","brand" => $brand,"film_scene_hi_s" => "","city_id" => $city["id"],"city_all_s" => $city_all_s,"brand" => $brand,"data_cinema_brand" => $data_cinema_brand,"type_id" => $type_id,"types" => $projection_hall_type]);
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
            if (session("citys")["id"] == "1" || session("citys")["id"] == "9") {
                // 查询北京市或者上海市以下的区
                $city_s = DB::table("city") -> where("upid","=",session("citys")["id"]) -> get();
                foreach($city_s as $v){
                    if ($v -> id == $city["id"]) {
                        $city_s_id = array();
                        $city_s_id[] = $city["id"];
                        break;
                    }
                    // 把所有的区的id存起来
                    $city_s_id[] = $v -> id;
                }
                if (empty($type_id)) {
                    // 查询时电影院的city_id是否在里面
                    $data_cinema = DB::table("cinema") -> where("brand","like","%".$brand."%") -> whereIn("city_id",$city_s_id) -> where("brand","like","%".$brand."%") -> get();
                }else{
                    // 查询时电影院的city_id是否在里面
                    $data_cinema = DB::table("cinema") -> where("brand","like","%".$brand."%") -> whereIn("city_id",$city_s_id) -> where("brand","like","%".$brand."%") -> get();
                }   
            }else{
                $city_name = DB::table("city") -> where("id","=",$city["id"]) -> get();
                if ($city_name["0"] -> id != session("citys")["id"]) {
                    $data_cinema = DB::table("cinema") -> where("brand","like","%".$brand."%") -> where("address","like",$city_name["0"] -> name."%") -> get();
                }else{
                    $data_cinema = DB::table("cinema") -> where("brand","like","%".$brand."%") -> where("city_id","=",$city["id"]) -> get();
                }
            }

            $data_cinema_id = array();
            foreach($data_cinema as $v){
                // 先把电影院id存起来
                $data_cinema_id[] = $v -> id;
            }
            // 处理电影院播放厅的选择
            if (!empty($type_id)) {
                $projection_hall = DB::table("projection_hall") -> where("type","=",$type_id) -> get();
                $data_cinema_id_type = array();
                foreach($projection_hall as $v){
                    if (in_array($v -> cinema_id,$data_cinema_id)) {
                        $data_cinema_id_type[] = $v -> cinema_id;
                    }
                }
                $data_cinema = DB::table("cinema") -> whereIn("id",$data_cinema_id_type) -> get();
            }
            // 再次将电影院id存起来，应为若有类型现在，现在的id会有减少
            $data_cinema_id = array();
            foreach($data_cinema as $v){
                // 先把电影院id存起来
                $data_cinema_id[] = $v -> id;
            }
            // 查询该电影所拥有的所有电影场次
            $film_scene = DB::table("film_scene") -> where("film_id","=",$id) -> get();
            // 判断，电影场次的电影院id是否在剩余的电影院id内
            $data_cinema_id_film_scene_id = array();
            foreach($film_scene as $v){
                if (in_array($v -> cinema_id,$data_cinema_id)) {
                    // 将符合条件的id存起来
                    $data_cinema_id_film_scene_id[] = $v -> cinema_id;
                }
            }
            // 这是选择之后剩余的电影院
            $data_cinema = DB::table("cinema") -> whereIn("id",$data_cinema_id_film_scene_id) -> get();
        }
    	// 获取到的数据是
    	// $data_cinema是所有的电影院
    	// $id是电影id
    	// $datas是电影信息
        // $type_id是播放厅的id
    	// $film_scene是对应电影id的所有电影场次

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
    		if (empty($film_scene_hi)) {
    			$film_scene_hi_s = "";
    		}else{
	    		$film_scene_hi_s = $film_scene_hi["0"];
	    	}
    	}
    	// 电影场次的播放时间与上面一致
    	$film_scene_s = array();
    	foreach($film_scene as $v){
    		if ($v -> hi == $film_scene_hi_s) {
    			// 剩余的电影场次
    			$film_scene_s[] = $v;
    		}
    	}
        // 这个区域的所有电影院是$data_cinema
        // 获取$film_scene_s对应的电影院的信息
        // 为了防止没有数据存到$data内
        // 避免重复电影
        $film_scene_s_cinema_id = array();
        foreach ($film_scene_s as $v) {
        	// 存储剩余电影场次的电影院id
        	if (!in_array($v -> cinema_id,$film_scene_s_cinema_id)) {
        		$film_scene_s_cinema_id[] = $v -> cinema_id;
        	}
        }
        // 将剩余场次的电影院id与这个区域所拥有的电影院做比对
        $data = array();
        foreach($data_cinema as $v){
        	if (in_array($v -> id,$film_scene_s_cinema_id)) {
        		// 电影院信息
        		$data[] = $v;
        	}
        }
    	return view("home.Film_show_cinema.index",["id" => $id,"data" => $data,"datas" => $datas,"film_scene" => $film_scene,"film_scene_hi" => $film_scene_hi,"film_scene_hi_s" => $film_scene_hi_s,"city_id" => $city["id"],"city_all_s" => $city_all_s,"brand" => $brand,"data_cinema_brand" => $data_cinema_brand,"type_id" => $type_id,"types" => $projection_hall_type]);
    	
    }


    public function film_order(Request $request){
        // 判断是否有选择电影场次
        if (!$request -> has("film_scene_id")) {
            // 返回到首页
            return redirect("/films");
        }
        // 先注释，后面记得去掉注释
        // 判断是否有登陆成功的用户id
        if (!empty(session("id"))) {
            // 为空返回首页
            return redirect("/hlogin");
        }
        // 获取电影场次id
        $film_scene_id = $request -> input("film_scene_id");
        // 获取电影场次数据
        $film_scene = DB::table("film_scene") -> join("film","film_scene.film_id","=","film.id") -> join("film_relation","film.relation_id","=","film_relation.id") -> join("cinema","film_scene.cinema_id","=","cinema.id") -> join("projection_hall","film_scene.projection_hall_id","=","projection_hall.id") -> select("film_scene.*","film.*","film_relation.*","cinema.*","projection_hall.*","cinema.name as cinema_name","film.name as film_name","projection_hall.type as projection_hall_type","film_relation.cover as film_relation_cover","film_scene.id as film_scene_id") -> where("film_scene.id","=",$film_scene_id) -> get();

        $type = ["0" => "爱情","1" => "喜剧","2" => "动画","3" => "剧情","4" => "恐怖","5" => "惊悚","6" => "科幻","7" => "动作","8" => "悬疑","9" => "犯罪","10" => "冒险","11" => "战争","12" => "奇幻","13" => "运动","14" => "家庭","15" => "古装","16" => "武侠","17" => "西部","18" => "历史","19" => "传记","20" => "歌舞","21" => "黑色电影","22" => "短片","23" => "纪录片","24" => "其他"];
        $language_s = ["1" => "国语2D","2" => "国语3D","3" => "原版2D","4" => "原版3D","5" => "英语2D","6" => "英语3D","7" => "日语2D","8" => "日语3D"
        ];
        $projection_hall_type = ["1" => "IMAX厅","2" => "CGS中国巨幕厅","3" => "杜比全景声厅","4" => "RealD厅","5" => "RealD","6" => "6FL厅","7" => "LUXE巨幕厅","8" => "4DX厅","9" => "DTS:X","10" => "临境音厅","11" => "儿童厅","12" => "4K厅","13" => "4D厅","14" => "巨幕厅"
        ];
        foreach($film_scene as $v){
            $type_s = explode(",",$v -> type_id);
            foreach($type_s as $k => $value){
                $type_s[$k] = $type[$value];
            }
            $v -> type_id = implode(",",$type_s);
            $v -> language = $language_s[$v -> language];
            $v -> projection_hall_type = $projection_hall_type[$v -> projection_hall_type];
        }
        // var_dump($film_scene);
        $seat = $film_scene[0] -> seat;
        $seat = explode(",",$seat);
        return view("home.film_order.index",["data" => $film_scene,"seat" => $seat]);
    }
    // 短信验证
    public function duanxin(Request $request){
        if (!$request -> has("phone")) {
            return "2";
        }
        $phone = $request -> input("phone");
        $num = rand(1000,9999);
        $data = new helper();
        if($data -> sendsphone($phone,$num)){
            return $num;
        }
    }

    public function add_order(Request $request){
        // echo $request -> input("code");
        if ($request -> input("code") == "") {
            return 2;
        }
        if (!$request -> has("code")) {
            return 2;
        }
        if ($request -> input("code") != \Cookie::get("code")) {
            // echo $request -> input("code");
            return 2;
        }
        $num = $request -> input("phone").time().rand(10000,99999);
        $name = $request -> input("name_s");
        $money = $request -> input("money");
        $comment = "测试电影购票";
        $seat = rtrim($request -> input("seat"),",");
        $phone = $request -> input("phone");
        $film_scene_id = $request -> input("film_scene_id");
        $data = DB::table("film_scene") -> where("id","=",$film_scene_id) -> get();
        if ($money / $data[0] -> price != count(explode(",",$seat))) {
            return 3;
        }
        $data = new payment;
        // 测试用的金额
        // $money = "0.01";
        $data -> fun($num,$name,$money,$comment,$seat,$film_scene_id,$phone);
    }

    public function return_url(Request $request,$film_scene_id,$seat,$num,$money,$phone){

        // 用户id
        $user_id = session("id");
        // 电影场次id
        $film_id = $film_scene_id;
        // 订单号
        $order_number = $num;
        // 总数额
        // $money
        // 座位$seat
        // 用场次id查询场次
        $film_scene = DB::table("film_scene") -> where("id","=",$film_id) -> get();
        // 去除一张票的金额，总金额除去一张票的金额，一次确认票数
        $price = $film_scene[0] -> price;
        // 票数
        $num_s = $money/$price;
        // 座位数
        $seat_num = count(explode(",",$seat));

        // 价格验证，不测试的话要开启
        if ($num_s != $seat_num) {
            echo "失败";
            return false;
        }

        if ($data = DB::table("order") -> insert(["user_id" => $user_id,"film_id" => $film_id,"order_number" => $order_number,"price" => $price,"payment" => "1","num" => $num_s,"phone" => $phone,"seat_num" => $seat])) {
            // echo "成功";
            return view("home.Film_order.sueecss") -> with("success","订单支付成功");
        }else{
            // echo "失败";
            return view("home.Film_order.sueecss") -> with("success","订单支付失败");
        }
        
    }

}

