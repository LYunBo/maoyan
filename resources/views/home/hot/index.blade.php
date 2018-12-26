@extends('home.Public.Public')
@section('home')
<div class="header-placeholder"></div>

  <div class="subnav">
  <ul class="navbar">
    <li>
      <a data-act="subnav-click" data-val="{subnavClick:1}"
          data-state-val="{subnavId:1}"
          class="active" href="javascript:void(0);">热点首页</a>
    </li>
    <li>
      <a data-act="subnav-click" data-val="{subnavClick:2}"
          href="/hot/create">新闻资讯</a>
    </li>
    <li>
      <a data-act="subnav-click" data-val="{subnavClick:3}"
          href="/hot/tab=3">预告片</a>
    </li>
    <li>
      <a data-act="subnav-click" data-val="{subnavClick:4}"
          href="/hot/tab=4/edit">精彩图集</a>
    </li>
  </ul>
</div>

<!-- hotnews 资讯表名-->
    <div class="container" id="app" class="page-news/hotNews" >
      <div class="hotIndex-container">
    <div class="index-news-container clearfix">
        <div class="popular-container">
    <h4 class="red">热门资讯</h4>
      <ul>
        @foreach($max as $s)
          <li class="top1-list">
            <div>
                <div class="top-info-thumb">
                  <a href="/wenzhang/{{$s->id}}" target="_blank" data-act="news-click" data-val="{newsid:52047}">
                    <img src="{{$s->cover}}" alt="">
                    <i class="ranking top-info-icon red-bg">1</i>
                  </a>
                </div>
                <p class="top1-news-content">
                  <a href="/wenzhang/{{$s->id}}" class="two-line" title="{{$s->title}}" target="_blank" data-act="news-click" data-val="{newsid:52047}">
                    {{$s->title}}
                  </a>
                </p>
            </div>
          </li>
          @endforeach

          @foreach($two as $t)
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking red">2</i>
                  <p class="top10-news-content">
                    <a href="/wenzhang/{{$t->id}}" target="_blank" data-act="news-click" data-val="{newsid:52060}">{{$t->title}}</a>
                  </p>
                </div>            
            </div>
          </li>
          @endforeach
          @foreach($three as $t)
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking red">3</i>
                  <p class="top10-news-content">
                    <a href="/wenzhang/{{$t->id}}" target="_blank" data-act="news-click" data-val="{newsid:52066}">{{$t->title}}</a>
                  </p>
                </div>            
            </div>
          </li>
          @endforeach
          @foreach($p4 as $p)
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">4</i>
                  <p class="top10-news-content">
                    <a href="/wenzhang/{{$p->id}}" target="_blank" data-act="news-click" data-val="{newsid:52086}">{{$p->title}}</a>
                  </p>
                </div>            
            </div>
          </li>
          @endforeach
          @foreach($p5 as $p)
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">5</i>
                  <p class="top10-news-content">
                    <a href="/wenzhang/{{$p->id}}" target="_blank" data-act="news-click" data-val="{newsid:52086}">{{$p->title}}</a>
                  </p>
                </div>            
            </div>
          </li>
          @endforeach
          @foreach($p6 as $p)
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">6</i>
                  <p class="top10-news-content">
                    <a href="/wenzhang/{{$p->id}}" target="_blank" data-act="news-click" data-val="{newsid:52086}">{{$p->title}}</a>
                  </p>
                </div>            
            </div>
          </li>
          @endforeach
          @foreach($p7 as $p)
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">7</i>
                  <p class="top10-news-content">
                    <a href="/wenzhang/{{$p->id}}" target="_blank" data-act="news-click" data-val="{newsid:52086}">{{$p->title}}</a>
                  </p>
                </div>            
            </div>
          </li>
          @endforeach
          @foreach($p8 as $p)
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">8</i>
                  <p class="top10-news-content">
                    <a href="/wenzhang/{{$p->id}}" target="_blank" data-act="news-click" data-val="{newsid:52086}">{{$p->title}}</a>
                  </p>
                </div>            
            </div>
          </li>
          @endforeach
          @foreach($p9 as $p)
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">9</i>
                  <p class="top10-news-content">
                    <a href="/wenzhang/{{$p->id}}" target="_blank" data-act="news-click" data-val="{newsid:52086}">{{$p->title}}</a>
                  </p>
                </div>            
            </div>
          </li>
          @endforeach
          @foreach($p10 as $p)
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">10</i>
                  <p class="top10-news-content">
                    <a href="/wenzhang/{{$p->id}}" target="_blank" data-act="news-click" data-val="{newsid:52086}">{{$p->title}}</a>
                  </p>
                </div>            
            </div>
          </li>
          @endforeach
      </ul>
  </div>

  <div class="latest-container">
      <h4 class="latest-header red">
          最新资讯
        <a href="/hot/create" class="all-latest" data-act="all-news-click">
          全部
          <span class="arrow red-arrow"></span>
        </a>
      </h4>


    <div class="latest-content clearfix">
        @foreach($data as $row)
          <div class="latest-news-box">
            <a href="/wenzhang/{{$row->id}}" target="_blank" data-act="news-click" data-val="{newsid:52237}">
              <img src="{{$row->cover}}" alt="">
            </a>
            <p class="latest-news-title">
              <a href="/wenzhang/{{$row->id}}" class="two-line" title="{{$row->title}}" target="_blank" data-act="news-click" data-val="{newsid:52237}">
                {{$row->title}}
              </a>
            </p>
            <div class="info-container">
              <span>猫眼娱乐</span>
              <span class="images-view-count view-count">{{$row->browse}}</span>
            </div>
          </div>
        @endforeach
    </div>
  </div>

    </div>
    <div class="index-videos-container clearfix">
        <div class="popular-container">
    <h4 class="blue">热门预告片</h4>
      <ul>
      @foreach($yg1 as $y)
          <li class="top-list">
            <div>
              <div class="top-info-thumb">
                <a href="/yugao/{{$y->id}}" target="_blank" data-act="video-click" data-val="{videoId:95985}">
                  <img src="{{$y->notice_cover}}" alt="">
                  <i class="ranking top-info-icon orange-bg">1</i>
                  <i class="play-icon"></i>
                </a>
              </div>
              <div class="top5-video-info">
                <p class="one-line">
                  <a href="/yugao/{{$y->id}}" target="_blank" data-act="video-click" data-val="{videoId:95985}">
                    《{{$y->title}}》
                  </a>
                </p>
                <div class="video-view">
                  <span class="video-play-count">{{$y->browse}}万</span>
                </div>
              </div>
            </div>
          </li>
        @endforeach
        @foreach($yg2 as $y)
          <li class="top-list">
            <div>
              <div class="top-info-thumb">
                <a href="/yugao?id={{$y->id}}" target="_blank" data-act="video-click" data-val="{videoId:95985}">
                  <img src="{{$y->notice_cover}}" alt="">
                  <i class="ranking top-info-icon orange-bg">2</i>
                  <i class="play-icon"></i>
                </a>
              </div>
              <div class="top5-video-info">
                <p class="one-line">
                  <a href="/yugao?id={{$y->id}}" target="_blank" data-act="video-click" data-val="{videoId:95985}">
                    《{{$y->title}}》
                  </a>
                </p>
                <div class="video-view">
                  <span class="video-play-count">{{$y->browse}}万</span>
                </div>
              </div>
            </div>
          </li>
        @endforeach
        @foreach($yg3 as $y)
          <li class="top-list">
            <div>
              <div class="top-info-thumb">
                <a href="/yugao?id={{$y->id}}" target="_blank" data-act="video-click" data-val="{videoId:95985}">
                  <img src="{{$y->notice_cover}}" alt="">
                  <i class="ranking top-info-icon orange-bg">3</i>
                  <i class="play-icon"></i>
                </a>
              </div>
              <div class="top5-video-info">
                <p class="one-line">
                  <a href="/yugao?id={{$y->id}}" target="_blank" data-act="video-click" data-val="{videoId:95985}">
                    《{{$y->title}}》
                  </a>
                </p>
                <div class="video-view">
                  <span class="video-play-count">{{$y->browse}}万</span>
                </div>
              </div>
            </div>
          </li>
        @endforeach
          @foreach($yg4 as $y)
          <li class="top-list">
            <div>
              <div class="top-info-thumb">
                <a href="/yugao?id={{$y->id}}" target="_blank" data-act="video-click" data-val="{videoId:96323}">
                  <img src="{{$y->notice_cover}}" alt="">
                  <i class="ranking top-info-icon grey-bg">4</i>
                  <i class="play-icon"></i>
                </a>
              </div>
              <div class="top5-video-info">
                <p class="one-line">
                  <a href="/yugao?id={{$y->id}}" target="_blank" data-act="video-click" data-val="{videoId:96323}">
                    《{{$y->title}}》
                  </a>
                </p>
                <div class="video-view">
                  <span class="video-play-count">{{$y->browse}}万</span>
                </div>
              </div>
            </div>
          </li>
          @endforeach
          @foreach($yg5 as $y)
          <li class="top-list">
            <div>
              <div class="top-info-thumb">
                <a href="/yugao?id={{$y->id}}" target="_blank" data-act="video-click" data-val="{videoId:96323}">
                  <img src="{{$y->notice_cover}}" alt="">
                  <i class="ranking top-info-icon grey-bg">5</i>
                  <i class="play-icon"></i>
                </a>
              </div>
              <div class="top5-video-info">
                <p class="one-line">
                  <a href="/yugao?id={{$y->id}}" target="_blank" data-act="video-click" data-val="{videoId:96323}">
                    《{{$y->title}}》
                  </a>
                </p>
                <div class="video-view">
                  <span class="video-play-count">{{$y->browse}}万</span>
                </div>
              </div>
            </div>
          </li>
          @endforeach
          
      </ul>
  </div>

  <div class="latest-container">
      <h4 class="latest-header blue">
        预告片速递
        <a href="/hot/tab=3" class="all-latest" data-act="all-videos-click">
          全部
          <span class="arrow blue-arrow"></span>
        </a>
      </h4>


    <div class="latest-content clearfix">
          @foreach($yg1 as $y)
            <div class="latest-video-box latest-video-big">
              <a href="/yugao/{{$y->id}}" target="_blank"  data-act="video-click" data-val="{videoId:96375}">
                <img data-src="{{$y->notice_cover}}" alt="">

                <div class="latest-video-info">
                  <p class="one-line">
                    <span class="latest-video-title">《{{$y->title}}》</span>
                  </p>
                  <p>
                    <span class="video-play-count">{{$y->browse}}</span>
                  </p>
                </div>
                <i class="play-icon"></i>
              </a>
            </div>
            @endforeach
            @foreach($yg as $y)
            <div class="latest-video-box ">
              <a href="/yugao?id={{$y->id}}" target="_blank"  data-act="video-click" data-val="{videoId:96372}">
                <img data-src="{{$y->notice_cover}}" alt="">

                <div class="latest-video-info">
                  <p class="one-line">
                    <span class="latest-video-title">《{{$y->title}}》</span>
                  </p>
                  <p>
                    <span class="video-play-count">{{$y->browse}}</span>
                  </p>
                </div>
                <i class="play-icon"></i>
              </a>
            </div>
            @endforeach
            
    </div>
  </div>

    </div>
    <div class="index-images-container">
        <div class="latest-container">
      <h4 class="latest-header yellow">
    最新图集
    <a href="/hot/tab=4/edit" class="all-latest" data-act="all-images-click">
      全部
      <span class="arrow yellow-arrow"></span>
    </a>
  </h4>


    <div class="latest-content clearfix">

          @foreach($tj as $t)
          <?php 
          $value=explode(',',$t->img);
          $c=count($value); 

          ?>
          <div class="latest-images-box">
            <div class="clearfix">
                  <a class="latest-images-thumb" href="/tuji?id={{$t->id}}" target="_blank" data-act="images-click" data-val="{imagesid:51298}">
                    <img class="latest-images-big" data-src="{{$value[0]}}" alt="">
                  </a>
                  <a class="latest-images-thumb" href="/tuji?id={{$t->id}}" target="_blank" data-act="images-click" data-val="{imagesid:51298}">
                    <img data-src="{{$value[1]}}" alt="">
                  </a>
                  <a class="latest-images-thumb" href="/tuji?id={{$t->id}}" target="_blank" data-act="images-click" data-val="{imagesid:51298}">
                    <img data-src="{{$value[2]}}" alt="">
                  </a>
            </div>

              <a class="latest-images-more" href="/tuji?id={{$t->id}}" target="_blank" data-act="images-click" data-val="{imagesid:51298}">
                {{$c}}张图片
              </a>

            <div class="latest-images-info">
              <p class="latest-images-title one-line">
                <a href="/tuji?id={{$t->id}}" target="_blank" data-act="images-click" data-val="{imagesid:51298}">
                  {{$t->title}}
                </a>
              </p>
              <span class="latest-images-view view-count">{{$t->nice}}</span>
            </div>
          </div>
          @endforeach

          
    </div>
  </div>

    </div>
  </div>

    </div>

@endsection
@section('title','热点首页 - 猫眼电影')