<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB
use DB;
//引入校验类
use App\Http\Requests\ImgInsert;
//引入模型类
use App\AdminModel\Imgs;
class ImgsController extends Controller
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
        //分页
        $page = DB::table('imgs')->paginate(3);
        //查询关联的数据表
        $list = DB::table('imgs')->where('title','like','%'.$key.'%')->where('introduction','like','%'.$key.'%')->get();
        //查询共有多少条数据
        $tol = DB::table('imgs')->where('title','like','%'.$key.'%')->count();
        //返回图集列表
        return view('admin.Imgs.index',['list'=>$list,'tol'=>$tol,'request'=>$request->all(),'page'=>$page]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回添加列表
        return view('admin.Imgs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImgInsert $request)
    {
        //查看返回的数据
        // dd($request->all());
        // echo $request -> input("title");
        //打包好提交上来的文件
        $data = $request->except('_token');
        // dd($data);
        // 处理提交上来的图片集
        // var_dump($data['img']);
        foreach($data['img'] as $row){
            //获取提交上来图片的后缀名
            $ext = $row->getClientOriginalExtension();
            // echo $ext;
            // var_dump($row);
            //初始化文件的名字
            $name = date('Ymd',time()).rand(1,100000);
            //设定存储文件的路径
            $upload = './Imgs/'.date('Y-m-d',time());
            //把文件移到指定位置
            $row->move($upload.'/',$name.'.'.$ext);
            //打包好要存进数据库的路径
            $img[] = substr($upload,1).'/'.$name.'.'.$ext;
        }

       // var_dump($img);
       //把$img数组转换为字符串
       $imgs = implode(',',$img);
       // echo $imgs;
       //把提交上来的数据的img修改
       $data['img'] = $imgs;
       // dd($data);
       if(Imgs::create($data)){
            return redirect('/imgstj')->with('success','添加成功');
       }else{
            return back()->withInput()->with('errors','添加失败');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //查看图集的内容
    public function show($id)
    {
        //查看返回来的id相对应的图片
        $img = Imgs::where('id','=',$id)->first();
        // echo $img->img;
        // 把存的路径搞定好
        $imgs = explode(',',$img->img);
        // var_dump($imgs);
        //查看图片的页面
        return view('admin.Imgs.img',['imgs'=>$imgs]);
    }
    //查看简介的内容
    public function showcontent($id){
        // dd($id);
        //用传来的id查出相对应的简介数据
        $introduction = Imgs::where('id','=',$id)->first();
        //查看简介的页面
        return view('admin.Imgs.introduction',['introduction'=>$introduction]);
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //用传来的id来查出相对应的数据
        $list = Imgs::where('id','=',$id)->first();
        // 把存的路径搞定好
        $imgs = explode(',',$list->img);
        //返回修改页
        return view('admin.Imgs.edit',['list'=>$list,'imgs'=>$imgs]);
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

     //预告上架
   public function fb(Request $request){
        //获取id
        $id = $request->input('id');
        //同过传来的id修改状态
        if(Imgs::where('id','=',$id)->update(['status'=>1])){
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
        if(Imgs::where('id','=',$id)->update(['status'=>0])){
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
        if(Imgs::destroy($id)){
            //返回状态码
            echo 2;
        }else{
            echo 0;
        }
    }
}
