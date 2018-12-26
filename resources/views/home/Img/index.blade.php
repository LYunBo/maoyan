@extends('home.Public.Public')
@section('home')

<div class="header-placeholder"></div>


    <div class="container" id="app" class="page-news/photo" >
<div class="gallery-container clearfix" data-val="{ imagesid:51298 }">

<!-- 内容 -->
  <div class="main">
    <div class="gallery-header">
      <span class="gallery-title" title="{{$data->title}}">
       {{$data->title}}
    </span>
      <span class="gallery-counter-container" >(<span class="gallery-counter"></span>)</span>
      <div class="approve " data-id="51298" data-act="images-approve-click">
  <i class="approve-icon"></i><span class="num">{{$data->nice}}</span>
</div>
    
    <center>
    <div style="margin-top: 30px;margin-bottom: 30px;background-color: #e0e0e0">
      <span>{{$data->introduction}}</span>
    </div>
    @for($i=0;$i<$count;$i++)
      <img src="{{$arr[$i]}}" alt="" width="500px" height="600px" style="margin-top: 10px">
    @endfor
    </center>

      
  </div>


  
</div>
    </div>

@endsection
@section('title','图集 - 猫眼电影')
