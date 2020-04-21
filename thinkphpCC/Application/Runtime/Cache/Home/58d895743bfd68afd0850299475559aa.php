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
	</head>

	<body style=" height:100vh; background: url(/thinkphpCC/Public/picture/backgroundPic2.jpg);background-repeat: no-repeat; background-size: cover;">

		<div class="container" style="margin-top:50px ;">
			<div class="row">
				<div class="list-group col-md-1"> 
					<!--	<div class="list-group col-md-1">-->
	<a href="/thinkphpCC/index.php/Home/Main/main" class="btn btn-info"> 返回</a>
<!--</div>-->
</div>
				<div class="list-group col-md-3">
					
<div class="card">
	<div class="card-body">
		<h4 class="card-title"><?php echo ($chatGroupInfo["cg_name"]); ?></h4>
		<div class="card-text">群主：<?php echo ($chatGroupInfo["ownerNickName"]); ?></div>		
		<div class="card-text">群id：<?php echo ($chatGroupInfo["cg_id"]); ?></div>		
		
		<div class="card-text">简介：</div>
		<div class="" style="padding: 2px; font-size: 14px;border: 1px solid rgba(223,223,223);">			
				<p class="card-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($chatGroupInfo["cg_brief"]); ?></p>			
		</div>		
		<div class="card-text">创建时间：<?php echo ($chatGroupInfo["cg_createtime"]); ?></div>
	</div>
</div>
					<br>
					<div class="card">
	<div class="card-body">
		<h4 class="card-title">群组成员列表</h4>
		<?php if(is_array($chatGroupMembersList)): foreach($chatGroupMembersList as $key=>$chatGroupMember): ?><a href="/thinkphpCC/index.php/Home/Main/../Main/friendChat?id=<?php echo ($chatGroupMember["cgm_userid"]); ?>" class="list-group-item list-group-item-action">
				<!--<div>群组id:<?php echo ($chatGroupMember["cgm_groupid"]); ?></div>-->
				<div>
					<!--群成员:--><?php echo ($chatGroupMember["memberName"]); ?> (<?php echo ($chatGroupMember["memberStateName"]); ?>)</div>
				<!--<div>群备注: <?php echo ($chatGroupMember["cgm_groupremark"]); ?></div>-->
			</a><?php endforeach; endif; ?>
	</div>

</div>


					<?php if($status == 'member' ): ?><form name="friendInfo_form" id="friendInfo_form" method="post" action="/thinkphpCC/index.php/Home/Main/../ChatGroups/do_quitChatGroup?id=<?php echo ($chatGroupId); ?>">

<!-- 按钮：用于打开模态框 -->
<button type="button" class="button btn-secondary" data-toggle="modal" data-target="#quitGroupModal">   退出群组  </button>

<!-- 模态框 -->
<div class="modal fade" id="quitGroupModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- 模态框主体 -->
			<div class="modal-body">
				你确定要退出该群组吗？
			</div>

			<!-- 模态框底部 -->
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" id="deleteChatGroup" value="退出群组"/>
				<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
			</div>

		</div>
	</div>
</div>

</form>
					<?php else: ?>
						<form name="friendInfo_form" id="friendInfo_form" method="post" action="/thinkphpCC/index.php/Home/Main/../ChatGroups/do_dissolveChatGroup?id=<?php echo ($chatGroupId); ?>">

	<!-- 按钮：用于打开模态框 -->
	<button type="button" class="button btn-secondary" data-toggle="modal" data-target="#dissolveGroupModal">    解散群组  </button>
	<button type="button" class="button btn-secondary" data-toggle="modal" data-target="#quitGroupModal">   退出群组  </button>
	<!-- 模态框 -->
	<div class="modal fade" id="dissolveGroupModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- 模态框主体 -->
				<div class="modal-body">
					你是群主，你确定要解散该群组吗？
				</div>

				<!-- 模态框底部 -->
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" id="deleteChatGroup" value="确定解散" />

					<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
				</div>

			</div>
		</div>
	</div>
	
		<!-- 模态框 -->
	<div class="modal fade" id="quitGroupModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- 模态框主体 -->
				<div class="modal-body">
					你确定要退出该群组吗？
				</div>

				<!-- 模态框底部 -->
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" id="deleteChatGroup" formaction="/thinkphpCC/index.php/Home/Main/../ChatGroups/do_quitChatGroup?id=<?php echo ($chatGroupId); ?>" value="退出群组"/>
					<button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
				</div>

			</div>
		</div>
	</div>


</form>


<form name="friendInfo_form" id="friendInfo_form" method="post" action="/thinkphpCC/index.php/Home/Main/../ChatGroups/do_quitChatGroup?id=<?php echo ($chatGroupId); ?>">

	<!-- 按钮：用于打开模态框 -->
	


</form><?php endif; ?>
					
				</div>
				<!--<div class="list-group col-md-1"></div>-->
				<div class="list-group col-md-8">
					
					

<div class=" text-white">
	<a href="/thinkphpCC/index.php/Home/Main/groupChat?id=<?php echo ($groupId); ?>" class="btn btn-primary" >聊天</a>
	<a href="/thinkphpCC/index.php/Home/Main/groupChatHistory?id=<?php echo ($groupId); ?>" class="btn btn-primary" >记录</a>
</div>

<div id="Message_record">
	<ul class="list-group" id="Messsages">
		<?php if(is_array($chatGroupMsg)): foreach($chatGroupMsg as $key=>$chatGroupMsg): ?><li href="" class="list-group-item list-group-item-action" style="font-size: 14px">
				<div style="color:cornflowerblue;"><?php echo ($chatGroupMsg["from_nickname"]); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo ($chatGroupMsg["gm_fromtime"]); ?></div>
				<div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($chatGroupMsg["gm_content"]); ?></div>
			</li><?php endforeach; endif; ?>
	</ul>
</div>
<div><?php echo ($page); ?></div>

	<script type="text/javascript">//前端Ajax持续调用服务端，称为Ajax轮询技术	
		var url_str = "<?php echo U('chatGroupMsg/get_message');?>?id=<?php echo ($groupId); ?>";
		var getting = {		
			url: url_str,
			dataType: 'json',		
			success: function(res) {
				var text1 = '<ul class="list-group">';
		for (var i=0; i<6; i++){
		text1 += '<li class="list-group-item" style="font-size: 14px">';
		text1 += '<div style="color:cornflowerblue;">';
		
		text1 += res[i].from_nickname +'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 时间:'+res[i].gm_fromtime	+'</div>';
		text1 += '<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+res[i].gm_content+'</div></li> ';

		}
		text1 += '</ul>';
		$("#Message_record").html(text1);
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

<!--<h2>群组聊天记录</h2>
<div id="Messsages">
<?php if(is_array($chatGroupMsg)): foreach($chatGroupMsg as $key=>$chatGroupMsg): ?><a href="" class="list-group-item list-group-item-action">
		<div style="color:cornflowerblue;"><?php echo ($chatGroupMsg["from_nickname"]); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo ($chatGroupMsg["gm_fromtime"]); ?></div>
		<div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($chatGroupMsg["gm_content"]); ?></div>
	</a><?php endforeach; endif; ?>
</div>
<div><?php echo ($page); ?></div>-->

<!--<h2>群组聊天记录</h2>

<?php if(is_array($chatGroupMsg)): foreach($chatGroupMsg as $key=>$chatGroupMsg): ?><a href="" class="list-group-item list-group-item-action">
		<div style="color:cornflowerblue;"><?php echo ($chatGroupMsg["from_nickname"]); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo ($chatGroupMsg["gm_fromtime"]); ?></div>
		<div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($chatGroupMsg["gm_content"]); ?></div>
	</a><?php endforeach; endif; ?>
<div><?php echo ($page); ?></div>-->

					<!--
	<form id="send_form" name="send_form" action="/thinkphpCC/index.php/Home/Main/../ChatGroupMsg/do_chatGroupMsgSend?id=<?php echo ($id); ?>" method="post">
 		<fieldset>
			<legend>群组消息发送框</legend>
		<textarea id="content" name="content" style="width: 100%;height: 100px;" maxlength="200"></textarea>
		<br>
		<button type="submit" class="btn btn-primary" id="send">发送</button>
		</fieldset>
	</form>
-->
					
	<form id="send_form" name="send_form" action="/thinkphpCC/index.php/Home/Main/../ChatGroupMsg/do_chatGroupMsgSend?id=<?php echo ($id); ?>" method="post">
 		<fieldset>
			<legend>群组消息发送框</legend>
		<textarea id="content" name="content" style="width: 100%;height: 100px;" maxlength="200"></textarea>
		<br>
		<button type="submit" class="btn btn-primary" id="send">发送</button>
		</fieldset>
	</form>
				
				</div>

			</div>
	</body>
<!--<script>
	$("#send").click(function() {
		var content  = $("#content").val();
		$.post("/thinkphpCC/index.php/Home/Main/../ChatGroupMsg/do_chatGroupMsgSendAjax?id=<?php echo ($id); ?>", {
				content: $("#content").val(),
			},
			function(data, status) {
				alert("数据: \n" + data + "\n状态: " + status);
				var text = '<a href="" class="list-group-item list-group-item-action">';
				var text1 = '<div style="color:cornflowerblue;">';
				var text2 = data.content;
				 var txt1="<p>文本。</p>";
				 alert(text2);
				$("#Messsages").append(txt1);
			});
	});
</script>-->
</html>