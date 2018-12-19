@extends('admin.Public.all')
@section('admin')
<title>新增文章 - 资讯管理</title>
<meta name="keywords" content="H-ui.admin">
<meta name="description" content="H-ui.admin">
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图集管理 <span class="c-gray en">&gt;</span> 修改图集 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="/img" title="返回" ><i class="Hui-iconfont">&#xe625;</i></a></nav>
<div class="page-container">
@if(count($errors)>0)
	@foreach($errors->all() as $error)
	<div class="Huialert Huialert-error"><i class="Hui-iconfont">&#xe6a6;</i>{{$error}}</div>
	@endforeach
@endif
<article class="page-container">
	<form class="form form-horizontal" id="form-article-add" method="post" action="/img/{{$list->id}}" enctype="multipart/form-data">
	{{csrf_field()}}
	{{method_field('PUT')}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图集标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="{{$list->title}}" id="articletitle" name="title">
			</div>
		</div>
		<div class ="cl row">
 			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图集内容：</label>
			<div class="uploader-thum-container">
				<div class="portfolio-content">
					<ul class="cl portfolio-area">
						@foreach($imgs as $img)
						<li class="item hover">
							<div class="portfoliobox" style="text-align: center">
								<input type="hidden" value="{{$list->id}}">
								<img src="{{$img}}" width="150" height="150">
								<a href="javascript:;" onclick="imgdel(this)" class="btn btn-danger">删除</a>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<br />
		<br />
		<div class ="cl row">
 			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>修改所有图集内容：</label>
 			<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list"></div>
					<input type="file" multiple="multiple" name="img[]">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>简介：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="introduction" cols="" rows="" class="textarea" placeholder="{{$list->introduction}}" datatype="*10-100" dragonfly="true"></textarea>
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
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
	function imgdel(obj){
		dd = confirm('确定要删除此图片吗?');
		imgupload = $(obj).prev().attr('src');
		id = $(obj).prev().prev().val();
		if(dd){
			// console.log(imgupload);
			$.get('/imgsdel',{'imgupload':imgupload,'id':id},function(data){
				if(data == 1){
					 $(obj).parents('li').remove();
					 layer.msg('已删除!',{icon: 6,time:1000});
				}else{
					console.log('删除失败了');
				}
			});
		}
	}
	
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
@section('title','修改图集')