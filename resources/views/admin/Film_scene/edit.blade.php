@extends('admin.Public.meta')
<title>电影场次管理 - 修改电影场次</title>
<script src="/static/jquery-1.8.3.min.js"></script>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 电影场次管理 <span class="c-gray en">&gt;</span> 修改电影场次 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a><a class="btn btn-primary radius r" style="line-height:1.6em;margin-top:3px" href="/adminfilmscene" title="电影场次列表" ><i class="Hui-iconfont">&#xe625;</i></a></nav>
<body>
	@if(!empty(session("success")))
	<div class="Huialert Huialert-success"><i class="Hui-iconfont">&#xe6a6;</i>
	{{session('success')}}
	</div>
	@endif
	@if(count($errors) >0)
	@foreach($errors -> all() as $v)
	<div class="Huialert Huialert-danger"><i class="Hui-iconfont">&#xe6a6;</i>
		{{$v}}
	</div>
	@endforeach
	@endif
<article class="page-container">
	<form class="form form-horizontal" id="adminfilmcinema" method="post" action="/adminfilmscene/{{$data[0] -> id}}" enctype="multipart/form-data">
	{{csrf_field()}}
	{{method_field("PUT")}}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">城市：</label>
		<div class="formControls col-xs-8 col-sm-9"> 
			省:&nbsp;&nbsp;<span class="select-box" style="width:150px;">
			<select class="   select" name="city" size="1" id="city">
				<option selected id="city_option" value="{{$city_provincial[0] -> id}}">{{$city_provincial[0] -> name}}</option>
				@foreach($city as $v)
				<option value="{{$v -> id}}">{{$v -> name}}</option>
				@endforeach
			</select>
			</span>
			市:&nbsp;&nbsp;<span class="select-box" style="width:150px;">
			<select class="   select" name="citys" size="1" id="citys">
				<option selected id="citys_option" value="{{$city_citys[0] -> id}}">{{$city_citys[0] -> name}}</option>
			</select>
			</span>
			电影院:&nbsp;&nbsp;<span class="select-box" style="width:150px;">
			<select class="   select" name="cinema_id" size="1" id="cityss">
				<option selected id="cityss_option" value="{{$data[0] -> cinema_id}}">{{$data[0] -> cinema_name}}</option>
			</select>
			</span>
			放映厅:&nbsp;&nbsp;<span class="select-box" style="width:150px;">
			<select class="   select" name="projection_hall_id" size="1" id="citysss">
				<option selected id="citysss_option" value="{{$data[0] -> projection_hall_id}}">{{$data[0] -> projection_name}}</option>
			</select>
			</span>
		</div>
	</div>
	<script>
		$("#city").change(function(){
			$value = $(this).find(":selected").val();
			$.get("/adminfilmscene/create",{"city_upid":$value},function(result){
				// console.log(result.length);
				$("#citys").empty();
				$("#citys").append('<option id="citys_option" value="">--请选择--</option>');
				$("#cityss").empty();
				$("#cityss").append('<option id="cityss_option" value="">--请选择--</option>');
				$("#citysss").empty();
				$("#citysss").append('<option id="citysss_option" value="">--请选择--</option>');
				for(var i=0;i<result.length;i++){
					$("#citys").append('<option value="'+(result[i].id)+'">'+(result[i].name)+'</option>');
				}
			});
			$("#city_option").remove();
		})
		$("#citys").change(function(){
			$value = $(this).find(":selected").val();
			$.get("/adminfilmscene/create",{"city_idss":$value},function(result){
				$("#cityss").empty();
				$("#cityss").append('<option id="cityss_option" value="">--请选择--</option>');
				if (result == "") {
					$("#cityss").empty();
					$("#cityss").append('<option id="cityss_option" value="">请先去创建电影院</option>');
					$("#citysss").empty();
					$("#citysss").append('<option id="citysss_option" value="">请先去创建电影院</option>');
				}else{
					for(var i=0;i<result.length;i++){
						$("#cityss").append('<option value="'+(result[i].id)+'">'+(result[i].name)+'</option>');
					}
				}
			});
			$("#citys_option").remove();
		})
		$("#cityss").change(function(){
			$value = $(this).find(":selected").val();
			$.get("/adminfilmscene/create",{"cinema_id":$value},function(result){
				$("#citysss").empty();
				$("#citysss").append('<option id="citysss_option" value="">--请选择--</option>');
				if (result == "") {
					$("#citysss").empty();
					$("#citysss").append('<option id="citysss_option" value="">请先去创建放映厅</option>');
				}else{
					// alert(result.length);
					for(var i=0;i<result.length;i++){
						$("#citysss").append('<option value="'+(result[i].id)+'">'+(result[i].name)+'</option>');
					}
				}
			});
			$("#cityss_option").remove();
		})

	</script>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>放映时间：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$data[0] -> hi}}" placeholder="如:2018-10-10" id="hi" name="hi">
		</div>
	</div>
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>观影时间：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off" value="{{$data[0] -> times}}" placeholder="如:15:30" id="times" name="times">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>售价/单位元：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off" value="{{$data[0] -> price}}" placeholder="50" id="price" name="price">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>语言版本：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<span class="select-box" style="width:150px;">
			<select class="   select" name="language" size="1"> 
				<option value="">无</option>
				@foreach($language as $k => $v)
				<option {{($data[0] -> language) == $k?"selected":""}} value="{{$k}}">{{$v}}</option>
				@endforeach
			</select>
			</span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影选择：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<span class="select-box" style="width:150px;">
			<select class="   select" name="film_id" size="1"> 
				@foreach($film as $v)
				<option {{($data[0] -> film_id) == ($v -> id)?"selected":""}} value="{{$v -> id}}">{{$v -> name}}</option>
				@endforeach
			</select>
			</span>
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