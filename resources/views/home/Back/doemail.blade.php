<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>找回密码</title>
<meta name="keyword" content="">
<meta name="description" content="">
<meta name="for" content="meituan.com">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="address=no">
<script src="/static/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="/static/home/return/css/main_1.css">
<link rel="stylesheet" type="text/css" href="/static/home/return/css/index_1.css">
</head>
<body class="theme--maoyan" id="main">
<div id="app">
  <header class="header--mini">
  <div class="wrapper cf">
    <a class="site-logo" href="/" style="background-image:url(/static/home/image/2.jpg);" >美团</a>
    <div class="login-block">
      <span class="tip">已有美团账号？</span><a class="btn btn-small login" href="https://passport.meituan.com/account/unitivelogin?service=www&amp;continue=https%3A%2F%2Fwww.meituan.com%2Faccount%2Fsettoken%3Fcontinue%3Dhttp%253A%252F%252Fbj.meituan.com%252F">登录</a>
    </div>
  </div>
  </header>
  <div class="content">
    <div class="headline">
      <span class="headline-content">找回登录密码</span>
    </div>
    <ul class="steps-bar steps-bar--dark cf">
      <li class="step-item "><span class="step-content">1.确认账号</span></li>
      <li class="step-item"><span class="step-content">2.安全校验</span></li>
      <li class="step-item current"><span class="step-content">3.设置密码</span></li>
      <li class="step-item"><span class="step-content">4.完成</span></li>
    </ul>
    <form action="/dochange" method="post" id="change">
        {{csrf_field()}}
        <div class="op-wrapper">
          <div class="current step-op step-1-op">
            <div class="step-1-title">
              重置密码
            </div>
            <input type="password" class="user-input" id="pass" name="password" placeholder="密码" maxlength="32"/>
            <br />
            <input type="password" class="user-input" value="" id="repass" placeholder="重复密码" maxlength="32"/><i style="color:red;" id="ptip"></i>
            <button class="next-step-btn" id="next">重置</button>
          </div>
        </div>
    </form>
  </div>
  <div class="passport-mask" style="display:none">
  </div>
  <div id="yodaSliderRoot" style="display:none">
  </div>
</div>

<footer class="footer">
<div class="footer-content">
  <p>
    <a class="link" rel="nofollow" href="https://about.meituan.com/about.html">关于美团</a><span>|</span><a class="link" rel="nofollow" href="https://zhaopin.meituan.com/">加入我们</a><span>|</span><a class="link" rel="nofollow" href="https://ecom.meituan.com/bizsettle/settle/merchantsSettle">商家入驻</a><span>|</span><a class="link" rel="nofollow" href="https://www.meituan.com/help/faq">帮助中心</a><span>|</span><a class="link" rel="nofollow" href="http://i.meituan.com/mobile/down/meituan">美团手机版</a>
  </p>
</div>
<div class="copyright">
  <p>
    <span>&copy;</span><span>copyright</span><a class="link" href="https://www.meituan.com">美团网meituan.com</a><a class="link" href="http://www.miibeian.gov.cn/">京ICP证070791号</a>京公网安备11010502025545号
  </p>
</div>
</footer>
</body>
<script>
//判断密码
    $('#pass').blur(function(){
      // alert(1);
        //获取填入的数据
        var p = $(this).val();
        //获取提示信息的对象
        var div = $('#ptip');
        if(p.match(/^.{6,20}$/) == null){
            div.html('请正确填写密码格式');
            div.css('color','red');
            return false;
        }else{
            div.empty()
            return true;
        }
    });

    //确认密码判断
    $('#repass').blur(function(){
        //获取密码填入的数据
        var p = $('#pass').val();
        //获取输入框
        var rep = $(this).val();
        //获取提示信息的对象
        var div = $('#ptip');

        if(rep == p){
            div.empty();
            return true;
        }else{
            div.html('与密码不一致');
            div.css('color','red');
            return false;
        }
    });

</script>
</html>