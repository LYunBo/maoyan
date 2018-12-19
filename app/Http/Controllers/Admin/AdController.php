<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

//导入模型类
use App\Models\Admin\Ad;
//导入校验类
use App\Http\Requests\Adadd;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $list=Ad::paginate(5);
        return view('admin.User.ad',['ad'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.User.adadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Adadd $request)
    {
        //获取全部内容
        $data=$request->except('_token');
        // dd($data);
        // 获取图片
        $img=$request->file('img');
        
        //获取后缀名
        $houzhui=$img->getClientOriginalExtension();
        // echo $houzhui;
        // 路径
        $path='./img/'.date('Y-m-d').'/';
        
        //文件名
        $file_name = date('YmdHis').rand(1000,9999).".".$houzhui;
        // 存储方法 move(文件路径,文件名字)
        $ok = $img->move($path,$file_name);
        //拼接文件名和路径
        $path=ltrim($path,'.');
        // dd($path);
        $file=$path.$file_name;
        $data['img']=$file;
        // dd($data);
        if(Ad::create($data)){
            return redirect('/ad')->with('success','添加成功,请等待审核');
        }else{
            return back()->with('error','提交失败,请重试');
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
        //获取单条数据
        $data=DB::table('ad')->where('id','=',$id)->first();
        return view('Admin.User.adedit',['data'=>$data]);
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
        $data=$request->except('_token','_method');
        // var_dump($request->hasFile('img'));
        // dd($data);
        // 检测是否有文件上传
        if($request->hasFile('img')){
            $d = DB::table('ad')->where('id','=',$id)->first();
            $p='.';
            $p.=$d->img;
            // dd($p);
            if(unlink($p)){


                 // 获取图片
                $img=$request->file('img');
                
                //获取后缀名
                $houzhui=$img->getClientOriginalExtension();
                // echo $houzhui;
                // 路径
                $path='./img/'.date('Y-m-d').'/';
                
                //0文件名
                $file_name = date('YmdHis').rand(1000,9999).".".$houzhui;
                // 存储方法 move(文件路径,文件名字)
                $ok = $img->move($path,$file_name);
                //拼接文件名和路径
                $path=ltrim($path,'.');
                // dd($path);
                $file=$path.$file_name;
                $data['img']=$file;


                if( Ad::where('id','=',$id)->update($data)){
                    return redirect('/ad')->with('success','修改成功');
               }else{
                    return back()->with('error','修改失败');
               }
            }
        }else{
           if( Ad::where('id','=',$id)->update($data)){
                return redirect('/ad')->with('success','修改成功');
           }else{
                return back()->with('error','修改失败');
           }
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


    public function pass(Request $request){
        $id=$request->input('id');
        $state=$request->input('state');
        
        // return $state;
        if(DB::table('ad')->where('id','=',$id)->update(['state'=>1])){
            echo '1';
        }else{
            echo '2';
        }
    }

    public function nopass(Request $request){
        $id=$request->input('id');
        $state=$request->input('state');
        
        // return $state;
        if(DB::table('ad')->where('id','=',$id)->update(['state'=>2])){
            echo '1';
        }else{
            echo '2';
        }
    }

    // 上架
    public function lookup(Request $request){
        $id=$request->input('id');
        
        // echo $id;
        if(DB::table('ad')->where('id','=',$id)->update(['look'=>1])){
            echo '1';
        }else{
            echo '2';
        }
    }

    // 下架
    public function lookdown(Request $request){
        $id=$request->input('id');
        
        // return $state;
        if(DB::table('ad')->where('id','=',$id)->update(['look'=>0])){
            echo '1';
        }else{
            echo '2';
        }
    }
    // 删除
    public function lookdel(Request $request){
        $id=$request->input('id');
        // echo $id;
        if(DB::table('ad')->where('id','=',$id)->delete()){
            echo '1';
        }else{
            echo '2';
        }
    }
}
