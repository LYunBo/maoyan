@extends('home.Public.Public')
@section('home')
<div class="header-placeholder"></div>

  <div class="subnav">
  <ul class="navbar">
    <li>
      <a data-act="subnav-click" data-val="{subnavClick:1}"
          href="/hot">热点首页</a>
    </li>
    <li>
      <a data-act="subnav-click" data-val="{subnavClick:2}"
          href="/hot/create">新闻资讯</a>
    </li>
    <li>
      <a data-act="subnav-click" data-val="{subnavClick:3}"
          data-state-val="{subnavId:3}"
          class="active" href="javascript:void(0);">预告片</a>
    </li>
    <li>
      <a data-act="subnav-click" data-val="{subnavClick:4}"
          href="/hot/Tab=4/edit">精彩图集</a>
    </li>
  </ul>
</div>


    <div class="container" id="app" class="page-news/hotNews" >
      <div class="detail-container">


      <div class="video-container clearfix">

      @foreach($yg as $row)
        <div class="video-box">
          <a href="/yugao/id={{$row->id}}" data-act="video-click" data-val="{videoId:96734}" target="_blank">
            <img class="video-screenshot" src="{{$row->notice_cover}}" alt="">
            <div class="play-icon"></div>
          </a>
          <h4 class="video-name one-line">
            <a href="/yugao/id={{$row->id}}" data-act="video-click" data-val="{videoId:96734}" target="_blank">{{$row->title}}</a>
          </h4>
          <div>
            <span class="video-play-count">{{$row->browse}}</span>
          </div>
        </div>
      @endforeach
             
      </div>


    <div class="hot-pager">
      
  
      {{$yg->render()}}


    </div>
  </div>

    </div>

@endsection
@section('title','预告片 - 猫眼电影')