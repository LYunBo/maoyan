﻿<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>
<meta name="keywords" content="美团,登录,注册,美团登录,美团注册">
<title>登录</title><!--[if lt IE 9]>
<script src="./static/home/js/b1f2cd1391a34cfabd19cf491b994488.js"></script>
<![endif]-->
<link rel="stylesheet" href="/static/home/css/login.css">
<link rel="stylesheet" type="text/css" href="/static/home/css/iconfont.css">
<script src="/static/jquery-1.8.3.min.js"></script>
</head>
<body class="pg-unitive-login theme--maoyan">
<header class="header cf"><a class="site-logo" href="/" style="background-image:url(/static/home/image/2.jpg);">猫眼电影</a></header>
<div class="site-body-wrapper">
	<div class="site-body cf">
		<div class="promotion-banner">
			<img src="/static/home/image/login/s0.meituan.net.png" width="480" height="370" alt="猫眼电影"/>
		</div>
		<div class="login-section" data-params="{&quot;service&quot;:&quot;www&quot;,&quot;isDialog&quot;:false }" >
			<form id="J-normal-form" action="/hdologin" method="POST" class="form form--stack" style="display:block">
				{{csrf_field()}}
				<div class="validate-info" style="visibility:hidden">
				</div>
				<span class="login-type" data-mtevent="login.mobile.switch">
				<a id="J-mobile-link" href="javascript:;" onclick="mobile(this)">
                手机动态码登录
				<i class="theme--maoyan .login-section .login-type i" style="background-image: url(/static/home/image/login/shouji.png); background-size:16px 16px"></i>
				</a>
                账号登录
				</span>
				<div class="form-field form-field--icon">
					<i class="icon icon-user" style="background-image: url(/static/home/image/login/yonghu-.png); background-size:18px 18px"></i>
					<input type="text" id="login-email" class="f-text" name="email" placeholder="手机号/用户名/邮箱" value=""/>
				</div>
				<div class="form-field form-field--icon">
					<i class="icon icon-password" style="background-image: url(/static/home/image/login/mima.png); background-size:18px 18px" ></i>
					<input type="password" id="login-password" class="f-text" name="password" placeholder="密码"/>
				</div>
				<div class="form-field J-form-field-captcha form-field--captcha" style="display:none">
					<input type="text" id="captcha" class="f-text J-captcha-input" name="code" placeholder="验证码" autocomplete="off"/>
					<img src="/cove" height="36" width="101"  onclick="this.src=this.src+'?a=1'"/>
				</div>
				<div class="form-field form-field--auto-login cf">
					<a tabindex="-1" href="/" target="_top" class="forget-password">忘记密码？</a>
				</div>
				<div class="form-field form-field--ops">
					<input data-mtevent="login.normal.submit" type="submit" class="btn" value="登录"/>
				</div>
			</form>
			<form id="J-mobile-form" action="" method="POST" class="form form--stack J-wwwtracker-form" style="display:none">
				<div class="validate-info" style="visibility:hidden">
				</div>
				<span class="login-type login-type--normal" data-mtevent="login.normal.switch">
				<a id="J-normal-link" href="">
                普通方式登录
				<i class="theme--maoyan .login-section .login-type i" style="background-image: url(/static/home/image/login/yonghu.png); background-size:16px 16px"></i>
				</a>
            	账号登录
				</span>
				<div class="J-info form-field form-field--icon">
					<i class="icon icon-user" style="background-image: url(/static/home/image/login/sj.png); background-size:18px 18px"></i>
					<input type="text" id="login-mobile" class="f-text" name="mobile" value="" placeholder="手机号"/>
				</div>
				<div class="form-field J-form-field-captcha form-field--captcha" style="display:none">
					<input type="text" class="f-text J-captcha-input" name="code" placeholder="验证码" autocomplete="off"/>
					<img src="/cove" height="36" width="101"  onclick="this.src=this.src+'?a=1'"/>
				</div>
				<div class="form-field form-field--icon">
					<i class="icon icon-password" style="background-image: url(/static/home/image/login/mima.png); background-size:18px 18px" ></i>
					<input type="text" name="code" id="login-verify-code" class="f-text" autocomplete="off" value="" placeholder="动态码"/>
					<div class="form-field form-field--verify-mobile" style="top:19px;">
						<input type="button" class="btn-normal btn-mini" id="J-verify-btn" value="获取手机动态码"/>
					</div>
					<i class="form-uuid" style="display:none">2f2d9437a679432ca83a.1543745974.1.0.0</i>
				</div>
				<div class="form-field form-field--info">
					<span class="verify-tip" id="J-verify-tip"></span>
				</div>
				<div class="form-field form-field--auto-login cf">
					<a tabindex="-1" href="">忘记密码？</a>
				</div>
				<div class="form-field form-field--ops">
					<input type="hidden" name="origin" value="account-login"/>
					<input type="hidden" name="fingerprint" class="J-fingerprint" value=""/>
					<input type="hidden" name="csrf" value="ttfI4Cws-TgzQJpOhFZLLY-Hi6xHD26LAEuY"/>
					<input data-mtevent="login.mobile.submit" type="submit" class="btn" name="commit" value="登录"/>
				</div>
			</form>
			<p class="signup-guide">
					还没有账号？
					<a href="/homelogin/create" target="_top">免费注册</a>
			</p>
		</div>
	</div>
</div>
<footer class="footer">
<div class="copyright">
	<p>
            &copy;
		<span>2018</span>
		<a href="https://www.meituan.com">美团网团购</a>
            meituan.com
		<a href="http://www.miibeian.gov.cn/" target="_blank">京ICP证070791号</a>
            京公网安备11010502025545号
	</p>
</div>
</footer>
</body>
<script>
 	// 当点击手机登录页面转换表单
 	function mobile(obj){
 		// alert(1);
 		// 找到父级的form表单目的让其隐藏
 		$(obj).parents('form').css('display','none');
 		// 让另外一个form表单显示
 		$('J-mobile-form').css('display','block');
 	}
</script>
</html>