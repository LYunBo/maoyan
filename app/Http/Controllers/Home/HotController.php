<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class HotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //最新资讯
        $data=DB::table('hotnews')->orderBy('created_at','desc')->limit(6)->get();

        // 热门资讯
        $max=DB::table('hotnews')->orderBy('browse','desc')->limit(1)->get();

        $two=DB::table('hotnews')->orderBy('browse','desc')->offset(1)->limit(1)->get();
        $three=DB::table('hotnews')->orderBy('browse','desc')->offset(2)->limit(1)->get();

        $p4=DB::table('hotnews')->orderBy('browse','desc')->offset(3)->limit(1)->get();
        $p5=DB::table('hotnews')->orderBy('browse','desc')->offset(4)->limit(1)->get();
        $p6=DB::table('hotnews')->orderBy('browse','desc')->offset(5)->limit(1)->get();
        $p7=DB::table('hotnews')->orderBy('browse','desc')->offset(6)->limit(1)->get();
        $p8=DB::table('hotnews')->orderBy('browse','desc')->offset(7)->limit(1)->get();
        $p9=DB::table('hotnews')->orderBy('browse','desc')->offset(8)->limit(1)->get();
        $p10=DB::table('hotnews')->orderBy('browse','desc')->offset(9)->limit(1)->get();
        
        //热门预告片
        $yg1=DB::table('notice')->orderBy('browse','desc')->limit(1)->get();
        $yg2=DB::table('notice')->orderBy('browse','desc')->offset(1)->limit(1)->get();
        $yg3=DB::table('notice')->orderBy('browse','desc')->offset(2)->limit(1)->get();
        $yg4=DB::table('notice')->orderBy('browse','desc')->offset(3)->limit(1)->get();
        $yg5=DB::table('notice')->orderBy('browse','desc')->offset(4)->limit(1)->get();

        //预告速递
        $yg=DB::table('notice')->orderBy('browse')->limit(5)->get();


        // 图集
        $tj=DB::table('imgs')->limit(4)->get();

        // $v=DB::table('imgs')->value('img');
        // dd($v);
        
        // var_dump($c);
        // dd();
        return view('home.hot.index',['data'=>$data,'max'=>$max,'two'=>$two,'three'=>$three,'p4'=>$p4,'p5'=>$p5,'p6'=>$p6,'p7'=>$p7,'p8'=>$p8,'p9'=>$p9,'p10'=>$p10,'yg1'=>$yg1,'yg2'=>$yg2,'yg3'=>$yg3,'yg4'=>$yg4,'yg5'=>$yg5,'yg'=>$yg,'tj'=>$tj]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $zx=DB::table('hotnews')->paginate(5);
        return view('home.hot.tab2',['zx'=>$zx]);
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
        //
        $yg=DB::table('notice')->paginate(6);
        
        return view('home.hot.tab3',['yg'=>$yg]);
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
        $tj=DB::table('imgs')->paginate(6);
        return view('home.hot.tab4',['tj'=>$tj]);
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

    //返回预告的显示页面
    public function video($id){
        // var_dump($id);
        $list = DB::table('notice')->join('film','notice.film_id','=','film.id')->Select('notice.*','film.ymd as film_hi')->where('notice.id','=',$id)->first();
        // var_dump($list);
        //相关视频
        // $tol = DB::table('notice')->limit(5)->count();
        $data = DB::table('notice')->where('id','!=',$id)->limit(5)->get();
        $tol = $data->count();
        /*echo $tol;
        var_dump($data);*/
        //返回视频播放页
        return view('home.hot.showvideo',['list'=>$list,'tol'=>$tol,'data'=>$data]);
    }
}
                                            