@extends('admin.Public.all')
@section('admin')
<title>资讯管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 热点管理 <span class="c-gray en">&gt;</span> 资讯管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a><a class="btn btn-primary radius r" style="line-height:1.6em;margin-top:3px" href="/hotnew" title="返回" ><i class="Hui-iconfont">&#xe625;</i></a></nav>
@if(!empty(session('success')))
	<div class = "Huialert Huialert-success"> <i class ="Hui-iconfont">&#xe6a6;</i>{{session('success')}}</div>
@endif
<div class="page-container">
	<form action="/hotnew" method="get">
		<div class="text-c">
			<input type="text" name="keyword" value="{{$request['keyword'] or ''}}" placeholder=" 资讯" style="width:250px" class="input-text">
			<button class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i>搜资讯</button>
		</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="/hotnew/create"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a></span> <span class="r">共有数据：<strong>{{$tol}}</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="80">ID</th>
					<th width="100">标题</th>
					<th width="100">封面</th>
					<th>内容</th>
					<th width="150">点赞</th>					
					<th width="60">浏览量</th>
					<th width="150">发布时间</th>
					<th width="150">修改时间</th>
					<th>状态</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			@if(!empty($list))
				@foreach($list as $row)
				<tr class="text-c">
					<td><input name="" type="checkbox" value=""></td>
					<td>{{$row->id}}</td>
					<td>{{$row->title}}</td>
					<td><img width="100" height="80" class="picture-thumb" src="{{$row->cover}}"></td>
					<td><u style="cursor:pointer" class="text-primary" onclick="content_show('文章内容','/hotnew/{{$row->id}}','10001','360','400')">资讯内容</u></td>
					<td>{{$row->nice}}</td>				
					<td>{{$row->browse}}</td>
					<td>{{$row->created_at}}</td>
					<td>{{$row->updated_at}}</td>
					<td class="td-status">
					@if($row->status == 0)
						<span class="label label-danger radius">未审核</span>
					@elseif($row->status == 1)
						<span class="label label-default radius">已通过</span>
					@elseif($row->status == 2)
						<span class="label label-success radius">已发布</span>
					@elseif($row->status == 3)
						<span class="label label-defaunt radius">已下架</span>
					@endif
					</td>
					<td class="td-manage">
						<a style="text-decoration:none" 
						@if($row->status == 0)
							onclick="shenhe(this,{{$row->id}})" title='审核'
						@elseif($row->status == 1)
							onclick="fabu(this,{{$row->id}})" title='上线'
						@elseif($row->status == 2)
							onclick="xiajia(this,{{$row->id}})" title='下架'
						@elseif($row->status == 3)
							onclick="fabu(this,{{$row->id}})" title='发布'
						@endif
						 href="javascript:;">
						@if($row->status == 0) 
							审核 
						@elseif($row->status == 1) 
							上线 
						@elseif($row->status == 2)
							<i class="Hui-iconfont">&#xe6de;</i>
						@elseif($row->status == 3)
							<i class="Hui-iconfont">&#xe603;</i>
						@endif
						</a>
						<a style="text-decoration:none" class="ml-5" href="/hotnew/{{$row->id}}/edit" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a><a style="text-decoration:none" class="ml-5" onclick="del(this,{{$row->id}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				@endforeach
			@endif
			</tbody>
		</table>
	</div>
</div>
<!-- 分页 -->
{{$list->render()}}
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
	]
});*/
/*文章内容-查看*/
function content_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*状态的JS*/
// 审核
function shenhe(obj,id){
	// 判断审核是或否
	layer.confirm('是否通过审核资讯?',function(){
		//通过ajax提交数据该表状态
		$.get('/hotnewtg',{'id':id},function(data){
			if(data == 1){
				$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onclick="fabu(this,{{$row->id or ''}})" href="javascript:;" title="上线">上线</a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已通过</span>');
				$(obj).remove();
				layer.msg('已通过', {icon:6,time:1000});
			}
		});
		
	});
	
}
//发布
function fabu(obj,id){
	// 判断是否发布
	layer.confirm('是否发布资讯?',function(){
		//通过ajax提交数据该表状态
		$.get('/hotnewfb',{'id':id},function(data){
			if(data ==  2){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onclick="xiajia(this,{{$row->id or ''}})" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
				$(obj).remove();
				layer.msg('已发布', {icon:6,time:1000});
			}
		});
	});
	
}
//下架
function xiajia(obj,id){
	// 判断是否发布
	layer.confirm('是否下架资讯?',function(){
		$.get('/hotnewxj',{'id':id},function(data){
			if(data == 3){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onclick="fabu(this,{{$row->id or ''}})" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
				$(obj).remove();
				layer.msg('已下架!',{icon: 5,time:1000});
			}
		});
	});
	
}
/*删除*/
function del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.get('/hotnewdel',{'id':id},function(data){
			if(data == 1){
				$(obj).parents('tr').remove();
				layer.msg('已删除!',{icon: 6,time:1000});
			}else{
				layer.msg('删除失败',{icon: 5,time:1000});
			}
		});		
	});
}
</script>
</body>
@endsection
@section('title','资讯列表')
