<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html >

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

	<body  style="height:100vh;margin: 50px;">
		<div class="container">
			<div id="content" class="col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-5 offset-lg-3">
				<form id="addFriend_form" name="addFriend_form" action="/thinkphpCC/index.php/Home/Friends/do_addFriend" method="post">
					<fieldset>
						<legend>添加好友（通过账号查询）</legend>
						<div class="form-group">
							搜索账号：<input type="text" class="form-control" name="friendAccount" id="friendAccount" required placeholder="对方账号"/>
							<input type="submit" id="submit" class="btn btn-primary" value="添加 " />
							<a href="javascript:history.back()">返回</a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</body>
</html>