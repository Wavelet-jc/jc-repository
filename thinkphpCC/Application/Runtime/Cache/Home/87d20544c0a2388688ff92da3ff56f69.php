<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>CC聊天室</title>
		<link type="text/css" rel="stylesheet" href="/thinkphpCC/Public/css/main.css" />
		<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">

		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>

		<!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
		<script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>

		<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
		<script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="/thinkphpCC/Public/js/jquery-3.3.1.js"></script>
		<!--jQuery框架-->
		<script src="/thinkphpCC/Public/js/main.js"></script>
		<!--jQuery框架-->
		<script type="text/javascript">
    var sender = "<?php echo ($from_name); ?>";
    var toer = "<?php echo ($to_name); ?>";
    var from = "<?php echo ($from); ?>";
    var to = "<?php echo ($to); ?>";
    // Ajax轮询
    $(function() {
        var get_message = {
            type: "POST",
            url: "<?php echo U('Customer/get_message');?>", 
            timeout: 80000, //ajax请求超时时间80秒      
            data: {
                now: new Date().getTime(),
                from: to,
                to: from
            },//40秒后无论结果服务器都返回数据      
            success: function(data, textStatus) {
                //从服务器得到数据，显示数据并继续查询      
                if (data.success == "1") {
                    console.info(data.success + " " + data.to + " " + data.content);
                    var get = toer + "对" + sender + "说:<br/>";
                    get += " " + data.content + "<br/>";
                    $("#record").append(get);
                    $.ajax(get_message);
                }
                //未从服务器得到数据，继续查询      
                if (data.success == "0") {
                    $.ajax(get_message);
                }
            },
            // Ajax请求超时，继续查询      
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                if (textStatus == "timeout") {
                    console.info("请求超时!");
                    $.ajax(get_message);
                }
            }
        };
        $.ajax(get_message);
    });
    // Ajax提交数据
    $(function() {
        $("#btn_send").click(function() {
            $.ajax({
                url: "<?php echo U('Customer/send_message');?>",
                type: "POST",
                data: {
                    to: to,
                    from: from,
                    content: $('#content').val(),
                    now: new Date().getTime()
                },
                success: function(data) {
                    if (data.state == "1") {
                        var send = sender + "对" + toer + "说:<br />";
                        send += $('#content').val() + "<br/>";
                        $("#record").append(send);
                        $('#content').val("");
                    } else {
                        alert("发送失败" + data);
                    }
                }
            })
        });
    });
</script>
		   
	</head>

	<body style=" width:100vh; background:url(/thinkphpCC/Public/picture/backgroundPic1.jpg);background-repeat: no-repeat; background-size: cover;">
		<div>111111111111111111111111111111111</div>

	</body>

</html>