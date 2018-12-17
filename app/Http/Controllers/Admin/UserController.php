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
        // 判断level是否符合执行等级
        // dd(session('level'));
        if(session('level')>0){
            //后台用户添加
            return view('admin.User.add');
        }else{
            return back()->with('error','嘿~,麻瓜!您的权限不够,快去学魔法吧~~~!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserinsert $request)
    {
        // 可以获取session("id")
        // dd(session('level'));
        // dd($request->input('level'));
        if(session('level')>$request->input('level')){
        
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
        }else{
            return back()->with('error','添加失败,权限不足~~~!');
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
        $t=DB::table('admin_user')->where('id','=',$id)->first();
        // var_dump($t->level);

        if(session('level')>0 && session('level')>$t->level){
            //获取修改数据id
            $id = $id;
            // dd($id);
            // 获取单条数据
            $data=User::find($id);
            //返回修改模板
            return view('admin.User.edit',['data'=>$data]);
        }else{
            return back()->with('error','哟~,麻瓜!~~您的权限不够,快去学魔法吧~~~!');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserinsert $request, $id)
    {
        //获取id
        // dd($id);
        // $data=$request->all();
        $data = $request->except(['repwd','_token','_method']);

        $solo=DB::table('admin_user')->where('id','=',$id)->first();
        // var_dump($data);
        // 如果密码没修改,避免重复加密
        if($solo->admin_password != $data['admin_password']){
            // dd(1);
        
            //加密admin_password
            $data['admin_password']=Hash::make($data['admin_password']);
            // dd($data);
        }
        // 执行修改
        if(User::where('id','=',$id)->update($data)){
            return redirect("adminuser")->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        $data=DB::table('admin_user')->where('id','=',$id)->first();
        if($data->admin_user=='boss'){
            // 此条代码没用,仅作为装饰     只要输出不为1就是失败
            session(['error'=>'删除失败,此用户无敌']);
        }else{
            if(DB::table('admin_user')->where('id','=',$id)->delete()){
                echo '1';
            }else{
                echo '0';
            }
        }
    }
}
