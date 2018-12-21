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
          data-state-val="{subnavId:2}"
          class="active" href="javascript:void(0);">新闻资讯</a>
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


    <div class="container" id="app" class="page-news/hotNews" >
      <div class="detail-container">
<!-- hotnews 资讯表名-->
      <div class="news-container">

      @foreach($zx as $value)
        
          <div class="news-box clearfix">
            <a class="news-img" href="/wenzhang?id={{$value->id}}" target="_blank" data-act="news-click" data-val="{ newsid:53309 }">
              <img src="{{$value->cover}}" alt="">
            </a>

            <div class="news-content ">
              <h4 class="news-header one-line">
                <a href="/wenzhang?id={{$value->id}}" target="_blank" data-act="news-click" data-val="{ newsid:53309 }">{{$value->title}}</a>
              </h4>
              <div class="latestNews-text" style="overflow: hidden; max-height: 30px;">​{{$value->content}}...</div>
              <div class="info-container">
                <span class="news-source">猫眼电影</span>
                <span class="news-date">{{$value->created_at}}</span>
                    <span class="tag">
                      <a href="/films/346559" title="黑衣人：全球追缉" target="_blank" data-act="news-click" data-val="{ newsid:53309 }">
                        
                      </a>
                    </span>
                <span class="images-view-count view-count">{{$value->browse}}</span>
              </div>
            </div>
          </div>
        @endforeach
          

  </div>



    <div class="hot-pager">
      
  
{{$zx -> render()}}


    </div>
  </div>

    </div>

@endsection
@section('title','新闻资讯 - 猫眼电影')