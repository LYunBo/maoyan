@extends('home.Public.Public')
@section('home')
<link rel="stylesheet" href="/static/home/information/css/common.4b838ec3.css"/>
<link rel="stylesheet" href="/static/home/information/css/profile-profile.13d06bf4.css"/>
<script crossorigin="anonymous" src="/static/home/information/js/stat.74891044.js"></script>
<script>if(window.devicePixelRatio >= 2) { document.write('<link rel="stylesheet" href="/static/home/information/css/image-2x.8ba7074d.css"/>') }</script>
<div class="header-placeholder">
</div>
<div class="container" id="app" class="page-profile/profile">
  <div class="content">
    <div class="main" style="width:1170px">
      <div class="info-content clearfix">
        <div class="user-profile-nav">
          <h1>个人中心</h1>
          <a href="/myorders" class="orders active">我的订单</a>
          <a href="/information" class="profile ">基本信息</a>
        </div>
        <div class="orders-container">
          <div class="profile-title">
            我的订单
          </div>
          @if(!empty($data))
            @foreach($data as $row)
            <div class="order-box" data-orderid="20535359849">
              <div class="order-header">
                <span class="order-date">{{$row->created_at}}</span>
                <span class="order-id">猫眼订单号:{{$row->order_number}}</span>
              </div>
              <div class="order-body">
                <div class="poster" style="width:66px;height:91;">
                  <img src="{{$row->film_cover}}">
                </div>
                <div class="order-content">
                  <div class="movie-name">
                    {{$row->brand}}
                  </div>
                  <div class="cinema-name">
                    {{$row->film_name}}
                  </div>
                  <div class="hall-ticket">
                    <span>{{$row->name}}</span>
                    <span>{{$row->seat_num}}</span>
                  </div>
                  <div class="show-time">
                    {{$row->hi}}
                  </div>
                </div>
                <div class="order-price">
                  {{$row->price}}
                </div>
                <div class="order-status">
                已支付
                </div>
              </div>
            </div>
            @endforeach
          @endif
          <div class="orders-pager">
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection 