<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入底层DB
use DB;
//引入模型
use App\AdminModel\HotNews;
class HotNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('hotnews')->get();
        //返回资讯热点列表
        return view('admin.Hotnews.index',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回资讯的添加页
        return view('admin.Hotnews.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //查看添加的参数
        // dd($request->all());
        // dd($request->file());
        if($request->has('cover') && $request->input('title') !== null && $request->input('content') !== null){
            //把获取到的数据打包好
            $list = $request->except('_token');
            // dd($list);
            //初始化名字
            $name = date('Ymd',time())+rand(1,10000);
            //获取上传后缀
            $ext = $request->file('cover')->getClientOriginalExtension();
            //路径名称
            $upload = './HotNews/'.date('Y-m-d',time());
            //把路径存好
            $list['cover'] = substr($upload,1).'/'.$name.'.'.$ext;
            // dd($list);
            
            // 把数据存入数据库
            if(HotNews::create($list)){
            //移动到指定的目录下(提前在Public下新建文件目录)
                $request->file('cover')->move($upload,$name.'.'.$ext);
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
        // dd($id);
        $content = DB::table('hotnews')->where('id','=',$id)->first();
        //返回资讯内容
        return view('admin.Hotnews.content',['content'=>$content]);
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
