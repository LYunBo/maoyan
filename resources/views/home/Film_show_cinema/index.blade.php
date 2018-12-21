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
        > <a href="/films_show_cinema?id={{$id}}&film_scene_hi_s={{$v}}&brand={{$brand}}&city_id={{$city_id}}">{{$v}}</a> </li>  
       @endforeach
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
       <li class="active"> <a data-act="tag-click" data-val="{TagName:'全部', city_id:91}" data-id="-1" href="?movieId=42964&amp;brandId=-1" data-bid="b_n6nqkt97">全部</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'大地影院', city_id:91}" data-id="384262" href="?movieId=42964&amp;brandId=384262" data-bid="b_n6nqkt97">大地影院</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'万达影城', city_id:91}" data-id="102642" href="?movieId=42964&amp;brandId=102642" data-bid="b_n6nqkt97">万达影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'星美国际影城', city_id:91}" data-id="30032" href="?movieId=42964&amp;brandId=30032" data-bid="b_n6nqkt97">星美国际影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'金逸影城', city_id:91}" data-id="1079568" href="?movieId=42964&amp;brandId=1079568" data-bid="b_n6nqkt97">金逸影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'橙天嘉禾影城', city_id:91}" data-id="24745" href="?movieId=42964&amp;brandId=24745" data-bid="b_n6nqkt97">橙天嘉禾影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'中影星河电影城', city_id:91}" data-id="30910" href="?movieId=42964&amp;brandId=30910" data-bid="b_n6nqkt97">中影星河电影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'中影国际影城', city_id:91}" data-id="23745" href="?movieId=42964&amp;brandId=23745" data-bid="b_n6nqkt97">中影国际影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'横店电影城', city_id:91}" data-id="26045" href="?movieId=42964&amp;brandId=26045" data-bid="b_n6nqkt97">横店电影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'潇湘国际影城', city_id:91}" data-id="29766" href="?movieId=42964&amp;brandId=29766" data-bid="b_n6nqkt97">潇湘国际影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'星汇电影城', city_id:91}" data-id="616001" href="?movieId=42964&amp;brandId=616001" data-bid="b_n6nqkt97">星汇电影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'比高电影城', city_id:91}" data-id="24525" href="?movieId=42964&amp;brandId=24525" data-bid="b_n6nqkt97">比高电影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'17.5影城', city_id:91}" data-id="23854" href="?movieId=42964&amp;brandId=23854" data-bid="b_n6nqkt97">17.5影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'中影火山湖电影城', city_id:91}" data-id="30898" href="?movieId=42964&amp;brandId=30898" data-bid="b_n6nqkt97">中影火山湖电影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'博纳国际影城', city_id:91}" data-id="24595" href="?movieId=42964&amp;brandId=24595" data-bid="b_n6nqkt97">博纳国际影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'恒大影城', city_id:91}" data-id="1319936" href="?movieId=42964&amp;brandId=1319936" data-bid="b_n6nqkt97">恒大影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'中影时代电影城', city_id:91}" data-id="30904" href="?movieId=42964&amp;brandId=30904" data-bid="b_n6nqkt97">中影时代电影城</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'其他', city_id:91}" data-id="0" href="?movieId=42964&amp;brandId=0" data-bid="b_n6nqkt97">其他</a> </li> 
      </ul> </li> 
     <li class="tags-line tags-line-border" data-type="district"> 
      <div class="tags-title">
       行政区:
      </div> 
      <ul class="tags"> 
       <li class="active"> <a data-act="tag-click" data-val="{TagName:'全部', city_id:91}" data-id="-1" href="?movieId=42964&amp;districtId=-1" data-bid="b_ofl973zc">全部</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'地铁附近', city_id:91}" data-id="-2" href="?movieId=42964&amp;districtId=-2" data-bid="b_ofl973zc">地铁附近</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'东城街道', city_id:91}" data-id="219" href="?movieId=42964&amp;districtId=219" data-bid="b_ofl973zc">东城街道</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'厚街镇', city_id:91}" data-id="223" href="?movieId=42964&amp;districtId=223" data-bid="b_ofl973zc">厚街镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'虎门镇', city_id:91}" data-id="222" href="?movieId=42964&amp;districtId=222" data-bid="b_ofl973zc">虎门镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'南城街道', city_id:91}" data-id="220" href="?movieId=42964&amp;districtId=220" data-bid="b_ofl973zc">南城街道</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'长安镇', city_id:91}" data-id="224" href="?movieId=42964&amp;districtId=224" data-bid="b_ofl973zc">长安镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'常平镇', city_id:91}" data-id="226" href="?movieId=42964&amp;districtId=226" data-bid="b_ofl973zc">常平镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'塘厦镇', city_id:91}" data-id="230" href="?movieId=42964&amp;districtId=230" data-bid="b_ofl973zc">塘厦镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'大朗镇', city_id:91}" data-id="227" href="?movieId=42964&amp;districtId=227" data-bid="b_ofl973zc">大朗镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'凤岗镇', city_id:91}" data-id="7044" href="?movieId=42964&amp;districtId=7044" data-bid="b_ofl973zc">凤岗镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'寮步镇', city_id:91}" data-id="5724" href="?movieId=42964&amp;districtId=5724" data-bid="b_ofl973zc">寮步镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'万江街道', city_id:91}" data-id="221" href="?movieId=42964&amp;districtId=221" data-bid="b_ofl973zc">万江街道</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'石龙镇', city_id:91}" data-id="232" href="?movieId=42964&amp;districtId=232" data-bid="b_ofl973zc">石龙镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'莞城街道', city_id:91}" data-id="218" href="?movieId=42964&amp;districtId=218" data-bid="b_ofl973zc">莞城街道</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'黄江镇', city_id:91}" data-id="5725" href="?movieId=42964&amp;districtId=5725" data-bid="b_ofl973zc">黄江镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'樟木头镇', city_id:91}" data-id="228" href="?movieId=42964&amp;districtId=228" data-bid="b_ofl973zc">樟木头镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'清溪镇', city_id:91}" data-id="229" href="?movieId=42964&amp;districtId=229" data-bid="b_ofl973zc">清溪镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'企石镇', city_id:91}" data-id="7041" href="?movieId=42964&amp;districtId=7041" data-bid="b_ofl973zc">企石镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'横沥镇', city_id:91}" data-id="7042" href="?movieId=42964&amp;districtId=7042" data-bid="b_ofl973zc">横沥镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'茶山镇', city_id:91}" data-id="7668" href="?movieId=42964&amp;districtId=7668" data-bid="b_ofl973zc">茶山镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'石排镇', city_id:91}" data-id="7043" href="?movieId=42964&amp;districtId=7043" data-bid="b_ofl973zc">石排镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'桥头镇', city_id:91}" data-id="5585" href="?movieId=42964&amp;districtId=5585" data-bid="b_ofl973zc">桥头镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'大岭山镇', city_id:91}" data-id="225" href="?movieId=42964&amp;districtId=225" data-bid="b_ofl973zc">大岭山镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'石碣镇', city_id:91}" data-id="231" href="?movieId=42964&amp;districtId=231" data-bid="b_ofl973zc">石碣镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'中堂镇', city_id:91}" data-id="233" href="?movieId=42964&amp;districtId=233" data-bid="b_ofl973zc">中堂镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'高埗镇', city_id:91}" data-id="7038" href="?movieId=42964&amp;districtId=7038" data-bid="b_ofl973zc">高埗镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'麻涌镇', city_id:91}" data-id="7039" href="?movieId=42964&amp;districtId=7039" data-bid="b_ofl973zc">麻涌镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'沙田镇', city_id:91}" data-id="7040" href="?movieId=42964&amp;districtId=7040" data-bid="b_ofl973zc">沙田镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'谢岗镇', city_id:91}" data-id="7045" href="?movieId=42964&amp;districtId=7045" data-bid="b_ofl973zc">谢岗镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'道滘镇', city_id:91}" data-id="7047" href="?movieId=42964&amp;districtId=7047" data-bid="b_ofl973zc">道滘镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'望牛墩镇', city_id:91}" data-id="7048" href="?movieId=42964&amp;districtId=7048" data-bid="b_ofl973zc">望牛墩镇</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'东坑镇', city_id:91}" data-id="5726" href="?movieId=42964&amp;districtId=5726" data-bid="b_ofl973zc">东坑镇</a> </li> 
      </ul> </li> 
     <li class="tags-line tags-line-border" data-type="hallType"> 
      <div class="tags-title">
       特殊厅:
      </div> 
      <ul class="tags"> 
       <li class="active"> <a data-act="tag-click" data-val="{TagName:'全部', city_id:91}" data-id="-1" href="?movieId=42964&amp;hallType=-1" data-bid="b_oz4r0rs9">全部</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'IMAX厅', city_id:91}" data-id="2" href="?movieId=42964&amp;hallType=2" data-bid="b_oz4r0rs9">IMAX厅</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'CGS中国巨幕厅', city_id:91}" data-id="3" href="?movieId=42964&amp;hallType=3" data-bid="b_oz4r0rs9">CGS中国巨幕厅</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'杜比全景声厅', city_id:91}" data-id="9" href="?movieId=42964&amp;hallType=9" data-bid="b_oz4r0rs9">杜比全景声厅</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'Dolby Cinema厅', city_id:91}" data-id="22" href="?movieId=42964&amp;hallType=22" data-bid="b_oz4r0rs9">Dolby Cinema厅</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'DTS:X 临境音厅', city_id:91}" data-id="25" href="?movieId=42964&amp;hallType=25" data-bid="b_oz4r0rs9">DTS:X 临境音厅</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'儿童厅', city_id:91}" data-id="24" href="?movieId=42964&amp;hallType=24" data-bid="b_oz4r0rs9">儿童厅</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'4K厅', city_id:91}" data-id="8" href="?movieId=42964&amp;hallType=8" data-bid="b_oz4r0rs9">4K厅</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'4D厅', city_id:91}" data-id="7" href="?movieId=42964&amp;hallType=7" data-bid="b_oz4r0rs9">4D厅</a> </li> 
       <li class=""> <a data-act="tag-click" data-val="{TagName:'巨幕厅', city_id:91}" data-id="6" href="?movieId=42964&amp;hallType=6" data-bid="b_oz4r0rs9">巨幕厅</a> </li> 
      </ul> </li> 
    </ul> 
   </div> 
   <div class="cinemas-list"> 
    <h2 class="cinemas-list-header">影院列表</h2> 
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/cinema/17324?poi=157073284&amp;movieId=42964" class="cinema-name" data-act="cinema-name-click" data-bid="b_wek7vrx9" data-val="{city_id: 91, cinema_id: 17324}">君胜国际影城(东莞雁田店)</a> 
      <p class="cinema-address">地址：凤岗镇田南路华东城购物广场3楼（原满家福3楼）</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/cinema/17324?poi=157073284&amp;movieId=42964" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 17324}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
     <div class="price"> 
      <span class="rmb red">￥</span> 
      <span class="price-num red"><span class="stonefont">.</span></span> 
      <span>起</span> 
     </div> 
    </div> 
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/cinema/16713?poi=124343208&amp;movieId=42964" class="cinema-name" data-act="cinema-name-click" data-bid="b_wek7vrx9" data-val="{city_id: 91, cinema_id: 16713}">中影嘉莱巨幕影城(塘厦店)</a> 
      <p class="cinema-address">地址：塘厦镇田心路82号田心文化商业广场金正和百货4楼</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/cinema/16713?poi=124343208&amp;movieId=42964" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 16713}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
     <div class="price"> 
      <span class="rmb red">￥</span> 
      <span class="price-num red"><span class="stonefont"></span></span> 
      <span>起</span> 
     </div> 
    </div> 
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/cinema/16330?poi=117895264&amp;movieId=42964" class="cinema-name" data-act="cinema-name-click" data-bid="b_wek7vrx9" data-val="{city_id: 91, cinema_id: 16330}">中影南方国际影城(虎门店)</a> 
      <p class="cinema-address">地址：虎门镇虎门大道（黄河时装城对面）荣大商业城2楼</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/cinema/16330?poi=117895264&amp;movieId=42964" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 16330}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
     <div class="price"> 
      <span class="rmb red">￥</span> 
      <span class="price-num red"><span class="stonefont"></span></span> 
      <span>起</span> 
     </div> 
    </div> 
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/cinema/16859?poi=150382539&amp;movieId=42964" class="cinema-name" data-act="cinema-name-click" data-bid="b_wek7vrx9" data-val="{city_id: 91, cinema_id: 16859}">魅影星晖影城(猫眼电影主题影城)</a> 
      <p class="cinema-address">地址：中堂镇新兴路东港城商业中心中环广场A区大润发三楼</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/cinema/16859?poi=150382539&amp;movieId=42964" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 16859}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
     <div class="price"> 
      <span class="rmb red">￥</span> 
      <span class="price-num red"><span class="stonefont"></span></span> 
      <span>起</span> 
     </div> 
    </div> 
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/cinema/15121?poi=97756369&amp;movieId=42964" class="cinema-name" data-act="cinema-name-click" data-bid="b_wek7vrx9" data-val="{city_id: 91, cinema_id: 15121}">金沙国际影城(石龙店)</a> 
      <p class="cinema-address">地址：石龙镇西湖三路八号金沙湾购物广场4楼4A029号</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/cinema/15121?poi=97756369&amp;movieId=42964" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 15121}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
     <div class="price"> 
      <span class="rmb red">￥</span> 
      <span class="price-num red"><span class="stonefont"></span></span> 
      <span>起</span> 
     </div> 
    </div> 
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/cinema/13061?poi=41229775&amp;movieId=42964" class="cinema-name" data-act="cinema-name-click" data-bid="b_wek7vrx9" data-val="{city_id: 91, cinema_id: 13061}">华纳万都影城</a> 
      <p class="cinema-address">地址：万江街道万江区简沙洲社区简沙洲综合市场一楼（简沙洲综合市场）</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/cinema/13061?poi=41229775&amp;movieId=42964" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 13061}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
     <div class="price"> 
      <span class="rmb red">￥</span> 
      <span class="price-num red"><span class="stonefont"></span></span> 
      <span>起</span> 
     </div> 
    </div> 
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/cinema/2213?poi=1470669&amp;movieId=42964" class="cinema-name" data-act="cinema-name-click" data-bid="b_wek7vrx9" data-val="{city_id: 91, cinema_id: 2213}">哈维影城</a> 
      <p class="cinema-address">地址：常平镇市场路八号广场3楼</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/cinema/2213?poi=1470669&amp;movieId=42964" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 2213}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
     <div class="price"> 
      <span class="rmb red">￥</span> 
      <span class="price-num red"><span class="stonefont"></span></span> 
      <span>起</span> 
     </div> 
    </div> 
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/cinema/17188?poi=152548179&amp;movieId=42964" class="cinema-name" data-act="cinema-name-click" data-bid="b_wek7vrx9" data-val="{city_id: 91, cinema_id: 17188}">九州森美国际影城(厚街店)</a> 
      <p class="cinema-address">地址：厚街镇三屯社区上屯上滘路14号茂和购物中心五楼</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/cinema/17188?poi=152548179&amp;movieId=42964" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 17188}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
     <div class="price"> 
      <span class="rmb red">￥</span> 
      <span class="price-num red"><span class="stonefont"></span></span> 
      <span>起</span> 
     </div> 
    </div> 
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/cinema/16600?poi=116929062&amp;movieId=42964" class="cinema-name" data-act="cinema-name-click" data-bid="b_wek7vrx9" data-val="{city_id: 91, cinema_id: 16600}">中影南方国际影城(地王广场店)</a> 
      <p class="cinema-address">地址：莞城街道东纵路2号地王广场三楼304-312室</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/cinema/16600?poi=116929062&amp;movieId=42964" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 16600}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
     <div class="price"> 
      <span class="rmb red">￥</span> 
      <span class="price-num red"><span class="stonefont"></span></span> 
      <span>起</span> 
     </div> 
    </div> 
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/cinema/6316?poi=2433862&amp;movieId=42964" class="cinema-name" data-act="cinema-name-click" data-bid="b_wek7vrx9" data-val="{city_id: 91, cinema_id: 6316}">中影国际影城(东莞常平百花店)</a> 
      <p class="cinema-address">地址：常平镇市场路百花时代广场五楼</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/cinema/6316?poi=2433862&amp;movieId=42964" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 6316}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
     <div class="price"> 
      <span class="rmb red">￥</span> 
      <span class="price-num red"><span class="stonefont"></span></span> 
      <span>起</span> 
     </div> 
    </div> 
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/cinema/6798?poi=2504612&amp;movieId=42964" class="cinema-name" data-act="cinema-name-click" data-bid="b_wek7vrx9" data-val="{city_id: 91, cinema_id: 6798}">万达影城(长安万达广场店)</a> 
      <p class="cinema-address">地址：长安镇东门中路1号万达广场4楼（107国道）</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/cinema/6798?poi=2504612&amp;movieId=42964" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 6798}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
     <div class="price"> 
      <span class="rmb red">￥</span> 
      <span class="price-num red"><span class="stonefont">.</span></span> 
      <span>起</span> 
     </div> 
    </div> 
    <div class="cinema-cell"> 
     <div class="cinema-info"> 
      <a href="/cinema/1463?poi=1157053&amp;movieId=42964" class="cinema-name" data-act="cinema-name-click" data-bid="b_wek7vrx9" data-val="{city_id: 91, cinema_id: 1463}">柏尔国际影城(乌沙店)</a> 
      <p class="cinema-address">地址：长安镇兴发五路大润发超市五楼（集安酒店对面）</p> 
     </div> 
     <div class="buy-btn"> 
      <a href="/cinema/1463?poi=1157053&amp;movieId=42964" data-act="buy-btn-click" data-val="{city_id: 91, cinema_id: 1463}" data-bid="b_wek7vrx9">选座购票</a> 
     </div> 
     <div class="price"> 
      <span class="rmb red">￥</span> 
      <span class="price-num red"><span class="stonefont"></span></span> 
      <span>起</span> 
     </div> 
    </div> 
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