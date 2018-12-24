@extends('home.Public.Public')
@section('home')
<script src="/static/jquery-1.8.3.min.js"></script>

<div class="header-placeholder">
</div>
<div class="banner">
  <div class="wrapper clearfix">
    <div class="celeInfo-left">
      <div class="avatar-shadow">
        <img class="avatar" src="/static/home/picture/f18a1a371e38920840b315f51e846e271016796.jpg@464w_644h_1e_1c" alt="">
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
          <li class="ellipsis">纪录片</li>
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
        <a class="btn buy" href="/cinemas?movieId=1238696" target="_blank">特惠购票</a>
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
              <span class='score-num'><span class="stonefont">&#xe5bf;&#xefbf;&#xecd2;&#xe5bf;</span>人评分</span>
            </div>
          </div>
        </div>
        <div class="movie-index">
          <p class="movie-index-title">
            累计票房
          </p>
          <div class="movie-index-content box">
            <span class="stonefont">&#xefea;&#xefea;&#xe5bf;</span><span class="unit">万</span>
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
          <div class="tab-title active" data-act="tab-desc-click">
            介绍
          </div>
          <div class="tab-title " data-act="tab-celebrity-click">
            演职人员
          </div>
          <div class="tab-title tab-disabled" data-act="tab-award-click">
            奖项
          </div>
          <div class="tab-title " data-act="tab-img-click">
            图集
          </div>
        </div>
        <div class="tab-content-container">
          <div class="tab-desc tab-content active" data-val="{tabtype:'desc'}">
            <div class="module">
              <div class="mod-title">
                <h3>剧情简介</h3>
              </div>
              <div class="mod-content">
                <span class="dra">这是一部由程工、任长箴共同执导的现实题材电影，该电影讲述了15名普通中国人最真实的生活状态，这并无交集的十四段故事谱写着同一个世界角落的生活，它或许艰辛，或许无奈，或许也带着些许苦涩，但每个人都在默默坚持着、爱着这样的生活。</span>
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
                      <img class="default-img" data-src="/static/home/picture/a30fd0e7dfdd7993e73405a4f990b0c942429.jpg@128w_170h_1e_1c" alt="">
                      </a>
                      <div class="info">
                        <a href="/films/celebrity/947678" target="_blank" class="name">
      程工
                        </a>
                      </div>
                      </li>
                      <li class="celebrity " data-act="celebrity-click" data-val="{celebrityid:1157292}">
                      <a href="/films/celebrity/1157292" target="_blank" class="portrait">
                      <img class="default-img" data-src="/static/home/picture/74cef854bac2aa7d95717e59a189369b49707.jpg@128w_170h_1e_1c" alt="">
                      </a>
                      <div class="info">
                        <a href="/films/celebrity/1157292" target="_blank" class="name">
      任长箴
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
                      <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894923}">
                      <a href="/films/celebrity/2894923" target="_blank" class="portrait">
                      <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                      </a>
                      <div class="info">
                        <a href="/films/celebrity/2894923" target="_blank" class="name">
      李安甫
                        </a>
                      </div>
                      </li>
                      <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894924}">
                      <a href="/films/celebrity/2894924" target="_blank" class="portrait">
                      <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                      </a>
                      <div class="info">
                        <a href="/films/celebrity/2894924" target="_blank" class="name">
      胡兆翠
                        </a>
                      </div>
                      </li>
                      <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894935}">
                      <a href="/films/celebrity/2894935" target="_blank" class="portrait">
                      <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                      </a>
                      <div class="info">
                        <a href="/films/celebrity/2894935" target="_blank" class="name">
      康昕
                        </a>
                      </div>
                      </li>
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
                  <div class="img1">
                    <img class="default-img" data-src="/static/home/picture/dc301560a1836c7c9415ff5fa7bff38d334100.jpg@465w_258h_1e_1c" alt="">
                  </div>
                  <div class="img2">
                    <img class="default-img" data-src="/static/home/picture/45bbe6bfaab8cd642777815dff6b8a34297242.jpg@126w_126h_1e_1c" alt="">
                  </div>
                  <div class="img3">
                    <img class="default-img" data-src="/static/home/picture/5e16af18915ca385ded8caccb3649785448186.jpg@126w_126h_1e_1c" alt="">
                  </div>
                  <div class="img4">
                    <img class="default-img" data-src="/static/home/picture/358280034ba7adb9d25ca199f2980407363076.jpg@126w_126h_1e_1c" alt="">
                  </div>
                  <div class="img5">
                    <img class="default-img" data-src="/static/home/picture/ec10e9962add9a3b84b6424010d2b779496026.jpg@126w_126h_1e_1c" alt="">
                  </div>
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
          <div class="tab-celebrity tab-content" data-val="{tabtype:'celebrity'}">
            <div class="celebrity-container">
              <div class="celebrity-group">
                <div class="celebrity-type">
    导演
                  <span class="num">（2）</span>
                </div>
                <ul class="celebrity-list clearfix">
                  <li class="celebrity " data-act="celebrity-click" data-val="{celebrityid:947678}">
                  <a href="/films/celebrity/947678" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/a30fd0e7dfdd7993e73405a4f990b0c942429.jpg@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/947678" target="_blank" class="name">
      程工
                    </a>
                  </div>
                  </li>
                  <li class="celebrity " data-act="celebrity-click" data-val="{celebrityid:1157292}">
                  <a href="/films/celebrity/1157292" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/74cef854bac2aa7d95717e59a189369b49707.jpg@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/1157292" target="_blank" class="name">
      任长箴
                    </a>
                  </div>
                  </li>
                </ul>
              </div>
              <div class="celebrity-group">
                <div class="celebrity-type">
    演员
                  <span class="num">（14）</span>
                </div>
                <ul class="celebrity-list clearfix">
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894923}">
                  <a href="/films/celebrity/2894923" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894923" target="_blank" class="name">
      李安甫
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894924}">
                  <a href="/films/celebrity/2894924" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894924" target="_blank" class="name">
      胡兆翠
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894935}">
                  <a href="/films/celebrity/2894935" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894935" target="_blank" class="name">
      康昕
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894939}">
                  <a href="/films/celebrity/2894939" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894939" target="_blank" class="name">
      黄媛媛
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:1504253}">
                  <a href="/films/celebrity/1504253" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/1504253" target="_blank" class="name">
      宋金
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894941}">
                  <a href="/films/celebrity/2894941" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894941" target="_blank" class="name">
      尹焕章
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894942}">
                  <a href="/films/celebrity/2894942" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894942" target="_blank" class="name">
      宋龙超
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894945}">
                  <a href="/films/celebrity/2894945" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894945" target="_blank" class="name">
      张天义
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894947}">
                  <a href="/films/celebrity/2894947" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894947" target="_blank" class="name">
      刘良松
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894948}">
                  <a href="/films/celebrity/2894948" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894948" target="_blank" class="name">
      何英宇
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894949}">
                  <a href="/films/celebrity/2894949" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894949" target="_blank" class="name">
      李少云
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894951}">
                  <a href="/films/celebrity/2894951" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894951" target="_blank" class="name">
      田有学
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894953}">
                  <a href="/films/celebrity/2894953" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894953" target="_blank" class="name">
      陈金凤
                    </a>
                  </div>
                  </li>
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894954}">
                  <a href="/films/celebrity/2894954" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/3a2061d771d98566d3e5fa5c08c5e0b33685.png@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894954" target="_blank" class="name">
      陈燕玲
                    </a>
                  </div>
                  </li>
                </ul>
              </div>
              <div class="celebrity-group">
                <div class="celebrity-type">
    编剧
                  <span class="num">（1）</span>
                </div>
                <ul class="celebrity-list clearfix">
                  <li class="celebrity " data-act="celebrity-click" data-val="{celebrityid:947678}">
                  <a href="/films/celebrity/947678" target="_blank" class="portrait">
                  <img class="default-img" data-src="/static/home/picture/a30fd0e7dfdd7993e73405a4f990b0c942429.jpg@128w_170h_1e_1c" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/947678" target="_blank" class="name">
      程工
                    </a>
                  </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="tab-award tab-content" data-val="{tabtype:'award'}">
          </div>
          <div class="tab-img tab-content" data-val="{tabtype:'img'}">
            <ul class="clearfix">
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/dc301560a1836c7c9415ff5fa7bff38d334100.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/45bbe6bfaab8cd642777815dff6b8a34297242.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/5e16af18915ca385ded8caccb3649785448186.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/358280034ba7adb9d25ca199f2980407363076.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/ec10e9962add9a3b84b6424010d2b779496026.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/8f44f03e2771b19e547b0091503ef151483619.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/e2e2b55e02fd7d1279b9b7f823b77f6f511374.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/fd4ac99f3fd875b93074e3618aab8a1a357683.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/151d9f7384aa665e0f7d72cc56bb7caf410477.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/05761c132c0cc7016ebd6966298546a4958928.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/a107f64796b2778960abeba0a12c92e9994520.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/b2f44143cb53a830a61495f5f0fa989f968422.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/96a1dbabb691b5533da8f6dfbb06afb8693378.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/f356f781cd4641f7717b24f4267f4d49759874.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/0b1a59fb4a1ece4598576bdef93b1f24665580.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/4954e9c3a99a31aef2942845916888cd112379.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/aa252f3f20ae0dc3aabca44e7117e4cb271910.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/2d869caa0b5334c755274a243f00e6cd306691.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/fac5cece2d147eec8eb32e69db98239e262109.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/2785d1c16c6003d8e79d9e527d58936b211413.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/efa23b2d715e6fe50f157efb635870d8273572.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/5f060755485b14e9dc0f71ab6b4a480c282808.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/22d7bd94dee19cef463639f093eea1963897381.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/16f189501b7ef4c51018f1cc0a3e846c3231408.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/29425cc4be8dae4d750c0b70bbb8cb71617665.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/5e14f3c565e2c335b04e1e18ae31f5c3307254.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/66bff3ce71b5106e55815fc5c1d20c6d273414.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/fec98b1e11f1f6ef51a94dfc311e14a3283737.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/6b8ea385320e9fbd8c502972c614f309273629.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/aabd53c1005c7208a7353ad46aa61a96261908.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/28667c7d83042b1241a7967b956561ce212633.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/084b83cb36e765c36d68164a489909f5408504.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/54abd2808cef6803e927961f0c2740f6404790.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/1825a76f9c44a8eb7abaa667ea43f4d4413675.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/ee64e3a9737a8b4e4b4da4ebe82805f1469906.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/b1032cfd693cd3777c37df16c067b15e483562.jpg@106w_106h_1e_1c" alt="">
              </li>
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="/static/home/picture/bf9062b083a2a9499e04fc253442f061486319.jpg@106w_106h_1e_1c" alt="">
              </li>
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
