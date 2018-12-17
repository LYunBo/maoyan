@extends('admin.Public.meta')
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

@if(session('success'))
<div class="Huialert Huialert-success"><i class="Hui-iconfont">&#xe6a6;</i>
{{session('success')}}
</div>
@endif

@if(session('error'))
<div class="Huialert Huialert-error"><i class="Hui-iconfont">&#xe6a6;</i>
{{session('error')}}
</div>
@endif

<div class="page-container">
	<div class="text-c"> 
		<form action="./adminuser" method="get">
		<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="key" value="{{$request['key'] or ''}}">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="/adminuser/create" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="10">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="50">管理员名</th>
				<th width="80">手机</th>
				<th width="150">邮箱</th>
				<th>角色</th>
				<th width="130">加入时间</th>
				<th width="130">修改时间</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach($data as $row)
			<tr class="text-c">
				<td><input type="checkbox" value="2" name=""></td>
				<td>{{$row->id}}</td>
				<td>{{$row->admin_user}}</td>
				<td>{{$row->phone}}</td>
				<td>{{$row->email}}</td>
				<td>
				@if($row->level==3)
				boss
				@elseif($row->level==2)
				心悦管理员
				@elseif($row->level==1)
				管理员
				@else
				麻瓜
				@endif
				</td>
				<td>{{$row->created_at}}</td>
				<td>{{$row->updated_at}}</td>
				
					<!-- 判断是否启用状态 -->
					@if($row->statuss==1)
					<td class="td-status"><span class="label label-success radius">已启用</span></td>
					@else
					<td class="td-status"><span class="label radius">已禁止</span></td>
					@endif
				
				<td class="td-manage">

					<!-- 启用禁用用户 -->
					<a style="text-decoration:none" onClick="@if($row->statuss==1) admin_stop(this,{{$row->id}},{{$row->statuss}},{{$row->level}}) @else admin_start(this,{{$row->id}},{{$row->statuss}},{{$row->level}}) @endif" href="javascript:;" title="@if($row->statuss==1)禁止@else启用@endif"><i class="Hui-iconfont">@if($row->statuss==1) &#xe631; @else &#xe615; @endif</i></a> 
					
					<a title="编辑" href="/adminuser/{{$row->id}}/edit" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 

					<a title="删除" href="javascript:;" onclick="admin_del(this,{{$row->id}},{{$row->level}})" class="ml-5" id="del" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{$data->render()}}
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
function admin_del(obj,id,level){
	/*layer.confirm('确认要删除吗？',function(index){
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
	});*/
	L = {{session('level')}}
	
	if(L>1 && L>level){
		if(confirm('确认删除吗')){

			$.get('/del',{'id':id},function(data){
				if(data==1){
					layer.msg('删除成功!', {icon: 6,time:1000});
					$(obj).parent().parent().remove();
				}else{
					layer.msg('删除失败!', {icon: 5,time:1000});
				}
			});
			

		}
	}else{
		layer.alert('您的等级不够,是干不掉我的~~~!');
	}
}



/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id,statuss,level){
		//获取权限level等级
		L = {{session('level')}};
		// alert(L);
		// alert(level);
		if(L>1 && L>level){
			layer.confirm('确认要停用吗？',function(index){
				//此处请求后台程序，下方是成功后的前台处理……
				
					
					// 确认后改变状态码
					if(statuss==1){
						statuss=0;
					}
					// alert(statuss);//0
					$.get('/statuss',{'id':id,'statuss':statuss},function(data){
						// 返回测试 //id:"1",statuss:"0"
						console.log(data);
					});
					
					$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,'+id+','+statuss+','+level+')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
					$(obj).remove();
					layer.msg('已停用!',{icon: 5,time:1000});
			});
		}else{
			layer.alert("您的权限不够-->Don't touch me.");
		}
}

/*管理员-启用*/
function admin_start(obj,id,statuss,level){
		//获取权限level等级
		L = {{session('level')}};
		// alert(L);
		// alert(level);
		if(L>1 && L>level){
		layer.confirm('确认要启用吗？',function(index){
			
			// 确认后改变状态码
			if(statuss==0){
				statuss=1;
			}
			// alert(statuss);//1
			$.get('/statuss',{id:id,statuss:statuss},function(data){
				// 返回测试 //id:"1",statuss:"1"
				console.log(data);
			});
			/********************************************/
			$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,'+id+','+statuss+','+level+')" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
			$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
			$(obj).remove();
			layer.msg('已启用!', {icon: 6,time:1000});
		});
	}else{
		layer.alert("您的权限不够 /n Don't touch me.");
	}
}
</script>
</body>
</html>