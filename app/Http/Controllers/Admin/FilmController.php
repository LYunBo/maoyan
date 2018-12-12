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
        $status = ["0" => "下架","1" => "上架"];
        foreach($data as $v){
            $v -> film_status = $status[$v -> film_status];
        }
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
        // $request -> get("film_status");//电影上下架
        
        
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
            $paths = substr($path,1);
            // var_dump($paths);
            // 预备文件名
            $filmname = time().rand(100000,999999).".".$houzhui;
            $v -> move($path,$filmname);
            // 插入performer演员表内，顺便返回插入时id
            if (!$id = DB::table("performer") -> insertgetId(["name" => $name,"img" => $paths."/".$filmname])) {
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
        $cover_path = "./film/cover/".time().rand(100000,999999);
        $cover_paths = substr($cover_path,1);
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
        $director_img_paths = substr($director_img_path,1);
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
            $film_img_path = "./film/film_img/".time().rand(100000,999999).$i;
            $film_img_paths = substr($film_img_path,1);
            // 移入文件
            $v -> move($film_img_path,$film_img_name);
            // 应为后面插入数据要用到路径，且在数据库内是用,号链接，所以我们提前先存入数组中
            $film_imgs[] = $film_img_paths."/".$film_img_name;

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
        if (!$idk = DB::table('film_relation') -> insertgetId(["years" => $years,"district_id" => $district_id,"type_id" => $type_id,"film_img" => $film_imgs,"cover" => $cover_paths."/".$cover_name,"playback_status" => $playback_status,"director" => $director,"director_img" => $director_img_paths."/".$director_img_name,"performer_id" => $ids])) {
            return back() -> with("error","失败");
        }
        
        // 获取film_relation表插入成功后返回的id
        $idkk = $idk;
        $name = $request -> get("name");
        $ymd = $request -> get("ymd");
        $times = $request -> get("times");
        // 票房和评分一开始的默认为0;
        $film_introduce = $request -> get("film_introduce");
        $film_status = $request -> get("film_status");
        // 插入第三张表，电影表film
        if (DB::table("film") -> insert(["relation_id" => $idkk,"name" => $name,"ymd" => $ymd,"times" => $times,"film_introduce" => $film_introduce,"film_status" => $film_status])) {
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
        $data2 = DB::table("performer") -> whereIn("id",$ids) -> get();
        // 将类型id分为数组，方便前台设置默认
        $string = $data1[0] -> type_id;
        $string = explode(",",$string);

        // 将$data1的图集字段film_img分为数组
        $film_img = explode(",",$data1[0] -> film_img);

        
        return view("admin.Film.edit",["data" => $data,"data1" => $data1,"type_id" => $string,"data2" => $data2,"film_img" => $film_img]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改中双击删除图集
    public function delfilmimg(Request $request){
        // 获取要删除图集的id
        $id = $request -> input("id");
        // 获取要删除的某张图的地址
        $film_img_only = $request -> input("imgs");
        // 如果传参是空的，则改film_img改成空的
        if (empty($film_img_only)) {
            // 将film_img字段改成新内容
            if(DB::table("film_relation") -> where("id","=",$id) -> update(["film_img" => $film_img_only])){
                // 成功返回1
                return "1";
            }else{
                // 失败返回2
                return "2";
            }
        }
        // 按照id来查询film_relation表
        $data = DB::table("film_relation") -> where("id","=",$id) -> get();  
        // 准确获取到film_relation表内的film_img字段
        $film_img = $data[0] -> film_img;
        // 将film_img字段按,号拆开成数组
        $film_img = explode(",",$film_img);
        // 再将数组重新写入另一个空数组内
        foreach($film_img as $v){
            if ($v != $film_img_only) {
                // 如果和传过来要删除的某张图的地址不一致，则写入新数组内
                $film_imgs[] = $v;
            }
        }
        // 将新数组组装起来，准备当成film_img字段新内容
        $film_imgs = implode(",",$film_imgs);
        // 将film_img字段改成新内容
        if(DB::table("film_relation") -> where("id","=",$id) -> update(["film_img" => $film_imgs])){
            // 成功返回1
            echo "1";
        }else{
            // 失败返回2
            echo "2";
        }
        
    }
    // 修改中双击删除演员头像
    public function performerimg(Request $request){
        // 获取要删除演员的id
        $id = $request -> input("id");
        // 获取film_relation的id
        $ids = $request -> input("ids");
        // 判断，如果传过来的演员是空，则修改掉film_relation内的演员id
        if (empty($id)) {
            if (DB::table("film_relation") -> where("id","=",$ids) -> update(["performer_id" => ""])) {
                return "1";
            }else{
                return "2";
            }
        }
        // 如果演员id不为空，则要在film_relation表的performer_id字段中出去要删除的演员

        // 获取film_relation表中要修改的数据
        $data = DB::table("film_relation") -> where("id","=",$ids) -> get();
        // 获取要修改的字段
        $performer_id = $data[0] -> performer_id;
        // 拆分字段，便于除去
        $performer_id = explode(",",$performer_id);
        // 除去不要的演员id
        foreach($performer_id as $v){
            if ($v != $id) {
                $performer_ids[] = $v;
            }
        }
        // 留下来的演员id合并起来
        $performer_id = implode(",",$performer_ids);
        // 重新写入该字段
        if (DB::table("film_relation") -> where("id","=",$ids) -> update(["performer_id" => $performer_id])) {
            // 成功返回1
            echo "1";
        }else{
            // 失败返回2
            echo "2";
        }
        
    }
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
    public function update(AdminFilminserts $request, $id)
    {
        // $request -> get("name");//电影名称
        // $request -> get("film_status");//电影上下架
        // $request -> get("ymd");//放映时间
        // $request -> get("times");//电影时长
        // $request -> get("years");//电影年代
        // $request -> get("district_id");//区域
        // $request -> get("type_id");//类型
        // $request -> get("playback_status");//状态
        // $request -> get("cover");//电影封面
        // $request -> get("director");//导演名字
        // $request -> get("director_img");//导演头像
        // $request -> get("film_introduce");//电影简介
        // $request -> file("performer_img");//演员头像
        // $request -> get("film_img");//电影图集
        
        
        $performer_img = $request -> file("performer_img");
        // 根据film的id获取film表和film_relation表，便于下面修改信息
        $data_film = DB::table("film") -> where("id","=",$id) -> get();
        $ids_film = $data_film[0] -> relation_id;
        $data_film_relation = DB::table("film_relation") -> where("id","=",$ids_film) -> get();

        // 获取演员图像名上的演员名字
        if (!empty($performer_img)) {
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
                $paths = substr($path,1);
                // var_dump($paths);
                // 预备文件名
                $filmname = time().rand(100000,999999).".".$houzhui;
                $v -> move($path,$filmname);
                // 插入performer演员表内，顺便返回插入时id
                if (!$id = DB::table("performer") -> insertgetId(["name" => $name,"img" => $paths."/".$filmname])) {
                    return back() -> with("error","演员添加失败");
                }
                // 将返回id存入$ids内
                $ids[] = $id;
            }
        }else{
            $ids[] = "";
        }
        
        // 将获取的封面图和导演头像、以及图集存入对应的文件夹内
        if ($request -> hasFile("cover")) {
            // 1，封面图
            // 对应的文件夹/film/cover/
            $cover = $request -> file("cover");
            // 获取封面图的后缀名
            $cover_houzhui = $cover -> getClientOriginalExtension();
            // 自定义名字
            $cover_name = time().rand(100000,999999).".".$cover_houzhui;
            // 自定义文件夹
            $cover_path = "./film/cover/".time().rand(100000,999999);
            $cover_paths = substr($cover_path,1);
            // 移入文件夹内
            $cover -> move($cover_path,$cover_name);
            $cover_path = $cover_paths."/".$cover_name;
        }else{
            $cover_path = $data_film_relation[0] -> cover;
        }
        if ($request -> hasFile("director_img")) {
            // 1，导演头像
            // 对应的文件夹/film/director_img/
            $director_img = $request -> file("director_img");
            // 获取封面图的后缀名
            $director_img_houzhui = $director_img -> getClientOriginalExtension();
            // 自定义名字
            $director_img_name = time().rand(100000,999999).".".$director_img_houzhui;
            // 自定义文件夹
            $director_img_path = "./film/director_img/".time().rand(100000,999999);
            $director_img_paths = substr($director_img_path,1);
            // 移入文件夹内
            $director_img -> move($director_img_path,$director_img_name);
            $director_img_pathcwb = $director_img_paths."/".$director_img_name;
        }else{
            $director_img_pathcwb = $data_film_relation[0] -> director_img;
        }

        if ($request -> hasFile("film_img")) {
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
                $film_img_path = "./film/film_img/".time().rand(100000,999999).$i;
                $film_img_paths = substr($film_img_path,1);
                // 移入文件
                $v -> move($film_img_path,$film_img_name);
                // 应为后面插入数据要用到路径，且在数据库内是用,号链接，所以我们提前先存入数组中
                $film_imgs[] = $film_img_paths."/".$film_img_name;

                $i++;
            }
        }else{
            $film_imgs[] = "";
        }
        
        // 将地址用,号分开
        $film_imgs = implode(",",$film_imgs);
        /***************修改添加**********************/
        // 修改时会加到已有的数据之后，不要重叠掉
        $data_film_relation_film_img = $data_film_relation[0] -> film_img;
        if (empty($film_imgs)) {
            $film_imgs = $data_film_relation_film_img;
        }else{
            $film_imgs = $data_film_relation_film_img.",".$film_imgs;
        }
        
        // 将插入时获取的id存入$ids下
        $ids = implode(",",$ids);
        /***************修改添加**********************/
        // 修改时会加到已有的数据之后，不要重叠掉
        $data_film_relation_performer_id = $data_film_relation[0] -> performer_id;
        if (empty($ids)) {
            $ids = $data_film_relation_performer_id;
        }else{
            $ids = $data_film_relation_performer_id.",".$ids;
        }

        // 上面有注释
        $years = $request -> get("years");
        $district_id = $request -> get("district_id");
        $type_id = $request -> get("type_id");
        // 将获取到的类型合并成字符串
        $type_id = implode(",",$type_id);
        $playback_status = $request -> get("playback_status");
        $director = $request -> get("director");
        // 将有的数据插入到第二张表，电影关联表film_relation上
        if (!$idkk = DB::table('film_relation') -> where("id","=",$ids_film) -> update(["years" => $years,"district_id" => $district_id,"type_id" => $type_id,"film_img" => $film_imgs,"cover" => $cover_path,"playback_status" => $playback_status,"director" => $director,"director_img" => $director_img_pathcwb,"performer_id" => $ids])) {
            if ($idkk != "0") {
                return back() -> with("error","失败");
            }
        }
        
        // 获取film_relation表插入成功后返回的id
        $name = $request -> get("name");
        $ymd = $request -> get("ymd");
        $times = $request -> get("times");
        // 票房和评分一开始的默认为0;
        $film_introduce = $request -> get("film_introduce");
        $film_status = $request -> get("film_status");
        // 插入第三张表，电影表film
        if ($idss = DB::table("film") -> where("id","=",$data_film[0] -> id) -> update(["name" => $name,"ymd" => $ymd,"times" => $times,"film_introduce" => $film_introduce,"film_status" => $film_status])) {
            return back() -> with("success","成功");
        }else{
            if($idss != "0"){
                return back() -> with("error","失败");
            }
            return back() -> with("success","成功");
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
