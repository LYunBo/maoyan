@extends('home.Public.Public')
@section('home')
<script src="/static/jquery-1.8.3.min.js"></script>
<script crossorigin="anonymous" src="/static/home/film_show_cinema/js/es5-sham.d6ea26f4.js"></script>
<script crossorigin="anonymous" src="/static/home/film_show_cinema/js/es5-shim.bbad933f.js"></script>
<script crossorigin="anonymous" src="/static/home/film_show_cinema/js/owl_1.7.11.js"></script>
<link rel="stylesheet" href="/static/home/film_show_cinema/css/cinemas-list.81574a4d.css"/>
<link rel="stylesheet" href="/static/home/film_show_cinema/css/common.4b838ec3.css"/>
<link rel="stylesheet" href="/static/home/film_show_cinema/css/image-2x.8ba7074d.css"/>
  <div class="header-placeholder"></div> 
  <div class="banner" style="display:block;"> 
   <div class="wrapper clearfix"> 
    <div class="celeInfo-left"> 
     <div class="avatar-shadow"> 
      <img class="avatar" src="{{$datas[0] -> cover or ''}}" alt="" /> 
      <div class="movie-ver">
       <i class="imax3d"></i>
      </div> 
     </div> 
    </div> 
    <div class="celeInfo-right clearfix"> 
     <div class="movie-brief-container"> 
      <h3 class="name">{{$datas[0] -> name or ""}}</h3> 
      <div class="ename ellipsis">
      </div> 
      <ul> 
       <li class="ellipsis">{{$datas[0] -> type_id or ""}}</li> 
       <li class="ellipsis"> {{$datas[0] -> district_id or ""}} / {{$datas[0] -> times or ""}}分钟 </li> 
       <li class="ellipsis">{{$datas[0] -> ymd or ""}}大陆上映</li> 
      </ul> 
     </div> 
     <div class="action-buyBtn"> 
      <div class="action clearfix" data-val="{movieid:42964}"> 
       <a class="wish " data-wish="false" data-score="" data-bid="b_gbxqtw6x"> 
        <div> 
         <i class="icon wish-icon"></i> 
         <span class="wish-msg" data-act="wish-click">想看</span> 
        </div> </a> 
       <a class="score-btn " data-bid="b_rxxpcgwd"> 
        <div> 
         <i class="icon score-btn-icon"></i> 
         <span class="score-btn-msg" data-act="comment-open-click"> 评分 </span> 
        </div> </a> 
      </div> 
      <a class="btn buy" href="/films" target="_blank" data-act="more-detail-click" data-bid="b_ozuzh4j4">查看更多电影详情</a> 
     </div> 
     <div class="movie-stats-container"> 
      <div class="movie-index"> 
       <p class="movie-index-title">用户评分</p> 
       <div class="movie-index-content score normal-score"> 
        <span class="index-left info-num "> <span class="stonefont">{{$datas[0] -> score or ""}}</span> </span> 
        <div class="index-right"> 
         <div class="star-wrapper" style="margin-left:30px;"> 
          <div class="star-on" style="width:93%;"></div> 
         </div> 
         <!-- 这里是多少人评论的 -->
         <span class="score-num"><span class="stonefont"></span></span>
        </div> 
       </div> 
      </div> 
      <div class="movie-index"> 
       <p class="movie-index-title">累计票房</p> 
       <div class="movie-index-content box"> 
        <span class="stonefont">{{$datas[0] -> box_office or ""}}</span>
        <span class="unit"></span> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div class="page-cinemas/list" id="app" style="width:1200px;margin:auto;"> 
   <div class="tags-panel"> 
    <ul class="tags-lines"> 
     <li class="tags-line"
      @if($id == "0")
      style="display:none;"
      @endif
     > 
      <div class="tags-title">
       日期:
      </div> 
      <ul class="tags"> 
      @if(!empty($film_scene_hi_s))
      @foreach($film_scene_hi as $v)
       <li 
        @if($film_scene_hi_s == $v)
        class="active"
        @endif
        > <a href="/films_show_cinema?id={{$id}}&film_scene_hi_s={{$v}}&brand={{$brand}}&city_id={{$city_id}}&type_id={{$type_id}}">{{$v}}</a> </li>  
      @endforeach
      @else
       <li></li>
       <br>
      @endif
      </ul> </li> 
     <li
      @if($id == "0")
      class="tags-line"
      @else
      class="tags-line tags-line-border"
      @endif
      class="tags-line tags-line-border" data-type="brand"> 
      <div class="tags-title">
       品牌:
      </div> 
      <ul class="tags"> 
       <li 
        @if(empty($brand))
          class="active"
        @endif
        > <a href="/films_show_cinema?id={{$id}}&film_scene_hi_s={{$film_scene_hi_s}}&brand=&city_id={{$city_id}}&type_id={{$type_id}}" data-bid="b_n6nqkt97">全部</a> </li> 
       @foreach($data_cinema_brand as $v)
       <li 
        @if($brand == $v)
          class="active"
        @endif
        > <a href="/films_show_cinema?id={{$id}}&film_scene_hi_s={{$film_scene_hi_s}}&brand={{$v}}&city_id={{$city_id}}&type_id={{$type_id}}" data-bid="b_n6nqkt97">{{$v}}</a> </li> 
       @endforeach
      </ul> </li> 
     <li class="tags-line tags-line-border" data-type="district"> 
      <div class="tags-title">
       行政区:
      </div> 
      <ul class="tags"> 
       <li
        @if($city_id == session('citys')['id'])
        class="active"
        @endif
        > <a href="/films_show_cinema?id={{$id}}&film_scene_hi_s={{$film_scene_hi_s}}&brand={{$brand}}&type_id={{$type_id}}" data-bid="b_ofl973zc">全部</a> </li> 
      @foreach($city_all_s as $v)
       <li
        @if($city_id == $v -> id)
        class="active"
        @endif
       > <a href="/films_show_cinema?id={{$id}}&film_scene_hi_s={{$film_scene_hi_s}}&brand={{$brand}}&city_id={{$v -> id}}&type_id={{$type_id}}" data-bid="b_ofl973zc">{{$v -> name}}</a> </li> 
      @endforeach
      </ul> </li> 
     <li class="tags-line tags-line-border" data-type="hallType"> 
      <div class="tags-title">
       特殊厅:
      </div> 
      <ul class="tags"> 
       <li
        @if(empty($type_id))
        class="active"
        @endif
       > <a href="/films_show_cinema?id={{$id}}&film_scene_hi_s={{$film_scene_hi_s}}&brand={{$brand}}&city_id={{$city_id}}&type_id=" data-bid="b_oz4r0rs9">全部</a> </li> 
      @foreach($types as $k => $v)
       <li
        @if($type_id == $k)
        class="active"
        @endif
       > <a href="/films_show_cinema?id={{$id}}&film_scene_hi_s={{$film_scene_hi_s}}&brand={{$brand}}&city_id={{$city_id}}&type_id={{$k}}" data-bid="b_oz4r0rs9">{{$v}}</a> </li> 
      @endforeach
      </ul> </li> 
    </ul> 
   </div> 
   <div class="cinemas-list"> 
    <h2 class="cinemas-list-header">影院列表</h2> 
    @foreach($data as $v)
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/films/{{$v -> id}}" class="cinema-name">{{$v -> name}}</a> 
      <p class="cinema-address">地址：{{$v -> address}}</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/films_cinema?cinema_id={{$v -> id}}&film_id={{$id or ''}}" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 17324}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
    </div> 
    @endforeach
   </div> 
   <div class="cinema-pager"> 
    <ul class="list-pager"> 
     <li class="active"> <a class="page_1" href="javascript:void(0);" style="cursor: default">1</a> </li> 
     <li> <a class="page_2" href="?movieId=42964&amp;offset=12">2</a> </li> 
     <li> <a class="page_3" href="?movieId=42964&amp;offset=24">3</a> </li> 
     <li> <a class="page_4" href="?movieId=42964&amp;offset=36">4</a> </li> 
     <li> <a class="page_5" href="?movieId=42964&amp;offset=48">5</a> </li> 
     <li class="sep">...</li> 
     <li> <a class="page_11" href="?movieId=42964&amp;offset=120">11</a> </li> 
     <li> <a class="page_2" href="?movieId=42964&amp;offset=12">下一页</a> </li> 
    </ul> 
   </div> 
   <script id="comment-form-container" type="text/template">
  <form id="comment-form" data-val="{movieid:42964}">
    <div class="score-msg-container ">
        <div class="score"><span class="num"></span>分</div>
        <div class="score-message"></div>
        <div class="no-score">
          请点击星星评分
        </div>
    </div>
    <div class="score-star-contaienr">
      <ul class="score-star clearfix" data-score="">
    <li>
<i class="half-star left "></i><i class="half-star right "></i>    </li>
    <li>
<i class="half-star left "></i><i class="half-star right "></i>    </li>
    <li>
<i class="half-star left "></i><i class="half-star right "></i>    </li>
    <li>
<i class="half-star left "></i><i class="half-star right "></i>    </li>
    <li>
<i class="half-star left "></i><i class="half-star right "></i>    </li>
</ul>

    </div>
    <div class="content-container">
      <textarea placeholder="快来说说你的看法吧" name="content" id="" cols="30" rows="10"></textarea>
      <span class="word-count-info"></span>
    </div>
    <input type="hidden" name="score" />
    <input class="btn" type="submit" value="提交" data-act="comment-submit-click" />
  </form>
  <div class="close">×</div>
</script> 
  </div> 
@endsection
@if($id != "0")
<script> 
  window.onload = function(){
    $(".banner").css("display","block");
  }
</script>
@endif
@section('title','电影院选择')