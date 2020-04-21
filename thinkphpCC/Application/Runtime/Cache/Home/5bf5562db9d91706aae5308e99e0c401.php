<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>CC聊天室</title>
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

<div class="list-group col-sm-10">
	
	<h2>消息发送框</h2>
	<form id="send_form" name="send_form" action="/thinkphpCC/index.php/Home/Messages/do_messagesSend?id=<?php echo ($id); ?>" method="post">
		<textarea id="content" name="content" style="width: 618px;height: 100px;"></textarea>
		<br>
		<button type="submit" class="btn btn-primary" id="send">发送</button>
	</form>
</div>
</body>
</html>