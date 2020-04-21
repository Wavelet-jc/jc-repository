<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>CC聊天室登陆</title>
		<!-- 新 Bootstrap4 核心 CSS 文件 -->
		<link rel="stylesheet" href="/thinkphpCC/Public/css/bootstrap.min.css">
		

		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="/thinkphpCC/Public/js/jquery.min.js"></script>


		<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
		<script src="/thinkphpCC/Public/js/bootstrap.min.js"></script>
	</head>
	<body style=" height:100vh; background:url(/thinkphpCC/Public/picture/backgroundPic4.jpg);background-repeat: no-repeat; background-size: cover;color: #FFFFFF;">
		<div class=" container">
			<div id="content" class="col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4" style="margin-top:100px; ">
				<form id="login_form" name="login_form" action="/thinkphpCC/index.php/Home/User/do_changePwd" method="post">
					<h3 class="text-center">密码修改</h3>
					<div class="form-group">
						<label for="userAccount">用户账号:</label>
						<input type="text" class="form-control" name="userAccount" id="userAccount" required placeholder="用于登陆的账号" />
					</div>
					<div class="form-group">
						<label for="originalPwd">原始密码:</label>
						<input type="password" class="form-control" name="originalPwd" id="originalPwd" required placeholder="填写原始密码" />
					</div>
					<div class="form-group">
						<label for="pwd">修改密码:</label>
						<input type="password" class="form-control" name="pwd" id="pwd" required placeholder="填写密码" />
					</div>
					<button type="submit" class="btn btn-primary" id="login">修改</button>
					<a href="/thinkphpCC/index.php/Home/User/login">会员登录</a>
					<a href="/thinkphpCC/index.php/Home/User/register">会员注册</a>
				</form>
			</div>
		</div>
	</body>
</html>