<?php
// 电影院控制器
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FilmcinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 电影院列表页
    public function index(Request $request)
    {
        $data = DB::table("cinema") -> paginate(3);
        foreach($data as $v){
            $city = DB::table("city") -> where("id","=",$v -> city_id) -> get();
            if (($city[0] -> upid) != "0") {
                $citys = DB::table("city") -> where("id","=",$city[0] -> upid) -> get();
                if (($citys[0] -> upid) != "0") {
                    $cityss = DB::table("city") -> where("id","=",$citys[0] -> upid) -> get();
                    $v -> city_id = ($cityss[0] -> name).",".($citys[0] -> name).",".$city[0] -> name;
                }else{
                    $v -> city_id = ($citys[0] -> name).",".$city[0] -> name;
                }
            }else{
                $v -> city_id = $city[0] -> name;
            }
        }
        $counts = DB::table("cinema") -> count();
        return view("admin.Film_cinema.list",['data' => $data,"counts" => $counts,"request" => $request -> all()]);
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
        //
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
