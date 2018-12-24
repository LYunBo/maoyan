@extends('home.Public.Public')
@section('home')
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
  <div class="step ">
    <span class="step-num">3</span>
    <div class="bar"></div>    
    <span class="step-text">30分钟内付款</span>    
  </div>
  <div class="step last ">
    <span class="step-num">4</span>
    <div class="bar"></div>    
    <span class="step-text">影院取票观影</span>    
  </div>
</div>


    <div class="main clearfix">
      <div class="hall">
        <div class="seat-example">
          <div class="selectable-example example">
            <span>可选座位</span>
          </div>
          <div class="sold-example example">
            <span>已售座位</span>
          </div>
          <div class="selected-example example">
            <span>已选座位</span>
          </div>
        </div>

        
<div class="seats-block" data-cols="18" data-section-id="0000000000000001" data-section-name="普通区" data-seq-no="201812020399403">
  <div class="row-id-container">
        <span class="row-id">1</span>    
        <span class="row-id">2</span>    
        <span class="row-id">3</span>    
        <span class="row-id">4</span>    
        <span class="row-id">5</span>    
        <span class="row-id">6</span>    
        <span class="row-id">7</span>    
        <span class="row-id">8</span>    
        <span class="row-id">9</span>    
        <span class="row-id">10</span>    
        <span class="row-id">11</span>    
        <span class="row-id">12</span>    
  </div>

  <div class="seats-container">
    <div class="screen-container">
      <div class="screen">银幕中央</div>
      <div class="c-screen-line"></div>
    </div>

    <div class="seats-wrapper">
        

      @foreach($seat as $k => $v)
        <div class="row" style="overflow:hidden;height:30px;">
        @for($i=1,$j=1;$i<=strlen($v);$i++)
          @if($v[$i-1] == "_")
            <span class="seat empty" 
              data-column-id=""
              data-row-id="{{$k+1}}"
              style="float:left;"
            ></span>
          @else if($v[$i-1] == "e")
            <span class="seat selectable" 
              data-column-id="{{$j++}}"
              data-row-id="{{$k+1}}"
              style="float:left;"
              onclick="fun(this)"
            ></span>
          @endif
        @endfor
        </div>
      @endforeach

    </div>
  </div>

</div>

      </div>

      <div class="side">
        <div class="movie-info clearfix">
          <div class="poster">
            <img src="{{$data[0] -> film_relation_cover}}">
          </div>
          <div class="content">
            <p class="name text-ellipsis">{{$data[0] -> film_name}}</p>
            <div class="info-item">
              <span>类型 :</span>
              <span class="value">{{$data[0] -> type_id}}</span>
            </div>
            <div class="info-item">
              <span>时长 :</span>
              <span class="value">{{$data[0] -> times}}分钟</span>
            </div>
          </div>
        </div>

        <div class="show-info">
          <div class="info-item">
            <span>影院 :</span>
            <span class="value text-ellipsis">{{$data[0] -> cinema_name}}</span>
          </div>
          <div class="info-item">
            <span>影厅 :</span>
            <span class="value text-ellipsis">{{$data[0] -> name}} {{$data[0] -> projection_hall_type}}</span>
          </div>
          <div class="info-item">
            <span>版本 :</span>
            <span class="value text-ellipsis">{{$data[0] -> language}}</span>
          </div>
          <div class="info-item">
            <span>场次 :</span>
            <span class="value text-ellipsis screen">{{$data[0] -> ymd}}</span>
          </div>
          <div class="info-item">
            <span>票价 :</span>
            <span class="value text-ellipsis">￥{{$data[0] -> price}}/张</span>
          </div>
        </div>

        <div class="ticket-info">
          <div class="no-ticket" style="display:none;">
            <p class="buy-limit">座位：一次最多选6个座位</p>
            <p class="no-selected">请<span>点击左侧</span>座位图选择座位</p>
          </div>
          <div class="has-ticket" style="display:block">
            <span class="text">座位：</span>
            <div class="ticket-container" data-limit="0">
            </div>
          </div>

          <div class="total-price">
            <span>总价 :</span>
            <span class="price">0</span>
          </div>
        </div>

        <div class="confirm-order">
            <form class="login-form" methon="post" action="">
              <input type="hidden" name="film_scene_id" value="{{$data[0] -> film_scene_id}}">
              <input type="text" class="input-phone" placeholder="输入手机号" style="width:260px">
              <div class="captcha" style="display:none">
                <input type="text" class="input-captcha" placeholder="验证码" name="user_phone">
              </div>
              <div class="code-inputer">
                <input type="text" class="input-code" placeholder="填写验证码" style="width:260px">
                <span class="send-code disable" id="verification_phone">获取验证码</span>
              </div>
         <button class="confirm-btn disable" data-act="confirm-click" data-bid="b_0a0ep6pp" style="margin-right:120px;margin-top:0px;border:0;">确认选座</button>
          </form>
        </div>
      </div>
    </div>
      <div class="modal-container" style="display:none">
    <div class="modal">
      <span class="icon"></span>

      <p class="tip"></p>

        <div class="ok-btn btn">我知道了</div>
    </div>
  </div>


    </div>
<script>
  function fun(thiss){
    var list = $(thiss).attr("data-column-id");
    var link = $(thiss).attr("data-row-id");
    var seat = link+","+list;
    
    if ($(thiss).attr("class") == "seat selectable") {
      num = $(".ticket-container").children().length;
      if (num >=6) {
        alert("一次最多只能买6张，谢谢");
        return false;
      }
      $(thiss).removeClass("selectable");
      $(thiss).addClass("selected");
      $(".ticket-container").attr("data-limit",parseInt($(".ticket-container").attr("data-limit"))+1);
      $(".ticket-container").append('<span class="ticket" data-row-id="'+link+'" data-column-id="'+list+'" data-index="'+seat+'">'+link+'排'+list+'座</span>');
      $(".price").html({{$data[0] -> price}}*(num+1));
    }else if($(thiss).attr("class") == "seat selected"){
      $(thiss).removeClass("selected");
      $(thiss).addClass("selectable");
      $(".ticket-container").attr("data-limit",parseInt($(".ticket-container").attr("data-limit"))-1);
      $(".ticket-container").find("span[data-index='"+seat+"']").remove();
      num = $(".ticket-container").children().length;
      $(".price").html({{$data[0] -> price}}*num);
    } 
  }

  $("#verification_phone").click(function(){
    var str = /^1[34578]\d{9}$/;
    if($(".input-phone").val() == ""){
      alert("手机号码不能为空");
      return false;
    }else if(str.test($(".input-phone").val())){
      // alert($(".input-phone").val());
      $.get("/sendmessage",{"phone":$(".input-phone").val()},function(result){
        var restring = JSON.parse(result);
        if (restring.code == "000000") {
          var i = 60;
          var times = setInterval(function(){
            $("#verification_phone").css("display","none");
            console.log(i);
            i--;
            if (i < 0) {
              clreatInterval(times);
              $("#verification_phone").html("获取验证码");
              $("#verification_phone").css("display","block");
            }
          },1000)
        }else{
          alert("验证码发生了点点小故障喵!");
          return false;
        }
      })
    }else{
      alert("手机号码输入失败");
      return false;
    }
    
  })
</script>
@section('title','电影订单')