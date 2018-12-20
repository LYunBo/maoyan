<!DOCTYPE html>
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
<script>
        !function(e,t,n){function s(){var e=t.createElement("script");e.async=!0,e.src="//s0.meituan."+(-1===t.location.protocol.indexOf("https")?"net":"com")+"/bs/js/?f=mta-js:mta.min.js";var n=t.getElementsByTagName("script")[0];n.parentNode.insertBefore(e,n)}if(e.MeituanAnalyticsObject=n,e[n]=e[n]||function(){(e[n].q=e[n].q||[]).push(arguments)},"complete"===t.readyState)s();else{var i="addEventListener",r="attachEvent";if(e[i])e[i]("load",s,!1);else if(e[r])e[r]("onload",s);else{var a=e.onload;e.onload=function(){s(),a&&a()}}}}(window,document,"mta"),function(e,t,n){if(t&&!("_mta"in t)){t._mta=!0;var s=e.location.protocol;if("file:"!==s){var i=e.location.host,r=t.prototype.open;t.prototype.open=function(t,n,a,o,l){if(this._method="string"==typeof t?t.toUpperCase():null,n){if(0===n.indexOf("http://")||0===n.indexOf("https://")||0===n.indexOf("//"))this._url=n;else if(0===n.indexOf("/"))this._url=s+"//"+i+n;else{var h=s+"//"+i+e.location.pathname;h=h.substring(0,h.lastIndexOf("/")+1),this._url=h+n}var u=this._url.indexOf("?");-1!==u?(this._searchLength=this._url.length-1-u,this._url=this._url.substring(0,u)):this._searchLength=0}else this._url=null,this._searchLength=0;return this._startTime=(new Date).getTime(),r.apply(this,arguments)};var a="onreadystatechange",o="addEventListener",l=t.prototype.send;t.prototype.send=function(t){function n(n,i){if(0!==n._url.indexOf(s+"//frep.meituan.net/_.gif")){var r;if(n.response)switch(n.responseType){case"json":r=JSON&&JSON.stringify(n.response).length;break;case"blob":case"moz-blob":r=n.response.size;break;case"arraybuffer":r=n.response.byteLength;case"document":r=n.response.documentElement&&n.response.documentElement.innerHTML&&n.response.documentElement.innerHTML.length+28;break;default:r=n.response.length}e.mta("send","browser.ajax",{url:n._url,method:n._method,error:!(0===n.status.toString().indexOf("2")||304===n.status),responseTime:(new Date).getTime()-n._startTime,requestSize:n._searchLength+(t?t.length:0),responseSize:r||0})}}if(o in this){var i=function(e){n(this,e)};this[o]("load",i),this[o]("error",i),this[o]("abort",i)}else{var r=this[a];this[a]=function(t){r&&r.apply(this,arguments),4===this.readyState&&e.mta&&n(this,t)}}return l.apply(this,arguments)}}}}(window,window.XMLHttpRequest,"mta");
        mta("create","56b169118135d3e3104fdd0f");
        mta("send","page");
    </script>
</head>
<body class="pg-unitive-login theme--maoyan">
<header class="header cf"><a class="site-logo" href="">猫眼电影</a></header>
<div class="site-body-wrapper">
	<div class="site-body cf">
		<div class="promotion-banner">
			<img src="./static/home/image/login/s0.meituan.net.png" width="480" height="370" alt="猫眼电影"/>
		</div>
		<div class="login-section" data-params="{&quot;service&quot;:&quot;www&quot;,&quot;isDialog&quot;:false }">
			<form id="J-normal-form" action="/login/" method="POST" class="form form--stack">
				<div class="validate-info" style="visibility:hidden">
				</div>
				<span class="login-type" data-mtevent="login.mobile.switch">
				<a id="J-mobile-link" href="">
                手机动态码登录
				<i></i>
				</a>
            账号登录
				</span>
				<div class="form-field form-field--icon">
					<i class="icon icon-user"></i>
					<input type="text" id="login-email" class="f-text" name="email" placeholder="手机号/用户名/邮箱" value=""/>
				</div>
				<div class="form-field form-field--icon">
					<i class="icon icon-password"></i>
					<input type="password" id="login-password" class="f-text" name="password" placeholder="密码"/>
				</div>
				<div class="form-field J-form-field-captcha form-field--captcha" style="display:none">
					<input type="text" id="captcha" class="f-text J-captcha-input" name="captcha" placeholder="验证码" autocomplete="off"/>
					<img height="36" width="72" class="signup-captcha-img" id="signup-captcha-img" src="./static/home/image/login/fe6af1e8dc3949cea6409abc9c3a128d.gif"/>
					<a tabindex="-1" class="captcha-refresh inline-link" href="javascript:void(0)">看不清楚？换一张</a>
				</div>
				<div class="form-field form-field--auto-login cf">
					<a tabindex="-1" href="https://passport.meituan.com/useraccount/retrievepassword?service&#x3D;maoyan&amp;continue&#x3D;http%3A%2F%2Fmaoyan.com%2Fpassport%2Flogin%3Fredirect%3D%252F" target="_top" class="forget-password">忘记密码？</a>
				</div>
				<div class="form-field form-field--ops">
					<input type="hidden" name="origin" value="account-login"/>
					<input type="hidden" name="fingerprint" class="J-fingerprint" value=""/>
					<input type="hidden" name="csrf" value="ttfI4Cws-TgzQJpOhFZLLY-Hi6xHD26LAEuY"/>
					<input data-mtevent="login.normal.submit" type="submit" class="btn" name="commit" value="登录"/>
				</div>
				<p class="signup-guide">
					还没有账号？
					<a href="" target="_top">免费注册</a>
				</p>
			</form>
			<form id="J-mobile-form" action="" method="POST" class="form form--stack J-wwwtracker-form" style="display:none">
				<div class="validate-info" style="visibility:hidden">
				</div>
				<span class="login-type login-type--normal" data-mtevent="login.normal.switch">
				<a id="J-normal-link" href="/homelogin">
                普通方式登录
				<i></i>
				</a>
            账号登录
				</span>
				<div class="J-info form-field form-field--icon">
					<i class="icon icon-phone"></i>
					<input type="text" id="login-mobile" class="f-text" name="mobile" value="" placeholder="手机号"/>
				</div>
				<div class="form-field J-form-field-captcha-mobile form-field--captcha-mobile" style="display:none;">
					<i class="icon icon-captcha"></i>
					<input type="text" id="login-captcha" class="f-text" name="login-captcha" placeholder="验证码" autocomplete="off"/>
					<img height="34" width="61" class="login-captcha-img" id="login-captcha-img" src="./static/home/image/login/fe6af1e8dc3949cea6409abc9c3a128d.gif"/>
					<a tabindex="-1" class="captcha-refresh inline-link" href="javascript:void(0)">看不清楚？换一张</a>
				</div>
				<div class="form-field form-field--icon">
					<i class="icon icon-password"></i>
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
					<a tabindex="-1" href="https://passport.meituan.com/useraccount/retrievepassword?service&#x3D;maoyan&amp;continue&#x3D;http%3A%2F%2Fmaoyan.com%2Fpassport%2Flogin%3Fredirect%3D%252F" target="_top" class="forget-password">忘记密码？</a>
				</div>
				<div class="form-field form-field--ops">
					<input type="hidden" name="origin" value="account-login"/>
					<input type="hidden" name="fingerprint" class="J-fingerprint" value=""/>
					<input type="hidden" name="csrf" value="ttfI4Cws-TgzQJpOhFZLLY-Hi6xHD26LAEuY"/>
					<input data-mtevent="login.mobile.submit" type="submit" class="btn" name="commit" value="登录"/>
				</div>
			</form>
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
<script>window.onunload = function(){};</script>
<span id="csrf" style="display:none">ttfI4Cws-TgzQJpOhFZLLY-Hi6xHD26LAEuY</span>
<script src="./static/home/js/6116979ce0684d11874caa2635e2a843.js"></script>
<script src="./static/home/js/2edbcbe372bc49f982309225d5da6acc.js"></script>
</body>
</html>