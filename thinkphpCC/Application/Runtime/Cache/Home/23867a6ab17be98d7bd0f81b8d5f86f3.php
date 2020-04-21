<?php if (!defined('THINK_PATH')) exit();?><html>

<head>

   		<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">

		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>

		<!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
		<script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>

		<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
		<script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<body>

</body>

<script type="text/javascript">//前端Ajax持续调用服务端，称为Ajax轮询技术
	console.log(document.getElementsByTagName("body")[0].innerHTML = "<div>1</div>");
	
	var getting = {	
		url: "<?php echo U('Messages/get_message');?>?id=6",
		dataType: 'json',
	
		success: function(res) {
	
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

</html>