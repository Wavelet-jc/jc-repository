<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>CC聊天室群创建</title>
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
	<div id="container">
		<div id=content" class="col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
			 <form id="deleteChatGroup_form" name="deleteChatGroup_form" action="/thinkphpCC/index.php/Home/ChatGroups/do_deleteChatGroup" method="post">
				<h1>解散群组</h1>
				<div class="form-group">
					<input type="text" name="groupName" class="form-control" id="groupName" required placeholder="群名称" /><br>					
				</div>
				<button type="submit" class="button" class="btn btn-primary" id="deleteChatGroup">解散群组</button>
				 <a href="javascript:history.back()">返回</a>
			</form>
		</div>
	</div>
</body>
</html>