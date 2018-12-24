<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

//导入模型类
use App\Models\Admin\Link;

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
        //广告
        $ad=DB::table('ad')->where('state','=','1')->where('look','=','1')->get();

        //正在热映      发送的是 film表的id
        $hot=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->select('film.id','film.name','film.score','film_relation.cover')->where('playback_status','like','%0%')->limit(8)->get();

        //即将上映      发送的是 film表的id
        $ready=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->select('film.id','film.name','film.score','film_relation.cover','film.box_office','film.ymd')->where('playback_status','like','%1%')->limit(8)->get();

        //最热排行
        $first=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->select('film.id','film.name','film.score','film_relation.cover','film.box_office')->where('playback_status','like','%0%')->orderBy('box_office','desc')->limit(1)->get();

        $two=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%0%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(1)->limit(1)->get();

        $three=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%0%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(2)->limit(1)->get();

        $pf4=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%0%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(3)->limit(1)->first();

        $pf5=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%0%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(4)->limit(1)->first();

        $pf6=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%0%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(5)->limit(1)->first();

        $pf7=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%0%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(6)->limit(1)->first();

        $pf8=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%0%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(7)->limit(1)->first();

        $pf9=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%0%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(8)->limit(1)->first();

        $pf10=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%0%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(9)->limit(1)->first();

        //最受期待
        $firsts=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->select('film.id','film.name','film.score','film_relation.cover','film.box_office','ymd')->where('playback_status','like','%1%')->orderBy('box_office','desc')->limit(1)->first();

        $twos=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->select('film.id','film.name','film.score','film_relation.cover','film.box_office')->where('playback_status','like','%1%')->orderBy('box_office','desc')->offset(1)->limit(1)->first();

        $threes=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->select('film.id','film.name','film.score','film_relation.cover','film.box_office')->where('playback_status','like','%1%')->orderBy('box_office','desc')->offset(2)->limit(1)->first();

        $qd4=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%1%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(3)->limit(1)->first();

        $qd5=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%1%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(4)->limit(1)->first();

        $qd6=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%1%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(5)->limit(1)->first();

        $qd7=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%1%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(6)->limit(1)->first();

        $qd8=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%1%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(7)->limit(1)->first();

        $qd9=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%1%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(8)->limit(1)->first();

        $qd10=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->where('playback_status','like','%1%')->select('film.id','film.name','box_office')->orderBy('box_office','desc')->offset(9)->limit(1)->first();

        // top100
        $top1=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->select('film.id','film.name','film.score','film_relation.cover')->where('playback_status','like','%2%')->orderBy('score','desc')->limit(1)->first();

        $top2=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->select('film.id','film.name','film.score')->where('playback_status','like','%2%')->orderBy('score','desc')->offset(1)->limit(1)->first();
        $top3=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->select('film.id','film.name','film.score')->where('playback_status','like','%2%')->orderBy('score','desc')->offset(2)->limit(1)->first();

        $top=DB::table('film_relation')->join('film','film_relation.id','=','film.relation_id')->select('film.id','film.name','film.score')->where('playback_status','like','%2%')->orderBy('score','desc')->offset(3)->limit(7)->get();


        // var_dump($ready);exit;
        
        // dd($ad);
        // var_dump($three);
        // exit;
        return view('home.Index.index',['ad'=>$ad,'hot'=>$hot,'ready'=>$ready,'first'=>$first,'two'=>$two,'three'=>$three,'pf4'=>$pf4,'pf5'=>$pf5,'pf6'=>$pf6,'pf7'=>$pf7,'pf8'=>$pf8,'pf9'=>$pf9,'pf10'=>$pf10,'firsts'=>$firsts,'twos'=>$twos,'threes'=>$threes,'qd4'=>$qd4,'qd5'=>$qd5,'qd6'=>$qd6,'qd7'=>$qd7,'qd8'=>$qd8,'qd9'=>$qd9,'qd10'=>$qd10,'top1'=>$top1,'top2'=>$top2,'top3'=>$top3,'top'=>$top]);
    }
    public function show($id){
    	$data = DB::table("city") -> where("id","=",$id) -> get();
    	$arr["id"] = $id;
    	$arr["name"] = $data[0] -> name;
    	// var_dump($arr);
    	session(["citys" => $arr]);
    	var_dump(session("citys"));
    	return back();
    }

    //友情链接添加
    public function urladd(Request $request)
    {
        //
        $data=$request->except(['_token']);
        // var_dump($data);exit;
        $result=link::create($data);
        if($result){
            return redirect('/');
        }else{
            return back()->with('error','提交信息有误,请重新提交');
        }
    }


    
}
