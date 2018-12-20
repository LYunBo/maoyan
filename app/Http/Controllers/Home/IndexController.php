<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    public function __construct(Request $request){
    	$data = DB::table("cinema") ->select("city_id") -> distinct() -> get();
    	foreach($data as $v){
    		$datak[] = $v -> city_id;
    	}
    	$datas = DB::table("city") -> whereIn("id",$datak) -> get();
    	$i = 0;
    	foreach($datas as $v){
    		if ($v -> upid != "1" && $v -> upid != "9") {
    			$city[$i]["id"] = $v -> id;
    			$city[$i]["name"] = $v -> name;
    			$i++;
    		}
    	}
    	$city[$i]["id"] = "1";
    	$city[$i]["name"] = "北京";
    	$i++;
    	$city[$i]["id"] = "9";
    	$city[$i]["name"] = "上海";
    	session(["city" => $city]);
    	session(["citys" => $city[0]]);
    }
    public function index(Request $request){
    	return view("home.Index.index");
    }
    public function show(Request $request){
    	var_dump(expression)

    }
}
