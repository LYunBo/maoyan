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
    public function index(Request $request)
    {
        //返回搜索的关键字
        $keyword = $request->input('keyword');
        //查询预告的数据表
        $list = Future::where('title','like','%'.$keyword.'%')->paginate(3);
        //返回数据条数
        $tol = Future::count();
        //返回预告列表页
        return view('admin.Future.index',['list'=>$list,'tol'=>$tol,'request'=>$request->all()]);
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
        //返回添加页
        return view('admin.Future.add',['film'=>$film]);
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
        // dd(111);
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
            // dd($list);
            // 把数据存入数据库
            if(Future::create($list)){
                //把封面移动到指定的目录下(提前在Public下新建文件目录)
                $request->file('notice_cover')->move($upload,$name.'.'.$extp);
                //把预告片移动到指定的目录下
                $request->file('url_address')->move($videoupload,$name.'.'.$extv);
                //添加成功返回
                return redirect('/future')->with('success','添加成功');
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
        //用查出来的id查出对应的视频显示
        $video = Future::where('id','=',$id)->first();
        //返回视频显示页
        return view('admin.Future.video',['video'=>$video]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查看相关电影列表
        $film = DB::table('film')->get();
        //查看返回id的数据表数据
        $list = Future::where('id','=',$id)->first();
       /* $filmid = $list->film_id;
        dd($list);*/
        //对应的相关电影
        $samefilm = DB::table('film')->where('id','=',$list->film_id)->first();
        //返回添加页
        return view('admin.Future.edit',['film'=>$film,'list'=>$list,'samefilm'=>$samefilm]);
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
        //查看原来对应id的数据
        $list = Future::where('id','=',$id)->first();
        //查看修改提交的数据
        // dd($request->all());
        // 打包好数据
        $data = $request->except('_token','_method');
        // 初始化名字
        $name = date('Ymd',time()).rand(1,100000);
        //判断是否有封面以修改
        if($request->has('notice_cover')){
            // echo 1;
            // 获取封面的后缀
            $extp = $request->file('notice_cover')->getClientOriginalExtension();
            //封面储存路径
            $uploadp ='./FutureCover/'.date('Y-m-d',time());
            //存入数据库的路径 
            $data['notice_cover'] = substr($uploadp,1).'/'.$name.'.'.$extp;
            //删除原来有的封面数据
            unlink('.'.$list->notice_cover);
            //把修改好的封面移到指定的路径
            $request->file('notice_cover')->move($uploadp,$name.'.'.$extp);                      
        }

        //判断是否有预告内容修改
        if($request->has('url_address')){
            //获取修改的预告视频的后缀
            $extv = $request->file('url_address')->getClientOriginalExtension();
            //视频储存路径
            $uploadv = './FutureVideo/'.date('Y-m-d',time());
            //存入数据库的路径 
            $data['url_address'] = substr($uploadv,1).'/'.$name.'.'.$extv;
            //删除原来有的预告片数据
            unlink('.'.$list->url_address); 
            //把修改好的预告移到指定的路径
            $request->file('url_address')->move($uploadv,$name.'.'.$extv);
        }

        if(Future::where('id','=',$id)->update($data)){
            return redirect('/future')->with('success','修改成功');
        }else{
            return back()->with('wrong','修改失败请注意格式');
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

    //预告上架
   public function fb(Request $request){
        //获取id
        $id = $request->input('id');
        //同过传来的id修改状态
        if(Future::where('id','=',$id)->update(['status'=>1])){
            //返回状态码
            echo 1;
        }else{
            echo 0;
        }
    }

    //预告下线
    public function xj(Request $request){
        //获取id
        $id = $request->input('id');
        //同过传来的id修改状态
        if(Future::where('id','=',$id)->update(['status'=>0])){
            //返回状态码
            echo 1;
        }else{
            echo 0;
        }
    }

    //删除预告
    public function del(Request $request){
        //获取id
        $id = $request->input('id');
        //同过传来的id修改状态
        if(Future::destroy($id)){
            //返回状态码
            echo 2;
        }else{
            echo 0;
        }
    }
}
