<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>CC聊天室登陆</title>
		<!-- 新 Bootstrap4 核心 CSS 文件 -->
		<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">

		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>

		<!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
		<script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>

		<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
		<script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class=" container">
			<div id="content" class="col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
				<form id="login_form" name="login_form" action="http://localhost/thinkphpCC/index.php/Home/User/do_login" method="post">
					<h3 class="text-center">会员登陆</h3>
					<div class="form-group">
						<label for="userAccount">用户账号:</label>
						<input type="text" class="form-control" name="userAccount" id="userAccount" required placeholder="用于登陆的账号" />
					</div>
					<div class="form-group">
						<label for="pwd">密码:</label>
						<input type="password" class="form-control" name="pwd" id="pwd" required placeholder="填写密码" />
					</div>
					<button type="submit" class="btn btn-primary" id="login">登陆</button>
					<a href="/thinkphpCC/index.php/Home/User/register">没有账号？点击注册</a>
					<a href="/thinkphpCC/index.php/Home/User/changePwd">修改密码</a>
				</form>
			</div>
		</div>
	</body>
</html>