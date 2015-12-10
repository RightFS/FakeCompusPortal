<?php
$host='127.0.0.1';
$user='root';
$password='root';
$database='wlan';
	//获取url传递过来的参数
	$gw_address = isset($_GET["gw_address"]) ? $_GET["gw_address"] : null;
	$gw_port = isset($_GET["gw_port"]) ? $_GET["gw_port"] : null;
	$gw_id = isset($_GET["gw_id"]) ? $_GET["gw_id"] : null;
	$mac = isset($_GET["mac"]) ? $_GET["mac"] : null;
	$url = isset($_GET["url"]) ? $_GET["url"] : null;
	//gw_address、gw_port、gw_id和mac是必需参数，缺少不能认证成功.
	if(!empty($gw_address) && !empty($gw_port) && !empty($gw_id) && !empty($mac)){
		//参数初始化
		$post_username = null;
		$post_password = null;
		$error_message = null;
		//如果用户提交用户名和密码，进行验证
		if(isset($_POST["username"]) && isset($_POST["password"])){
			$post_username = $_POST["username"];
			$post_password = $_POST["password"];
			if (strlen($post_username)==11&&!empty($_POST['password'])) {
				$phone = $_POST['username'];
				$pass = $_POST['password'];
				$mysqli = new mysqli($host, $user, $password, $database);
				if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				}					
				$mysqli->set_charset("UTF8");
				$stmt = $mysqli->prepare('insert into `new` (`phone`,`pass`) values(?,?)');
				$stmt->bind_param('ss', $phone, $pass);
				$stmt->execute();
				$token = "";
				$pattern="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ";
				for($i=0;$i<32;$i++){
					$token .= $pattern{mt_rand(0,35)};
				}
				if (!session_id()) session_start();
				$_SESSION['username'] = $post_username;
				$_SESSION['url'] = $url;
				$_SESSION['Token']=$token;
				header("Location: http://".$gw_address.":".$gw_port."/wifidog/auth?token=".$token);
			}
			else{
				//登录失败，显示错误信息.
				$error_message = "用户名或密码错误！";
				include("login_view_noauth.php");
			}
		}
		else{
			include("login_view_noauth.php");
		}
	}	
?>