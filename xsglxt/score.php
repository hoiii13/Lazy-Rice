<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>score.php</title>
</head>

<body>
<?php
session_start();
?>
<?php
include("connect.php");
$name=$_POST['XM'];
$kcm=$_POST['KCM'];
$score=$_POST['CJ'];
if(isset($_POST['录入']))
{
	if(!strlen($name))
	{
		echo "<script>alert(\"姓名处不能为空\");</script>";
		exit();}
	$sql="select XM,KCM from cj where XM='$name' and KCM='$kcm'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result))
	{
		echo "<script>alert(\"该学生此课程成绩已录入\");</script>";
		exit();}
	$sql="insert into cj(XM,KCM,CJ) values('$name','$kcm','$score')";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		echo "<script>alert(\"录入成功\");</script>";
		$result=mysqli_query($conn,"select *from cj where XM='$name' and KCM='$kcm';");
		$row=mysqli_fetch_array($result);
		echo "<table border <tr><th>姓名</th><th>课程名</th><th>成绩</th></tr>";
			echo "<tr><th>".$row['XM']."</th>";
		    echo "<th width=80px>".$row['KCM']."</th>";
		    echo "<th width=60px>".$row['CJ']."</th></tr>";
		    echo "</table>";}
	else{
		echo "<script>alert(\"录入失败\");</script>";
		exit();}
}
if(isset($_POST['更新']))
{
	if(!strlen($name)||!strlen($kcm)||!strlen($score))
	{
		echo "<script>alert(\"请填写完整信息\");</script>";
		exit();}
		$sql="select XM from cj where XM='$name'";
		$result=mysqli_query($conn,$sql);
		if(!mysqli_num_rows($result)){
			echo "<script>alert(\"该学生不存在\");</script>";
			exit();}
	$sql="update cj set CJ='$score' where XM='$name' and KCM='$kcm'";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		echo "<script>alert(\"更新成功\");</script>";
		$result=mysqli_query($conn,"select *from cj where XM='$name' and KCM='$kcm'");
		$row=mysqli_fetch_array($result);
		echo "<table border <tr><th>姓名</th><th>课程名</th><th>成绩</th></tr>";
			echo "<tr><th>".$row['XM']."</th>";
		    echo "<th width=80px>".$row['KCM']."</th>";
		    echo "<th width=40px>".$row['CJ']."</th></tr>";
		echo "</table>";
		}
	else
	{
		echo "<script>alert(\"更新失败\");</script>";
		exit();}
}
if(isset($_POST['查询']))
{
	if(strlen($name))
	{
		$sql="select *from cj where XM='$name'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result))
		{
			echo "<table border <tr><th>姓名</th><th>课程名</th><th>成绩</th></tr>";
			while($row=mysqli_fetch_array($result))
			{
			echo "<tr><th>".$row['XM']."</th>";
		    echo "<th width=80px>".$row['KCM']."</th>";
		    echo "<th width=60px>".$row['CJ']."</th></tr>";
			}
			echo "</table>";
			}
		else
		{
			echo "<script>alert(\"该学生不存在\");</script>";
			exit();}
	}
	else if(strlen($kcm))
	{
		$sql="select *from cj where KCM='$kcm'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result))
		{
			    echo "<table border <tr><th>姓名</th><th>课程名</th><th>成绩</th></tr>";
				while($row=mysqli_fetch_array($result))
				{
				echo "<tr><th>".$row['XM']."</th>";
		        echo "<th width=80px>".$row['KCM']."</th>";
		        echo "<th width=60px>".$row['CJ']."</th></tr>";}
				echo "</table>";}
		else
		{
			echo "<script>alert(\"该课程无学生选择\");</script>";
			exit();}
	}
}
if(isset($_POST['删除']))
{
	if(!strlen($name)&&!strlen($kcm))
	{
		echo "<script>alert(\"姓名不能为空或课程名不能为空\");</script>";
		exit();}
		$sql="select XM from cj where XM='$name' and KCM='$kcm'";
		$result=mysqli_query($conn,$sql);
		if(!$result)
		{
			echo "<script>alert(\"该学生不存在\");</script>";
			exit();}
	$sql="delete from cj where XM='$name' and KCM='$kcm'";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		echo "<script>alert(\"删除成功\");</script>";
		exit();}
	else
	{
		echo "<script>alert(\"删除失败\");</script>";
		exit();}
		}
mysqli_close($conn);
?>
</body>
</html>