@extends('admin.Public.all')
@section('admin')
<title>新增文章 - 资讯管理</title>
<meta name="keywords" content="H-ui.admin">
<meta name="description" content="H-ui.admin">
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 修改资讯 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="/img" title="返回" ><i class="Hui-iconfont">&#xe625;</i></a></nav>
<div class="page-container">
@if(session('wrong'))
	<div class="Huialert Huialert-danger"><i class ="Hui-iconfont">&#xe6a6;</i>{{session('wrong')}}</div>
@endif
<article class="page-container">
	<form class="form form-horizontal" id="form-article-add" method="post" action="/img/{{$list->id}}" enctype="multipart/form-data">
	{{csrf_field()}}
	{{method_field('PUT')}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图集标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$list->title}}" id="articletitle" name="title">
			</div>
		</div>
		<div class ="cl row">
 			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图集内容：</label>
			<div class="uploader-thum-container">
				<div class="portfolio-content">
					<ul class="cl portfolio-area">
						@foreach($imgs as $img)
						<li class="item hover">
							<div class="portfoliobox">
								<input class="checkbox" onclick="imgdel(this)" type="checkbox">
								<img src="{{$img}}" width="150" height="150">
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class ="cl row">
 			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>修改图集内容：</label>
 			<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list"></div>
					<input type="file" name="img" multiple="multiple"  />
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>简介：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="introduction" cols="" rows="" class="textarea" placeholder="" datatype="*10-100" dragonfly="true">{{$list->introduction}}</textarea>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius">提交</button>
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
<script type="text/javascript" src="/static/admin/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="/static/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script> 
<script type="text/javascript" src="/static/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
	function imgdel(obj){
		console.log($(obj).next('img').attr('src'));
	}
	
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
@section('title','修改图集')