<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>CC聊天室</title>
		<!-- 新 Bootstrap4 核心 CSS 文件 -->
		<link rel="stylesheet" href="/thinkphpCC/Public/css/bootstrap.min.css">

		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="/thinkphpCC/Public/js/jquery.min.js"></script>

		<!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
		<!--<script src="/thinkphpCC/Public/js/popper.min.js"></script>-->

		<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
		<script src="/thinkphpCC/Public/js/bootstrap.min.js"></script>
		
		<script src="/thinkphpCC/Public/js/msgHistory.js"></script>
		


	<body style=" height:100vh; background:url(/thinkphpCC/Public/picture/backgroundPic2.jpg);background-repeat: no-repeat; background-size: cover;">
		<div></div>
		<div class="container" style="margin-top:50px ;">
			<div class="row">
				<div class="list-group col-md-1"> <!--	<div class="list-group col-md-1">-->
	<a href="/thinkphpCC/index.php/Home/Main/main" class="btn btn-info"> 返回</a>
<!--</div>-->
</div>
				<div class="list-group col-md-3">
					<div class="card">
	<div class="card-body">
		<h4 class="card-title">好友信息</h4>
		<form name="friendInfo_form" id="friendInfo_form" method="post" action="/thinkphpCC/index.php/Home/Main/../Friends/setFriendRemark?id=<?php echo ($theFriend["user_id"]); ?>">
			<div>账号:<?php echo ($theFriend["user_account"]); ?></div>

			<div>名称:<?php echo ($theFriend["user_nickname"]); ?></div>

			<div>备注:<input type="text" name="remark" id="remark" value="<?php echo ($friend_remark); ?> " style="width: 120px;" /> </div>
			<div>状态:<?php echo ($theFriend["user_statename"]); ?></div>
			<div>邮箱:<?php echo ($theFriend["user_mail"]); ?></div>
			<div>电话:<?php echo ($theFriend["user_phone"]); ?></div>
			<br />
			<input type="submit" class="button btn-secondary" class="btn btn-primary" id="setFriendRemark" value="设置备注" />

			<!-- 按钮：用于打开模态框 -->
			<button type="button" class="button btn-secondary" data-toggle="modal" data-target="#myModal">    刪除好友  </button>

			<!-- 模态框 -->
			<div class="modal fade" id="myModal">
				<div class="modal-dialog">
					<div class="modal-content">

						<!-- 模态框主体 -->
						<div class="modal-body">
							你确定要删除该好友吗？
						</div>

						<!-- 模态框底部 -->
						<div class="modal-footer">
							<input type="submit" class="btn btn-primary" id="delFriend" formaction="/thinkphpCC/index.php/Home/Main/../Friends/do_deleteFriend?id=<?php echo ($theFriend["user_id"]); ?>" value="确定删除" />
							<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
						</div>

					</div>
				</div>
			</div>

		</form>
	</div>
</div>
				</div>
				
				<div class="list-group col-md-8">
					
<div class=" text-white">
	<a href="/thinkphpCC/index.php/Home/Main/friendChat?id=<?php echo ($friendId); ?>" class="btn btn-primary" >聊天</a>
	<a href="/thinkphpCC/index.php/Home/Main/friendChatHistory?id=<?php echo ($friendId); ?>" class="btn btn-primary" >记录</a>
</div>
<div id="Message_record">
	<ul class="list-group">
		<?php if(is_array($messages)): foreach($messages as $key=>$message): ?><li class="list-group-item" style="font-size: 14px">
				<div style="color:cornflowerblue;">
					<?php if($message["msg_fromuserid"] == $userId): echo ($userNickName); ?>
						<?php else: ?> <?php echo ($theFriend["user_nickname"]); endif; ?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 时间:<?php echo ($message["msg_time"]); ?>
				</div>
				<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($message["msg_content"]); ?></div>
			</li><?php endforeach; endif; ?>
	</ul>
</div>
<div><?php echo ($page); ?></div>

	<script type="text/javascript">//前端Ajax持续调用服务端，称为Ajax轮询技术
	
		var  url_str = "<?php echo U('Messages/get_message');?>?id=<?php echo ($friendId); ?>";
		var getting = {		
			url: url_str,
			dataType: 'json',		
			success: function(res) {
		var text1 = '<ul class="list-group">';
		for (var i=0; i<6; i++){
		text1 += '<li class="list-group-item" style="font-size: 14px">';
		text1 += '<div style="color:cornflowerblue;">';
		
		text1 += res[i].from_nickname +'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 时间:'+res[i].msg_time	+'</div>';
		text1 += '<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+res[i].msg_content+'</div></li> ';

		}
		text1 += '</ul>';
		$("#Message_record").html(text1);
//		document.write(text1);
				//  console.log(res.success);
	//			console.log(document.getElementsByTagName("body")[0].innerHTML = "<div>" + res.success + "</div>");
				console.log( res);
				$.ajax(getting); //关键在这里，回调函数内再次请求Ajax
		
			},
			//当请求时间过长（默认为60秒），就再次调用ajax长轮询
			error: function(res) {
				$.ajax($getting);
			}		
		};		
		$.ajax(getting);
	</script>

	
	
					<div class="list-group ">
	<form id="send_form" name="send_form" action="/thinkphpCC/index.php/Home/Main/../Messages/do_messagesSend?id=<?php echo ($id); ?>" method="post">
		<fieldset>
			<legend>消息发送框</legend>
			<textarea id="content" name="content" style="width: 100%;height: 100px;" maxlength="200"></textarea>
			<br>
			<input type="submit" class="btn btn-primary" id="send" value="发送"></input>
		</fieldset>
	</form>
</div> 
				</div>
			</div>
		</div>
	</body>
</html>