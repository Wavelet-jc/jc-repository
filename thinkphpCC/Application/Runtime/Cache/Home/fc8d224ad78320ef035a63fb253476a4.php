<?php if (!defined('THINK_PATH')) exit();?>
	<div class="list-group col-md-4">
		<h2>群组列表</h2>
		<?php if(is_array($chatGroupsList)): foreach($chatGroupsList as $key=>$oneChatGroup): ?><a href="/thinkphpCC/index.php/Home/ChatGroups/groupChat?id=<?php echo ($oneChatGroup["cg_id"]); ?>" class="list-group-item list-group-item-action">
				<!--<div>群id:<?php echo ($oneChatGroup["cg_id"]); ?></div>-->
				<div>
					<?php echo ($oneChatGroup["cg_name"]); ?>
					(群主id:<?php echo ($oneChatGroup["cg_adminid"]); ?>)
				</div>
				
				<!--<div>群组创建时间:<?php echo ($oneChatGroup["cg_createtime"]); ?></div>-->
				<!--<div>群简介:<?php echo ($oneChatGroup["cg_brief"]); ?></div>-->
			</a><?php endforeach; endif; ?>
	</div>