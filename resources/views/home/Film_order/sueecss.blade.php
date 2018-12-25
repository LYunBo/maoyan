@extends('home.Public.Public')
@section('home')
<link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css">
<script src="/static/bootstrap/js/jquery.min.js"></script>
  <script src="/static/bootstrap/js/bootstrap.min.js"></script>
  <script src="/static/bootstrap/js/holder.min.js"></script>
<script src="/static/jquery-1.8.3.min.js"></script>
  <link rel="stylesheet" href="/static/home/film_order/ms0.meituan.net/mywww/common.4b838ec3.css"/>
<link rel="stylesheet" href="/static/home/film_order/ms0.meituan.net/mywww/cinemas-seat.d66e64ba.css"/>
  <script crossorigin="anonymous" src="/static/home/film_order/ms0.meituan.net/mywww/stat.74891044.js"></script>
  <script>if(window.devicePixelRatio >= 2) { document.write('<link rel="stylesheet" href="/static/home/film_order/ms0.meituan.net/mywww/image-2x.8ba7074d.css"/>') }</script>
  <style>
    @font-face {
      font-family: stonefont;
      src: url('/static/home/film_order/vfile.meituan.net/colorstone/77dd5ad0615d3637876457ffe6c94b1e3168.eot');
      src: url('/static/home/film_order/vfile.meituan.net/colorstone/77dd5ad0615d3637876457ffe6c94b1e3168.eot?#iefix') format('embedded-opentype'),
           url('/static/home/film_order/vfile.meituan.net/colorstone/3d9e4cd488f847e414a0f8e607a889ef2080.woff') format('woff');
    }

    .stonefont {
      font-family: stonefont;
    }
  </style>

<div class="header-placeholder"></div>
    <div class="container" id="app" class="page-cinemas/seat" >
  <div class="order-progress-bar">
  <div class="step first done">
    <span class="step-num">1</span>
    <div class="bar"></div>
    <span class="step-text">选择影片场次</span>
  </div>
  <div class="step done">
    <span class="step-num">2</span>
    <div class="bar"></div>    
    <span class="step-text">选择座位</span>    
  </div>
  <div class="step done">
    <span class="step-num">3</span>
    <div class="bar"></div>    
    <span class="step-text">30分钟内付款</span>    
  </div>
  <div class="step last done">
    <span class="step-num">4</span>
    <div class="bar"></div>    
    <span class="step-text">影院取票观影</span>    
  </div>
</div>
<center><h1>{{session("success") or session("error")}}</h1></center>
  </div>


@section('title','电影订单')