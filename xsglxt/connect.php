<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>连接数据库</title>
</head>

<body>
<?php
$conn=mysqli_connect("localhost","root","3256137");
if(!$conn){
	die("无法连接到mysql数据库:".mysqli_error($conn));}
mysqli_select_db($conn,'xs');
mysqli_set_charset($conn,"utf8");
?>
</body>
</html>