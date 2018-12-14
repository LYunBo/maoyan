@extends('admin.Public.all')
@section('admin')
<title>新增文章 - 资讯管理</title>
<meta name="keywords" content="H-ui.admin">
<meta name="description" content="H-ui.admin">
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 添加资讯 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="/hotnew" title="返回" ><i class="Hui-iconfont">&#xe625;</i></a></nav>
<div class="page-container">
<article class="page-container">
	<form class="form form-horizontal" id="form-article-add" method="post" action="/hotnew" enctype="multipart/form-data">
	{{csrf_field()}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资讯标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="articletitle" name="title">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">封面：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list"></div>
					<input type="file" name="cover">
				</div>
			</div>
		</div>
		<div class ="cl row">
 			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资讯内容：</label>
 			<textarea class ="textarea radius inputstyle" name ="content" cols ="100" rows ="300"> </textarea>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
			</div>
		</div>
	</form>
</article>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="lib/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="lib/ueditor/1.4.3/ueditor.all.min.js"> </script> 
<script type="text/javascript" src="lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
@endsection
@section('title','添加资讯')