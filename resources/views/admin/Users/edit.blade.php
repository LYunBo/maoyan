@extends('admin.Public.meta')

<title>添加用户 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin">
<meta name="description" content="H-ui.admin">
</head>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户修改 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="/adminusers" title="返回" ><i class="Hui-iconfont">&#xe625;</i></a></nav>
<body>
<article class="page-container">
	<form action="/adminusers/{{$list->id}}" method="post" class="form form-horizontal" id="form-member-add">
		{{method_field('PUT')}}
		{{csrf_field()}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$list->username}}" placeholder="" name="username">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$list->phone}}" placeholder="" name="phone">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" value="{{$list->email}}" class="input-text" placeholder="@" name="email">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

@extends('admin.Public.footer')

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>

<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>