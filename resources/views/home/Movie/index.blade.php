@extends('home.Public.Public')
@section('home')
<script src="/static/jquery-1.8.3.min.js"></script>

<div class="header-placeholder">
</div>
<div class="banner">
  <div class="wrapper clearfix">
    <div class="celeInfo-left">
      <div class="avatar-shadow">
        <img class="avatar" src="{{$data->cover}}" alt="">
        <div class="movie-ver">
        </div>
      </div>
    </div>
    <div class="celeInfo-right clearfix">
      <div class="movie-brief-container">
        <h3 class="name">{{$data->name}}</h3>
        <div class="ename ellipsis">
          
        </div>
        <ul>
        
          <li class="ellipsis">{{$for}}</li>
          <li class="ellipsis">
        中国大陆
          / {{$data->times}}分钟
          </li>
          <li class="ellipsis">{{$data->ymd}}大陆上映</li>
        </ul>
      </div>
      <div class="action-buyBtn">
        <div class="action clearfix" data-val="{movieid:1238696}">
          <a class="wish " data-wish="false" data-score="" data-bid="b_gbxqtw6x" style="height: 35px">
          <div>
            <i class="icon wish-icon"></i>
            <span class="wish-msg" data-act="wish-click">想看</span>
          </div>
          </a>
          <a class="score-btn " data-bid="b_rxxpcgwd" style="height: 35px">
          <div>
            <i class="icon score-btn-icon"></i>
            <span class="score-btn-msg" data-act="comment-open-click">
                评分
            </span>
          </div>
          </a>
        </div>
        <a class="btn buy" href="/films_show_cinema?id={{$data->id}}" target="_blank">特惠购票</a>
      </div>
      <div class="movie-stats-container">
        <div class="movie-index">
          <p class="movie-index-title">
            用户评分
          </p>
          <div class="movie-index-content score normal-score">
            <span class="index-left info-num ">
            <span class="stonefont">{{$data->score}}</span>
            </span>
            <div class="index-right">
              <div class='star-wrapper'>
                <div class="star-on" style="width:91%;">
                </div>
              </div>
              <span class='score-num'><span class="stonefont">{{$data->box_office+753}}</span>人评分</span>
            </div>
          </div>
        </div>
        <div class="movie-index">
          <p class="movie-index-title">
            累计票房
          </p>
          <div class="movie-index-content box">
            <span class="stonefont">{{$data->box_office}}</span><span class="unit">万</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container" id="app" class="page-movie/detail">
  <div class="main-content-container clearfix">
    <div class="main-content">
      <div class="tab-container">
        <div class="tab-title-container clearfix">
          <div class="tab-title active" onclick="fun(this)" data-act="tab-desc" id="cz">
            介绍
          </div>
          <div class="tab-title " onclick="fun(this)" data-act="tab-celebrity">
            演职人员
          </div>
          
          <div class="tab-title " onclick="fun(this)" data-act="tab-img">
            图集
          </div>
        </div>


        <div class="tab-content-container">
          <!-- 介绍 -->
          <div class="tab-desc tab-content active" data-val="{tabtype:'desc'}">
            <div class="module">
              <div class="mod-title">
                <h3>剧情简介</h3>
              </div>
              <div class="mod-content">
                <span class="dra">{{$data->film_introduce}}生活。</span>
              </div>
            </div>
            <div class="module">
              <div class="mod-title">
                <h3>演职人员</h3>
                <a class="more" href="#celebrity" data-act="all-actor-click">全部</a>
              </div>
              <div class="mod-content">
                <div class="celebrity-container clearfix">
                  <div class="celebrity-group">
                    <div class="celebrity-type">
    导演
                    </div>
                    <ul class="celebrity-list clearfix">
                      <li class="celebrity " data-act="celebrity-click" data-val="{celebrityid:947678}">
                      <a href="/films/celebrity/947678" target="_blank" class="portrait">
                      <img class="default-img" data-src="{{$data->director_img}}" alt="">
                      </a>
                      <div class="info">
                        <a href="/films/celebrity/947678" target="_blank" class="name">
      {{$data->director}}
                        </a>
                      </div>
                      </li>
                      
                    </ul>
                  </div>
                  <div class="celebrity-group">
                    <div class="celebrity-type">
    演员
                    </div>
                    <ul class="celebrity-list clearfix">
                    @for($i=0;$i<$count;$i++)
                      <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894923}">
                      <a href="/films/celebrity/2894923" target="_blank" class="portrait">
                      <img class="default-img" data-src="{{$performer[$i]->img}}" alt="">
                      </a>
                      <div class="info">
                        <a href="/films/celebrity/2894923" target="_blank" class="name">
      {{$performer[$i]->name}}
                        </a>
                      </div>
                      </li>
                    @endfor
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="module">
              <div class="mod-title">
                <h3>图集</h3>
                <a class="more" href="#img" data-act="all-photo-click">全部</a>
              </div>
              <div class="mod-content">
                <div class="album clearfix" data-act="movie-img-click">
                @for($i=0;$i<=4;$i++)
                  <div class="img1">
                    <img class="default-img" data-src="{{$filmarr[$i]}}" alt="">
                  </div>
                  @endfor
                  
                </div>
              </div>
            </div>
            <div class="module">
              <div class="mod-title">
                <h3>热门短评</h3>
              </div>
              <div class="mod-content">
                <div class="comment-list-container" data-hot="10">
                  <ul>
                    <li class="comment-container " data-val="{commentid:1046005714}">
                    <div class="portrait-container">
                      <div class="portrait">
                        <img src="/static/home/picture/e456fc5fb969709705e5d4c84faf19a25467.jpg@100w_100h_1e_1c" alt="">
                      </div>
                      <i class="level-5-icon"></i>
                    </div>
                    <div class="main">
                      <div class="main-header clearfix">
                        <div class="user">
                          <span class="name">方在半</span>
                          <span class='tag'>购</span>
                        </div>
                        <div class="time" title="2018-11-27 15:45:57">
                          <span title="2018-11-27 15:45:57">5天前</span>
                          <ul class="score-star clearfix" data-score="10">
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                          </ul>
                        </div>
                        <div class="approve " data-id="1046005714">
                          <i data-act="comment-approve-click" class="approve-icon"></i><span class="num">87</span>
                        </div>
                      </div>
                      <div class="comment-content">
                        不同人的不同生活，都是最底层的你我他，人生百味，苦辣酸甜，生活不易却又充满希望，好好珍惜健康平静的日子吧！好电影！
                      </div>
                    </div>
                    </li>
                    <li class="comment-container " data-val="{commentid:1046012754}">
                    <div class="portrait-container">
                      <div class="portrait">
                        <img src="/static/home/picture/7828018f741b4ef9c2e7689e0e8fac885687.jpg@100w_100h_1e_1c" alt="">
                      </div>
                      <i class="level-3-icon"></i>
                    </div>
                    <div class="main">
                      <div class="main-header clearfix">
                        <div class="user">
                          <span class="name">请帮我关一下太阳</span>
                          <span class='tag'>购</span>
                        </div>
                        <div class="time" title="2018-11-27 15:15:54">
                          <span title="2018-11-27 15:15:54">5天前</span>
                          <ul class="score-star clearfix" data-score="9">
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right "></i></li>
                          </ul>
                        </div>
                        <div class="approve " data-id="1046012754">
                          <i data-act="comment-approve-click" class="approve-icon"></i><span class="num">58</span>
                        </div>
                      </div>
                      <div class="comment-content">
                        真实表达了当下中国城市最底层人的生活状态，我坚信生活会越来越好的。
                      </div>
                    </div>
                    </li>
                    <li class="comment-container " data-val="{commentid:1046044339}">
                    <div class="portrait-container">
                      <div class="portrait">
                        <img src="/static/home/picture/9936bdfbf1e4052e1116b5da33db56243973.jpg@100w_100h_1e_1c" alt="">
                      </div>
                      <i class="level-3-icon"></i>
                    </div>
                    <div class="main">
                      <div class="main-header clearfix">
                        <div class="user">
                          <span class="name">喜之郎</span>
                          <span class='tag'>购</span>
                        </div>
                        <div class="time" title="2018-11-28 00:43:49">
                          <span title="2018-11-28 00:43:49">4天前</span>
                          <ul class="score-star clearfix" data-score="10">
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                          </ul>
                        </div>
                        <div class="approve " data-id="1046044339">
                          <i data-act="comment-approve-click" class="approve-icon"></i><span class="num">40</span>
                        </div>
                      </div>
                      <div class="comment-content">
                        生活不易 都是讨生活的人受困于生老病死，在温饱线上挣扎。觉得自己很幸福，要关心身边的人，帮助有困难的人。
                      </div>
                    </div>
                    </li>
                    <li class="comment-container " data-val="{commentid:1046008089}">
                    <div class="portrait-container">
                      <div class="portrait">
                        <img src="/static/home/picture/93d73002e7f28ef72495d9207782b45c5550.jpg@100w_100h_1e_1c" alt="">
                      </div>
                      <i class="level-3-icon"></i>
                    </div>
                    <div class="main">
                      <div class="main-header clearfix">
                        <div class="user">
                          <span class="name">向无形</span>
                          <span class='tag'>购</span>
                        </div>
                        <div class="time" title="2018-11-28 15:15:04">
                          <span title="2018-11-28 15:15:04">4天前</span>
                          <ul class="score-star clearfix" data-score="9">
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right "></i></li>
                          </ul>
                        </div>
                        <div class="approve " data-id="1046008089">
                          <i data-act="comment-approve-click" class="approve-icon"></i><span class="num">23</span>
                        </div>
                      </div>
                      <div class="comment-content">
                        世上只有一种英雄主义就是认清了生活的真相但依然热爱生活
                      </div>
                    </div>
                    </li>
                    <li class="comment-container " data-val="{commentid:1046005069}">
                    <div class="portrait-container">
                      <div class="portrait">
                        <img src="/static/home/picture/12109acbecc817a9ac7cf9e16ba4ab8b5842.jpg@100w_100h_1e_1c" alt="">
                      </div>
                      <i class="level-6-icon"></i>
                    </div>
                    <div class="main">
                      <div class="main-header clearfix">
                        <div class="user">
                          <span class="name">炳叔</span>
                          <span class='tag'>购</span>
                        </div>
                        <div class="time" title="2018-11-27 13:18:01">
                          <span title="2018-11-27 13:18:01">5天前</span>
                          <ul class="score-star clearfix" data-score="5">
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right "></i></li>
                            <li>
                            <i class="half-star left "></i><i class="half-star right "></i></li>
                            <li>
                            <i class="half-star left "></i><i class="half-star right "></i></li>
                          </ul>
                        </div>
                        <div class="approve " data-id="1046005069">
                          <i data-act="comment-approve-click" class="approve-icon"></i><span class="num">23</span>
                        </div>
                      </div>
                      <div class="comment-content">
                        悲了催的人生，不觉其苦，只知其难。这样的生活，可称之万岁。（看了更珍惜眼前人，不看更心怀梦想
                      </div>
                    </div>
                    </li>
                    <li class="comment-container " data-val="{commentid:1046129795}">
                    <div class="portrait-container">
                      <div class="portrait">
                        <img src="/static/home/picture/b62ec1bcdbba20d96a719bd342de4ddb4401.jpg@100w_100h_1e_1c" alt="">
                      </div>
                      <i class="level-4-icon"></i>
                    </div>
                    <div class="main">
                      <div class="main-header clearfix">
                        <div class="user">
                          <span class="name">老猫</span>
                          <span class='tag'>购</span>
                        </div>
                        <div class="time" title="2018-11-29 16:34:15">
                          <span title="2018-11-29 16:34:15">3天前</span>
                          <ul class="score-star clearfix" data-score="10">
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                          </ul>
                        </div>
                        <div class="approve " data-id="1046129795">
                          <i data-act="comment-approve-click" class="approve-icon"></i><span class="num">17</span>
                        </div>
                      </div>
                      <div class="comment-content">
                        讲述了普通人的生活，平凡而伟大，有痛也有梦，有苟且也有远方，快递小伙宿舍里贴在墙上的窗，蜘蛛人父亲挂在窗外孩子的球衣，盲人卖唱夫妻的电子琴，单身出租车母亲小女儿手里的海苔，人力三轮大爷高压锅里煮着的挂面。。。谢谢你让我看到了光。好电影👍
                      </div>
                    </div>
                    </li>
                    <li class="comment-container " data-val="{commentid:1046031871}">
                    <div class="portrait-container">
                      <div class="portrait">
                        <img src="/static/home/picture/256d3c42fce21d875fc4c800cc473eec52945.jpg@100w_100h_1e_1c" alt="">
                      </div>
                      <i class="level-5-icon"></i>
                    </div>
                    <div class="main">
                      <div class="main-header clearfix">
                        <div class="user">
                          <span class="name">V字仇看队</span>
                          <span class='tag'>购</span>
                        </div>
                        <div class="time" title="2018-11-28 00:48:46">
                          <span title="2018-11-28 00:48:46">4天前</span>
                          <ul class="score-star clearfix" data-score="10">
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                          </ul>
                        </div>
                        <div class="approve " data-id="1046031871">
                          <i data-act="comment-approve-click" class="approve-icon"></i><span class="num">17</span>
                        </div>
                      </div>
                      <div class="comment-content">
                        第一次有给一部电影打十二分的冲动。生活如此多艰，许多人的活着只是一点点微光……
嗯，看完这个电影，十分痛恨那个一贪就上十  亿上百。亿的人群。
                      </div>
                    </div>
                    </li>
                    <li class="comment-container " data-val="{commentid:1046028661}">
                    <div class="portrait-container">
                      <div class="portrait">
                        <img src="/static/home/picture/0f8816841d4a33c7ad78c43584d5ddd54430.jpg@100w_100h_1e_1c" alt="">
                      </div>
                      <i class="level-4-icon"></i>
                    </div>
                    <div class="main">
                      <div class="main-header clearfix">
                        <div class="user">
                          <span class="name">老毛🍀</span>
                          <span class='tag'>购</span>
                        </div>
                        <div class="time" title="2018-11-27 20:59:53">
                          <span title="2018-11-27 20:59:53">4天前</span>
                          <ul class="score-star clearfix" data-score="10">
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                          </ul>
                        </div>
                        <div class="approve " data-id="1046028661">
                          <i data-act="comment-approve-click" class="approve-icon"></i><span class="num">16</span>
                        </div>
                      </div>
                      <div class="comment-content">
                        一个人的电影院
习惯 安静 感动
不动声色的纪录
每一个凡人的生活
毫不修饰 
没有着力悲伤
一切就那么顺其自然
生活的本真 或许
就是如此
                      </div>
                    </div>
                    </li>
                    <li class="comment-container " data-val="{commentid:1046126262}">
                    <div class="portrait-container">
                      <div class="portrait">
                        <img src="/static/home/picture/f27d9f674d6d68fe55d096673117e51194750.jpg@100w_100h_1e_1c" alt="">
                      </div>
                      <i class="level-4-icon"></i>
                    </div>
                    <div class="main">
                      <div class="main-header clearfix">
                        <div class="user">
                          <span class="name">无所谓536</span>
                          <span class='tag'>购</span>
                        </div>
                        <div class="time" title="2018-11-29 16:27:26">
                          <span title="2018-11-29 16:27:26">3天前</span>
                          <ul class="score-star clearfix" data-score="10">
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                          </ul>
                        </div>
                        <div class="approve " data-id="1046126262">
                          <i data-act="comment-approve-click" class="approve-icon"></i><span class="num">10</span>
                        </div>
                      </div>
                      <div class="comment-content">
                        真的是很好的一部纪实影片。看的人心酸落泪。十几个现实生活片断，叙述着生活在最底层国人的酸甜苦辣。老红军孤独的老年生活。边远瞭望塔无奈的儿子。年迈正直的三轮车夫。一家三口患癌症的小伙儿。失恋的女孩儿。怀揣梦想的足球男孩子。爱唱歌的小卖哥。特别是那对盲人二老夫妻，街头卖唱，歌声尤其好听，童声依然不老。相扶相搀依然像一对孩童真挚的爱。一场普通无华的电影看完后居然让我这么多感动，居然让我感到自已的生活是那么的幸福，居然是那么甜，原来还不以为满足的自已一下子觉得一切都是那么的美好。真的是一部启发唤醒生命的好电影！可惜的是很少有人去影院观看。很遗撼！
                      </div>
                    </div>
                    </li>
                    <li class="comment-container last" data-val="{commentid:1046033674}">
                    <div class="portrait-container">
                      <div class="portrait">
                        <img src="/static/home/picture/c728ce387496d93a94b640e672970d375454.jpg@100w_100h_1e_1c" alt="">
                      </div>
                      <i class="level-4-icon"></i>
                    </div>
                    <div class="main">
                      <div class="main-header clearfix">
                        <div class="user">
                          <span class="name">阳明九州刘立申13955124637</span>
                          <span class='tag'>购</span>
                        </div>
                        <div class="time" title="2018-11-27 22:30:03">
                          <span title="2018-11-27 22:30:03">4天前</span>
                          <ul class="score-star clearfix" data-score="8">
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left "></i><i class="half-star right "></i></li>
                          </ul>
                        </div>
                        <div class="approve " data-id="1046033674">
                          <i data-act="comment-approve-click" class="approve-icon"></i><span class="num">14</span>
                        </div>
                      </div>
                      <div class="comment-content">
                        如果绝的苦，用心看看身边的人；如果觉得累，看看你的同行，同事…世界很大，总有人比你更苦，比你更累，每个人光鲜的一面背后总有你想不到的痛苦，每个人不堪（或者你不耻，不屑）的背面也会有他沉浸之中的理由，凡事都是有利有弊，去做你喜欢做的事去吧，闲暇之余，也去想想你现在从事的工作到底有什么好与坏，可以与你的老板，做的好的同行聊聊，有可能的话甚至可以和你同行老板聊聊，或者这个行业的佼佼者们，在网上的言论…中华民族是一个善良的民族，勤劳的民族
                      </div>
                    </div>
                    </li>
                  </ul>
                </div>
                <a class="comment-entry" data-act="comment-no-content-click">写短评</a>
              </div>
            </div>
          </div>

          <!-- 演职人员 -->
          <div class="tab-celebrity tab-content" data-val="{tabtype:'celebrity'}">
            <div class="celebrity-container">
              <div class="celebrity-group">
                <div class="celebrity-type">
    导演
                  <span class="num"></span>
                </div>
                <ul class="celebrity-list clearfix">
                  <li class="celebrity " data-act="celebrity-click" data-val="{celebrityid:947678}">
                  <a href="/films/celebrity/947678" target="_blank" class="portrait">
                  <img class="default-img" data-src="{{$data->director_img}}" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/947678" target="_blank" class="name">
      {{$data->director}}
                    </a>
                  </div>
                  </li>
                  
                </ul>
              </div>
              <div class="celebrity-group">
                <div class="celebrity-type">
    演员
                  <span class="num">（{{$c}}）</span>
                </div>
                <ul class="celebrity-list clearfix">
                  @for($i=0;$i<$c;$i++)
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894923}">
                  <a href="/films/celebrity/2894923" target="_blank" class="portrait">
                  <img class="default-img" data-src="{{$perfor[$i]->img}}" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894923" target="_blank" class="name">
      {{$perfor[$i]->name}}
                    </a>
                  </div>
                  </li>
                  @endfor
                </ul>
              </div>
              
            </div>
          </div>
          
          <!-- 图集 -->
          <div class="tab-img tab-content" data-val="{tabtype:'img'}">
            <ul class="clearfix">
            @for($i=0;$i<$cc;$i++)
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="{{$filmimg[$i]}}" alt="">
              </li>
              @endfor
              
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="related">
      <div class="module">
        <div class="mod-title">
          <h3>相关资讯</h3>
        </div>
        <div class="mod-content">
          <dl class="news-list">
            <dd class="news-item" data-act="new-click" data-val="{newsid:51640}">
            <div class="news-img">
              <a href="/films/news/51640" target="_blank">
              <img class="news-img-default" src="/static/home/picture/loading_2.e3d934bf.png"/>
              <img class="news-img-detail" data-src="/static/home/picture/c86e0025308bda422cf3ec384654fd58945860.jpg@140w_86h_1e_1c"/>
              </a>
            </div>
            <div class="news-main">
              <div class="news-title">
                <a href="/films/news/51640" target="_blank">《生活万岁》全国首映，2018最具突破性的国产电影</a>
              </div>
              <div class="news-info">
                <span class="news-source">猫眼电影</span><!--
        --><span><i class="news-icon news-icon-views"></i>4732</span><!--
        --><span><i class="news-icon news-icon-comments"></i>1</span>
              </div>
            </div>
            </dd>
            <dd class="news-item" data-act="new-click" data-val="{newsid:51215}">
            <div class="news-img">
              <a href="/films/news/51215" target="_blank">
              <img class="news-img-default" src="/static/home/picture/loading_2.e3d934bf.png"/>
              <img class="news-img-detail" data-src="/static/home/picture/b087b7b73b28f22af62a9f4edceec936378459.jpg@140w_86h_1e_1c"/>
              </a>
            </div>
            <div class="news-main">
              <div class="news-title">
                <a href="/films/news/51215" target="_blank">《生活万岁》电影主题曲发布，崔健燃情演绎《阳光下的梦》</a>
              </div>
              <div class="news-info">
                <span class="news-source">猫眼电影</span><!--
        --><span><i class="news-icon news-icon-views"></i>5175</span><!--
        --><span><i class="news-icon news-icon-comments"></i>0</span>
              </div>
            </div>
            </dd>
            <dd class="news-item" data-act="new-click" data-val="{newsid:50661}">
            <div class="news-img">
              <a href="/films/news/50661" target="_blank">
              <img class="news-img-default" src="/static/home/picture/loading_2.e3d934bf.png"/>
              <img class="news-img-detail" data-src="/static/home/picture/3ba760732dab16b2538ff85f12c6c6153093207.jpg@140w_86h_1e_1c"/>
              </a>
            </div>
            <div class="news-main">
              <div class="news-title">
                <a href="/films/news/50661" target="_blank">《生活万岁》定档11月27日，类型片尝试全新发行模式</a>
              </div>
              <div class="news-info">
                <span class="news-source">猫眼电影</span><!--
        --><span><i class="news-icon news-icon-views"></i>6964</span><!--
        --><span><i class="news-icon news-icon-comments"></i>0</span>
              </div>
            </div>
            </dd>
          </dl>
        </div>
      </div>
      <div class="module">
        <div class="mod-title">
          <h3>相关电影</h3>
        </div>
        <div class="mod-content">
          <div class="related-movies">
            <dl class="movie-list">
              <dd>
              <div class="movie-item">
                <a href="/films/1238843" target="_blank" data-act="movie-click" data-val="{movieid:1238843}">
                <div class="movie-poster">
                  <img class="poster-default" src="/static/home/picture/loading_2.e3d934bf.png"/>
                  <img data-src="/static/home/picture/038f914d496faaa1f6c1725445adebea311194.jpg@106w_145h_1e_1c"/>
                </div>
                </a>
                <div class="movie-ver">
                </div>
              </div>
              <div class="channel-detail movie-item-title" title="一百年很长吗">
                <a href="/films/1238843" target="_blank" data-act="movies-click" data-val="{movieId:1238843}">一百年很长吗</a>
              </div>
              <div class="channel-detail channel-detail-orange">
                <i class="integer">8.</i><i class="fraction">6</i>
              </div>
              <dd>
              <div class="movie-item">
                <a href="/films/1209463" target="_blank" data-act="movie-click" data-val="{movieid:1209463}">
                <div class="movie-poster">
                  <img class="poster-default" src="/static/home/picture/loading_2.e3d934bf.png"/>
                  <img data-src="/static/home/picture/9db280956ebdb8ee58db242ddcd12b7846787.jpg@106w_145h_1e_1c"/>
                </div>
                </a>
                <div class="movie-ver">
                </div>
              </div>
              <div class="channel-detail movie-item-title" title="生活万岁">
                <a href="/films/1209463" target="_blank" data-act="movies-click" data-val="{movieId:1209463}">生活万岁</a>
              </div>
              <div class="channel-detail channel-detail-orange">
                暂无评分
              </div>
              <dd>
              <div class="movie-item">
                <a href="/films/1218052" target="_blank" data-act="movie-click" data-val="{movieid:1218052}">
                <div class="movie-poster">
                  <img class="poster-default" src="/static/home/picture/loading_2.e3d934bf.png"/>
                  <img data-src="/static/home/picture/864162647a298e9c35395fc993a2753a827413.jpg@106w_145h_1e_1c"/>
                </div>
                </a>
                <div class="movie-ver">
                </div>
              </div>
              <div class="channel-detail movie-item-title" title="大三儿">
                <a href="/films/1218052" target="_blank" data-act="movies-click" data-val="{movieId:1218052}">大三儿</a>
              </div>
              <div class="channel-detail channel-detail-orange">
                <i class="integer">8.</i><i class="fraction">8</i>
              </div>
              <dd>
              <div class="movie-item">
                <a href="/films/349239" target="_blank" data-act="movie-click" data-val="{movieid:349239}">
                <div class="movie-poster">
                  <img class="poster-default" src="/static/home/picture/loading_2.e3d934bf.png"/>
                  <img data-src="/static/home/picture/953dc2be32761301a36e87066a92523b183273.jpg@106w_145h_1e_1c"/>
                </div>
                </a>
                <div class="movie-ver">
                </div>
              </div>
              <div class="channel-detail movie-item-title" title="自行车与旧电钢">
                <a href="/films/349239" target="_blank" data-act="movies-click" data-val="{movieId:349239}">自行车与旧电钢</a>
              </div>
              <div class="channel-detail channel-detail-orange">
                暂无评分
              </div>
              <dd>
              <div class="movie-item">
                <a href="/films/1222925" target="_blank" data-act="movie-click" data-val="{movieid:1222925}">
                <div class="movie-poster">
                  <img class="poster-default" src="/static/home/picture/loading_2.e3d934bf.png"/>
                  <img data-src="/static/home/picture/44c9f5837d67e5dac00f2af0cbdc07a4160392.jpg@106w_145h_1e_1c"/>
                </div>
                </a>
                <div class="movie-ver">
                </div>
              </div>
              <div class="channel-detail movie-item-title" title="盲行者">
                <a href="/films/1222925" target="_blank" data-act="movies-click" data-val="{movieId:1222925}">盲行者</a>
              </div>
              <div class="channel-detail channel-detail-orange">
                暂无评分
              </div>
              <dd>
              <div class="movie-item">
                <a href="/films/368311" target="_blank" data-act="movie-click" data-val="{movieid:368311}">
                <div class="movie-poster">
                  <img class="poster-default" src="/static/home/picture/loading_2.e3d934bf.png"/>
                  <img data-src="/static/home/picture/8fca23576a8a6cb03103ea6f1ef79b26113478.jpg@106w_145h_1e_1c"/>
                </div>
                </a>
                <div class="movie-ver">
                </div>
              </div>
              <div class="channel-detail movie-item-title" title="舌尖上的中国 第一季">
                <a href="/films/368311" target="_blank" data-act="movies-click" data-val="{movieId:368311}">舌尖上的中国 第一季</a>
              </div>
              <div class="channel-detail channel-detail-orange">
                <i class="integer">8.</i><i class="fraction">7</i>
              </div>
            </dl>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script id="comment-form-container" type="text/template">
  <form id="comment-form" data-val="{movieid:1238696}">
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
@section('title','')

<script>
window.onload = function(){
  $(".banner").css("display","block");
}
</script>
<script>
// alert("123");
function fun(thiss){
  $(".tab-title").removeClass("active");
  $(thiss).addClass("active");
  var data = $(thiss).attr("data-act");
  $(".tab-content").removeClass("active");
  $("."+data).addClass("active");
}

</script> 