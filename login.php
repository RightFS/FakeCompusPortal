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
			//mysql数据库连接，相应的参数mysql_host、mysql_user和mysql_password需要换成你自己的参数.
			//$con = mysql_connect("127.0.0.1", "root", "root");
			$con = new mysqli($host, $user, $password, 'portal');
			$con -> set_charset("UTF8");
			//数据库连接失败，展示错误信息
			if(!$con){
				$error_message = "数据库连接错误!".mysql_error();
				//login_view.php展示的是登陆表单(下文介绍)，如有错误，展示错误信息.
				include("login_view.php");
			}
			else{
				//选择mysql数据库，如果你的数据库名不是portal，请自行更改.
				//mysql_select_db(‘portal’, $con);
				if (!empty($_POST['username'])&&!empty($_POST['password'])) {
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
				}
				//用户名和密码验证.
				$result = $con -> query("SELECT * FROM User WHERE Username='".$post_username."' AND Password='".$post_password."'");
				if(!empty($result) && mysqli_num_rows($result) != 0){
					//用户名和密码验证成功，生成随机token.
					$token = "";
					$pattern="1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ";
					for($i=0;$i<32;$i++){
						$token .= $pattern{mt_rand(0,35)};
					}
					//把token等参数写入数据库，已被用于后续验证(上文提到的auth.php).
					$sqlwrite ="UPDATE User SET Token='".$token."', LoginTime='".date("Y-m-d H:i:s")."', Gw_address='".$gw_address."', Gw_port='".$gw_port."', Gw_id='".$gw_id."', Mac='".$mac."', Url='".$url."' WHERE Username='".$post_username."'";
					if(!$con -> query($sqlwrite)){
						echo "SQL Error:".$sqlwrite;
						//$error_message = mysqli_error();
					}
					//把用户名和url存进session，以备后续使用.
					else{
						if (!session_id()) session_start();
						$_SESSION['username'] = $post_username;
						$_SESSION['url'] = $url;
						//登陆成功，跳转到路由网管指定的页面.
						header("Location: http://".$gw_address.":".$gw_port."/wifidog/auth?token=".$token);
					}
				}
				else{
					//登录失败，显示错误信息.
					echo "<script language=\"JavaScript\">;alert(\"认证失败\");</script>;";
					include("login_view.php");
				}
			}
		}
		else{
			include("login_view.php");
		}
	}
?>