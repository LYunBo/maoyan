<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

//导入模型类
use App\Models\Admin\Link;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $list=Link::paginate(5);
        return view('admin.User.url',['link'=>$list]);
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


    public function pass(Request $request){
        $id=$request->input('id');
        $state=$request->input('state');
        
        // return $state;
        if(DB::table('link')->where('id','=',$id)->update(['state'=>1])){
            echo '1';
        }else{
            echo '2';
        }
    }

    public function nopass(Request $request){
        $id=$request->input('id');
        $state=$request->input('state');
        
        // return $state;
        if(DB::table('link')->where('id','=',$id)->update(['state'=>2])){
            echo '1';
        }else{
            echo '2';
        }
    }

    public function lookup(Request $request){
        $id=$request->input('id');
        
        // return $state;
        if(DB::table('link')->where('id','=',$id)->update(['look'=>1])){
            echo '1';
        }else{
            echo '2';
        }
    }

    public function lookdown(Request $request){
        $id=$request->input('id');
        
        // return $state;
        if(DB::table('link')->where('id','=',$id)->update(['look'=>0])){
            echo '1';
        }else{
            echo '2';
        }
    }

    public function lookdel(Request $request){
        $id=$request->input('id');
        // echo $id;
        if(DB::table('link')->where('id','=',$id)->delete()){
            echo '1';
        }else{
            echo '2';
        }
    }
}
