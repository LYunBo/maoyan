@extends('admin.Public.meta')
<title>电影管理 - 添加电影</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 电影管理 <span class="c-gray en">&gt;</span> 添加电影 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a><a class="btn btn-primary radius r" style="line-height:1.6em;margin-top:3px" href="/adminfilmlist" title="电影列表" ><i class="Hui-iconfont">&#xe625;</i></a></nav>
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
	<form class="form form-horizontal" id="adminfilmlist" method="post" action="/adminfilmlist" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="adminName" name="name">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">上/下架：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="   select" name="film_status" size="1"> 
				<option value="">--请选择--</option>
				<option value="0">下架</option>
				<option value="1">上架</option>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>放映时间：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off" value="" placeholder="" id="text" name="ymd">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影时长：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off"  placeholder="" id="text" name="times">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影年代：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="phone" name="years">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">区域：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="   select" name="district_id" size="1"> 
				<option value="">--请选择--</option>
				<option value="0">大陆</option>
				<option value="1">美国</option>
				<option value="2">韩国</option>
				<option value="3">日本</option>
				<option value="4">中国香港</option>
				<option value="5">中国台湾</option>
				<option value="6">泰国</option>
				<option value="7">印度</option>
				<option value="8">法国</option>
				<option value="9">英国</option>
				<option value="10">俄罗斯</option>
				<option value="11">意大利</option>
				<option value="12">西班牙</option>
				<option value="13">德国</option>
				<option value="14">波兰</option>
				<option value="15">澳大利亚</option>
				<option value="16">伊朗</option>
				<option value="17">其他</option>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">类型：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:800px;">
				<label><input type="checkbox" name="type_id[]" value="0">爱情</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="1">喜剧</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="2">动画</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="3">剧情</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="4">恐怖</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="5">惊悚</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="6">科幻</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="7">动作</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="8">悬疑</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="9">犯罪</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="10">冒险</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="11">战争</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="12">奇幻</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="13">运动</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="14">家庭</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="15">古装</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="16">武侠</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="17">西部</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="18">历史</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="19">传记</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="20">歌舞</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="21">黑色电影</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="22">短片</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="23">纪录片</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" value="24">其他</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">状态：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="playback_status" size="1">
				<option value="">--请选择--</option>
				<option value="0">热播</option>
				<option value="1">即将上映</option>
				<option value="2">经典</option>
				<option value="0,1">热播,即将上映</option>
				<option value="0,2">热播,经典</option>
				<option value="1,2">即将上映,经典</option>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影图集：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="file" value="" placeholder="" id="phone" name="film_img[]" multiple="multiple">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影封面：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="file" value="" placeholder="" id="phone" name="cover">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>导演名字：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="phone" name="director">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>导演头像：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="file" value="" placeholder="" id="phone" name="director_img">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>演员头像：</label>
		<div class="formControls col-xs-8 col-sm-9">
			请将图像命名为演员名字:<input type="file" value="" placeholder="请将图像命名为演员名字" id="phone" name="performer_img[]" multiple="multiple">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">电影简介：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="film_introduce" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>
			<p class="textarea-numberbar"><em class="textarea-length"><i>0</i></em>/<i>100</i></p>
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