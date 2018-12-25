@extends('home.Public.Public')
@section('home')
<script src="/static/jquery-1.8.3.min.js"></script>
  <link rel="stylesheet" href="/static/home/list/css/common.4b838ec3_4.css" /> 
  <link rel="stylesheet" href="/static/home/list/css/board-index.92a06072_4.css" /> 
  <script crossorigin="anonymous" src="/static/home/list/js/stat.74891044_4.js"></script> 
  <script>if(window.devicePixelRatio >= 2) { document.write('<link rel="stylesheet" href="/static/home/list/css/image-2x.8ba7074d_4.css"/>') }</script> 
  <style>
    @font-face {
      font-family: stonefont;
      src: url('//vfile.meituan.net/colorstone/f96a06ec39e3af44828ff75147db095f3168.eot');
      src: url('//vfile.meituan.net/colorstone/f96a06ec39e3af44828ff75147db095f3168.eot?#iefix') format('embedded-opentype'),
           url('//vfile.meituan.net/colorstone/ad2f82d388d1f56d3e5bc24245c2be5e2084.woff') format('woff');
    }

    .stonefont {
      font-family: stonefont;
    }
  </style> 



  <div class="header-placeholder"></div> 
  <div class="subnav"> 
   <ul class="navbar"> 
    <li> <a data-act="subnav-click" onclick="fun(this)" href="/List?id=1"
      @if($id == "1")
        class="active"
      @endif
      >热映口碑榜</a> </li> 
    <li> <a data-act="subnav-click" onclick="fun(this)" data-val="{subnavClick:1}" href="/List?id=2"
      @if($id == "2")
        class="active"
      @endif
      >国内票房榜</a> </li>  
    <li> <a data-act="subnav-click" onclick="fun(this)" data-val="{subnavClick:4}" href="/List?id=3"
      @if($id == "3")
        class="active"
      @endif
      >TOP100榜</a> </li> 
   </ul> 
  </div> 
  <div class="page-board/index" id="app"> 
   <div class="content"> 
    <div class="wrapper"> 
     <div class="main"> 
      <p class="update-time">2018-12-05<span class="has-fresh-text">已更新</span></p> 
      <p class="board-content">榜单规则：将昨日国内热映的影片，按照评分从高到低排列取前10名，每天上午10点更新。相关数据来源于“猫眼专业版”及“猫眼电影库”。</p> 
      <dl class="board-wrapper"> 
        @foreach($data as $k => $v)
       <dd> 
        <i class="board-index board-index-{{$k+1}}">{{$k+1}}</i> 
        <a href="/movie/{{$v -> id}}" title="{{$v -> name}}" class="image-link" data-act="boarditem-click" data-val="{movieId:42964}"> <img src="/static/home/list/picture/loading_2.e3d934bf_4.png" alt="" class="poster-default" /> <img data-src="{{$v -> cover}}" alt="{{$v -> name}}" class="board-img" style="width:160px;height:220px;"/> </a> 
        <div class="board-item-main" style="width:640px;"> 
         <div class="board-item-content"> 
          <div class="movie-item-info"> 
           <p class="name"><a href="/movie/{{$v -> id}}" title="{{$v -> name}}" data-act="boarditem-click" data-val="{movieId:42964}">{{$v -> name}}</a></p> 
           <p class="star"> 导演：{{$v -> director}} </p> 
           <p class="releasetime">上映时间：{{$v -> ymd}}</p> 
          </div> 
          <div class="movie-item-number score-num" style="width:180px"> 
           <p class="score"><i class="integer">{{$v -> score}}</i>
          </div> 
         </div> 
        </div> 
       </dd> 
        @endforeach
        <!-- <i class="board-index board-index-1">1</i>
        <i class="board-index board-index-2">2</i> 
        <i class="board-index board-index-3">3</i> 
        <i class="board-index board-index-4">4</i> 123特殊的，4一致的 -->
        <center> 
        {{$data -> appends($request) -> render()}}
        </center>
      </dl> 
     </div> 
    </div> 
   </div> 
  </div> 
@endsection
@section("title","榜单")