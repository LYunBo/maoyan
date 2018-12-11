<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\AdminFilminserts;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 电影列表页面
    public function index(Request $request)
    {
        // 获取搜索提交信息
        $name = $request -> input("name");
        // 获取film电影表数据
        $data = DB::table("film") -> where("name","like","%".$name."%") -> paginate(3);
        // 查看film表数据有多少条
        $counts = DB::table("film") -> where("name","like","%".$name."%") -> count();
        // 传参
        return view("admin.Film.list",["data" => $data,"counts" => $counts,"request" => $request -> all()]);
    }

    // 电影详情
    public function films($id)
    {
        // 获取电影详情film_relation表的信息
        $data = DB::table("film_relation") -> where("id","=",$id) -> get();
        // 循环获取film_relation内的演员人员id，performer_id字段
        foreach($data as $kk){
            $str = $kk -> performer_id;
            // 将区域赋值中文
            $status = ["0" => "大陆", "1" => "美国", "2" => "韩国", "3" => "日本", "4" => "中国香港", "5" => "中国台湾", "6" => "泰国", "7" => "印度", "8" => "法国", "9" => "英国", "10" => "俄罗斯", "11" => "意大利", "12" => "西班牙", "13" => "德国", "14" => "波兰", "15" => "澳大利亚", "16" => "伊朗", "17" => "其他"];
            $kk -> district_id = $status[$kk -> district_id];
            // 将状态赋值中文
            $statusk = ["0" => "热播","1" => "未播放","2" => "经典"];
            $kk -> playback_status = $statusk[$kk -> playback_status];
            // 将类型赋值中文
            $statusz = ["0" => "爱情","1" => "喜剧","2" => "动画","3" => "剧情","4" => "恐怖","5" => "惊悚","6" => "科幻","7" => "动作","8" => "悬疑","9" => "犯罪","10" => "冒险","11" => "战争","12" => "奇幻","13" => "运动","14" => "家庭","15" => "古装","16" => "武侠","17" => "西部","18" => "历史","19" => "传记","20" => "歌舞","21" => "黑色电影","22" => "短片","23" => "纪录片","24" => "其他"];
            $strings = explode(",",$kk -> type_id);
            foreach($strings as $v){
                $stringz[] = $statusz[$v];
            }
            $stringz = implode(",",$stringz);
            $kk -> type_id = $stringz;
        }
        // 将获取的演员id变成数组
        $str = explode(",",$str);
        // 将演员id的字段来查询演员表performer，获取演员信息
        $str = DB::table("performer") -> whereIn("id",$str) -> get();
        return view("admin.Film.film_relation",["data" => $data,"str" => $str]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // 添加电影页面
    public function create()
    {
        return view("admin.Film.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminFilminserts $request)
    {
        // $request -> get("name");//电影名称
        // $request -> get("ymd");//放映时间
        // $request -> get("times");//电影时长
        // $request -> get("years");//电影年代
        // $request -> get("district_id");//区域
        // $request -> get("type_id");//类型
        // $request -> get("playback_status");//状态
        // $request -> get("film_img");//电影图集
        // $request -> get("cover");//电影封面
        // $request -> get("director");//导演名字
        // $request -> get("director_img");//导演头像
        // $request -> file("performer_img");//演员头像
        // $request -> get("film_introduce");//电影简介
        
        
        $performer_img = $request -> file("performer_img");
        // 获取演员图像名上的演员名字
        foreach($performer_img as $v){
            // 获取文件名
            $names = $v -> getClientOriginalName();
            // 获取文件后缀
            $houzhui = $v -> getClientOriginalExtension();
            // 后缀加.的长度
            $num = strlen($houzhui) +1;
            // 文件名长度
            $count = strlen($names);
            // 截取除了.后缀名的名字
            $name = substr($names,0,$count-$num);
            // 将演员插入并将头像移如指定文件夹内
            // 指定文件夹为public下的 /film/performer_img/时间文件
            // 预备储存文件夹
            $path = "./film/performer_img/".time().rand(100000,999999);
            // 预备文件名
            $filmname = time().rand(100000,999999).".".$houzhui;
            $v -> move($path,$filmname);
            // 插入performer演员表内，顺便返回插入时id
            if (!$id = DB::table("performer") -> insertgetId(["name" => $name,"img" => $path."/".$filmname])) {
                return back() -> with("error","演员添加失败");
            }
            // 将返回id存入$ids内
            $ids[] = $id;
        }
       
        
        // 将获取的封面图和导演头像、以及图集存入对应的文件夹内
        // 1，封面图
        // 对应的文件夹/film/cover/
        $cover = $request -> file("cover");
        // 获取封面图的后缀名
        $cover_houzhui = $cover -> getClientOriginalExtension();
        // 自定义名字
        $cover_name = time().rand(100000,999999).".".$cover_houzhui;
        // 自定义文件夹
        $cover_path = "/film/cover/".time().rand(100000,999999);
        // 移入文件夹内
        $cover -> move($cover_path,$cover_name);

        // 1，导演头像
        // 对应的文件夹/film/director_img/
        $director_img = $request -> file("director_img");
        // 获取封面图的后缀名
        $director_img_houzhui = $director_img -> getClientOriginalExtension();
        // 自定义名字
        $director_img_name = time().rand(100000,999999).".".$director_img_houzhui;
        // 自定义文件夹
        $director_img_path = "/film/director_img/".time().rand(100000,999999);
        // 移入文件夹内
        $director_img -> move($director_img_path,$director_img_name);

        
        // 1，电影图集
        // 对应的文件夹./film/film_img/
        $film_img = $request -> file("film_img");
        // 获取到的图集$film_img是一个多个的数组对象
        $i = 0;
        foreach($film_img as $v){
            // 获取单个的对象
            // 获取当个对象的文件后缀
            $film_img_houzhui = $v -> getClientOriginalExtension();
            // 不需要名字，因此自定义名字
            $film_img_name = time().rand(100000,999999).$i.".".$film_img_houzhui;
            // 自定义路径
            $film_img_path = "/film/film_img/".time().rand(100000,999999).$i;
            // 移入文件
            $v -> move($film_img_path,$film_img_name);
            // 应为后面插入数据要用到路径，且在数据库内是用,号链接，所以我们提前先存入数组中
            $film_imgs[] = $film_img_path."/".$film_img_name;

            $i++;
        }
        
        // 将地址用,号分开
        $film_imgs = implode(",",$film_imgs);
        
        // 将插入时获取的id存入$ids下
        $ids = implode(",",$ids);
        // 上面有注释
        $years = $request -> get("years");
        $district_id = $request -> get("district_id");
        $type_id = $request -> get("type_id");
        // 将获取到的类型合并成字符串
        $type_id = implode(",",$type_id);
        $playback_status = $request -> get("playback_status");
        $director = $request -> get("director");
        // 将有的数据插入到第二张表，电影关联表film_relation上
        if (!$idk = DB::table('film_relation') -> insertgetId(["years" => $years,"district_id" => $district_id,"type_id" => $type_id,"film_img" => $film_imgs,"cover" => $cover_path."/".$cover_name,"playback_status" => $playback_status,"director" => $director,"director_img" => $director_img_path."/".$director_img_name,"performer_id" => $ids])) {
            return back() -> with("error","失败");
        }
        
        // 获取film_relation表插入成功后返回的id
        $idkk = $idk;
        $name = $request -> get("name");
        $ymd = $request -> get("ymd");
        $times = $request -> get("times");
        // 票房和评分一开始的默认为0;
        $film_introduce = $request -> get("film_introduce");
        
        // 插入第三张表，电影表film
        if (DB::table("film") -> insert(["relation_id" => $idkk,"name" => $name,"ymd" => $ymd,"times" => $times,"film_introduce" => $film_introduce])) {
            return redirect("/adminfilmlist/create") -> with("success","成功");
        }else{
            return back() -> with("error","失败");
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
        // 用传过来的id获取三张表
        // film表
        $data = DB::table("film") -> where("id","=",$id) -> get();
        // film_relation
        $data1 = DB::table("film_relation") -> where("id","=",$data[0] -> relation_id) -> get();
        // performer
        // 将film_relation的演员id分开做数组
        $ids = explode(",",$data1[0] -> performer_id);
        $data2 = DB::table("film") -> whereIn("id",$ids) -> get();
        $string = $data1[0] -> type_id;
        $string = explode(",",$string);
        return view("admin.Film.edit",["data" => $data,"data1" => $data1,"type_id" => $string,"data2" => $data2]);
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
