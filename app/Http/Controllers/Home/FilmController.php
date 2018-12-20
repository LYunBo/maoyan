<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 便于静态的遍历使用的数组
        $status = ["0" => "大陆", "1" => "美国", "2" => "韩国", "3" => "日本", "4" => "中国香港", "5" => "中国台湾", "6" => "泰国", "7" => "印度", "8" => "法国", "9" => "英国", "10" => "俄罗斯", "11" => "意大利", "12" => "西班牙", "13" => "德国", "14" => "波兰", "15" => "澳大利亚", "16" => "伊朗", "17" => "其他"];
        $statusz = ["0" => "爱情","1" => "喜剧","2" => "动画","3" => "剧情","4" => "恐怖","5" => "惊悚","6" => "科幻","7" => "动作","8" => "悬疑","9" => "犯罪","10" => "冒险","11" => "战争","12" => "奇幻","13" => "运动","14" => "家庭","15" => "古装","16" => "武侠","17" => "西部","18" => "历史","19" => "传记","20" => "歌舞","21" => "黑色电影","22" => "短片","23" => "纪录片","24" => "其他"];
        // 判断是否有上传playback_status参数，判断是热播还是即将上映和经典
        if ($request -> has("playback_status")) {
            $playback_status = $request -> input("playback_status");
        }else{
            $playback_status = "0";
        }
        // 多表查询film和film_relation
        $data = DB::table("film") -> join("film_relation","film.relation_id","=","film_relation.id") -> select("film.*","film_relation.*") -> orderBy("film.id","asc") -> get();
        // 判断是否有上传区域参数
        if ($request -> has("district")) {
            $district = $request -> input("district");
        }else{
            $district = "-1";
        }
        // 判断是否有上传类型参数
        if ($request -> has("type")) {
            $type = $request -> input("type");
        }else{
            $type = "-1";
        }
        // 利用上传的playback_status的参数来判断电影是热播还是即将上映和经典
        foreach($data as $v){
            $playback_status_s = explode(",",$v -> playback_status);
            if (in_array($playback_status,$playback_status_s)) {
                // 将符合上传参数的存起来
                $datas[] = $v;
            }
            
        }
        // 创建空数组是为了数据不存在时不符合一下的判断条件时报错
        $datas_z = array();
        // 将存起来的数组进一步判断条件
        foreach($datas as $v){
            // 判断类型参数是否在电影类型的字段里面
            // 若类型参数是-1，则表示全部类型
            if ($type != "-1") {
                $types = explode(",",$v -> type_id);
                if (in_array($type,$types)) {
                    // 符合条件的存起来
                    $datas_z[] = $v;
                }
            }else{
                $datas_z[] = $v;
            }
        }
        // 创建空数组是为了数据不存在时不符合一下的判断条件时报错
        $data_film = array();
        // 进一步做判断条件
        foreach($datas_z as $v){
            // 当区域为-1，表示全部
            if ($district != "-1") {
                // 应为区域只有一种，所以不用判断是否在里面，判断是否相等即可
                if ($v -> district_id == $district) {
                    // 符合条件的存起啦
                    $data_film[] = $v;
                }
            }else{
                $data_film[] = $v;
            }
        }

        if (!$request -> has("page")) {
            $page = 1;
        }else{
            $page = $request -> input("page");
        }
        $j = ($page-1)*15;
        $data_film_s = array();
        if ((count($data_film) - $j) >= 15) {
            for ($i=$j; $i < 15; $i++) { 
                $data_film_s[] = $data_film[$i];
            }
        }else{
            for ($i=$j; $i < count($data_film); $i++) { 
                $data_film_s[] = $data_film[$i];
            }
        }
        // var_dump($data_film_s);
        return view("home.Filmlist.index",["data" => $data_film_s,"playback_status" => $playback_status,"district_id" => $status,"type_id" => $statusz,"district" => $district,"type" => $type,"page" => $page]);

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
