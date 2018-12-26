<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>
<meta name="keywords" content="美团,登录,注册,美团登录,美团注册">
<title>注册</title><!--[if lt IE 9]>
<script src="/static/home//js/cfe22b5c7f5e468db6de83bfd93ea44c.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/home/css/72412bd1ca2143febbc6f2dba11122b6.css">
<link rel="stylesheet" type="text/css" href="/static/home/css/iconfont.css">
<link rel="stylesheet" type="text/css" href="/static/home/css/ifont/iconfont.min.css">
<script src="/static/jquery-1.8.3.min.js"></script>
<style>
    .Huialert{ position:relative;padding:8px 35px 8px 14px;margin-bottom: 20px;text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);background-color: #fcf8e3;border: 1px solid #fbeed5;border-radius: 4px}
    .Huialert, .Huialert h4{color: #c09853}
    .Huialert h4{margin: 0}
    .Huialert .Hui-iconfont{position:absolute;top:9px;right:10px;line-height: 20px;cursor:pointer; color:#000; opacity:0.2;_color:#666}
    .Huialert .Hui-iconfont.hover{ color:#000;opacity:0.8}
    .Huialert-success{color: #468847;background-color: #dff0d8;border-color: #d6e9c6}
    .Huialert-success h4{color: #468847}
    .Huialert-danger, .Huialert-error{color: #b94a48;background-color: #f2dede;border-color: #eed3d7}
    .Huialert-danger h4, .Huialert-error h4{color: #b94a48}
    .Huialert-info{color: #3a87ad;background-color: #d9edf7;border-color: #bce8f1}
    .Huialert-info h4{color: #3a87ad}
    .Huialert-block{padding-top: 14px;padding-bottom: 14px}
    .Huialert-block > p, .Huialert-block > ul{margin-bottom: 0}
    .Huialert-block p + p{margin-top: 5px}
</style>
</head>
<body class="pg-unitive-signup theme--maoyan">
<header class="header--mini">
<div class="wrapper cf">
    <a class="site-logo" href="/" style="background-image:url(/static/home/image/2.jpg);background-size:136px 39px;background-position:-545px -741px;">猫眼电影</a>
</div>
</header>
<div class="content">
    <div class="J-unitive-signup-form">
        <div class="sheet" style="display:block">
            @if(session('error'))
                <div class="Huialert Huialert-error error"><i class="Hui-iconfont" id="cuowu">&#xe6a6;</i>注册失败</div>
            @endif
            <div class="Huialert Huialert-error error" style="display:none"><i class="Hui-iconfont" id="cuowu">&#xe6a6;</i></div>
            <form action="/goregister" method="POST" id="form">
                {{csrf_field()}}
                <div class="form-field form-field--mobile">
                    <label>手机号</label>
                    <input type="text" name="phone" id="phone" class="f-text J-mobile"/>
                    <span class="J-unitive-tip unitive-tip" id="phonetip">请输入有效的手机号</span>
                </div>
                <div class="form-field form-field--vbtn">
                    <div class="verify-wrapper">
                        <input type="button" id="sendphone" class="btn-normal btn-mini verify-btn J-verify-btn" value="免费获取短信动态码" />
                    </div>
                </div>
                <div class="form-field form-field--sms">
                    <label>短信动态码</label>
                    <input type="text" name="code" id="code" class="f-text J-sms"/>
                    <span class="J-unitive-tip unitive-tip" id="codetip"></span>
                </div>
                <div class="form-field form-field--mobile">
                    <label>邮箱</label>
                    <input type="text" name="email" id="email" class="f-text J-mobile"/>
                    <span class="J-unitive-tip unitive-tip" id="emailtip">请输入有效的邮箱</span>
                </div>
                <div class="form-field form-field--pwd">
                    <div class="pw-strength">
                        <div class="pw-strength__bar" id="J-pw-strength__bar">
                        </div>
                        <div class="pw-strength__letter">
                            <span class="pw-strength__label" id="a1">弱</span>
                            <span class="pw-strength__label" id="b2">中</span>
                            <span class="pw-strength__label pw-strength__label--noborder" id="c3">强</span>
                        </div>
                    </div>
                    <label>创建密码</label>
                    <input type="password" name="password" id="pass" class="f-text J-pwd"/>
                    <span class="J-unitive-tip unitive-tip" id="passtip">请输入6位以上的有效密码</span>
                </div>
                <div class="form-field form-field--pwd2">
                    <label>确认密码</label>
                    <input type="password" name="password2" id="repass" class="f-text J-pwd2"/>
                    <span class="J-unitive-tip unitive-tip" id="repasstip"></span>
                </div>
                <div class="form-field">
                    <input data-mtevent="signup.submit" type="submit" class="btn" value="同意以下协议并注册"/>
                    <a href="" target="_blank"></a>
                </div>
            </form>
        </div>
    </div>
    <div class="term">
        <a class="f1" href="http://www.meituan.com/about/terms" target="_blank">《美团网用户协议》</a>
    </div>
</div>
<footer class="footer--mini">
<p class="copyright">
        ©
    <a class="f1" href="https://www.meituan.com">meituan.com</a>&nbsp;
    <a class="f1" target="_blank" href="http://www.miibeian.gov.cn/">京ICP证070791号</a>&nbsp;
    <span class="f1">京公网安备11010502025545号</span>
</p>
</footer>
</body>
<script>
     //检验手机号码框
     $('#phone').blur(function(){
        //获取填入的数据
        var p = $(this).val();
        //获取提示信息的对象
        var div = $('#phonetip');
        // 判断输入的内容
        // 手机规则
        //判断手机号码是否有效
        if(p.match(/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/) == null){
            div.html('手机号码无效');
            div.prepend('<i class ="iconfont icon-cuowu" style="color:red;"></i>');
            div.css('color','red');
            return false;
            $('#sendphone').attr('disabled',true);
        }else{
            $.get('/checkphone',{'phone':p},function(data){
                div.empty();
                div.prepend('<i class ="iconfont icon-zhengque" style="color:green;"></i>');
                $('#form').attr('onsubmit','return true');
                $('#sendphone').attr('disabled',false);
            });
        }
     });

     //发送手机动态验证码
     $('#sendphone').click(function(){
        //获取手机号
        var p = $('#phone').val();
        //获取本对象
        var btn = $(this);
        //定义一个时间
        i=60;
        $.get('/sendmessage',{'phone':p},function(data){
            var str = JSON.parse(data);
            // console.log(str);
            if(str.code == '000000'){
                var timmer = setInterval(function(){
                    btn.val('重新发送('+i+')');
                    i--;
                    btn.attr('disabled',true);
                    if(i==0){
                        clearInterval(timmer);
                        btn.val('重新发送');
                        btn.attr('disabled',false);
                    }
                },1000);
            }   
        });
     });

     //判断短信验证码是否正确
     $('#code').blur(function(){
        //获取输入的内容
        var code = $(this).val();
        //获取提示信息的对象
        var div = $('#codetip');
        if(code !== ''){
            //判断验证码是否正确
            $.get('/hpcheck',{'code':code},function(data){
                // console.log(data);
                if(data == 1){
                    div.html('验证码过期请重新获取');
                    div.prepend('<i class ="iconfont icon-cuowu" style="color:red;"></i>');
                    div.css('color','red');
                    return false;
                }else if(data == 2){
                    div.html('验证码不正确');
                    div.prepend('<i class ="iconfont icon-cuowu" style="color:red;"></i>');
                    div.css('color','red');
                    return false;
                }else if(data == 3){
                    div.empty();
                    div.prepend('<i class ="iconfont icon-zhengque" style="color:green;"></i>');
                    $('#form').attr('onsubmit','return true');
                }
            });
        }else{
            div.html('请输入正确的验证码');
            div.css('color','red');
            return false;
        }
    });

    //判断邮箱
    $('#email').blur(function(){
        //获取填入的数据
        var p = $(this).val();
        //获取提示信息的对象
        var div = $('#emailtip');
        // 判断输入的内容
        // 手机规则
        //判断手机号码是否有效
        if(p.match(/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/) == null){
            div.html('请正确填写邮箱格式');
            div.prepend('<i class ="iconfont icon-cuowu" style="color:red;"></i>');
            div.css('color','red');
            return false;
        }else{
            div.empty();
            div.prepend('<i class ="iconfont icon-zhengque" style="color:green;"></i>');
            $('#form').attr('onsubmit','return true');
        }
     });

    //判断密码
    $('#pass').blur(function(){
        //获取填入的数据
        var p = $(this).val();
        //获取提示信息的对象
        var div = $('#passtip');
        //获取密码长度
        var plength = $(this).val().length;
        if(p.match(/^.{6,20}$/) == null){
            div.html('请正确填写密码格式');
            div.prepend('<i class ="iconfont icon-cuowu" style="color:red;"></i>');
            div.css('color','red');
            return false;
        }else{
            div.empty();
            div.prepend('<i class ="iconfont icon-zhengque" style="color:green;"></i>');
            $('#form').attr('onsubmit','return true');
        }

        if(plength >= 6 && plength<10){
            $('#a1').css('background-color','green');
        }else if(plength >= 10 && plength<15){
            $('#a1').css('background-color','#EEE');
            $('#b2').css('background-color','green');
        }else if(plength >= 15 && plength<=20){
            $('#b2').css('background-color','#EEE');
            $('#c3').css('background-color','green');
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
            div.prepend('<i class ="iconfont icon-zhengque" style="color:green;"></i>');
            $('#form').attr('onsubmit','return true');
        }else{
            div.html('与密码不一致');
            div.prepend('<i class ="iconfont icon-cuowu" style="color:red;"></i>');
            div.css('color','red');
            return false;
        }
    });
    
    //最后的验证阻止表单提交
    $('.btn').click(function(){
        //获取手机号码
        var p = $('#phone').val();
        var ps = $('#phone').val().length;
        //获取邮箱
        var e = $('#email').val();
        var es = $('#email').val().length;
        //获取验证码
        var code = $('#code').val();
        var codes = $('#code').val().length;
        //获取密码
        var pass = $("#pass").val();
        var pass1 = $("#pass").val().length;
        //获取确认密码
        var repass = $("#repass").val();
        var repass1 = $("#repass").val().length;
        // alert(ps+es+codes+pass1+repass1);
        if(ps == 0 && es == 0 && codes == 0 && pass1 == 0 && repass1 == 0){
            alert(1);
            $('.error').css('display','block');
            $('.error').html('不能留空');
            return false;
        }else{
            $('.error').css('display','none');
            $('#form').attr('onsubmit','return true');
        }

        //获取提示信息的对象
        var pdiv = $('#phonetip');
        // 判断输入的内容
        // 手机规则
        //判断手机号码是否有效
        if(p.match(/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/) == null){
            pdiv.html('手机号码无效');
            pdiv.prepend('<i class ="iconfont icon-cuowu" style="color:red;"></i>');
            pdiv.css('color','red');
            return false;
            $('#sendphone').attr('disabled',true);
        }else{
            pdiv.empty();
            pdiv.prepend('<i class ="iconfont icon-zhengque" style="color:green;"></i>');
            $('#form').attr('onsubmit','return true');
            $('#sendphone').attr('disabled',false);
        }

         //获取提示信息的对象
        var cdiv = $('#codetip');
        if(code !== ''){
            //判断验证码是否正确
            $.get('/hpcheck',{'code':code},function(data){
                // console.log(data);
                if(data == 1){
                    cdiv.html('验证码过期请重新获取');
                    cdiv.prepend('<i class ="iconfont icon-cuowu" style="color:red;"></i>');
                    cdiv.css('color','red');
                    return false;
                }else if(data == 2){
                    cdiv.html('验证码不正确');
                    cdiv.prepend('<i class ="iconfont icon-cuowu" style="color:red;"></i>');
                    cdiv.css('color','red');
                    return false;
                }else if(data == 3){
                    cdiv.empty();
                    cdiv.prepend('<i class ="iconfont icon-zhengque" style="color:green;"></i>');
                    $('#form').attr('onsubmit','return true');
                }
            });
        }

        //获取提示信息的对象
        var ediv = $('#emailtip');
        // 判断输入的内容
        // 手机规则
        //判断手机号码是否有效
        if(e.match(/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/) == null){
            ediv.html('请正确填写邮箱格式');
            ediv.prepend('<i class ="iconfont icon-cuowu" style="color:red;"></i>');
            ediv.css('color','red');
            return false;
        }else{
            ediv.empty();
            ediv.prepend('<i class ="iconfont icon-zhengque" style="color:green;"></i>');
            $('#form').attr('onsubmit','return true');
        }

        //获取提示信息的对象
        var pdiv = $('#passtip');
        //获取密码长度
        var plength = $(this).val().length;
        if(pass.match(/^.{6,20}$/) == null){
            pdiv.html('请正确填写密码格式');
            pdiv.prepend('<i class ="iconfont icon-cuowu" style="color:red;"></i>');
            pdiv.css('color','red');
            return false;
        }else{
            pdiv.empty();
            pdiv.prepend('<i class ="iconfont icon-zhengque" style="color:green;"></i>');
            $('#form').attr('onsubmit','return true');
        }

        //获取提示信息的对象
        var repdiv = $('#repasstip');

        if(repass == pass){
            repdiv.empty();
            repdiv.prepend('<i class ="iconfont icon-zhengque" style="color:green;"></i>');
            $('#form').attr('onsubmit','return true');
        }else{
            repdiv.html('与密码不一致');
            repdiv.prepend('<i class ="iconfont icon-cuowu" style="color:red;"></i>');
            repdiv.css('color','red');
            return false;
        }
    });

    //关闭错误信息
    $('#cuowu').click(function(){
        //找到父级
        var div = $(this).parents('div');
        //去除提示信息
        div.remove();
    });
</script>
</html>