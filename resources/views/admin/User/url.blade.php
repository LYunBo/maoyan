@extends('admin.Public.meta')
<title>资讯列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	-
	
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="80">联系人</th>
					<th width="80">联系方式</th>
					<th width="80">网址名</th>
					<th width="220">Url</th>
					<th width="60">创建时间</th>
					<th width="60">修改时间</th>
					<th width="60">审核结果</th>
					<th width="60">显示状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach($link as $row)
				<tr class="text-c">
					<td><input type="checkbox" value="" name=""></td>
					<td>{{$row->id}}</td>
					<td class="text-l">{{$row->name}}</td>
					<td>{{$row->phone}}</td>
					<td>{{$row->urlname}}</td>
					<td>{{$row->url}}</td>
					<td>{{$row->created_at}}</td>
					<td>{{$row->updated_at}}</td>
					@if($row->state==0)
					<td class="td-status"><span class="label label-danger radius">待审核</span></td>
					@elseif($row->state==1)
					<td class="td-status"><span class="label label-success radius">已通过</span></td>
					@else
					<td class="td-status"><span class="label label-radius">不通过</span></td>
					@endif
					<td class="td-status">
					@if($row->state==1)
						@if($row->look==0)
						<span class="label label-danger radius">已下架</span>
						@else
						<span class="label label-success radius">已上架</span>
						@endif
					@else
						<span class="label label-radius">雪藏中</span>
					@endif	
					</td>
					<td class="f-14 td-manage">
						<!-- 一键审核 -->
						@if($row->state==0)
						<a style="text-decoration:none" onClick="article_shenhe(this,{{$row->id}},{{$row->state}})" href="javascript:;" title="审核">审核</a>
						@endif
						<!-- 上架下架 -->
						@if($row->state==1)
							@if($row->look==0)
								<a style="text-decoration:none" onClick="article_start(this,{{$row->id}})" href="javascript:;" title="未上架"><i class="Hui-iconfont" style="font-size: 25">&#xe6dc;</i></a>
							@else
								<a style="text-decoration:none" onClick="article_stop(this,{{$row->id}})" href="javascript:;" title="下架"><i class="Hui-iconfont" style="font-size: 25">&#xe6de;</i></a>
							@endif
						@endif
						 
						<!-- 删除 -->
						<a style="text-decoration:none" class="ml-5" onClick="article_del(this,{{$row->id}})" href="javascript:;" title="删除"><i class="Hui-iconfont" style="font-size: 25">&#xe6e2;</i></a>
					</td>
				</tr>
				@endforeach
				
			</tbody>
		</table>
		
	</div>
	{{$link->render()}}
</div>
<!--_footer 作为公共模版分离出去-->
@extends('admin.Public.footer')
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">



/*资讯-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-删除*/
function article_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		
		$.get('/lookdel',{'id':id},function(data){
			// alert(data);
			if(data==1){
				$(obj).parents('tr').remove();
				layer.msg('已删除!',{icon:1,time:1000});
			}else{
				layer.msg('执行失败', {icon:5,time:1000});
			}
		});
			
	});		
	
}

/*资讯-审核*/
function article_shenhe(obj,id,state){
	layer.confirm('审核文章？', {
		btn: ['通过','不通过','取消'], 
		shade: false,
		closeBtn: 0
	},
	//通过
	function(){

		$.get('/pass',{'id':id,'state':state},function(data){
			if(data==1){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,'+id+')" href="javascript:;" title="未上架"><i class="Hui-iconfont" style="font-size: 25">&#xe6dc;</i></a>');
				$(obj).parents("tr").find(".td-status").first().html('<span class="label label-success radius">已通过</span>');
				$(obj).parents("tr").find(".td-status").last().html('<span class="label label-danger radius">已下架</span>');
				$(obj).remove();
				layer.msg('已通过', {icon:1,time:1000});
			}else{
				layer.msg('执行失败', {icon:5,time:1000});
			}
		});
	},
	// 不通过
	function(){
		
    	$.get('/nopass',{'id':id,'state':state},function(data){
    		if(data==1){
				
				$(obj).parents("tr").find(".td-status").first().html('<span class="label label-danger radius">未通过</span>');
				$(obj).remove();
		    	layer.msg('未通过', {icon:1,time:1000});
			}else{
				layer.msg('执行失败', {icon:5,time:1000});
			}
    	});
	});	
}


/*资讯-下架*/
function article_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$.get('/lookdown',{'id':id},function(data){
			if(data==1){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,'+id+')" href="javascript:;" title="未上架"><i class="Hui-iconfont" style="font-size: 25">&#xe6dc;</i></a>');
				$(obj).parents("tr").find(".td-status").last().html('<span class="label label-danger radius">已下架</span>');
				$(obj).remove();
				layer.msg('已下架!',{icon: 4,time:1000});
			}else{
				layer.msg('执行失败', {icon:5,time:1000});
			}
		});
	});
}

/*资讯-上架*/
function article_start(obj,id){
	layer.confirm('确认要上架吗？',function(index){
		
		$.get('/lookup',{'id':id},function(data){
			if(data==1){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,'+id+')" href="javascript:;" title="下架"><i class="Hui-iconfont" style="font-size: 25">&#xe6de;</i></a>');
				$(obj).parents("tr").find(".td-status").last().html('<span class="label label-success radius">已上架</span>');
				$(obj).remove();
				layer.msg('已上架!',{icon: 1,time:1000});
			}else{
				layer.msg('执行失败', {icon:5,time:1000});
			}
		});
	});
}


</script> 
</body>
</html>