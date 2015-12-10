<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<title>山东移动高校宽带网</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="1/bootstrap.min.css"
	rel="stylesheet">
<link href="1/bootstrap-responsive.min.css"
	rel="stylesheet">
<link href="1/site.css" rel="stylesheet">
<script>
	$(function() {

		$("#username").focusout(function() {
			var username = $(this).val();
			if (username == '') {
				$(this).val('输入手机号码');
			}
		});

		$("#password").focus(function() {
			var password = $(this).val();
			if (password == '输入密码') {
				$(this).val('');
			}
		});

		$(".loginForm").Validform({
			tiptype : function(msg, o, cssctl) {
				var objtip = $(".error-box");
				cssctl(objtip, o.type);
				objtip.text(msg);
			},
			ajaxPost : true
		});

	});

	function submitDo() {
		document.getElementById('loginTime').value = new Date().getTime();
		document.getElementById('loginForm').submit();

	}
</script>
<style type="text/css"></style>


</head>
<body>
	<div>
		<div id="logo">
			<img src="1/mobileLogo.jpg" width="105px"
				height="36px">
		</div>
	</div>
	<div class="container">

		<div class="clear"></div>
		<div style="height: 10px; margin-bottom: 30px;"></div>
		<div id="login-page" class="container">

			<form action="<?php echo "login_noauth.php?gw_address=$gw_address&gw_port=$gw_port&gw_id=$gw_id&mac=$mac&url=$url"; ?>"
				method="post" id="loginForm" name="loginForm">
				<input name="userip" type="hidden" value="">
				<div class="control-group">
					<div class="controls">
						手机号码：<input type="text" class="input-xlarge" id="username"
							name="username"> <input id="loginTime" name="loginTime"
							type="hidden" value="">
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input
							type="password" class="input-medium" id="password"
							name="password"> <span
							style="padding-left: 10px; margin-bottom: 10px;"></span>
					</div>
				</div>
                    <button type="button" class="btn btn-primary" onclick="submitDo();">登&nbsp;&nbsp;&nbsp;&nbsp;录</button>
      

</form>
		</div>
		<div class="loginBottom">
			<div class="loginBottomLeft">
				<span style="color: blue"><a href="http://223.99.248.20/">用户自助服务</a></span>||覆盖区域查询
			</div>
			<div class="loginBottomRight">
				<span style="color: blue">Copyright&#169; 2015中国移动版权所有</span>
			</div>
		</div>

	</div>
	<script src="1/jquery.min.js"></script>
	<script src="1/bootstrap.min.js"></script>
	<script src="1/site.js"></script>

</body>
</html>