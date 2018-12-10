@extends('admin.Public.meta')
<title>电影列表</title>
</head>
<script src="/static/jquery-1.8.3.min.js"></script>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 电影管理 <span class="c-gray en">&gt;</span> 电影列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 电影名：
		<input type="text" class="input-text" style="width:250px" placeholder="输入电影名称" id="" name="">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜电影</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> </span> <span class="r">共有数据：<strong>{{$counts}}</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="8">电影列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="42px">ID</th>
				<th width="">电影名</th>
				<th width="120px">电影上映时间</th>
				<th width="120px">电影时长</th>
				<th width="100px">评分</th>
				<th width="100px">票房</th>
				<th width="150px">操作</th>
			</tr>
		</thead>
		<!-- film表的遍历 -->
			@foreach($data as $v)
		<tbody>
			<tr class="text-c">
				<td><input type="checkbox" value="2" name=""></td>
				<td>{{$v -> id}}</td>
				<td>{{$v -> name}}</td>
				<td>{{$v -> ymd}}</td>
				<td>{{$v -> times}}</td>
				<td>{{$v -> score}}</td>
				<td>{{$v -> box_office}}</td>
				<td class="td-manage">
					<a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','admin-add.html','2','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>&nbsp;&nbsp;&nbsp;
					<a title="删除" href="javascript:;" onclick="admin_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>&nbsp;&nbsp;&nbsp;
					<a title="详情" href="javascript:;" onclick="admin_add('详细信息','/adminfilmlists/{{$v -> relation_id}}','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe725;</i></a>
				</td>
			</tr>
		</tbody>
		@endforeach

		<!-- 分页样式 -->
		<tbody>
			<tr>
				<style>
					.pagination{
						list-style:none;
					}
					.pagination > li{
						float:left;
					}
				</style>
				<th scope="col" colspan="8">{{$data -> render()}}</th>
				<script>
					$(".pagination").find("li").addClass("btn btn-info");
					$(".pagination").find("li:first").html("上一页");
					$(".pagination").find("li:last").html("下一页");
				</script>
			</tr>
		</tbody>
	</table>
</div>
@extends('admin.Public.footer')
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!', {icon: 6,time:1000});
	});
}
</script>
</body>
</html>