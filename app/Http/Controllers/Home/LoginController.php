<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
//引入第三方验证码类库
use Gregwar\Captcha\CaptchaBuilder;
//引入自定义类
use helper;
//引入DB
use DB;
//引入Hash
use Hash;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //返回登录页面
        return View('Home.Login.login');
    }

    //检验登录(普通登录)
    public function dologin(Request $request){
        // dd($_POST);
        // var_dump($request->all());
        // 获取正确的图片校验码
        $vcode = session('vcode');
        //获取输入框的验证码
        $code = $request->input('code');
        // echo $vcode.':'.$code;
        //判断校验码的是否错误
        if($code == $vcode){
            //获取用户名
            $user = $request->input('user');
             //获取密码
            $password = $request->input('password');
            //获取密码
            //判断用户名是否正确
            $res1 = DB::table('user')->where('phone','like','%'.$user.'%')->first();
            $res2 = DB::table('user')->where('username','like','%'.$user.'%')->first();
            $res3 = DB::table('user')->where('email','like','%'.$user.'%')->first();
            if($res1){
                //验证密码
                if(Hash::check($password,$res1->password)){
                    session(['id'=>$res1->id,'phone'=>$res1->phone]);
                    echo "<script>alert('登录成功');location='/'</script>";
                }else{
                    return back()->with('error','密码错误');
                }
            }elseif ($res2) {
                if(Hash::check($password,$res1->password)){
                    session(['id'=>$res1->id,'username'=>$res1->phone]);
                    echo "<script>alert('登录成功');location='/'</script>";
                }else{
                    return back()->with('error','密码错误');
                }
            }elseif($res3){
                if(Hash::check($password,$res1->password)){
                    session(['id'=>$res1->id,'email'=>$res1->phone]);
                    echo "<script>alert('登录成功');location='/'</script>";
                }else{
                    return back()->with('error','密码错误');
                }
            }else{
                return back()->with('error','用户名错误');
            }
        }else{
            return back()->with('error','验证码错误');
        }
        
        
    }

    //检验登录(手机登录)
    public function pdologin(Request $request){
        // dd($request->all());
        //获取提交的手机号码
        $mobile = $request->input('phone');
        //判断是否有此账号
        if(DB::table('user')->where('phone','like','%'.$mobile.'%')->first()){
            echo "<script>alert('登录成功');location='/'</script>";
        }else{
            return back()->with('error','请先注册');
        }
    }

    //通过ajax发送短信校验码
    public function sendmessage(Request $request){
        // dd($request->all());
        // 获取电话号码
        $phone = $request->input('phone');
        //生成验证码
        $par = rand(1000,9999);
        //存到Cookie
        \Cookie::queue('code',$par,1);  
        //用短信发送的自定义类
        $send = new helper();
        // 发送手机校验码
        echo $send->sendsphone($phone,$par);
        // var_dump($data);
    }

    //手机登录验证码验证
    public function codecheck(Request $request){
        //获取传递过来的数值
        $code = $request->input('code');
        //获取存储的Cookie验证码
        $Cookie = $request->cookie('code');
        // echo $Cookie;
        
        //用来跟存储的Cookie做判断
        if(empty($Cookie)){
            echo 1;
        }elseif($code !== $Cookie){
            echo 2;
        }elseif($code == $Cookie){
            echo 3;
        }

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

    //验证码检测
    public function code(){
        // 生成校验码代码
        ob_clean();//清除操作
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入sessio
        session(['vcode'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
        // die;
    }

    //退出登录
    public function outlogin(){
        session()->pull('id');
        return redirect('/');
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
}
