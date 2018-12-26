@extends('home.Public.Public')
@section('home')
<script crossorigin="anonymous" src="/static/home/filmlist/js/stat.74891044.js"></script>
<link rel="stylesheet" href="/static/home/filmlist/css/movie-list.22f5a22a.css"/>
<link rel="stylesheet" href="">
<html>
 <head></head>
 <body>
  <div class="header-placeholder"></div> 
  <div class="subnav"> 
   <ul class="navbar">
    <li> <a {{$playback_status == "0"?"class=active":""}} href="/films?playback_status=0">正在热映</a> </li> 
    <li> <a {{$playback_status == "1"?"class=active":""}} href="/films?playback_status=1">即将上映</a> </li> 
    <li> <a {{$playback_status == "2"?"class=active":""}} href="/films?playback_status=2">经典影片</a> </li> 
   </ul> 
  </div> 
  <div class="page-movie/list" id="app"> 
   <div class="movies-channel"> 
    <div class="tags-panel"> 
     <ul class="tags-lines"> 
      <li class="tags-line" data-val="{tagTypeName:'cat'}"> 
       <div class="tags-title">
        类型 :
       </div> 
       <ul class="tags"> 
        <li {{$district == "-1"?"class=active":""}} data-state-val="{ catTagName:'全部'}"> <a data-act="tag-click" data-val="{TagName:'全部'}" href="?playback_status={{$playback_status}}&district=-1&type={{$type}}" style="cursor: default">全部</a> </li> 
        @for($i=0;$i < count($district_id);$i++)
        <li {{$district == "$i"?"class=active":""}}> <a data-act="tag-click" href="?playback_status={{$playback_status}}&district={{$i}}&type={{$type}}">{{$district_id[$i]}}</a> </li>  
        @endfor
       </ul> </li> 
      <li class="tags-line tags-line-border" data-val="{tagTypeName:'source'}"> 
       <div class="tags-title">
        区域 :
       </div> 
       <ul class="tags"> 

        <li {{$type == "-1"?"class=active":""}}> <a data-act="tag-click" data-val="{TagName:'全部'}" href="?playback_status={{$playback_status}}&district={{$district}}&type=-1" style="cursor: default">全部</a> </li> 
        @for($i=0;$i < count($type_id);$i++)
        <li {{$type == "$i"?"class=active":""}}> <a href="?playback_status={{$playback_status}}&district={{$district}}&type={{$i}}">{{$type_id[$i]}}</a> </li> 
        @endfor
       </ul> </li> 
     </ul> 
    </div> 
    <div class="movies-panel"> 
     <div class="movies-sorter"> 
      <div class="cat-sorter"> 
       <ul> 
        <li> <span class="sort-control-group" data-act="sort-click" data-val="{tagId: 1 }" data-href="?playback_status={{$playback_status}}&district={{$district}}&type={{$type}}&sort=box_office" onclick="location.href=this.getAttribute('data-href')"> <span
          @if($sort == "box_office")
          class='sort-control sort-radio sort-radio-checked'
          @else
          class='sort-control sort-radio'
          @endif
          ></span> <span class="sort-control-label">按热门排序</span> </span> </li>
        <li> <span class="sort-control-group" data-act="sort-click" data-val="{tagId: 2 }" data-href="?playback_status={{$playback_status}}&district={{$district}}&type={{$type}}&sort=ymd" onclick="location.href=this.getAttribute('data-href')"> <span
          @if($sort == "ymd")
          class='sort-control sort-radio sort-radio-checked'
          @else
          class='sort-control sort-radio'
          @endif
          ></span> <span class="sort-control-label">按时间排序</span> </span> </li> 
        <li> <span class="sort-control-group" data-act="sort-click" data-val="{tagId: 3 }" data-href="?playback_status={{$playback_status}}&district={{$district}}&type={{$type}}&sort=score" onclick="location.href=this.getAttribute('data-href')"> <span 
          @if($sort == "score")
          class='sort-control sort-radio sort-radio-checked'
          @else
          class='sort-control sort-radio'
          @endif
          ></span> <span class="sort-control-label">按评价排序</span> </span> </li> 
       </ul> 
      </div>
      <div class="play-sorter"> 
       <span class="sort-control-group" data-act="isplay-click" data-val="{isplay:1}" data-href="?isPlay=1" onclick="location.href=this.getAttribute('data-href')"> <span class="sort-control sort-checkbox"></span> <span class="sort-control-label">可播放</span> </span> 
      </div> 
     </div> 
     <div class="movies-list"> 
      <dl class="movie-list"> 
      @foreach($data as $v)
       <dd> 
        <div class="movie-item"> 
         <a href="/movie/{{$v -> id}}"> 
          <div class="movie-poster"> 
           <img data-src="{{$v -> cover}}" /> 
          </div> </a> 
         <div class="channel-action channel-action-sale"> 
          <a>购票</a> 
         </div> 
         <div class="movie-ver">
          <i class="imax3d"></i>
         </div> 
        </div> 
        <div class="channel-detail movie-item-title" title="{{$v -> name}}"> 
         <a href="/movie/{{$v -> id}}">{{$v -> name}}</a> 
        </div> 
        <div class="channel-detail channel-detail-orange">
         <i class="integer">{{$v -> score == 0?"电影暂无评分":$v -> score}}</i>
        </div> 
       </dd>
      @endforeach
      </dl> 
     </div> 
     <div class="movies-pager"> 
      <ul class="list-pager"> 
        <li> <a href="?playback_status={{$playback_status}}&district={{$district}}&type={{$type}}&page={{$page-1}}">上一页</a> </li>
      @for($i=1;$i<=$pages;$i++)
       <li {{$page == $i?"class=active":""}} > <a href="?playback_status={{$playback_status}}&district={{$district}}&type={{$type}}&page={{$i}}">{{$i}}</a> </li> 
      @endfor
      <li> <a href="?playback_status={{$playback_status}}&district={{$district}}&type={{$type}}&page={{$page+1}}">下一页</a> </li>
      </ul> 
     </div> 
    </div> 
   </div> 
  </div> 
 </body>
</html>
@endsection
@section('title','猫眼')