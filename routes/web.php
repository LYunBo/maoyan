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

//后台会员
Route::resource('/adminusers','Admin\UsersController');
//修改会员密码
Route::get('/adminuserspwd/{id}','Admin\UsersController@pwd');
//do修改密码
Route::post('/adminuserspwds/{id}','Admin\UsersController@pwds');

// 电影列表
Route::resource("/adminfilmlist","Admin\FilmController");
Route::get("/adminfilmlists/{id}","Admin\FilmController@films");