@extends('admin.Public.Public')
@section('admin')
@if(session('success'))
<div class="Huialert Huialert-success"><i class="Hui-iconfont">&#xe6a6;</i>{{session('success')}}</div>

@endif
<h1 style="text-align:center;color:#a0a7b1;">欢迎
<span style="color:black">{{session('admin_user')}}</span>
来到后台首页</h1>
@endsection