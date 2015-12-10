<?php
	$gw_id = isset($_GET["gw_id"]) ? $_GET["gw_id"] : null;
	if (!session_id()) session_start();
	if($gw_id!=null){
		$url = $_SESSION["url"];
		echo "<script language=\"JavaScript\">;alert(\"认证成功\");window.open(\"".$url."\");</script>;";
		include("result.php");
	}
	else{
		echo "非法请求";
		echo "<script language=\"JavaScript\">;alert(\"请重新认证\");</script>;";
	}
	//跳转到登陆前页面.
	//header("Location: ".$url);
	//告知用户登陆成功.
	//认证前用户访问任意url，然后被重定向登录页面，session记录的是这个“任意url”.
?>