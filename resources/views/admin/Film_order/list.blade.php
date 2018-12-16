@extends('admin.Public.meta')
<title>电影订单管理</title>
</head>
<script src="/static/jquery-1.8.3.min.js"></script>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 电影订单管理 <span class="c-gray en">&gt;</span> 电影订单列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<form action="/adminfilmlist" method="get">
		<input type="text" class="input-text" style="width:250px" placeholder="手机号码" id="" name="name">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜手机号</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="del_checked()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 清除所有已过期订单</a>  <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 清除所有已看订单</a></span> <span class="r">共有数据：<strong>1</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="50">订单ID</th>
				<th width="50">用户ID</th>
				<th width="50">电影场次ID</th>
				<th width="150">手机号</th>
				<th width="130">订单号</th>
				<th width="130">价格 &nbsp; /张</th>
				<th width="130">票数</th>
				<th width="130">座位</th>
				<th width="130">是/否支付</th>
				<th width="130">是/否申请退单</th>
				<th width="130">退单理由</th>
				<th width="130">订单时间</th>
				<th width="130">修改订单时间</th>
				<th width="50">后台允许退单</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $row)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$row -> id}}</td>
				<td>{{$row -> user_id}}</td>
				<td>{{$row -> film_id}}</td>
				<td>{{$row -> phone}}</td>
				<td>{{$row -> order_number}}</td>
				<td>{{$row -> price}}</td>
				<td>{{$row -> num}}</td>
				<td>{{$row -> seat_num}}</td>
				<td>{{$row -> payment}}</td>
				<td>{{$row -> eturn_goods}}</td>
				<td><a href="javascript:;" onclick="member_add('退单理由','/adminfilmorder/{{$row -> id}}','500','500')">测试</a></td>
				<td>{{$row -> created_at}}</td>
				<td>{{$row -> updated_at}}</td>
				<td>{{$row -> ny}}</td>
				<td class="td-manage"><a title="编辑" href="javascript:;" onclick="member_add('退单理由','/adminfilmorder/{{$row -> id}}/edit','500','300')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{$data -> appends($request) -> render()}}
	</div>
	<script>
		function del_checked(){
			var trues = confirm("确定全部删除么?");
			if (trues) {
				var num = $(":checked").length;
				alert(num);
				for(var i=0;i<num-2;i++){
					id = $(":checked").eq(i).val();
					if (id != 0) {
						$.get("/adminfilmorderdel",{"id":id},function(result){
							if (result == "1") {
								i--
								$(":checked").eq(i).parents("tr").remove();
							}else{
								alert("删除失败");
							}
						})
					}
				}
				
			}
		}
	</script>
</div>
@extends('admin.Public.footer')
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});
	
});*/
// $('.table-sort').dataTable({});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){
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
</script> 
</body>
</html>