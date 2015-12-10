<?php
$host='127.0.0.1';
$user='root';
$password='root';
	//首先获取URL传递过来的参数，包括stage、ip、mac、token、incoming、outgoing和gw_id.
	$stage = isset($_GET["stage"]) ? $_GET["stage"] : null;
	$ip = isset($_GET["ip"]) ? $_GET["ip"] : null;
	$mac = isset($_GET["mac"]) ? $_GET["mac"] : null;
	$token = isset($_GET["token"]) ? $_GET["token"] : null;
	$incoming = isset($_GET["incoming"]) ? $_GET["incoming"] : null;
	$outgoing = isset($_GET["outgoing"]) ? $_GET["outgoing"] : null;
	$gw_id = isset($_GET["gw_id"]) ? $_GET["gw_id"] : null;
	//mac和token是必需参数，不能为空，只有mac和token均不为空才有可能通过验证，缺失参数将不显示登录表单.
	if(!empty($mac) && !empty($token)){
		//mysql连接，相应的参数mysql_host、mysql_user和mysql_password需要换成你自己的参数.
		$con = new mysqli($host, $user, $password, 'portal');
		//数据库连接失败，验证不通过.
		if(!$con){
			echo "Auth: 0";
		}
		else{
			//选择mysql数据库，如果你的数据库名不是portal，请自行更改.
			//mysql_select_db(‘portal’, $con);
			//用户登陆成功后，会把用户的参数(ip、mac和系统自动生成的token等)记录到数据库，系统主要通过mac识别用户，当然这种方式在大规模系统中可能存在漏洞.
			$result = $con -> query("SELECT * FROM User WHERE Mac='".$mac."' AND Token='".$token."'");
			//如果token匹配，验证通过，否则验证失败.
			if(!empty($result) && mysqli_num_rows($result) != 0){
				echo "Auth: 1";
			}
			else{
				echo "Auth: 0";
			}
		}
	}
	else{
		echo "Auth: 0";
	}
?>