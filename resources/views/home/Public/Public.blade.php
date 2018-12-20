<!DOCTYPE html><!--[if IE 8]>
<html class="ie8">
<![endif]--><!--[if IE 9]>
<html class="ie9">
<![endif]--><!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->
<head>
<title>@yield('title')</title>
<script src="/static/jquery-1.8.3.min.js"></script>
<meta charset="utf-8">
<meta name="keywords" content="电影,电视剧,票房,美剧,猫眼电影,电影排行榜,电影票,经典电影,在线观看">
<meta name="description" content="国内观众优选的在线购票平台，用户流行的观影决策平台。">
<meta http-equiv="cleartype" content="yes"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="renderer" content="webkit"/>
<meta name="HandheldFriendly" content="true"/>
<meta name="format-detection" content="email=no"/>
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>"use strict";!function(){var i=0<arguments.length&&void 0!==arguments[0]?arguments[0]:"_Owl_",n=window;n[i]||(n[i]={isRunning:!1,isReady:!1,preTasks:[],dataSet:[],use:function(i,t){this.isReady&&n.Owl&&n.Owl[i](t),this.preTasks.push({api:i,data:[t]})},add:function(i){this.dataSet.push(i)},run:function(){var t=this;if(!this.isRunning){this.isRunning=!0;var i=n.onerror;n.onerror=function(){this.isReady||this.add({type:"jsError",data:arguments}),i&&i.apply(n,arguments)}.bind(this),(n.addEventListener||n.attachEvent)("error",function(i){t.isReady||t.add({type:"resError",data:[i]})},!0)}}},n[i].run())}();</script>
<script>
  cid = "c_6jadt9m";
  ci = 20;
    window.system = {};
  window.openPlatform = '';
  window.openPlatformSub = '';
  </script>
<link rel="stylesheet" href="/static/home/css/common.4b838ec3.css"/>
<link rel="stylesheet" href="/static/home/css/home-index.10e05d67.css"/>
<script crossorigin="anonymous" src="/static/home/js/stat.74891044.js"></script>
<script>if(window.devicePixelRatio >= 2) { document.write('<link rel="stylesheet" href="/static/home/css/image-2x.8ba7074d.css"/>') }</script>
<meta name="msvalidate.01" content="F338006073F396CBBDA443AAB6A8BA47"/>
<meta name="360-site-verification" content="6f1d12912a62a74ce2f1b3c2e75f6c23"/>
<meta name="sogou_site_verification" content="uh9MkgvBm3"/>
<style>
    @font-face {
      font-family: stonefont;
      src: url('//vfile.meituan.net/colorstone/5b4ae256ef3871a33d12e2dc132c2af53168.eot');
      src: url('//vfile.meituan.net/colorstone/5b4ae256ef3871a33d12e2dc132c2af53168.eot?#iefix') format('embedded-opentype'),
           url('//vfile.meituan.net/colorstone/eae98fb36f5c9cfb996474a75b8a32c22084.woff') format('woff');
    }
    .stonefont {
      font-family: stonefont;
    }
</style>
</head>
<body>
<div class="header">
  <div class="header-inner">
    <a href="/" class="logo" data-act="icon-click"></a>
    <div class="city-container" data-val="{currentcityid:20 }">
      <div class="city-selected">
        <div class="city-name">
                  {{session("citys")['name']}}
          <span class="caret"></span>
        </div>
      </div>


      <div style="display:none;" class="city-list" data-val="{ localcityid: 20 }">
      <div class="city-list-header">定位城市：<a class="js-geo-city">{{session("citys")['name']}}</a></div>
        <ul>
          <li>
            <span>已有</span>
            <div>
              @foreach(session("city") as $v)
              <a href="/show/{{$v['id']}}" class="js-city-name" style="color:black;">{{$v['name']}}</a>
              @endforeach
            </div>
          </li>
        </ul>
      </div>
<script>
  $(".city-selected").mouseover(function(){
    $(".city-list").css("display","block");
  });
  $(".city-selected").mouseout(function(){
    $(".city-list").css("display","none");
  });
  $(".city-list").mouseover(function(){
    $(this).css("display","block");
  });
  $(".city-list").mouseout(function(){
    $(this).css("display","none");
  });
</script>


    </div>
    <div class="nav">
      <ul class="navbar">
        <li><a href="/" data-act="home-click" class="active">首页</a></li>
        <li><a href="/films" data-act="movies-click">电影</a></li>
        <li><a href="/cinemas" data-act="cinemas-click">影院</a></li>
        <li><a href="/board" data-act="board-click">榜单</a></li>
        <li><a href="/news" data-act="hotNews-click">热点</a></li>
      </ul>
    </div>
    <div class="user-info">
      <div class="user-avatar J-login">
        <img src="/static/home/image/movie/7dd82a16316ab32c8359debdb04396ef2897.png">
        <span class="caret"></span>
        <ul class="user-menu">
          <li><a href="/homelogin">登录</a></li>
        </ul>
      </div>
    </div>
    <form action="/query" target="_blank" class="search-form" data-actform="search-click">
      <input name="kw" class="search" type="search" maxlength="32" placeholder="找影视剧、影人、影院" autocomplete="off">
      <input class="submit" type="submit" value="">
    </form>
    <div class="app-download">
      <a href="/app" target="_blank">
      <span class="iphone-icon"></span>
      <span class="apptext">APP下载</span>
      <span class="caret"></span>
      <div class="download-icon">
        <p class="down-title">
          扫码下载APP
        </p>
        <p class='down-content'>
          选座更优惠
        </p>
      </div>
      </a>
    </div>
  </div>
</div>
@section('home')

@show
<div class="footer">
  <p class="friendly-links">
      商务合作邮箱：v@maoyan.com
      客服电话：10105335
      违法和不良信息举报电话：4006018900
    <br/>
      投诉举报邮箱：tousujubao@meituan.com
      舞弊线索举报邮箱：wubijubao@maoyan.com
  </p>
  <p class="friendly-links">
        友情链接 :
    <a href="http://www.meituan.com" data-query="utm_source=wwwmaoyan" target="_blank">美团网</a>
    <span></span>
    <a href="http://i.meituan.com/client" data-query="utm_source=wwwmaoyan" target="_blank">美团下载</a>
    <span></span>
    <a href="https://www.huanxi.com" data-query="utm_source=maoyan_pc" target="_blank">欢喜首映</a>
  </p>
  <p>
        &copy;2016
        猫眼电影 maoyan.com
    <a href="https://tsm.miit.gov.cn/pages/EnterpriseSearchList_Portal.aspx?type=0&keyword=京ICP证160733号&pageNo=1" target="_blank">京ICP证160733号</a>
    <a href="http://www.miibeian.gov.cn" target="_blank">京ICP备16022489号-1</a>
    <a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010102003232" target="_blank">京公网安备 11010102003232号</a>
    <a href="/about/licence" target="_blank">网络文化经营许可证</a>
    <a href="http://www.meituan.com/about/rules" target="_blank">电子公告服务规则</a>
  </p>
  <p>
    北京猫眼文化传媒有限公司
  </p>
</div>
<script crossorigin="anonymous" src="/static/home/js/owl_1.7.11.js"></script>
<script>
      Owl.start({
        project: 'com.sankuai.movie.fe.mywww', 
        pageUrl: location.href.split('?')[0].replace(/\/\d+/g, '/:id'),
        devMode: false
      })
      // 单独自定义上报下img加载错误
      window.addEventListener('error', function(e) {
        var node = e.target || e.srcElement
        try {
          var msg = node.src || node.href
          var nodeName = node.nodeName
          if (nodeName && nodeName.toLowerCase() === 'img') {
            Owl.addError(msg, {level: 'warn', category: 'resourceError'})
          }
        } catch(err) {
          console.error(err)
        }
      }, true)
</script>
<!--[if IE 8]>
<script crossorigin="anonymous" src="/static/home/js/es5-shim.bbad933f.js"></script>
<![endif]--><!--[if IE 8]>
<script crossorigin="anonymous" src="/static/home/js/es5-sham.d6ea26f4.js"></script>
<![endif]-->
<script crossorigin="anonymous" src="/static/home/js/common.1a4cea09.js"></script>
<script crossorigin="anonymous" src="/static/home/js/home-index.dba25347.js"></script>
</body>
</html>