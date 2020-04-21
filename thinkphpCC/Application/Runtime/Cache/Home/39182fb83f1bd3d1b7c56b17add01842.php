<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>CC聊天室</title>
		<link type="text/css" rel="stylesheet" href="/thinkphpCC/Public/css/main.css" />
		<link rel="stylesheet" href="/thinkphpCC/Public/css/bootstrap.min.css">

		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="/thinkphpCC/Public/js/jquery.min.js"></script>

		<!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
		<!--<script src="/thinkphpCC/Public/js/popper.min.js"></script>-->

		<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
		<script src="/thinkphpCC/Public/js/bootstrap.min.js"></script>
		<script src="/thinkphpCC/Public/js/jquery-3.3.1.js"></script>
		<!--jQuery框架-->
		<script src="/thinkphpCC/Public/js/main.js"></script>
		<!--jQuery框架-->
	
	</head>

	<body style=" width:100vh; background:url(/thinkphpCC/Public/picture/backgroundPic1.jpg);background-repeat: no-repeat; background-size: cover;">
		<div id="Main" class="list-group " >
			<div id="Main_left"  >
				<div id="FriendList">
					<div id="Myself">
						<!--个人信息-->
						<div id="My">
							<!--我的信息-->
							<p class="My_Name"><?php echo ($user_myInfo["user_nickname"]); ?></p>
							<p class="My_Other"><?php echo ($user_myInfo["user_account"]); ?></p>
							<p class="My_Other"><?php echo ($user_myInfo["user_mail"]); ?></p>
							<p class="My_Other"><?php echo ($user_myInfo["user_phone"]); ?></p>
						</div>
					</div>

					<div class="container">
						<!--列表栏-->
						<div class=" text-white">
							<button id="btn" class=" bg-info" onclick="RecentContact()"> 最近联系 </button>
							<button id="btn" class=" bg-info" onclick="MyFriend()"> 我的好友 </button>
							<button id="btn" class=" bg-info" onclick="MyGroup()"> 我的群组 </button>
						</div>
					</div>

					<div class="RecentContact" id="RecentContact" style="display:none;">
						<!--最近联系-->

						<?php if(is_array($nearestContacts)): foreach($nearestContacts as $key=>$Contact): ?><div class="Friend_bd">
								<a href="/thinkphpCC/index.php/Home/Main/friendChat?id=<?php echo ($Contact["user_id"]); ?>" class="list-group-item list-group-item-action" style="background: rgba(255,255,255,0.85)">
									<div class="Friend_Other"><?php echo ($Contact["user_nickname"]); ?>(<?php echo ($Contact["user_statename"]); ?>)</div>
								</a>
							</div><?php endforeach; endif; ?>
					</div>

					<div class="MyFriend" id="MyFriend">
						<!--我的好友-->
						<!--<table>
							<tr>
								<td>-->
									<!--<a href="javascript:void(0)" onclick="openDiv(this)">好友分组</a>-->
									<!--<div class="Friend">-->
										<?php if(is_array($friendsList)): foreach($friendsList as $key=>$oneFriend): ?><div class="Friend_bd" style="text-align: center;background: rgba(0,0,0,0.5)">
		<a href="/thinkphpCC/index.php/Home/Main/friendChat?id=<?php echo ($oneFriend["friend_id"]); ?>" class="list-group-item list-group-item-action" style="text-align: center;background: rgba(255,255,255,0.85)">
			<p class="Friend_Other"><?php echo ($oneFriend["user_nickname"]); ?>
				<?php if(!empty($oneFriend["friend_remark"])): ?>(<?php echo ($oneFriend["friend_remark"]); ?>)<?php endif; ?>
			</p>
			<p class="Friend_Other">状态:<?php echo ($oneFriend["user_statename"]); ?></p>

		</a>
	</div><?php endforeach; endif; ?>
										<!--
								</td>
							</tr>

						</table>-->
					</div>

					<!-- <span><h3 class="Friend_h3">我的好友</h3></span> -->
					<div class="MyGroup" id="MyGroup" style="display:none;">
						<?php if(is_array($chatGroupsList)): foreach($chatGroupsList as $key=>$oneChatGroup): ?><a href="/thinkphpCC/index.php/Home/Main/groupChat?id=<?php echo ($oneChatGroup["cg_id"]); ?>" class="list-group-item list-group-item-action" style="text-align: center;background: rgba(255,255,255,0.85)">
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

			</div>
			<div class="btn-group " style="margin: 0 45px;">
					<a href="/thinkphpCC/index.php/Home/Main/../Friends/addFriend" class="btn btn-secondary">添加好友</a>
					<a href="/thinkphpCC/index.php/Home/Main/../ChatGroups/createChatGroup" class="btn btn-secondary">群组创建</a>
					<a href="/thinkphpCC/index.php/Home/Main/../ChatGroups/addChatGroup" class="btn btn-secondary">加入群组</a>
					<!-- 按钮：用于打开模态框 -->
			<button href="" class="button btn-secondary" data-toggle="modal" data-target="#myModal">    退出系统  </button>

			<!-- 模态框 -->
			<div class="modal fade" id="myModal">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- 模态框主体 -->
						<div class="modal-body">
							你确定要退出聊天系统吗？
						</div>

						<!-- 模态框底部 -->
						<div class="modal-footer">
							<a class="btn btn-primary" id="" href="/thinkphpCC/index.php/Home/Main/../User/logout"  > 确认退出 </a>
							<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
						</div>

					</div>
				</div>
			</div>
			</div>
		</div>
	</body>

</html>