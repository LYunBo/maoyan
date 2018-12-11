@extends('admin.Public.all')
@section('admin')
<meta name="keywords" content="H-ui.admin">
<meta name="description" content="H-ui.admin">
</head>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户添加 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="/adminusers" title="返回" ><i class="Hui-iconfont">&#xe625;</i></a></nav>
<body>
<!-- 提示信息 -->
@if(!empty(session('error')))
	<div class="Huialert Huialert-danger"><i class ="Hui-iconfont">&#xe6a6;</i>{{session('error')}}</div>
@endif
<article class="page-container">
	<form action="/adminusers" method="post" class="form form-horizontal" id="form-member-add">
		{{csrf_field()}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<!-- class内的为三元运算符判断生成样式 -->
				<input type="text" class="input-text {{empty($errors->get('username'))?'':'error'}}" value="" placeholder="请以字母开头5-16字节包括字母数组下划线" name="username">
				<!-- 验证信息,错误返回 下面一样 -->
				@if(count($errors)>0)
				@foreach($errors->get('username') as $username)
				<label class="error">{{$username}}</label>
				@endforeach
				@endif
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text {{empty($errors->get('password'))?'':'error'}}" value="" placeholder="请以字母开头6-18字节包括字母数组下划线" name="password">
				@if(count($errors)>0)
				@foreach($errors->get('password') as $pwd)
				<label class="error">{{$pwd}}</label>
				@endforeach
				@endif
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">确认密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text {{empty($errors->get('repassword'))?'':'error'}}" value="" placeholder="请确认密码"  name="repassword">
				@if(count($errors)>0)
				@foreach($errors->get('repassword') as $pwds)
				<label class="error">{{$pwds}}</label>
				@endforeach
				@endif
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text {{empty($errors->get('phone'))?'':'error'}}" value="" placeholder="请输入相对应手机格式" name="phone">
				@if(count($errors)>0)
				@foreach($errors->get('phone') as $phone)
				<label class="error">{{$phone}}</label>
				@endforeach
				@endif
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text {{empty($errors->get('email'))?'':'error'}}" placeholder="@" name="email" id="email">
				@if(count($errors)>0)
				@foreach($errors->get('email') as $email)
				<label class="error">{{$email}}</label>
				@endforeach
				@endif
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>


<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	

});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
@section('title','添加用户')