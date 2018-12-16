<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\AdminModel\Filmorder;
use App\Http\Requests\Filmorders;
class FilmorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request -> input("name");
        // var_dump($name);
        $data = Filmorder::where("phone","like","%".$name."%") -> paginate(3);
        return view("admin.Film_order.list",["data" => $data,"request" => $request -> all()]);
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
        $data = Filmorder::where("id","=",$id) -> get();
        if(empty($data[0] -> reason)){
            echo "没有退单理由";
        }else{
            echo $data[0] -> reason;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Filmorder::where("id","=",$id) -> get();
        return view("admin.Film_order.edit",["data" => $data]);
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
        $phone = $request -> input("phone");
        $ny = $request -> input("ny");
        $arr = array("phone" => $phone,"ny" => $ny);
        if ($data = Filmorder::where("id","=",$id) -> update($arr)) {
            echo "修改成功，请刷新订单页面";
        }else{
            if ($data = 0) {
                echo "无修改变动";
            }else{
                echo "修改失败";
            }
        }
    }

    // 自定义删除
    public function del(Request $request){
        return "1";
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
