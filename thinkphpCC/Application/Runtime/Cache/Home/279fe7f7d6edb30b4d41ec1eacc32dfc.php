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
		<div class="container">
			<div class="row">
				
	<div class="list-group col-md-4">
		<h2>好友列表</h2>
		<?php if(is_array($friendsList)): foreach($friendsList as $key=>$oneFriend): ?><a href="/thinkphpCC/index.php/Home/Main/friendChat?id=<?php echo ($oneFriend["friend_id"]); ?>" class="list-group-item list-group-item-action">
				<div>
					<!--名称:-->
					<?php echo ($oneFriend["user_nickname"]); ?>
					<?php if(!empty($oneFriend["friend_remark"])): ?>(<?php echo ($oneFriend["friend_remark"]); ?>)<?php endif; ?>
				</div>				
				<!--<div>备注:<?php echo ($oneFriend["friend_remark"]); ?></div>-->
				<div>状态:<?php echo ($oneFriend["user_statename"]); ?></div>
				<!--<div>账号:<?php echo ($oneFriend["user_account"]); ?></div>-->
				<!--<div>邮箱:<?php echo ($oneFriend["user_mail"]); ?></div>-->
				<!--<div>电话:<?php echo ($oneFriend["user_phone"]); ?></div>-->				
			</a><?php endforeach; endif; ?>
	</div>



				
	<div class="list-group col-md-4">
		<h2>群组列表</h2>
		<?php if(is_array($chatGroupsList)): foreach($chatGroupsList as $key=>$oneChatGroup): ?><a href="/thinkphpCC/index.php/Home/Main/groupChat?id=<?php echo ($oneChatGroup["cg_id"]); ?>" class="list-group-item list-group-item-action">
				<!--<div>群id:<?php echo ($oneChatGroup["cg_id"]); ?></div>-->
				<div>
					<?php echo ($oneChatGroup["cg_name"]); ?>
					<!--(群主id:<?php echo ($oneChatGroup["cg_adminid"]); ?>)-->
				</div>
				
				<!--<div>群组创建时间:<?php echo ($oneChatGroup["cg_createtime"]); ?></div>-->
				<!--<div>群简介:<?php echo ($oneChatGroup["cg_brief"]); ?></div>-->
			</a><?php endforeach; endif; ?>
	</div>

			</div>
			<div>
			<a href="/thinkphpCC/index.php/Home/Main/../Friends/addFriend"><button>添加好友</button></a>
			<!--<a href="/thinkphpCC/index.php/Home/Main/../FriendGroup/createFriendGroup"><button>好友分组管理</button></a>-->
			<a href="/thinkphpCC/index.php/Home/Main/../ChatGroups/chatGroups"><button>群组管理</button></a>
			</div>
		</div>
		
	</body>
</html>