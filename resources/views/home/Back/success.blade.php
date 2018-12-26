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
<link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css">
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
      <li class="step-item"><span class="step-content">1.确认账号</span></li>
      <li class="step-item"><span class="step-content">2.安全校验</span></li>
      <li class="step-item"><span class="step-content">3.设置密码</span></li>
      <li class="step-item current"><span class="step-content">4.完成</span></li>
    </ul>
      <div class="op-wrapper check">
        <div class="current step-op step-4-op">
          <h3 class="retrieve-tips">恭喜您已成功修改了登录密码</h3>
          <p class="retrieve-tips">您的登录密码已经重新设置，请妥善保管</p>
          <a class="login-btn" href="/hlogin">立即登录</a></div>
      </div>
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
 // alert($);
    $('#send').click(function(){
        //获取手机号
        var p = $('.phone').val();
        //获取本对象
        var btn = $(this);
        //定义一个时间
        i=60;
        $.get('/sendmessage',{'phone':p},function(data){
            var str = JSON.parse(data);
            // console.log(str);
            if(str.code == '000000'){
                var timmer = setInterval(function(){
                    btn.html('重新发送('+i+')');
                    i--;
                    btn.attr('disabled',true);
                    if(i==0){
                        clearInterval(timmer);
                        btn.html('重新发送');
                        btn.attr('disabled',false);
                    }
                },1000);
            }   
        });
    });

    //判断验证码是否正确
    $('#code').blur(function(){
        //获取输入的内容
        var code = $(this).val();
        //获取提示信息的对象
        var div = $('#tip');
        if(code !== ''){
            //判断验证码是否正确
            $.get('/hpcheck',{'code':code},function(data){
                // console.log(data);
                if(data == 1){
                    div.html('验证码过期请重新获取');
                    div.css('color','red');
                    $('#next').attr('disabled',true);
                }else if(data == 2){
                    div.html('验证码不正确');
                    div.css('color','red');
                    $('#next').attr('disabled',true);
                }else if(data == 3){
                    div.html('Ok!');
                    div.css('color','green');
                    $('#next').attr('disabled',false);
                }
            });
        }else{
            div.html('请输入正确的验证码');
            div.css('color','red');
            $('#next').attr('disabled',true);
        }
    });

   

    //判断手机号码是否正确
     $('#phone').blur(function(){
        //获取填入的数据
        var p = $(this).val();
        //获取提示信息的对象
        var div = $('#tip');
        // 判断输入的内容
        // 手机规则
        //判断手机号码是否有效
        if(p.match(/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/) == null){
            div.html('手机号码无效');
            div.css('color','red');
            $('#send').attr('disabled',true);      
        }else{
            $.get('/checkphone',{'phone':p},function(data){
                // console.log(data);
                if(data == 1){
                    div.html('Ok');
                    $('#send').attr('disabled',false);
                }else{
                    div.html('手机号码已注册');
                    div.css('color','red');
                    $('#send').attr('disabled',true);             
                }
            });
        }
     });

     //如果成功可以重置密码
    $('#next').click(function(){
      $('.check').css('display','none');
      $('#change').css('display','block');
    });

    //判断密码
    $('.password').blur(function(){
        //获取填入的数据
        var p = $(this).val();
        //获取提示信息的对象
        var div = $('#tip');
        //获取密码长度
        var plength = $(this).val().length;
        if(p.match(/^.{6,20}$/) == null){
            div.html('请正确填写密码格式');
            div.css('color','red');
            return false;
        }else{
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
        var div = $('#repasstip');

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