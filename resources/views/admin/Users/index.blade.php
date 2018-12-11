@extends('admin.Public.meta')
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<!-- 提示信息 -->
@if(!empty(session('success')))
	<div class = "Huialert Huialert-success"> <i class ="Hui-iconfont">&#xe6a6;</i>{{session('success')}}</div>
@endif
<div class="page-container">
	<div class="text-c">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="/adminusers/create" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong>{{$tol}}</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">用户名</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th width="130">加入时间</th>
				<th width="130">修改时间</th>
				<th width="90">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		<!-- 数据遍历 -->
		@foreach($list as $row)
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>{{$row->id}}</td>
				<td>{{$row->username}}</u></td>
				<td>{{$row->phone}}</td>
				<td>{{$row->email}}</td>
				<td>{{$row->created_at}}</td>
				<td>{{$row->updated_at}}</td>
				<td>
					<!-- 判断状态显示样式 -->
					@if($row->status == 0)
					<span class="label radius">已停用</span>
					@else
					<span class="label label-success radius">已启用</span>
					@endif
				</td>
				<td class="td-manage">
					<a style="text-decoration:none" href="javascript:;" onclick="start({{$row->id}})" id="start" title="启用"><i class="Hui-iconfont">
						@if($row->status == 0)
							&#xe615;
						@else
							&#xe636;
						@endif
					</i></a>
					<a title="编辑" href="/adminusers/{{$row->id}}/edit" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
					<a href="/adminuserspwd/{{$row->id}}" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a>
					<a title="删除" href="javascript:;" class="ml-5 del" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
	<!-- 显示分页 -->
		{{$list->render()}}
</div>
@extends('admin.Public.footer')
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
//通过ajax删除
$('.del').click(function(){
	//通过Jq的父级方法找到当前列表的id
	var id = $(this).parents('td').parents('tr').find('td').eq(1).html();
	//找到父级的tr好让删除成功后再前台用ajax删除
	var tr = $(this).parents('tr');
	//通过confirm 来让判断true 或者 false
	res = confirm('你确定要删除吗?');
	//通过confirm传来的参数来做判断
	if(res){
		//通过ajax get 的方法来删除
		$.get('/adminusersdel',{'id':id},function(data){
			// console.log(data);
			if(data == 1){
				//删除当前id的数据列
				tr.remove();
				alert('删除成功');
			}else{
				alert('删除失败')
			}
		});
	}
});

function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
//通过ajax修改状态
//从启用状态到停用状态
function start(id){
	// console.log(id);
	//找到父级的td让其好在后面加元素
	var td = $('#start').parents('td');
	// console.log(td);
	//找到本身
	var a = $('#start');
	//创建要创建的对象
	var newa = $('<a style="text-decoration:none" href="javascript:;" onclick="stop({{$row->id}})" id="start" title="停用"><i class="Hui-iconfont">&#xe615;</i></a>')
	
}
</script> 
</body>
</html>