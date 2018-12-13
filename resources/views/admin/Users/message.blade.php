@extends('admin.Public.all')
@section('admin')
<title>用户查看</title>
</head>
<body>
<div class="cl pd-20" style=" background-color:#5bacb6">
	<img class="avatar size-XL l" src="/static/admin/static/h-ui/images/ucnter/avatar-default.jpg">
	<dl style="margin-left:80px; color:#fff">
		<dt>
			<span class="f-18">{{$row->user_name or '未填'}}</span>
			<span class="pl-10 f-12">会员状态：{{$row->member or '未填'}}
			@if(!empty($row->member))
				@if($row->member == '普通会员')
				<i class="Hui-iconfont" style="color:grey;font-size:25px;">&#xe69d;</i>
				@elseif($row->member == '黄金会员')
				<i class="Hui-iconfont" style="color:gold;font-size:20px;">&#xe72c;</i>
				@endif
			@endif
			</span>
		</dt>
		<dd class="pt-10 f-12" style="margin-left:0">{{$row->autograph or '未填'}}</dd>
	</dl>
</div>
<div class="pd-20">
	<table class="table">
		<tbody>
			<tr>
				<th class="text-r" width="80">性别：</th>
				<td>{{$row->sex or '未填'}}</td>
			</tr>
			<tr>
				<th class="text-r">生活状态：</th>
				<td>{{$row->lifestate or '未填'}}</td>
			</tr>
			<tr>
				<th class="text-r">从事：</th>
				<td>{{$row->job or '未填'}}</td>
			</tr>
			<tr>
				<th class="text-r">爱好：</th>
				<td>{{$row->hobby or '未填'}}</td>
			</tr>
			<tr>
				<th class="text-r">生日：</th>
				@if(empty($row->birthday))
				<td>未设置</td>
				@else
				<td>{{date('Y-m-d',$row->birthday)}}</td>
				@endif
			</tr>
			<tr>
				<th class="text-r">关注的电影：</th>
				
				<td>@foreach($love as $like) {{$like->film_name}}.&nbsp; @endforeach</td>

			</tr>
			<tr>
				<th class="text-r">历史电影：</th>
				<td>@foreach($histroy as $his) {{$his->film_name}}.&nbsp; @endforeach</td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>

<!--请在下方写此页面业务相关的脚本-->
</body>
</html>
@endsection
@section('title','用户详情')