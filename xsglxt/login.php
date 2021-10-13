<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login.php</title>
</head>

<body>
<?php
include("connect.php");
$username=$_POST['username'];
$password=$_POST['password'];
$sql="select userid from user where username='$username'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)<=0)
{
	echo "<script>alert(\"该用户不存在\");</script>";
	echo "<script>url=\"login.html\";window.location.href=url;</script>";}
$sql="select userid from user where username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	echo "<script>url=\"index.php\";window.location.href=url;</script>";}
	else{
	echo "<script>alert(\"用户名或密码错误\");</script>";
	echo "<script>url=\"login.html\";window.location.href=url;</script>";}
mysqli_close($conn);
?>
<?php
session_start();
include("connect.php");
$username=$_POST['username'];
$password=$_POST['password'];
$sql="select userid from user where username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
$_SESSION['username']=$username;
	echo "<script>url=\"index.php\",window.location.href=url;</script>";}
	else{
		echo "<script>alert(\"用户名或密码错误\");</script>";
		echo "<script>url=\"login.html\";window.location.href=url;</script>";}
		mysqli_close($conn);
?>
</body>

</html>