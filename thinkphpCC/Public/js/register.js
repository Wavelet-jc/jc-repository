
//$.validator.setDefaults({
//  submitHandler: function() {
//    alert("提交事件!");
//  }
//});

$(document).ready(function() {
// 在键盘按下并释放及提交后验证提交表单

    $("#register_form").validate({
	    rules: {
	     userAccount: {
	     	required: true,
	     	minlength: 2,
	     	maxlength: 20
	     	
	     },
	      pwd: {
	        required: true,
	        minlength: 5,
	        maxlength: 20
	      },
	      pwd_Check: {
	        required: true,
	        minlength: 5,
	        maxlength: 20,
	        equalTo: "#pwd"
	      },
	      
	    },
	    messages: {
	      userAccount:{
	      	required: "请填写一个账号",
	        minlength: "账号长度不能小于 2 个字符",
	        maxlength: "账号长度不能大于 20 个字符"
	      },
	      pwd: {
	        required: "请输入密码",
	        minlength: "密码长度不能小于 5 个字符",
	        maxlength: "密码长度不能大于 20 个字符",
	      },
	      pwd_Check: {
	        required: "请输入密码",
	        minlength: "密码长度不能小于 5 个字符",
	        maxlength: "密码长度不能小于 20 个字符",
	        equalTo: "两次密码输入不一致"	        
	      },
	    }
	});
	
	
	$("#userAccount").change(function(){
		$.post("ajax_check.php",
	    {
	        userName:$("#userAccount").val(),
	        email:$("#email").val(),
			phone:$("#phone").val()
	    },
	        function(data,status){
	        if(data==true){
	        	$("#userAccount").next().text("此账号已经被注册过了").css("color","red");
	        	$("#register").attr("disabled","disabled");	 //jQuery禁用提交按钮
	        }
	        else
	        {
	        	$("#userAccount").next().text("");
	        	$("#register").removeAttr("disabled");	//jQuery取消提交按钮的禁用
	        }
	    });
	});
});



/*$(document).load(function(){
	$("#register").click(function(){
		alert("提交");
	});
});
*/