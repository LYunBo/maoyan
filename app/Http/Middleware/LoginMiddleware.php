<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //中间件过滤数据的核心 操作方法  $request请求报文  Closure $next下一个请求
    public function handle($request, Closure $next)
    {
        //检测当前有没有登录的session信息
        if($request->session()->has('o2o30')){
            //执行下个请求
            return $next($request);
        }else{
            //跳转到登录界面
            return redirect("/login");
        }
        
    }
}
