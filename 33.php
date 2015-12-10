<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<title>Portal Login</title>
</head>
<body>
	<form method="post" action="<?php echo "login.php?gw_address=$gw_address&gw_port=$gw_port&gw_id=$gw_id&mac=$mac&url=$url"; ?>">
		<label for="username">Username</label>
		<input type="text" id="username" name="username" value="<?php echo $post_username; ?>"/>
		<label for="password">Password</label>
		<input type="password" id="password" name="password" value="<?php echo $post_password; ?>"/>
		<?php
			if(!empty($error_message)){
				echo "<h4>$error_message</h4>";
			}
		?>
		<input type="submit" value="Submit"/>
	</form>
</body>