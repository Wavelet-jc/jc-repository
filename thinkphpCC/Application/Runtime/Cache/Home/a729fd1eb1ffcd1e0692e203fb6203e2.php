<?php if (!defined('THINK_PATH')) exit();?><h2>群组聊天记录</h2>
<div id="Messsages">
<?php if(is_array($chatGroupMsg)): foreach($chatGroupMsg as $key=>$chatGroupMsg): ?><a href="" class="list-group-item list-group-item-action">
		<div style="color:cornflowerblue;"><?php echo ($chatGroupMsg["from_nickname"]); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo ($chatGroupMsg["gm_fromtime"]); ?></div>
		<div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($chatGroupMsg["gm_content"]); ?></div>
	</a><?php endforeach; endif; ?>
</div>
<div><?php echo ($page); ?></div>


<!--<div class=" text-white">
	<a href="/thinkphpCC/index.php/Home/Main/groupChat?id=<?php echo ($groupId); ?>" class="btn btn-primary" >聊天</a>
	<a href="/thinkphpCC/index.php/Home/Main/groupChatHistory?id=<?php echo ($groupId); ?>" class="btn btn-primary" >记录</a>
</div>

<h2>群组聊天记录</h2>
<ul class="list-group" id="Messsages">
	<?php if(is_array($chatGroupMsg)): foreach($chatGroupMsg as $key=>$chatGroupMsg): ?><li href="" class="list-group-item list-group-item-action" style="font-size: 14px">
			<div style="color:cornflowerblue;"><?php echo ($chatGroupMsg["from_nickname"]); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo ($chatGroupMsg["gm_fromtime"]); ?></div>
			<div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($chatGroupMsg["gm_content"]); ?></div>
		</li><?php endforeach; endif; ?>
</ul>
<div><?php echo ($page); ?></div>

-->