<?php
	$message = null;
	if(isset($_GET["message"])){
		$message = $_GET["message"];
	}
	echo "认证异常 message:denied,请重试或与管理员联系!";
?>