<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>CC聊天室登陆</title>
		<link type="text/css" rel="stylesheet" href="/ThinkphpCC/thinkphpCC/Public/css/login.css" />
		<script src="/ThinkphpCC/thinkphpCC/Public/js/jquery.min.js"></script>
		<!--jQuery框架-->
		<!--jQuery Validate 插件为表单提供强大的验证功能-->
		<script src="/ThinkphpCC/thinkphpCC/Public/js/jquery.validate.js"></script>
		<!--为jQuery Validate提供中文信息提示包-->
		<script src="/ThinkphpCC/thinkphpCC/Public/js/messages_zh.js"></script>

	</head>

	<body>
		<div>
			<video class="topVid" autoplay="autoplay" loop="loop" muted="" style="z-index:-1;width: 100vw;position: absolute; top: 0; ">
				<!--<source src="//game.gtimg.cn/images/lol/v3/index/20190424ig/video.webm" type="video/webm">-->
				<source src="/ThinkphpCC/thinkphpCC/Public/video/Part.mp4" type="video/mp4">
			</video>
		</div>
		<div id="container">
			<div id="content " class="col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4 ">

				<form id="login_form" name="login_form" action="/ThinkphpCC/thinkphpCC/index.php/Home/User/do_login" method="post">
					<h1>会员登陆</h1>
					<div class="form-group">
						<input type="text" class="form-control" name="userAccount" id="userAccount" required placeholder="用于登陆的账号" /><br>
					
						<input type="password" class="form-control" name="pwd" id="pwd" required placeholder="填写密码" /><br>
					</div>
					<button type="submit " class="button " class="btn btn-primary " id="login ">登陆</button>
				</form><br />

				<div style="text-align: center;">
					<a href="/ThinkphpCC/thinkphpCC/index.php/Home/User/register ">点击注册</a> |
					<a href="/ThinkphpCC/thinkphpCC/index.php/Home/User/changePwd ">修改密码</a>
				</div>

		</div>
	</body>

</html>