<?php if (!defined('THINK_PATH')) exit();?>
	<div class="list-group col-md-4">
		<h2>好友列表</h2>
		<?php if(is_array($friendsList)): foreach($friendsList as $key=>$oneFriend): ?><a href="/thinkphpCC/index.php/Home/Friends/friendChat?id=<?php echo ($oneFriend["friend_id"]); ?>" class="list-group-item list-group-item-action">
				<div>
					<!--名称:-->
					<?php echo ($oneFriend["user_nickname"]); ?>
					<?php if(!empty($oneFriend["friend_remark"])): ?>(<?php echo ($oneFriend["friend_remark"]); ?>)<?php endif; ?>
				</div>				
				<!--<div>备注:<?php echo ($oneFriend["friend_remark"]); ?></div>-->
				<div>状态:<?php echo ($oneFriend["us_name"]); ?></div>
				<!--<div>账号:<?php echo ($oneFriend["user_account"]); ?></div>-->
				<!--<div>邮箱:<?php echo ($oneFriend["user_mail"]); ?></div>-->
				<!--<div>电话:<?php echo ($oneFriend["user_phone"]); ?></div>-->				
			</a><?php endforeach; endif; ?>
	</div>