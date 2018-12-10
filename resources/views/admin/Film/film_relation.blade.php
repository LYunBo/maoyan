@extends('admin.Public.meta')
<title>添加管理员 - 管理员管理</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	{{csrf_field()}}
	@foreach($data as $v)
	<div class="row cl">
		<b class="form-label col-xs-6 col-sm-2">年份：</b>
		<div class="formControls col-xs-8 col-sm-9">
			{{$v -> years}}
		</div>
	</div>
	<hr>
	<div class="row cl">
		<b class="form-label col-xs-6 col-sm-2">区域：</b>
		<div class="formControls col-xs-8 col-sm-9">
			{{$v -> district_id}}
		</div>
	</div>
	<hr>
	<div class="row cl">
		<b class="form-label col-xs-6 col-sm-2">类型：</b>
		<div class="formControls col-xs-8 col-sm-9">
			{{$v -> type_id}}
		</div>
	</div>
	<hr>
	<div class="row cl">
		<b class="form-label col-xs-6 col-sm-2">电影封面：</b>
		<div class="formControls col-xs-8 col-sm-9">
			<img width="350px" src="{{$v -> cover}}" alt="">
		</div>
	</div>
	<hr>
	<div class="row cl">
		<b class="form-label col-xs-6 col-sm-2">状态：</b>
		<div class="formControls col-xs-8 col-sm-9">
			{{$v -> playback_status}}
		</div>
	</div>
	<hr>
	<div class="row cl">
		<b class="form-label col-xs-6 col-sm-2">导演名：</b>
		<div class="formControls col-xs-8 col-sm-9">
			{{$v -> director}}
		</div>
	</div>
	<hr>
	@endforeach
	<div class="row cl">
		<b class="form-label col-xs-6 col-sm-2">演员名：</b>
		<div class="formControls col-xs-8 col-sm-9">
		@foreach($str as $k)
			{{$k -> name}}
			&nbsp;&nbsp;&nbsp;&nbsp;
		@endforeach
		</div>
	</div>
	<hr>
</article>
@extends('admin.Public.footer')

<!--请在下方写此页面业务相关的脚本-->
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
	
	$("#form-admin-add").validate({
		rules:{
			adminName:{
				required:true,
				minlength:4,
				maxlength:16
			},
			password:{
				required:true,
			},
			password2:{
				required:true,
				equalTo: "#password"
			},
			sex:{
				required:true,
			},
			phone:{
				required:true,
				isPhone:true,
			},
			email:{
				required:true,
				email:true,
			},
			adminRole:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "xxxxxxx" ,
				success: function(data){
					layer.msg('添加成功!',{icon:1,time:1000});
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
			});
			var index = parent.layer.getFrameIndex(window.name);
			parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>