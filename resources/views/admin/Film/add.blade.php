@extends('admin.Public.meta')
<title>添加电影 - 电影管理</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
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
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="   select" name="type_id" size="1">                           
				<option value="">--请选择--</option>
				<option value="0">爱情</option>
				<option value="1">喜剧</option>
				<option value="2">动画</option>
				<option value="3">剧情</option>
				<option value="4">恐怖</option>
				<option value="5">惊悚</option>
				<option value="6">科幻</option>
				<option value="7">动作</option>
				<option value="8">悬疑</option>
				<option value="9">犯罪</option>
				<option value="10">冒险</option>
				<option value="11">战争</option>
				<option value="12">奇幻</option>
				<option value="13">运动</option>
				<option value="14">家庭</option>
				<option value="15">古装</option>
				<option value="16">武侠</option>
				<option value="17">西部</option>
				<option value="18">历史</option>
				<option value="19">传记</option>
				<option value="20">歌舞</option>
				<option value="21">黑色电影</option>
				<option value="22">短片</option>
				<option value="23">纪录片</option>
				<option value="24">其他</option>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">状态：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="playback_status" size="1">
				<option value="">--请选择--</option>
				<option value="0">热播</option>
				<option value="1">未播放</option>
				<option value="2">经典</option>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影图集：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="file" value="" placeholder="" id="phone" name="film_img" multiple="multiple">
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
			请将图像命名为演员名字:<input type="file" value="" placeholder="请将图像命名为演员名字" id="phone" name="performer_img" multiple="multiple">
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