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
     <div class="movie" data-index="0" data-movieid="1212512" data-bid="b_uup5nnq7" data-act="cinema-movie-click" data-val="{city_id:1, movie_id:1212512, cinema_id:15280}"> 
      <img src="https://p1.meituan.net/movie/bb84bede1711265dab1136f7a3dddc782801232.jpg@170w_235h_1e_1c" alt="" /> 
     </div> 
     <div class="movie  active" data-index="1" data-movieid="249342" data-bid="b_uup5nnq7" data-act="cinema-movie-click" data-val="{city_id:1, movie_id:249342, cinema_id:15280}"> 
      <img src="https://p0.meituan.net/movie/c106904da68edd848afd4a320976d051346321.jpg@170w_235h_1e_1c" alt="" /> 
     </div> 
     <div class="movie " data-index="2" data-movieid="123" data-bid="b_uup5nnq7" data-act="cinema-movie-click" data-val="{city_id:1, movie_id:123, cinema_id:15280}"> 
      <img src="https://p0.meituan.net/movie/c304c687e287c7c2f9e22cf78257872d277201.jpg@170w_235h_1e_1c" alt="" /> 
     </div> 
     <div class="movie " data-index="3" data-movieid="1200265" data-bid="b_uup5nnq7" data-act="cinema-movie-click" data-val="{city_id:1, movie_id:1200265, cinema_id:15280}"> 
      <img src="https://p1.meituan.net/movie/4eb3bb083ccedc99fe2dd5febffe1ded1418012.jpg@170w_235h_1e_1c" alt="" /> 
     </div> 
     <div class="movie " data-index="4" data-movieid="345036" data-bid="b_uup5nnq7" data-act="cinema-movie-click" data-val="{city_id:1, movie_id:345036, cinema_id:15280}"> 
      <img src="https://p0.meituan.net/movie/147d6b456b1b62a0507288c5f7369772929342.jpg@170w_235h_1e_1c" alt="" /> 
     </div> 
     <div class="movie " data-index="5" data-movieid="78480" data-bid="b_uup5nnq7" data-act="cinema-movie-click" data-val="{city_id:1, movie_id:78480, cinema_id:15280}"> 
      <img src="https://p0.meituan.net/movie/feb4cd6eb054232b4851a97bbc2a66d51198036.jpg@170w_235h_1e_1c" alt="" /> 
     </div> 
     <div class="movie " data-index="6" data-movieid="1227005" data-bid="b_uup5nnq7" data-act="cinema-movie-click" data-val="{city_id:1, movie_id:1227005, cinema_id:15280}"> 
      <img src="https://p1.meituan.net/movie/e3f7a7539faf709424f2b246e267dbf3648165.jpg@170w_235h_1e_1c" alt="" /> 
     </div> 
     <div class="movie " data-index="7" data-movieid="344649" data-bid="b_uup5nnq7" data-act="cinema-movie-click" data-val="{city_id:1, movie_id:344649, cinema_id:15280}"> 
      <img src="https://p1.meituan.net/movie/19efcfbf1a98c02cb5efd69a2edf766e2421917.jpg@170w_235h_1e_1c" alt="" /> 
     </div> 
     <span class="pointer" style="left: 241px;"></span> 
    </div> 
    <span class="scroll-prev scroll-btn"></span> 
    <span class="scroll-next scroll-btn"></span> 
   </div> 
   <div class="show-list" data-index="0"> 
    <div class="movie-info"> 
     <div> 
      <h3 class="movie-name">蜘蛛侠：平行宇宙</h3> 
      <span class="score sc">8.8</span> 
     </div> 
     <div class="movie-desc"> 
      <div> 
       <span class="key">时长 :</span> 
       <span class="value">116分钟</span> 
      </div> 
      <div> 
       <span class="key">类型 :</span> 
       <span class="value"> 动画 </span> 
      </div> 
      <div> 
       <span class="key">主演 :</span> 
       <span class="value"> 彭昱畅,沙梅克&middot;摩尔</span> 
      </div> 
     </div> 
    </div> 
    <div class="show-date"> 
     <span>观影时间 :</span> 
     <span class="date-item active" data-index="0">今天 12月23</span> 
     <span class="date-item " data-index="1">明天 12月24</span> 
    </div> 
    <div class="plist-container active"> 
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
       <tr class=""> 
        <td> <span class="begin-time">17:05</span> <br /> <span class="end-time">19:01散场</span> </td> 
        <td> <span class="lang">英语3D</span> </td> 
        <td> <span class="hall">2号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812230026541?movieId=1212512&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 1212512, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
    <div class="plist-container "> 
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
       <tr class=""> 
        <td> <span class="begin-time">20:25</span> <br /> <span class="end-time">22:21散场</span> </td> 
        <td> <span class="lang">英语3D</span> </td> 
        <td> <span class="hall">1号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812240004427?movieId=1212512&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 1212512, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
   </div> 
   <div class="show-list  active" data-index="1"> 
    <div class="movie-info"> 
     <div> 
      <h3 class="movie-name">海王</h3> 
      <span class="score sc">9.4</span> 
     </div> 
     <div class="movie-desc"> 
      <div> 
       <span class="key">时长 :</span> 
       <span class="value">143分钟</span> 
      </div> 
      <div> 
       <span class="key">类型 :</span> 
       <span class="value"> 动作 </span> 
      </div> 
      <div> 
       <span class="key">主演 :</span> 
       <span class="value"> 杰森&middot;莫玛,艾梅柏&middot;希尔德</span> 
      </div> 
     </div> 
    </div> 
    <div class="show-date"> 
     <span>观影时间 :</span> 
     <span class="date-item active" data-index="0">今天 12月23</span> 
     <span class="date-item " data-index="1">明天 12月24</span> 
    </div> 
    <div class="plist-container active"> 
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
       <tr class=""> 
        <td> <span class="begin-time">19:20</span> <br /> <span class="end-time">21:43散场</span> </td> 
        <td> <span class="lang">英语3D</span> </td> 
        <td> <span class="hall">2号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812230026535?movieId=249342&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 249342, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
    <div class="plist-container "> 
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
       <tr class=""> 
        <td> <span class="begin-time">21:40</span> <br /> <span class="end-time">00:03散场</span> </td> 
        <td> <span class="lang">英语3D</span> </td> 
        <td> <span class="hall">2号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812240004424?movieId=249342&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 249342, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
   </div> 
   <div class="show-list " data-index="2"> 
    <div class="movie-info"> 
     <div> 
      <h3 class="movie-name">龙猫</h3> 
      <span class="score sc">9.2</span> 
     </div> 
     <div class="movie-desc"> 
      <div> 
       <span class="key">时长 :</span> 
       <span class="value">86分钟</span> 
      </div> 
      <div> 
       <span class="key">类型 :</span> 
       <span class="value"> 动画 </span> 
      </div> 
      <div> 
       <span class="key">主演 :</span> 
       <span class="value"> 秦岚,糸井重里,岛本须美</span> 
      </div> 
     </div> 
    </div> 
    <div class="show-date"> 
     <span>观影时间 :</span> 
     <span class="date-item active" data-index="0">今天 12月23</span> 
     <span class="date-item " data-index="1">明天 12月24</span> 
    </div> 
    <div class="plist-container active"> 
     <div class="finished-all-shows"> 
      <span class="finish-img"></span> 
      <br /> 
      <span class="finish-text">当日场次已放映完</span> 
     </div> 
    </div> 
    <div class="plist-container "> 
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
       <tr class=""> 
        <td> <span class="begin-time">22:35</span> <br /> <span class="end-time">00:01散场</span> </td> 
        <td> <span class="lang">日语2D</span> </td> 
        <td> <span class="hall">1号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812240004425?movieId=123&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 123, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
   </div> 
   <div class="show-list " data-index="3"> 
    <div class="movie-info"> 
     <div> 
      <h3 class="movie-name">叶问外传：张天志</h3> 
      <span class="score sc">9.2</span> 
     </div> 
     <div class="movie-desc"> 
      <div> 
       <span class="key">时长 :</span> 
       <span class="value">107分钟</span> 
      </div> 
      <div> 
       <span class="key">类型 :</span> 
       <span class="value"> 动作 </span> 
      </div> 
      <div> 
       <span class="key">主演 :</span> 
       <span class="value"> 张晋,戴夫&middot;巴蒂斯塔,柳岩</span> 
      </div> 
     </div> 
    </div> 
    <div class="show-date"> 
     <span>观影时间 :</span> 
     <span class="date-item active" data-index="0">今天 12月23</span> 
     <span class="date-item " data-index="1">明天 12月24</span> 
    </div> 
    <div class="plist-container active"> 
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
       <tr class=""> 
        <td> <span class="begin-time">18:45</span> <br /> <span class="end-time">20:32散场</span> </td> 
        <td> <span class="lang">国语2D</span> </td> 
        <td> <span class="hall">1号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812230026531?movieId=1200265&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 1200265, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
       <tr class="even"> 
        <td> <span class="begin-time">20:45</span> <br /> <span class="end-time">22:32散场</span> </td> 
        <td> <span class="lang">国语2D</span> </td> 
        <td> <span class="hall">1号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812230026533?movieId=1200265&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 1200265, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
    <div class="plist-container "> 
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
       <tr class=""> 
        <td> <span class="begin-time">12:15</span> <br /> <span class="end-time">14:02散场</span> </td> 
        <td> <span class="lang">国语2D</span> </td> 
        <td> <span class="hall">1号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812240004421?movieId=1200265&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 1200265, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
       <tr class="even"> 
        <td> <span class="begin-time">19:20</span> <br /> <span class="end-time">21:07散场</span> </td> 
        <td> <span class="lang">国语2D</span> </td> 
        <td> <span class="hall">2号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812240004422?movieId=1200265&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 1200265, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
   </div> 
   <div class="show-list " data-index="4"> 
    <div class="movie-info"> 
     <div> 
      <h3 class="movie-name">地球最后的夜晚</h3> 
      <span class="score wish">239022</span> 
     </div> 
     <div class="movie-desc"> 
      <div> 
       <span class="key">时长 :</span> 
       <span class="value">140分钟</span> 
      </div> 
      <div> 
       <span class="key">类型 :</span> 
       <span class="value"> 剧情 </span> 
      </div> 
      <div> 
       <span class="key">主演 :</span> 
       <span class="value"> 汤唯,黄觉,张艾嘉</span> 
      </div> 
     </div> 
    </div> 
    <div class="show-date"> 
     <span>观影时间 :</span> 
     <span class="date-item active" data-index="0">周一 12月31</span> 
    </div> 
    <div class="plist-container active"> 
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
       <tr class=""> 
        <td> <span class="begin-time">19:10</span> <br /> <span class="end-time">21:30散场</span> </td> 
        <td> <span class="lang">国语3D</span> </td> 
        <td> <span class="hall">2号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812310044426?movieId=345036&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 345036, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
       <tr class="even"> 
        <td> <span class="begin-time">21:40</span> <br /> <span class="end-time">00:00散场</span> </td> 
        <td> <span class="lang">国语3D</span> </td> 
        <td> <span class="hall">2号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812310044427?movieId=345036&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 345036, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
   </div> 
   <div class="show-list " data-index="5"> 
    <div class="movie-info"> 
     <div> 
      <h3 class="movie-name">狗十三</h3> 
      <span class="score sc">8.2</span> 
     </div> 
     <div class="movie-desc"> 
      <div> 
       <span class="key">时长 :</span> 
       <span class="value">121分钟</span> 
      </div> 
      <div> 
       <span class="key">类型 :</span> 
       <span class="value"> 剧情 </span> 
      </div> 
      <div> 
       <span class="key">主演 :</span> 
       <span class="value"> 张雪迎,果靖霖,智一桐</span> 
      </div> 
     </div> 
    </div> 
    <div class="show-date"> 
     <span>观影时间 :</span> 
     <span class="date-item active" data-index="0">今天 12月23</span> 
     <span class="date-item " data-index="1">明天 12月24</span> 
     <span class="date-item " data-index="2">周六 12月29</span> 
    </div> 
    <div class="plist-container active"> 
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
       <tr class=""> 
        <td> <span class="begin-time">16:30</span> <br /> <span class="end-time">18:31散场</span> </td> 
        <td> <span class="lang">国语2D</span> </td> 
        <td> <span class="hall">1号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812230026538?movieId=78480&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 78480, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
    <div class="plist-container "> 
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
       <tr class=""> 
        <td> <span class="begin-time">18:15</span> <br /> <span class="end-time">20:16散场</span> </td> 
        <td> <span class="lang">国语2D</span> </td> 
        <td> <span class="hall">1号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812240004426?movieId=78480&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 78480, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
    <div class="plist-container "> 
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
       <tr class=""> 
        <td> <span class="begin-time">08:30</span> <br /> <span class="end-time">10:31散场</span> </td> 
        <td> <span class="lang">国语2D</span> </td> 
        <td> <span class="hall">1号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812290011009?movieId=78480&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 78480, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
       <tr class="even"> 
        <td> <span class="begin-time">08:30</span> <br /> <span class="end-time">10:31散场</span> </td> 
        <td> <span class="lang">国语2D</span> </td> 
        <td> <span class="hall">2号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812290011010?movieId=78480&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 78480, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
   </div> 
   <div class="show-list " data-index="6"> 
    <div class="movie-info"> 
     <div> 
      <h3 class="movie-name">侠路相逢</h3> 
      <span class="score wish">401</span> 
     </div> 
     <div class="movie-desc"> 
      <div> 
       <span class="key">时长 :</span> 
       <span class="value">96分钟</span> 
      </div> 
      <div> 
       <span class="key">类型 :</span> 
       <span class="value"> 动作 </span> 
      </div> 
      <div> 
       <span class="key">主演 :</span> 
       <span class="value"> 邵兵,姜武,姚娆</span> 
      </div> 
     </div> 
    </div> 
    <div class="show-date"> 
     <span>观影时间 :</span> 
     <span class="date-item active" data-index="0">今天 12月23</span> 
    </div> 
    <div class="plist-container active"> 
     <div class="finished-all-shows"> 
      <span class="finish-img"></span> 
      <br /> 
      <span class="finish-text">当日场次已放映完</span> 
     </div> 
    </div> 
   </div> 
   <div class="show-list " data-index="7"> 
    <div class="movie-info"> 
     <div> 
      <h3 class="movie-name">天气预爆</h3> 
      <span class="score sc">6.7</span> 
     </div> 
     <div class="movie-desc"> 
      <div> 
       <span class="key">时长 :</span> 
       <span class="value">104分钟</span> 
      </div> 
      <div> 
       <span class="key">类型 :</span> 
       <span class="value"> 剧情 </span> 
      </div> 
      <div> 
       <span class="key">主演 :</span> 
       <span class="value"> 肖央,杜鹃,常远</span> 
      </div> 
     </div> 
    </div> 
    <div class="show-date"> 
     <span>观影时间 :</span> 
     <span class="date-item active" data-index="0">明天 12月24</span> 
    </div> 
    <div class="plist-container active"> 
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
       <tr class=""> 
        <td> <span class="begin-time">14:20</span> <br /> <span class="end-time">16:04散场</span> </td> 
        <td> <span class="lang">国语2D</span> </td> 
        <td> <span class="hall">1号厅</span> </td> 
        <td> <span class="sell-price"><span class="stonefont"></span></span> </td> 
        <td> <a href="/xseats/201812240004709?movieId=344649&amp;cinemaId=15280" class="buy-btn normal" data-tip="" data-act="show-click" data-bid="b_gvh3l8gg" data-val="{movie_id: 344649, cinema_id:15280}">选座购票</a> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
   </div>
 </div>
<script>
  window.onload = function(){
    $("#nones").css("display","block");
  }



</script>


@section('title','电影场次选择')