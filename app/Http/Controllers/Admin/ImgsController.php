<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB
use DB;
//引入校验类
use App\Http\Requests\ImgInsert;
use App\Http\Requests\ImgsUpdate;
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
            return redirect('/img')->with('success','添加成功');
       }else{
            return back()->withInput()->with('errors','添加失败');
       }
    }
    //添加图片的页面
    public function add($id){
        // dd($id);
        //查看返回来的id相对应的图片
        $img = Imgs::where('id','=',$id)->first();
        // 把存的路径搞定好
        $imgs = explode(',',$img->img);
        //返回添加页面
        return view('admin.Imgs.imgadd',['imgs'=>$imgs,'id'=>$id]);
    }
    //执行添加图片
    public function doadd(Request $request,$id){
        // dd($request->all());
        // dd($id);
        // 打包好传上来的数据
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
        //把$img数组转换为字符串
        $imgs = implode(',',$img);
        // dd($imgs) ;
        $list = Imgs::where('id','=',$id)->first();
        //原来的数据路径加上现在的提交上来的路径
        $endimg = $list->img.','.$imgs;
        // dd($endimg);
        //把提交上来的数据的img修改
        // $data['img'] = $imgs;
        // dd($data);
        if(Imgs::where('id','=',$id)->update(['img'=>$endimg])){
              return redirect('/img')->with('success','添加成功');
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
    public function update(ImgsUpdate $request, $id)
    {
        //查看返回上来的数据
        // dd($request->all());
        //判断是否有修改图集
        if($request->has('img')){
            //打包好提交上来的数据
            $result = $request->except('_token','_method');
            // dd($result);
            foreach($result['img'] as $row){
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
            //把$img数组转换为字符串
            $imgs = implode(',',$img);
            // echo $imgs;
            //把提交上来的数据的img修改
            $result['img'] = $imgs;
            if(Imgs::where('id','=',$id)->update($result)){
                return redirect('/img')->with('success','修改成功');
            }else{
                return back()->with('wrong','修改失败请检查所修改的内容');
            }
        }else{
            //打包好提交上来的数据
            $data = $request->except('_token','_method');
            // dd($data);
            if(Imgs::where('id','=',$id)->update($data)){
                return redirect('/img')->with('success','修改成功');
            }else{
                return back()->with('wrong','修改失败请检查所修改的内容');
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

     //图集上架
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

    //图集下线
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

    //删除图集
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

    //删除图集照片
    public function imgdel(Request $request){
       // echo  $request->input('id');
        //获取id
        $id = $request->input('id');
        //获取图片的路径
        $upload = $request->input('imgupload');
        //获取数据库相对应的路径字段
        $img = DB::table('imgs')->first();
        //把查出来的数据变成数组
        $imgs = explode(',',$img->img);
        //检测路径字段中的要删除的键
        $del = array_search($upload,$imgs);
        // echo $del;
        //把对应的路径删除
        unset($imgs[$del]);

        // return $imgs;
        //再把数组转换为字符串存进数据库
        $data = implode(',',$imgs);
        // echo $data;
        if(Imgs::where('id','=',$id)->update(['img'=>$data])){
            echo 1;
        }else{
            echo 2;
        }
    }
}
