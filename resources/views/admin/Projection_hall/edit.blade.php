@extends('admin.Public.meta')
<title>电影院放映厅管理 - 修改电影院放映厅</title>
<script src="/static/jquery-1.8.3.min.js"></script>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 电影院放映厅管理 <span class="c-gray en">&gt;</span> 修改电影院放映厅 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a><a class="btn btn-primary radius r" style="line-height:1.6em;margin-top:3px" href="/adminfilmprojection" title="电影院放映厅列表" ><i class="Hui-iconfont">&#xe625;</i></a></nav>
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
	<form class="form form-horizontal" id="adminfilmprojection" method="post" action="/adminfilmprojection/{{$data1[0] -> id}}" enctype="multipart/form-data">
	{{csrf_field()}}
	{{method_field("PUT")}}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>选择已有电影院：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<span class="select-box" style="width:150px;">
			<select class="select" name="cinema" size="1"> 
				<option value="{{$data1[0] -> id}}">{{$data1[0] -> cinema_name}}</option>
				@foreach($data as $v)
				<option value="{{$v -> id}}">{{$v -> name}}</option>
				@endforeach
			</select>
			</span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>播放厅名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$data1[0] -> name}}" placeholder="" id="name" name="name">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>播放厅座位安排：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<br>
			_代表过道/空位
			<br>
			e代表位置
			<br>
			,代表过行
			<br>
			请不要输入其他，也不要按下回车来跳行
			<br>
			<input type="text" class="input-text" autocomplete="off" value="{{$data1[0] -> seat}}" placeholder="例如:_eeeeeee_eeeeeee,_eeeeeee_eeeee" id="seat" name="seat">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>播放厅座位数：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off"  placeholder="" id="couts" name="couts" value="{{$data1[0] -> couts}}">
		</div>
	</div>
	<script>
		$("#seat").blur(function(){
			var $value = $(this).val();
			var num = $value.length;
			var j = 0;
			for(var i=0;i<num;i++){
				if ($value[i] == "e") {
					j = j+1;
				}
			}
			$("#couts").val(j);
		});
	</script>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>放映厅类型：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<span class="select-box" style="width:150px;">
			<select class="   select" name="type" size="1">  
				<option {{($data1[0] -> type) =="1"?"selected":""}} value="1">IMAX厅</option>
				<option {{($data1[0] -> type) =="2"?"selected":""}} value="2">CGS中国巨幕厅</option>
				<option {{($data1[0] -> type) =="3"?"selected":""}} value="3">杜比全景声厅</option>
				<option {{($data1[0] -> type) =="4"?"selected":""}} value="4">RealD厅</option>
				<option {{($data1[0] -> type) =="5"?"selected":""}} value="5">RealD</option>
				<option {{($data1[0] -> type) =="6"?"selected":""}} value="6">6FL厅</option>
				<option {{($data1[0] -> type) =="7"?"selected":""}} value="7">LUXE巨幕厅</option>
				<option {{($data1[0] -> type) =="8"?"selected":""}} value="8">4DX厅</option>
				<option {{($data1[0] -> type) =="9"?"selected":""}} value="9">DTS:X</option>
				<option {{($data1[0] -> type) =="10"?"selected":""}} value="10">临境音厅</option>
				<option {{($data1[0] -> type) =="11"?"selected":""}} value="11">儿童厅</option>
				<option {{($data1[0] -> type) =="12"?"selected":""}} value="12">4K厅</option>
				<option {{($data1[0] -> type) =="13"?"selected":""}} value="13">4D厅</option>
				<option {{($data1[0] -> type) =="14"?"selected":""}} value="14">巨幕厅</option>
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