<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
//引入第三方验证码类库
use Gregwar\Captcha\CaptchaBuilder;
//引入自定义类
use helper;
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
        $vcode = session('vcode');

        $code = $request->input('code');

        // echo $vcode.':'.$code;
        //判断校验码的是否错误
        if($code == $vcode){

        }else{
            return back()->with('error','验证码错误');
        }
        
        
    }

    //检验登录(手机登录)
    public function pdologin(Request $request){
        dd($request->all());
    }
    //通过ajax发送短信校验码
    public function sendmessage(Request $request){
        // dd($request->all());
        // 获取电话号码
        $phone = $request->input('phone');
        //生成验证码
        $par = rand(1,10000);
        //存到session
        session(['code'=>$par]);
        //用短信发送的自定义类
        $send = new helper();
        // 发送手机校验码
        echo $send->sendsphone($phone,$par);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //返回注册界面
        return View('Home.Login.add');
        
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
