@extends('admin.Public.meta')
<title>添加电影 - 电影管理</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
	@if(session("success"))
	<div class="Huialert Huialert-success"><i class="Hui-iconfont">&#xe6a6;</i>添加</div>
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
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影ID：</label>
		<div class="formControls col-xs-8 col-sm-9">
			{{$data[0] -> id}}
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影关联ID：</label>
		<div class="formControls col-xs-8 col-sm-9">
			{{$data[0] -> relation_id}}
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$data[0] -> name}}" placeholder="" id="adminName" name="name">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>放映时间：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off" value="{{$data[0] -> ymd}}" placeholder="" id="text" name="ymd">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影时长：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off"  placeholder="" id="text" name="times" value="{{$data[0] -> times}}">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影年代：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$data1[0] -> years}}" placeholder="" id="phone" name="years">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">区域：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="   select" name="district_id" size="1"> 
				<option {{($data1[0] -> district_id)=="0"?"selected":""}} value="0">大陆</option>
				<option {{($data1[0] -> district_id)=="1"?"selected":""}} value="1">美国</option>
				<option {{($data1[0] -> district_id)=="2"?"selected":""}} value="2">韩国</option>
				<option {{($data1[0] -> district_id)=="3"?"selected":""}} value="3">日本</option>
				<option {{($data1[0] -> district_id)=="4"?"selected":""}} value="4">中国香港</option>
				<option {{($data1[0] -> district_id)=="5"?"selected":""}} value="5">中国台湾</option>
				<option {{($data1[0] -> district_id)=="6"?"selected":""}} value="6">泰国</option>
				<option {{($data1[0] -> district_id)=="7"?"selected":""}} value="7">印度</option>
				<option {{($data1[0] -> district_id)=="8"?"selected":""}} value="8">法国</option>
				<option {{($data1[0] -> district_id)=="9"?"selected":""}} value="9">英国</option>
				<option {{($data1[0] -> district_id)=="10"?"selected":""}} value="10">俄罗斯</option>
				<option {{($data1[0] -> district_id)=="11"?"selected":""}} value="11">意大利</option>
				<option {{($data1[0] -> district_id)=="12"?"selected":""}} value="12">西班牙</option>
				<option {{($data1[0] -> district_id)=="13"?"selected":""}} value="13">德国</option>
				<option {{($data1[0] -> district_id)=="14"?"selected":""}} value="14">波兰</option>
				<option {{($data1[0] -> district_id)=="15"?"selected":""}} value="15">澳大利亚</option>
				<option {{($data1[0] -> district_id)=="16"?"selected":""}} value="16">伊朗</option>
				<option {{($data1[0] -> district_id)=="17"?"selected":""}} value="17">其他</option>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">类型：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:800px;">
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "0")
					checked
					@endif
				@endforeach
				value="0">爱情</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "1")
					checked
					@endif
				@endforeach
				value="1">喜剧</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "2")
					checked
					@endif
				@endforeach
				value="2">动画</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "3")
					checked
					@endif
				@endforeach
				value="3">剧情</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "4")
					checked
					@endif
				@endforeach
				value="4">恐怖</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "5")
					checked
					@endif
				@endforeach
				value="5">惊悚</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "6")
					checked
					@endif
				@endforeach
				value="6">科幻</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "7")
					checked
					@endif
				@endforeach
				value="7">动作</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "8")
					checked
					@endif
				@endforeach
				value="8">悬疑</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "9")
					checked
					@endif
				@endforeach
				value="9">犯罪</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "10")
					checked
					@endif
				@endforeach
				value="10">冒险</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "11")
					checked
					@endif
				@endforeach
				value="11">战争</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "12")
					checked
					@endif
				@endforeach
				value="12">奇幻</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "13")
					checked
					@endif
				@endforeach
				value="13">运动</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "14")
					checked
					@endif
				@endforeach
				value="14">家庭</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "15")
					checked
					@endif
				@endforeach
				value="15">古装</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "16")
					checked
					@endif
				@endforeach
				value="16">武侠</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "17")
					checked
					@endif
				@endforeach
				value="17">西部</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "18")
					checked
					@endif
				@endforeach
				value="18">历史</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "19")
					checked
					@endif
				@endforeach
				value="19">传记</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "20")
					checked
					@endif
				@endforeach
				value="20">歌舞</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "21")
					checked
					@endif
				@endforeach
				value="21">黑色电影</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "22")
					checked
					@endif
				@endforeach
				value="22">短片</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "23")
					checked
					@endif
				@endforeach
				value="23">纪录片</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="checkbox" name="type_id[]" @foreach($type_id as $v)
					@if($v == "24")
					checked
					@endif
				@endforeach
				value="24">其他</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">状态：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="playback_status" size="1">
				<option value="">--请选择--</option>
				<option {{($data1[0] -> playback_status)=="0"?"selected":""}} value="0">热播</option>
				<option {{($data1[0] -> playback_status)=="1"?"selected":""}} value="1">未播放</option>
				<option {{($data1[0] -> playback_status)=="2"?"selected":""}} value="2">经典</option>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影封面：</label>
		<div class="formControls col-xs-8 col-sm-9">
			重新选一张:<input type="file" value="" placeholder="" id="phone" name="cover">
			<br>
			<img style="width:500px;height:500px;border:1px solid #0085d2;" src="{{$data1[0] -> cover}}" alt="">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>导演名字：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="{{$data1[0] -> director}}" placeholder="" id="phone" name="director">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>导演头像：</label>
		<div class="formControls col-xs-8 col-sm-9">
			重新提交:<input type="file" value="" placeholder="" id="phone" name="director_img">
			<br>
			<img style="width:500px;height:500px;border:1px solid #0085d2;" src="{{$data1[0] -> director_img}}" alt="">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">电影简介：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="film_introduce" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)">{{$data[0] -> film_introduce}}</textarea>
			<p class="textarea-numberbar"><em class="textarea-length"><i>0</i></em>/<i>100</i></p>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电影图集：</label>
		<div class="formControls col-xs-8 col-sm-9">
			添加文件:<input type="file" value="" placeholder="" id="phone" name="film_img[]" multiple="multiple">
			<a href="javascript:;">删除所有图集</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>提示:双击图片可以删除该图</b>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>演员头像：</label>
		<div class="formControls col-xs-8 col-sm-9">
			请将图像命名为演员名字:<input type="file" value="" placeholder="请将图像命名为演员名字" id="phone" name="performer_img[]" multiple="multiple">
			<a href="javascript:;">删除所有演员</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>提示:双击图片可以删除该图</b>
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