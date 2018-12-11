@extends('admin.Public.meta')

<title>修改密码 - 会员管理</title>
<meta name="keywords" content="H-ui.admin">
<meta name="description" content="H-ui.admin">
</head>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 修改用户密码 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="/adminusers" title="返回" ><i class="Hui-iconfont">&#xe625;</i></a></nav>
<body>
<!-- 提示信息 -->
@if(!empty(session('error')))
	<div class="Huialert Huialert-danger"><i class ="Hui-iconfont">&#xe6a6;</i>{{session('error')}}</div> 
@endif
<article class="page-container">
	<form action="/adminuserspwds/{{$res->id}}" method="post" class="form form-horizontal" id="form-change-password">
		{{csrf_field()}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>账户：</label>
			<div class="formControls col-xs-8 col-sm-9">{{$res->username}}</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" value="" placeholder="请以字母开头6-18字节包括字母数组下划线" name="password">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">确认密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" value="" placeholder="请确认密码" name="repassword">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

@extends('admin.Public.footer')

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>