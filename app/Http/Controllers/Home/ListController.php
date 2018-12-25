<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ListController extends Controller
{
    public function index(Request $request){
    	if ($request -> has("name")) {
    		$name = $request -> input("name");
    	}else{
    		$name = "";
    	}
    	if (!$request -> has("id")) {
    		$id = "1";
    	}else{
    		$id = $request -> input("id");
    	}
    	if ($id == "1") {
    		$where = "film.score";
    	}elseif($id == "2"){
    		$where = "film.box_office";
    	}elseif($id == "3"){
    		$where = "film.id";
    	}else{
    		return redirect("/");
    	}
    	$data = DB::table("film") -> join("film_relation","film.relation_id","=","film_relation.id") -> where("film.name","like","%".$name."%") -> orderBy($where,"desc") -> paginate(10);
    	return view("home.List.index",["data" => $data,"request" => $request -> all(),"id" => $id]);
    }
}
