<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8" />
	    <title>CC聊天室用户注册</title>
	    <link type="text/css" rel="stylesheet" href="/thinkphpCC/Public/css/register.css"/>	
	    <script src="/thinkphpCC/Public/js/jquery.min.js"></script>	<!--jQuery框架-->
	    <!--jQuery Validate 插件为表单提供强大的验证功能-->
	    <script src="/thinkphpCC/Public/js/jquery.validate.js"></script>
	    <!--为jQuery Validate提供中文信息提示包-->
	    <script src="/thinkphpCC/Public/js/messages_zh.js"></script>
	
	 	<script src="/thinkphpCC/Public/js/register.js"></script>
	 	
		<script>

			$("#register").attr("disabled", true); 
		</script>
	</head>
	<body  style=" ">
	<div id="content">
			<form id="register_form" name="register_form" action="/thinkphpCC/index.php/Home/User/do_register" method="post">
			<h1>会员注册</h1>
			<div class="form-group">
				<input type="text" name="userAccount" id="userAccount" required placeholder="用于登陆的账号" /><br>
				<input type="text" name="userNickname" id="userNickname" required placeholder="用于显示的用户昵称"/><br>
				<input type="password" name="pwd" id="pwd" required placeholder="填写密码"/><br>
				<input type="password" name="pwd_Check" id="pwd_Check" required placeholder="再次填写密码"/><br>
				<input type="email" name="email" id="email" required placeholder="填写邮箱"/>	<br>		
				<input type="tel" id="phone" name="phone" required placeholder="填写手机号"/> <br>
				<button type="submit"  id="register" class="button"/>注册</button> <br>
				<div style="text-align: center;">
					<a href="/thinkphpCC/index.php/Home/User/login">已经注册了？快去登录吧</a>
				</div>
			</form>
		</form>

	</div>
	</body>
</html>