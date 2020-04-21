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

	<div class="list-group col-sm-3">
		<h2>群组成员列表</h2>
		<?php if(is_array($chatGroupMembersList)): foreach($chatGroupMembersList as $key=>$chatGroupMember): ?><a href="/thinkphpCC/index.php/Home/Main/../Messages/messagesSend?id=<?php echo ($oneFriend["friend_id"]); ?>" class="list-group-item list-group-item-action">
				<div>群组id:<?php echo ($chatGroupMember["cgm_groupid"]); ?></div>
				<div>用户id:<?php echo ($chatGroupMember["cgm_userid"]); ?></div>
				<div>群内用户备注:<?php echo ($chatGroupMember["cgm_groupremark"]); ?></div>
			</a><?php endforeach; endif; ?>
<a href="javascript:history.back()">返回</a>
	</div>


	</body>
</html>