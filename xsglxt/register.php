<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>register.php</title>
</head>

<body>
<?php
$username=$_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
if($password!=$repassword){
	echo "<script>alert(\"两次密码不一致\");</script>";
	echo "<script>url=\"register.html\";window.location.href=url;</script>";
	exit();}
include("connect.php");
$sql="select userid from user where username='$username'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	echo "<script>alert(\"该用户已被注册\");</script>";
    echo "<script>url=\"register.html\";window.location.href=url;</script>";
	exit();}
$sql="insert into user values(null,'$username','$password')";
$result=mysqli_query($conn,$sql);
if($result){
	echo "<script>alert(\"注册成功,登录\");</script>";
	echo "<script>url=\"login.html\";window.location.href=url;</script>";}
else{
	die("Error: ".mysqli_error($conn));}
mysqli_close($conn);
?>
</body>
</html>