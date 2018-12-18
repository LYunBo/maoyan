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
    public function index(Request $request)
    {
        //搜索的关键字
        $key = $request->input('keyword');
        //返回搜索结果
        $list = HotNews::where('title','like','%'.$key.'%')->paginate(5);
        //查看一共有多少条数据
        $tol = HotNews::count();
        //返回资讯热点列表
        return view('admin.Hotnews.index',['list'=>$list,'request'=>$request->all(),'tol'=>$tol]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //查看相关电影列表
        $film = DB::table('film')->get();
        //返回资讯的添加页
        return view('admin.Hotnews.add',['film'=>$film]);
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
        //用返回的id查数据库相对于的
        $list = DB::table('hotnews')->where('id','=',$id)->first();
        //返回修改页
        return view('admin.Hotnews.edit',['list'=>$list]);
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
        //查看修改的数据
        // dd($request->all());
        // 查看原有的数据
        $data = DB::table('hotnews')->where('id','=',$id)->first();
        // 判断是否有图片更改有走上没有走下
        if($request->has('cover')){
            //这是修改了图片的情况下
            //把数据打包好
            $list = $request->except('_token','_method');
            //初始化图片名字
            $name = date('Ymd',time())+rand(1,10000);
            //获取上传图片后缀
            $ext = $request->file('cover')->getClientOriginalExtension();
            //路径名称
            $upload = './HotNews/'.date('Y-m-d',time());
            //把路径存好
            $list['cover'] = substr($upload,1).'/'.$name.'.'.$ext;
            //删除文件(绝对路径)
            unlink('.'.$data->cover);
            // 把修改后的数据更新数据库
            if(HotNews::where('id','=',$id)->update($list)){
                //移动到指定的目录下(提前在Public下新建文件目录)
                $request->file('cover')->move($upload,$name.'.'.$ext);
                //返回列表页返回session
                return redirect('/hotnew')->with('success','修改成功'); 
            }else{
                //把提交的数据存在闪存中并返回修改页
                return back()->withInput()->with('wrong','修改失败未知错误');
            }
        }else{
            //一下是没有修改图片的情况下
            //把数据打包好
            $list = $request->except('_token','_method');
            // dd($list);
            if(HotNews::where('id','=',$id)->update($list)){
                //返回列表页返回session
                return redirect('/hotnew')->with('success','修改成功');
            }else{
                //把提交的数据存在闪存中并返回修改页
                return back()->withInput()->with('wrong','修改失败未知错误');
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

    /*
    Ajax  通过
     */
    public function tg(Request $request){
        //获取id
        $id = $request->input('id');
        //同过传来的id修改状态
        if(HotNews::where('id','=',$id)->update(['status'=>1])){
            //返回状态码
            echo 1;
        }else{
            echo 0;
        }
    }

     /*
    Ajax  发布
     */
    public function fb(Request $request){
        //获取id
        $id = $request->input('id');
        //同过传来的id修改状态
        if(HotNews::where('id','=',$id)->update(['status'=>2])){
            //返回状态码
            echo 2;
        }else{
            echo 0;
        }
    }

     /*
    Ajax  下架
     */
    public function xj(Request $request){
        //获取id
        $id = $request->input('id');
        //同过传来的id修改状态
        if(HotNews::where('id','=',$id)->update(['status'=>3])){
            //返回状态码
            echo 3;
        }else{
            echo 0;
        }
    }

    /*
    Ajax 删除
     */
    public function del(Request $request){
        //获取id
        $id = $request->input('id');
        //同过传来的id修改状态
        if(HotNews::destroy($id)){
            //返回状态码
            echo 1;
        }else{
            echo 0;
        }
    }
}
