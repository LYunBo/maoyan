<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// 首页
Route::get('/',"Home\IndexController@index");
// 首页公共页的定位
Route::get('/show/{id}',"Home\IndexController@show");

// 前台电影页面
Route::resource("/films","Home\FilmController");
// 前台电影院选择
Route::get("/films_show_cinema","Home\FilmCinemaController@film_show_cinema");
// 前台电影院详情以及场次选择
Route::get("/films_cinema","Home\FilmCinemaController@index");
// 订单页面，座位选择
Route::get("/films_order","Home\FilmCinemaController@film_order");
// 支付
Route::get("/add_order","Home\FilmCinemaController@add_order");
// 支付成功
// 参数一是电影场次id，二是座位
Route::get("/return_url/{film_scene_id}/{seat}/{num}/{money}/{phone}","Home\FilmCinemaController@return_url");

// 榜单页面
Route::get("/List","Home\ListController@index");


//前台登录
Route::resource('/hlogin','Home\LoginController');
//获取验证码的路由
Route::get('/cove','Home\LoginController@code');
//检验用户登录
Route::post('/hdologin','Home\LoginController@dologin');
//发送手机校验码
Route::get('/sendmessage','Home\LoginController@sendmessage');
//用手机验证码登录
Route::post('/hpdologin','Home\LoginController@pdologin');
//验证验证码
Route::get('/hpcheck','Home\LoginController@codecheck');
//退出登录
Route::get('/outlogin','Home\LoginController@outlogin');

//前台注册
Route::get('/register','Home\RegisterController@index');
//添加注册
Route::post('/goregister','Home\RegisterController@add');
//验证手机号码
Route::get('/checkphone','Home\RegisterController@checkphone');
//验证邮箱
Route::get('/checkemail','Home\RegisterController@checkemail');
//找回密码
Route::get('/returnpass','Home\ReturnController@index');
//验证账号
Route::post('/backcheck','Home\ReturnController@check');
//手机号码找回密码
Route::get('/pcheck','Home\ReturnController@phone');
//邮箱找回密码
Route::get('/echeck','Home\ReturnController@email');
//邮箱发送
Route::post('/sendemail','Home\ReturnController@sendMail');
//邮箱重置密码
Route::get('/emailchange/id={id}&_token={token}','Home\ReturnController@emailchange');
//修改密码
Route::post('/dochange','Home\ReturnController@dochange');
//修改成功返回的页面
Route::get('/changesuccess','Home\ReturnController@success');

//个人的基本信息
Route::get('/information','Home\CenterController@index');
//修改头像
Route::post('/changephoto','Home\CenterController@change');
//个人信息修改
Route::post('/chinformation','Home\CenterController@chmessage');
//个人订单
Route::get('/myorder','Home\CenterController@order');

//前台热点
Route::resource('/hot','Home\HotController');
//预告显示
Route::get('/yugao/{id}','Home\HotController@video');
//友情链接提交
Route::get('/urladd','Home\IndexController@urladd');
//电影详情
Route::resource('/movie','Home\MovieController');
//文章详情
Route::resource('/wenzhang','Home\DoController');


//评论提交
Route::post('/tijiaopl','Home\CommentController@tijiao');




//后台登录
Route::resource('/login','Admin\AdminLoginController');
Route::group(['middleware'=>'login'],function(){
	//后台首页路由
	Route::resource('/admin','Admin\AdminController');

	//后台管理员
	Route::resource('/adminuser','Admin\UserController');
	//Ajax 后台用户状态statuss变动
	Route::get("/statuss","Admin\UserController@statuss");

	//Ajax 删除后台用户
	Route::get("/del",'Admin\UserController@del');

	
	//url 友情链接
	Route::resource('/url','Admin\UrlController');
	//pass 通过审核
	Route::get("/pass",'Admin\UrlController@pass');
	//nopass 不通过审核
	Route::get("/nopass",'Admin\UrlController@nopass');
	//lookup 上架
	Route::get('/lookup','Admin\UrlController@lookup');
	//lookdown 下架
	Route::get('/lookdown','Admin\UrlController@lookdown');
	//删除
	Route::get('/lookdel','Admin\UrlController@lookdel');

	// 广告栏
	Route::resource('/ad','Admin\AdController');
	//pass 通过审核
	Route::get("/ad_pass",'Admin\AdController@pass');
	//nopass 不通过审核
	Route::get("/ad_nopass",'Admin\AdController@nopass');
	//lookup 上架
	Route::get('/ad_lookup','Admin\AdController@lookup');
	//lookdown 下架
	Route::get('/ad_lookdown','Admin\AdController@lookdown');
	//删除
	Route::get('/ad_lookdel','Admin\AdController@lookdel');






//会员管理
Route::resource('/adminusers','Admin\UsersController');
//修改会员密码
Route::get('/adminuserspwd/{id}','Admin\UsersController@pwd');
//do修改密码
Route::post('/adminuserspwds/{id}','Admin\UsersController@pwds');
//Ajax删除用户
Route::get('/adminusersdel','Admin\UsersController@del');
//Ajax 修改状态 启用
Route::get('/adminusersstart','Admin\UsersController@start');
//Ajax 修改状态 停用
Route::get('/adminusersstop','Admin\UsersController@stop');

//热点管理
//资讯管理
Route::resource('/hotnew','Admin\HotNewsController');
//通过ajax通过审核
Route::get('/hotnewtg','Admin\HotNewsController@tg');
//ajax发布
Route::get('/hotnewfb','Admin\HotNewsController@fb');
//ajax下架
Route::get('/hotnewxj','Admin\HotNewsController@xj');
//ajax 删除
Route::get('/hotnewdel','Admin\HotNewsController@del');
//预告管理
Route::resource('/future','Admin\FutureController');
//发布
Route::get('/futurefb','Admin\FutureController@fb');
//下架
Route::get('/futurexj','Admin\FutureController@xj');
//删除
Route::get('/futuredel','Admin\FutureController@del');
//图集管理
Route::resource('/imgss','Admin\ImgsController');
//添加图片
Route::get('/imgadd/{id}','Admin\ImgsController@add');
Route::post('/imgdoadd/{id}','Admin\ImgsController@doadd');
//查看的图集简介
Route::get('/imgjj/{id}','Admin\ImgsController@showcontent');
//发布
Route::get('/imgfb','Admin\ImgsController@fb');
//下架
Route::get('/imgxj','Admin\ImgsController@xj');
//删除
Route::get('/imgdel','Admin\ImgsController@del');
//修改的时候删除
Route::get('/imgsdel','Admin\ImgsController@imgdel');

//评论管理
Route::resource('/comment','Admin\CommentController');
//显示
Route::get('/commentfb','Admin\CommentController@fb');
//隐藏
Route::get('/commentxj','Admin\CommentController@xj');


// 电影列表
Route::resource("/adminfilmlist","Admin\FilmController");
// 电影详情
Route::get("/adminfilmlists/{id}","Admin\FilmController@films");
// 修改中删除图集
Route::get("/adminfilmdelfilmimg","Admin\FilmController@delfilmimg");
// 修改中删除演员头像
Route::get("/adminfilmdelperformerimg","Admin\FilmController@performerimg");


// 电影院管理
Route::resource("/adminfilmcinema","Admin\FilmcinemaController");
// 电影院删除
Route::get("/adminfilmcinemadel","Admin\FilmcinemaController@cinemadel");
// 电影院修改时删除的电影院图集
Route::get("/adminfilmcinemacoverdel","Admin\FilmcinemaController@del");


// 电影放映厅管理
Route::resource("/adminfilmprojection","Admin\ProjectionController");
// 放映厅删除
Route::get("/adminfilmprojectiondel","Admin\ProjectionController@del");

// 电影场次管理
Route::resource("/adminfilmscene","Admin\FilmsceneController");
// 自定义电影场次删除
Route::get("/adminfilmscenedel","Admin\FilmsceneController@del");
// 清除所有时间已过的电影场次
Route::get("/adminfilmscenedels","Admin\FilmsceneController@dels");

// 电影订单管理
Route::resource("/adminfilmorder","Admin\FilmorderController");
// 自定义订单删除
Route::get("/adminfilmorderdel","Admin\FilmorderController@del");
// 清除所有已过期的订单
Route::get("/adminfilmorderdels","Admin\FilmorderController@dels");
// 清除所有观影时间已过的订单
Route::get("/adminfilmorderdelss","Admin\FilmorderController@delss");












});

