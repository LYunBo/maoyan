<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //列表
    public function index()
    {
        return view("Admin.Ads.index");
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //加载添加模板
    public function create()
    {
        return view("Admin.Ads.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //执行添加
    public function store(Request $request)
    {
        echo "这是广告执行添加";
        //加载模板
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //显示单条数据
    public function show($id)
    {
        echo "这是广告单条数据 数据的id为".$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //加载修改数据
    public function edit($id)
    {
        // echo "this is ads edit id is".$id;
        //加载修改模板
        return view("Admin.Ads.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //执行修改
    public function update(Request $request, $id)
    {
        echo "这是广告执行修改方法 id为".$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //删除操作
    public function destroy($id)
    {
        echo "这是广告删除,删除数据的id为".$id;
    }
}
