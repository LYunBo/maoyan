<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//哈希
use Hash;
//导入模型类
use App\Models\Admin\User;
//导入校验类
use App\Http\Requests\AdminUserinsert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取关键
        $key=$request->input('key');

        //通过控制器调用模型  获取遍历的admin_user数据
        $data=DB::table('admin_user')->where('admin_user','like','%'.$key.'%')->paginate(5);
        // dd($data);
        //后台用户管理列表
        return view('admin.User.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //后台用户添加
        return view('admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserinsert $request)
    {
       
        
        // echo "执行添加";
        $data=$request->except(['repwd','_token']);
        // dd($data);
        //哈希加密
        $data['admin_password']=Hash::make($data['admin_password']);
        
        if(User::create($data)){
            // echo "添加成功";
            return redirect("/adminuser")->with('success','添加成功');
        }else{
            // echo "添加失败";exit;
            return back()->with('error','添加失败');
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
        //获取修改数据id
        $id = $id;
        // dd($id);
        // 获取单条数据
        $data=User::find($id);
        //返回修改模板
        return view('admin.User.edit',['data'=>$data]);
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
        //获取id
        // dd($id);
        // $data=$request->all();
        $data = $request->except(['repwd','_token','_method']);
        //加密admin_password
        $data['admin_password']=Hash::make($data['admin_password']);
        // dd($data);
        // 执行修改
        if(User::where('id','=',$id)->update($data)){
            return redirect("adminuser")->with('success','修改成功');
        }else{
            return back()->with('error','添加失败');
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

    //ajax 后台用户状态更改
    public function statuss(Request $request){
        //获取 id statuss
        $id=$request->input('id');
        $s=$request->input('statuss');

        // 执行修改
        DB::table('admin_user')->where('id','=',$id)->update(['statuss'=>$s]);
        

    }

    // ajax 后台用户删除
    public function del(Request $request){
        $id=$request->input('id');
        // echo $id;
        if(DB::table('admin_user')->where('id','=',$id)->delete()){
            echo '删除成功';
        }else{
            echo '删除失败';
        }
    }
}
