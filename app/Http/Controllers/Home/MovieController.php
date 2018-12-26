<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
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
    public function show($id)
    {
        // 电影详情信息
        $data=DB::table('film')->join('film_relation','film.relation_id','=','film_relation.id')->where('film.id','=',$id)->first();

    // 影片类型
       $type = ["0" => "爱情","1" => "喜剧","2" => "动画","3" => "剧情","4" => "恐怖","5" => "惊悚","6" => "科幻","7" => "动作","8" => "悬疑","9" => "犯罪","10" => "冒险","11" => "战争","12" => "奇幻","13" => "运动","14" => "家庭","15" => "古装","16" => "武侠","17" => "西部","18" => "历史","19" => "传记","20" => "歌舞","21" => "黑色电影","22" => "短片","23" => "纪录片","24" => "其他"];
            // 变为数组
          $arr=explode(',',$data->type_id);
          $count=count($arr);

        $for='';
        for($i=0;$i<$count;$i++){
            $for.=$type[$arr[$i]].",";
        }
        $for=rtrim($for,',');


    //演员表图片
    $str=$data->performer_id;
    $arr=explode(',',$str);
    

    $per=DB::table('performer')->get();

        // var_dump($per);exit;
        // var_dump($arr);
        $perfor = array();
        foreach($per as $v){
            // var_dump($v);
            if (in_array($v -> id,$arr)) {
                $perfor[] = $v;
            }
        }

        $performer=array_slice($perfor,0,4);
        $count=count($performer);
        // var_dump($count);exit;
        // 
        

        //电影图
        //拿取图片,变成数组
        $filmimg=explode(',',$data->film_img);
        $filmarr=array_slice($filmimg,0,5);

        //演员大头照
        $c=count($perfor);
        // var_dump($filmimg);exit;
        
        //图集
        $cc=count($filmimg);


        //相关电影
        $sz=explode(',',$data->type_id);
        $num=count($sz);
        $data1=array();
        for($i=0;$i<$num;$i++){
        $data1=DB::table('film')->join('film_relation','film.relation_id','=','film_relation.id')->where('type_id','like','%'.$sz[$i].'%')->where('film.id','!=',$id)->limit(6)->get();
        }

        // var_dump($data1);exit;

        return view('home.Movie.index',['data'=>$data,'for'=>$for,'count'=>$count,'performer'=>$performer,'filmarr'=>$filmarr,'perfor'=>$perfor,'c'=>$c,'filmimg'=>$filmimg,'cc'=>$cc,'data1'=>$data1]);
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
