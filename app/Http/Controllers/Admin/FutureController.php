<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB
use DB;
//引入模型类
use App\AdminModel\Future;
class FutureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询预告的数据表
        $list = DB::table('notice')->paginate(3);
        //返回数据条数
        $tol = DB::table('notice')->count();
        //返回预告列表页
        return view('admin.Future.index',['list'=>$list,'tol'=>$tol]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回添加页
        return view('admin.Future.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request -> input("title"));
        
        // echo 1;
        //查看提交的参数
        // var_dump($request->all());
        //判断
        if($request->has('notice_cover') && $request->input('title') !== null && $request->has('url_address')){
            //把获取到的数据打包好
            $list = $request->except('_token');
            // dd($list);
            //初始化名字
            $name = date('Ymd',time())+rand(1,10000);
            //获取封面上传后缀
            $extp = $request->file('notice_cover')->getClientOriginalExtension();
            //获取预告片的后缀
            $extv = $request->file('url_address')->getClientOriginalExtension();
            //预告封面路径名称
            $upload = './FutureCover/'.date('Y-m-d',time());
            //预告片路径名称
            $videoupload = './FutureVideo/'.date('Y-m-d',time());
            //把封面路径存好
            $list['notice_cover'] = substr($upload,1).'/'.$name.'.'.$extp;
            //把预告片路径存好
            $list['url_address'] = substr($videoupload,1).'/'.$name.'.'.$extv;
            dd($list);
            // 把数据存入数据库
            if(Future::create($list)){
                //把封面移动到指定的目录下(提前在Public下新建文件目录)
                $request->file('notice_cover')->move($upload,$name.'.'.$extp);
                //把预告片移动到指定的目录下
                $request->file('url_address')->move($videoupload,$name.'.'.$extv);
                //添加成功返回
                return redirect('/hotnew')->with('success','添加成功');
            }else{
                return back()->with('worng','添加失败');
            }
        }else{
            return back()->withInput()->with('wrong','请不要留空');
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
