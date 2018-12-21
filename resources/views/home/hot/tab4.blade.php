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
          href="/hot/tab=3">预告片</a>
    </li>
    <li>
      <a data-act="subnav-click" data-val="{subnavClick:4}"
          data-state-val="{subnavId:4}"
          class="active" href="javascript:void(0);">精彩图集</a>
    </li>
  </ul>
</div>


    <div class="container" id="app" class="page-news/hotNews" >
      <div class="detail-container">



      <div class="images-container">


    @foreach($tj as $value)
        <?php 
          $val=explode(',',$value->img);
          $c=count($value); 

        ?>
     <div class="images-box">
      <h4 class="images-header one-line">
        <a href="/tuji/id={{$value->id}}" target="_blank" data-act="images-click" data-val="{ imagesid:51298 }">{{$value->title}}</a>
      </h4>
      <div class="images-thumbnails clearfix">
            <a href="/tuji/id={{$value->id}}" target="_blank" data-act="images-click" data-val="{ imagesid:51298 }">
              <img src="{{$val['0']}}" alt>
            </a>
            <a href="/tuji/id={{$value->id}}" target="_blank" data-act="images-click" data-val="{ imagesid:51298 }">
              <img src="{{$val['1']}}" alt>
            </a>
            <a href="/tuji/id={{$value->id}}" target="_blank" data-act="images-click" data-val="{ imagesid:51298 }">
              <img src="{{$val['2']}}" alt>
            </a>

        <a class="more-images" href="/tuji/id={{$value->id}}" target="_blank" data-act="images-click" data-val="{ imagesid:51298 }">
          <span>{{$c}}张图片</span>
        </a>
      </div>
      <div class="info-container">
        <span class="images-view-count view-count">{{$value->nice}}</span>
      </div>
    </div>
    @endforeach

    

      </div>

    <div class="hot-pager">
      
  
  {{$tj->render()}}


    </div>
  </div>

    </div>

@endsection
@section('title','热点首页 - 猫眼电影')