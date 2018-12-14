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

/*Route::get('/', function () {
    return view('welcome');
});*/

//后台首页路由
Route::resource('/admin','Admin\AdminController');

//后台管理员
Route::resource('/adminuser','Admin\UserController');
//Ajax 后台用户状态statuss变动
Route::get("/statuss","Admin\UserController@statuss");

//Aja 删除后台用户
Route::get("/del",'Admin\UserController@del');

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


// 电影场次管理
Route::resource("/adminfilm_scene_list","Admin\FilmsceneController");
