@extends('admin.Public.meta')
<title>电影院管理 - 修改电影院</title>
<script src="/static/jquery-1.8.3.min.js"></script>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 电影院管理 <span class="c-gray en">&gt;</span> 添加电影院 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a><a class="btn btn-primary radius r" style="line-height:1.6em;margin-top:3px" href="/adminfilmcinema" title="电影院列表" ><i class="Hui-iconfont">&#xe625;</i></a></nav>
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
	<form class="form form-horizontal" id="adminfilmcinema" method="post" action="/adminfilmcinema/{{$data[0] -> id}}" enctype="multipart/form-data">
	{{csrf_field()}}
	{{method_field("PUT")}}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">城市：</label>
		<div class="formControls col-xs-8 col-sm-9"> 
			省:&nbsp;&nbsp;<span class="select-box" style="width:150px;">
			<select class="   select" name="city" size="1" id="city">
				<option id="city_option" value="{{$citys[0] -> id}}">{{$citys[0] -> name}}</option>
				@foreach($city_q as $v)
				<option value="{{$v -> id}}">{{$v -> name}}</option>
				@endforeach
			</select>
			</span>
			市:&nbsp;&nbsp;<span class="select-box" style="width:150px;">
			<select class="   select" name="citys" size="1" id="citys">
				<option id="citys_option" value="{{$city[0] -> id}}">{{$city[0] -> name}}</option>
			</select>
			</span>
		</div>
	</div>
	<script>
		$("#city").change(function(){
			$value = $(this).find(":selected").val();
			$.get("/adminfilmcinema/create",{"city_upid":$value},function(result){
				// console.log(result.length);
				$("#citys").empty();
				$("#citys").append('<option id="citys_option" value="">--请选择--</option>');
				for(var i=0;i<result.length;i++){
					$("#citys").append('<option id="citys_option" value="'+(result[i].id)+'">'+(result[i].name)+'</option>');
				}
			});
			$("#city_option").remove();
		})
	</script>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影院名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$data[0] -> name}}" placeholder="" id="name" name="name">
		</div>
	</div>
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影院电话：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off" value="{{$data[0] -> cinema_phone}}" placeholder="" id="cinema_phone" name="cinema_phone">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影院详细地址：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off"  placeholder="" id="address" name="address" value="{{$data[0] -> address}}">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影院品牌：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$data[0] -> brand}}" placeholder="" id="brand" name="brand">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影院封面图：</label>
		<div class="formControls col-xs-8 col-sm-9">
			重新提交:<input type="file" value="" placeholder="" id="cover" name="cover" multiple="multiple">
			<br>
			<img src="{{$data[0] -> cover}}" style="width:200px;" alt="">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影院图集：</label>
		<div class="formControls col-xs-8 col-sm-9">	
			提示:提交的图集会在原来的基础上加上去
			<br>
			<input type="file" value="" placeholder="" id="covers" name="covers[]" multiple="multiple">
			<a class="btn btn-primary" href="javascript:;" onclick="funz(this,{{$data[0] -> id}})">删除全部图集</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>小提示:双击可删除</b>
			<br>
			@for($i=0;$i<$num;$i++)
			<span class="data1_film_img">
				<input type="text" value="{{$data[0] -> id}}" style="display:none;"><img style="width:100px;height:150px;border:1px solid #0085d2;margin-bottom:10px;" src="{{$covers[$i]}}" ondblclick="fun(this,{{$i}})" alt="">
			</span>
			@endfor
		</div>
	</div>
	<script>
	function fun(thiss,num){
		// 获取要操作的cinema表的id
		var id = $(thiss).prev().val();
		alert(id);
		alert(num);
		// 确认是否删除
		var trues = confirm("确定删除么?");
		if (trues) {
			$.get("/adminfilmcinemacoverdel",{"id":id,"num":num},function(result){
				alert(result);
				if (result == "1") {
					$(thiss).parents("span").remove();
				}else{
					alert("删除图集失败");
				}
			})
		}
	}
	function funz(thiss,id){
		// 删除全部图集，将num当成空的条件传过去
		var trues = confirm("确定删除全部图集么?");
		if (trues) {
			$.get("/adminfilmcinemacoverdel",{"id":id,"num":""},function(result){
				if (result == "1") {
					// 删除span
					$(".data1_film_img").remove();
				}else{
					alert("删除图集失败");
				}
			})
		}
	}
	</script>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影院服务：</label>
		<div class="formControls col-xs-8 col-sm-9">
			3D眼镜:
			<br>
			<span class="select-box" style="width:150px;">
			<select class="   select" name="service1" size="1"> 
				<option {{$service[0]=="0"?"selected":""}} value="0">无</option>
				<option {{$service[0]=="1"?"selected":""}} value="1">免押金</option>
				<option {{$service[0]=="2"?"selected":""}} value="2">5元/副</option>
				<option {{$service[0]=="3"?"selected":""}} value="3">3元/副起步</option>
			</select>
			</span>
			<br>
			儿童优惠:
			<br>
			<span class="select-box" style="width:150px;">
			<select class="   select" name="service2" size="1"> 
				<option {{$service[1]=="0"?"selected":""}} value="0">无</option>
				<option {{$service[1]=="1"?"selected":""}} value="1">1.3m（不含）以下2D\3D免费，需由1名成人陪同</option>
			</select>
			</span>
			<br>
			可停车:
			<br>
			<span class="select-box" style="width:150px;">
			<select class="   select" name="service3" size="1">
				<option {{$service[2]=="0"?"selected":""}} value="0">无</option>
				<option {{$service[2]=="1"?"selected":""}} value="1">影院地下停车场可停车</option>
				<option {{$service[2]=="2"?"selected":""}} value="1">看电影免费停车3小时</option>
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