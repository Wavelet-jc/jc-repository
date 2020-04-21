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

	<div class="list-group col-sm-8">
		<h2>群组列表</h2>
		<?php if(is_array($chatGroupsList)): foreach($chatGroupsList as $key=>$oneChatGroup): ?><a href="/thinkphpCC/index.php/Home/ChatGroups/../ChatGroupMembers/ChatGroupMembers?id=<?php echo ($oneChatGroup["cg_id"]); ?>" class="list-group-item list-group-item-action">
				<div>群id:<?php echo ($oneChatGroup["cg_id"]); ?></div>
				<div>群名称:<?php echo ($oneChatGroup["cg_name"]); ?></div>
				<div>群主id:<?php echo ($oneChatGroup["cg_adminid"]); ?></div>
				<div>群组创建时间:<?php echo ($oneChatGroup["cg_createtime"]); ?></div>
				<div>群简介:<?php echo ($oneChatGroup["cg_brief"]); ?></div>
			</a><?php endforeach; endif; ?>
	</div>
	</body>
</html>