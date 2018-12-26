@extends('home.Public.Public')
@section('home')
<div class="header-placeholder">
</div>
<div class="banner">
  <div class="slider single-item slider-banner">
    <a target="_blank" data-act="bannerNews-click" href="https://m.maoyan.com/information/51914?_v_=yes&amp;share=iOS" data-bgurl="/static/home/image/mmc/8249055607130af33e20124ac0b8af48198622.jpg"></a>
    <a target="_blank" data-act="bannerNews-click" href="/movie/news/50640" data-bgurl="/static/home/image/mmc/9352c87ad8fba562088289366fe78680200736.jpg"></a>
    <a target="_blank" data-act="bannerNews-click" href="https://m.maoyan.com/prevue/96282?_v_=6&amp;share=iOS" data-bgurl="/static/home/image/mmc/06dc3632c61a571046a78532ddc9188a160549.jpg"></a>
    <a target="_blank" data-act="bannerNews-click" href="https://m.maoyan.com/prevue/96250?_v_=6&amp;share=iOS" data-bgurl="/static/home/image/mmc/5c936eb34413b6298a45c4f1a4ddd183199208.jpg"></a>
  </div>
</div>
<div class="container" id="app" class="page-home/index">
  <div class="content">
    <div class="aside">
      <div class="ranking-box-wrapper">
        <div class="panel">
          <div class="panel-header">
            <span class="panel-title">
            <span class="textcolor_red">今日票房</span>
            </span>
          </div>
          <div class="panel-content">
            <ul class="ranking-wrapper ranking-box">
            <!-- first -->
            @foreach($first as $f)
              <li class="ranking-item ranking-top ranking-index-1">
              <a href="/movie/{{$f->id}}" target="_blank" data-act="ticketList-movie-click" data-val="{movieid:1208282}">
              <div class="ranking-top-left">
                <i class="ranking-top-icon"></i>
                <img class="ranking-img default-img" data-src="{{$f->cover}}"/>
              </div>
              <div class="ranking-top-right">
                <div class="ranking-top-right-main">
                  <span class="ranking-top-moive-name">{{$f->name}}</span>
                  <p class="ranking-top-wish">
                    <span class="stonefont">{{$f->box_office}}</span>万
                  </p>
                </div>
              </div>
              </a>
              </li>
              @endforeach
              @foreach($two as $t)
              <li class="ranking-item ranking-index-2">
              <a href="/movie/{{$t->id}}" target="_blank" data-act="ticketList-movie-click" data-val="{movieid:341213}">
              <span class="normal-link">
              <i class="ranking-index">2</i>
              <span class="ranking-movie-name">{{$t->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$t->box_office}}</span>万
              </span>
              </span>
              </a>
              </li>
              @endforeach
              @for($i=3;$i<=3;$i++)
              <li class="ranking-item ranking-index-3">
              <a href="/movie/{{$t->id}}" target="_blank" data-act="ticketList-movie-click" data-val="{movieid:42964}">
              <span class="normal-link">
              <i class="ranking-index">{{$i}}</i>
              <span class="ranking-movie-name">{{$three[0]->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$three[0]->box_office}}</span>万
              </span>
              </span>
              </a>
              </li>
              @endfor
              
              <li class="ranking-item ranking-index-4">
              <a href="/movie/{{$pf4->id}}" target="_blank" data-act="ticketList-movie-click" data-val="{movieid:1207271}">
              <span class="normal-link">
              <i class="ranking-index">4</i>
              <span class="ranking-movie-name">{{$pf4->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$pf4->box_office}}</span>万
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-5">
              <a href="/movie/{{$pf5->id}}" target="_blank" data-act="ticketList-movie-click" data-val="{movieid:577564}">
              <span class="normal-link">
              <i class="ranking-index">5</i>
              <span class="ranking-movie-name">{{$pf5->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$pf5->box_office}}</span>万
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-6">
              <a href="/movie/{{$pf6->id}}" target="_blank" data-act="ticketList-movie-click" data-val="{movieid:1221035}">
              <span class="normal-link">
              <i class="ranking-index">6</i>
              <span class="ranking-movie-name">{{$pf6->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$pf6->box_office}}</span>万
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-7">
              <a href="/movie/{{$pf7->id}}" target="_blank" data-act="ticketList-movie-click" data-val="{movieid:1165276}">
              <span class="normal-link">
              <i class="ranking-index">7</i>
              <span class="ranking-movie-name">{{$pf7->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$pf7->box_office}}</span>万
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-8">
              <a href="/movie/{{$pf8->id}}" target="_blank" data-act="ticketList-movie-click" data-val="{movieid:337129}">
              <span class="normal-link">
              <i class="ranking-index">8</i>
              <span class="ranking-movie-name">{{$pf8->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$pf8->box_office}}</span>万
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-9">
              <a href="/movie/{{$pf9->id}}" target="_blank" data-act="ticketList-movie-click" data-val="{movieid:1234403}">
              <span class="normal-link">
              <i class="ranking-index">9</i>
              <span class="ranking-movie-name">{{$pf9->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$pf9->box_office}}</span>万
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-10">
              <a href="/movie/{{$pf10->id}}" target="_blank" data-act="ticketList-movie-click" data-val="{movieid:1238696}">
              <span class="normal-link">
              <i class="ranking-index">10</i>
              <span class="ranking-movie-name">{{$pf10->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$pf10->box_office}}</span>万
              </span>
              </span>
              </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="box-total-wrapper clearfix">
        <h3>今日大盘</h3>
        <div>
          <p>
            <span class="num"><span class="stonefont">&#xe952;.&#xe966;&#xf6d0;</span></span>亿
            <a class="more" target="_blank" data-act="moreDayTip-click" href="https://piaofang.maoyan.com/">查看更多 <span class="panel-arrow panel-arrow-red"></span></a>
          </p>
          <p class="meta-info">
            北京时间 20:58:09
            <span class="pull-right">猫眼专业版实时票房数据</span>
          </p>
        </div>
      </div>
      <div class="most-expect-wrapper">
        <div class="panel">
          <div class="panel-header">
            <span class="panel-more">
            <a href="/List?id=2" class="textcolor_orange" data-act="all-mostExpect-click">
            <span>查看完整榜单</span>
            </a>
            <span class="panel-arrow panel-arrow-orange"></span>
            </span>
            <span class="panel-title">
            <span class="textcolor_orange">最受期待</span>
            </span>
          </div>
          <div class="panel-content">
            <ul class="ranking-wrapper ranking-mostExpect">

              <li class="ranking-item ranking-top ranking-index-1">
              <a href="/movie/{{$firsts->id}}" target="_blank" data-act="mostExpect-movie-click" data-val="{movieid:249342}">
              <div class="ranking-top-left">
                <i class="ranking-top-icon"></i>
                <img class="ranking-img default-img" data-src="{{$firsts->cover}}"/>
              </div>
              <div class="ranking-top-right">
                <div class="ranking-top-right-main">
                  <span class="ranking-top-moive-name">{{$firsts->name}}</span>
                  <p class="ranking-release-time">
                    上映时间：{{$firsts->ymd}}
                  </p>
                  <p class="ranking-top-wish">
                    <span class="stonefont">{{$firsts->box_office}}</span>人想看
                  </p>
                </div>
              </div>
              </a>
              </li>

              <li class="ranking-item ranking-index-2">
              <a href="/movie/{{$twos->id}}" target="_blank" data-act="mostExpect-movie-click" data-val="{movieid:123}">
              <i class="ranking-index">2</i>
              <span class="img-link"><img class="ranking-img default-img" src="{{$twos->cover}}"/></span>
              <div class="name-link ranking-movie-name">
                {{$twos->name}}
              </div>
              <span class="ranking-num-info"><span class="stonefont">{{$twos->box_office}}</span>人想看</span>
              </a>
              </li>

              <li class="ranking-item ranking-index-3">
              <a href="/movie/{{$threes->id}}" target="_blank" data-act="mostExpect-movie-click" data-val="{movieid:1206824}">
              <i class="ranking-index">3</i>
              <span class="img-link"><img class="ranking-img default-img" src="{{$threes->cover}}"/></span>
              <div class="name-link ranking-movie-name">
                {{$threes->name}}
              </div>
              <span class="ranking-num-info"><span class="stonefont">{{$threes->box_office}}</span>人想看</span>
              </a>
              </li>

              <li class="ranking-item ranking-index-4">
              <a href="/movie/{{$qd4->id}}" target="_blank" data-act="mostExpect-movie-click" data-val="{movieid:344869}">
              <span class="normal-link">
              <i class="ranking-index">4</i>
              <span class="ranking-movie-name">{{$qd4->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$qd4->box_office}}</span>人想看
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-5">
              <a href="/movie/{{$qd5->id}}" target="_blank" data-act="mostExpect-movie-click" data-val="{movieid:1218091}">
              <span class="normal-link">
              <i class="ranking-index">5</i>
              <span class="ranking-movie-name">{{$qd5->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$qd5->box_office}}</span>人想看
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-6">
              <a href="/movie/{{$qd6->id}}" target="_blank" data-act="mostExpect-movie-click" data-val="{movieid:1203740}">
              <span class="normal-link">
              <i class="ranking-index">6</i>
              <span class="ranking-movie-name">{{$qd6->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$qd6->box_office}}</span>人想看
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-7">
              <a href="/movie/{{$qd7->id}}" target="_blank" data-act="mostExpect-movie-click" data-val="{movieid:248906}">
              <span class="normal-link">
              <i class="ranking-index">7</i>
              <span class="ranking-movie-name">{{$qd7->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$qd7->box_office}}</span>人想看
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-8">
              <a href="/movie/{{$qd8->id}}" target="_blank" data-act="mostExpect-movie-click" data-val="{movieid:345655}">
              <span class="normal-link">
              <i class="ranking-index">8</i>
              <span class="ranking-movie-name">{{$qd8->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$qd8->box_office}}</span>人想看
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-9">
              <a href="/movie/{{$qd9->id}}" target="_blank" data-act="mostExpect-movie-click" data-val="{movieid:78480}">
              <span class="normal-link">
              <i class="ranking-index">9</i>
              <span class="ranking-movie-name">{{$qd9->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$qd9->box_office}}</span>人想看
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-10">
              <a href="/movie/{{$qd10->id}}" target="_blank" data-act="mostExpect-movie-click" data-val="{movieid:342165}">
              <span class="normal-link">
              <i class="ranking-index">10</i>
              <span class="ranking-movie-name">{{$qd10->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$qd10->box_office}}</span>人想看
              </span>
              </span>
              </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="top100-wrapper">
        <div class="panel">
          <div class="panel-header">
            <span class="panel-more">
            <a href="/List?id=3" class="textcolor_orange" data-act="all-TOP100-click">
            <span>查看完整榜单</span>
            </a>
            <span class="panel-arrow panel-arrow-orange"></span>
            </span>
            <span class="panel-title">
            <span class="textcolor_orange">TOP 100</span>
            </span>
          </div>
          <div class="panel-content">
            <ul class="ranking-wrapper ranking-top100">

              <li class="ranking-item ranking-top ranking-index-1">
              <a href="/movie/{{$top1->id}}" target="_blank" data-act="TOP100-movie-click" data-val="{movieid:1203}">
              <div class="ranking-top-left">
                <i class="ranking-top-icon"></i>
                <img class="ranking-img default-img" data-src="{{$top1->cover}}"/>
              </div>
              <div class="ranking-top-right">
                <div class="ranking-top-right-main">
                  <span class="ranking-top-moive-name">{{$top1->name}}</span>
                  <p class="ranking-top-wish">
                    <span class="stonefont">{{$top2->score}}</span>分
                  </p>
                </div>
              </div>
              </a>
              </li>
      
              <li class="ranking-item ranking-index-2">
              <a href="/movie/{{$top2->id}}" target="_blank" data-act="TOP100-movie-click" data-val="{movieid:1297}">
              <span class="normal-link">
              <i class="ranking-index">2</i>
              <span class="ranking-movie-name">{{$top2->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$top2->score}}</span>分
              </span>
              </span>
              </a>
              </li>
              <li class="ranking-item ranking-index-3">
              <a href="/movie/{{$top3->id}}" target="_blank" data-act="TOP100-movie-click" data-val="{movieid:2641}">
              <span class="normal-link">
              <i class="ranking-index">3</i>
              <span class="ranking-movie-name">{{$top3->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$top3->score}}</span>分
              </span>
              </span>
              </a>
              </li>
              @for($i=0;$i<=6;$i++)
              <li class="ranking-item ranking-index-4">
              <a href="/movie/{{$top[$i]->id}}" target="_blank" data-act="TOP100-movie-click" data-val="{movieid:4055}">
              <span class="normal-link">
              <i class="ranking-index">{{$i+4}}</i>
              <span class="ranking-movie-name">{{$top[$i]->name}}</span>
              <span class="ranking-num-info">
              <span class="stonefont">{{$top[$i]->score}}</span>分
              </span>
              </span>
              </a>
              </li>
              @endfor
              
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="main">
      <div class="movie-grid">
        <div class="panel">
          <div class="panel-header">
            <span class="panel-more">
            <a href="/films" class="textcolor_red" data-act="all-playingMovie-click">
            <span>全部</span>
            </a>
            <span class="panel-arrow panel-arrow-red"></span>
            </span>
            <span class="panel-title">
            <span class="textcolor_red">正在热映</span>
            </span>
          </div>
          <div class="panel-content">
            <dl class="movie-list">
            <!-- 发送的是 film表的id -->
            @foreach($hot as $h)
              <dd>
              <div class="movie-item">
                <a href="/movie/{{$h->id}}" target="_blank" data-act="playingMovie-click" data-val="{movieid:1208282}">
                <div class="movie-poster">
                  <img class="poster-default" src="/static/home/image/loading_2.e3d934bf.png"/>
                  <img data-src="{{$h->cover}}"/>
                  <div class="movie-overlay movie-overlay-bg">
                    <div class="movie-info">
                      <div class="movie-score">
                        <i class="integer">{{$h->score}}</i>
                      </div>
                      <div class="movie-title movie-title-padding" title="{{$h->name}}">
                        {{$h->name}}
                      </div>
                    </div>
                  </div>
                </div>
                </a>
                <div class="movie-detail movie-detail-strong movie-sale">
                  <a href="/films_show_cinema?id={{$h->id}}" class="active" target="_blank" data-act="salePlayingMovie-click" data-val="{movieid:1208282}">购 票</a>
                </div>
                <div class="movie-ver">
                </div>
              </div>
              @endforeach
              
            </dl>
          </div>
        </div>
        <div class="panel">
          <div class="panel-header">
            <span class="panel-more">
            <a href="films?playback_status=1" class="textcolor_blue" data-act="all-upcomingMovie-click">
            <span>全部</span>
            </a>
            <span class="panel-arrow panel-arrow-blue"></span>
            </span>
            <span class="panel-title">
            <span class="textcolor_blue">即将上映</span>
            </span>
          </div>
          <div class="panel-content">
            <dl class="movie-list">
             <!-- 发送的是 film表的id -->
            @foreach($ready as $r)
              <dd>
              <div class="movie-item">
                <a href="/movie/{{$r->id}}" target="_blank" data-act="upcomingMovie-click" data-val="{movieid:586481}">
                <div class="movie-poster">
                  <img class="poster-default" src="/static/home/image/loading_2.e3d934bf.png"/>
                  <img data-src="{{$r->cover}}"/>
                  <div class="movie-overlay movie-overlay-bg">
                    <div class="movie-info">
                      <div class="movie-title" title="{{$r->name}}">
                        {{$r->name}}
                      </div>
                    </div>
                  </div>
                </div>
                </a>
                <div class="movie-detail movie-wish">
                  <span class="stonefont">{{$r->box_office}}</span>人想看
                </div>
                <div class="movie-detail movie-detail-strong movie-presale">
                  <a class="movie-presale-sep" href="/yugao/{{$r->id}}">预告片
                  </a><a data-act="presaleUpcomingMovie-click" data-val="{movieid:586481}" href="/yushou/{{$r->id}}">预 售</a>
                </div>
                <div class="movie-ver">
                </div>
              </div>
              
              <div class="movie-detail movie-rt">
                {{$r->ymd}}上映
              </div>
              @endforeach
              
            </dl>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div style="position: fixed;bottom: 400px;left:1px;width: 200px;height: 150px;margin: 0;padding: 0;z-index: 999">
  @foreach($ad as $gg)
  <div style="display: block;max-width: 200px;max-width: 150px">
  <a href="{{$gg->url}}" target="_blank">
    <img src="{{$gg->img}}" alt="" width="200" height="150" title="{{$gg->title}}">
  </a>
  </div>
  @endforeach
</div>
<div style="position: fixed;bottom: 400px;right:1px;width: 200px;height: 150px;margin: 0;padding: 0;z-index: 999">
  @foreach($ad as $gg)
  <div style="display: block;max-width: 200px;max-width: 150px">
    <img src="{{$gg->img}}" alt="" width="200" height="150" title="{{$gg->title}}">

  </div>
  @endforeach
</div>
@endsection
@section('title','')
