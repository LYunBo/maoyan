@extends('home.Public.Public')
@section('home')
<script src="/static/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" href="/static/home/film_scene/css/common.4b838ec3.css"/>
<link rel="stylesheet" href="/static/home/film_scene/css/cinemas-cinema.c339c8d8.css"/>
<script crossorigin="anonymous" src="/static/home/film_scene/js/stat.74891044.js"></script>
<script>if(window.devicePixelRatio >= 2) { document.write('<link rel="stylesheet" href="/static/home/film_scene/css/image-2x.8ba7074d.css"/>') }</script>
<style>
    @font-face {
      font-family: stonefont;
      src: url('//vfile.meituan.net/colorstone/5f95753d5f051835f7304d80deb767c93168.eot');
      src: url('//vfile.meituan.net/colorstone/5f95753d5f051835f7304d80deb767c93168.eot?#iefix') format('embedded-opentype'),
           url('//vfile.meituan.net/colorstone/14f35f0539d2ca90f2558e704bc3ce962084.woff') format('woff');
    }

    .stonefont {
      font-family: stonefont;
    }
</style>


  <div class="header-placeholder"></div> 
  <div class="banner cinema-banner" id="nones" style="display:block;margin-bottom:120px;"> 
   <div class="wrapper clearfix"> 
    <div class="cinema-left"> 
     <div class="avatar-shadow"> 
      <img class="avatar" src="{{$data_cinema[0] -> cover}}" /> 
     </div> 
    </div> 
    <div class="cinema-main clearfix"> 
     <div class="cinema-brief-container"> 
      <h3 class="name text-ellipsis">{{$data_cinema[0] -> name}}</h3> 
      <div class="address text-ellipsis">{{$data_cinema[0] -> address}}</div> 
      <div class="telphone">
       电话：{{$data_cinema[0] -> cinema_phone}}
      </div> 
      <div class="features-group"> 
       <div class="group-title">
        影院服务
       </div> 
       <div class="feature"> 
        <span class="tag ">3D眼镜服务</span> 
        <p class="desc text-ellipsis" title="{{$service[0]}}">{{$service[0]}}</p> 
       </div> 
       <div class="feature"> 
        <span class="tag ">儿童优惠</span> 
        <p class="desc text-ellipsis" title="{{$service[1]}}">{{$service[1]}}</p> 
       </div> 
       <div class="feature"> 
        <span class="tag park-tag">停车服务</span> 
        <p class="desc text-ellipsis" title="{{$service[2]}}">{{$service[2]}}</p> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 

<div class="container" id="app"> 
   <div class="movie-list-container" data-cinemaid="15280"> 
    <div class="movie-list" style="margin-top:0px;margin-left:0px;"> 
    @foreach($data as $k => $v) 
     <div
     @if($film_id == $v[0][0] -> film_id)
     class="movie active"
     @else
     class="movie"
     @endif
     onclick="fun(this,{{$k}})" data-index="{{$k}}"> 
      <img src="{{$v[0][0] -> cover}}" alt="" /> 
     </div> 
     @endforeach
     <span class="pointer" style="left: 241px;"></span> 
    </div> 
    <span class="scroll-prev scroll-btn"></span> 
    <span class="scroll-next scroll-btn"></span> 
   </div> 



  @foreach($data as $k => $v)
  <!-- active -->
   <div
     @if($film_id == $v[0][0] -> film_id)
     class="show-list active"
     @else
     class="show-list"
     @endif
    id="show_{{$k}}" data-index="{{$k}}" style="width:1200px;margin:auto;"> 
    <div class="movie-info"> 
     <div> 
      <h3 class="movie-name">{{$v[0][0] -> name}}</h3> 
      <span class="score sc">{{$v[0][0] -> score}}</span> 
     </div> 
     <div class="movie-desc"> 
      <div> 
       <span class="key">时长 :</span> 
       <span class="value">{{$v[0][0] -> timess}}分钟</span> 
      </div> 
      <div> 
       <span class="key">类型 :</span> 
       <span class="value"> {{$v[0][0] -> type_id}} </span> 
      </div> 
      <div> 
       <span class="key">导演 :</span> 
       <span class="value">{{$v[0][0] -> director}}</span> 
      </div> 
     </div> 
    </div> 
    <div class="show-date"> 
     <span>观影时间 :</span>
    @foreach($v as $key => $value)
    <!-- active -->
     <span
    @if($key == "0")
    class="date-item item{{$key}} active"
    @else
    class="date-item item{{$key}}"
    @endif
    data-index="{{$key}}" onclick="fun_hi(this,{{$key}})">{{$value[0] -> hi}}</span> 
    @endforeach 
    </div>
    @foreach($v as $key => $value)
    <!-- 这是场次的，class加 active值显示 -->
    <div
    @if($key == "0")
    class="plist-container plist-container{{$key}} active"
    @else
    class="plist-container plist-container{{$key}}"
    @endif
     > 
     <table class="plist"> 
      <thead> 
       <tr> 
        <th>放映时间</th> 
        <th>语言版本</th> 
        <th>放映厅</th> 
        <th>售价（元）</th> 
        <th>选座购票</th> 
       </tr> 
      </thead> 
      <tbody> 
        @foreach($value as $key_s => $value_s)
       <tr class=""> 
        <td> <span class="begin-time">{{$value_s -> times}}</span> <br /> <span class="end-time">{{date("H:i",strtotime($value_s -> times) + ($value_s -> timess)*60)}}散场</span> </td> 
        <td> <span class="lang">{{$value_s -> language}}</span> </td> 
        <td> <span class="hall">{{$value_s -> projection_hall_name}}</span> </td> 
        <td> <span class="sell-price"><span class="stonefont">{{$value_s -> price}}</span></span> </td> 
        <td> <a href="/films_order?film_scene_id={{$value_s -> id}}" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 249342, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
       @endforeach
      </tbody> 
     </table> 
    </div> 
    @endforeach

   </div> 
  </div>
  @endforeach
<script>
  window.onload = function(){
    $("#nones").css("display","block");
  }

  // 点击电影的jq
  function fun(thiss,showid){
    $(".movie").removeClass("active");
    $(thiss).addClass("active");
    $(".show-list").removeClass("active");
    $("#show_"+showid).addClass("active");
    $(".date-item").removeClass("active");
    $(".item0").addClass("active");
    $(".plist-container").removeClass("active");
    $(".plist-container0").addClass("active");
  }

  function fun_hi(thiss,itemid){
    $(".date-item").removeClass("active");
    $(thiss).addClass("active");
    $(".plist-container").removeClass("active");
    $(".plist-container"+itemid).addClass("active");
  }

</script>


@section('title','电影场次选择')