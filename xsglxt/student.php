<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>student.php</title>
</head>

<body>
<?php
session_start();
?>
<?php
include("connect.php");
$name=$_POST['XM'];
$xb=$_POST['XB'];
$birthday=$_POST['CSSJ'];
$kcs=$_POST['KCS'];
if(isset($_POST['录入']))
{
	if(!strlen($name))
	{
		echo "<script>alert(\"姓名不能为空\");</script>";
		exit();}
		$sql="select XM from student where XM='$name'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result))
	{
		echo "<script>alert(\"该学生已存在\");</script>";
		exit();}
	$sql="insert into student(XM,XB,CSSJ,KCS) values('$name','$xb','$birthday','$kcs')";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		echo "<script>alert(\"录入成功\");</script>";
		$result=mysqli_query($conn,"select *from student where XM='$name';");
		$row=mysqli_fetch_array($result);
		echo "<table border <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
		echo "<tr><th>".$row['XM']."</th>";
		echo "<th width=40px>";
		if($row['XB']==1) echo "男";
		else echo "女";
		echo "</th>";
		echo "<th width=120px>".$row['CSSJ']."</th>";
		echo "<th width=60px>".$row['KCS']."</th></tr>";
		echo "</table>";}
	else{
		echo "<script>alert(\"录入失败\");</script>";
		exit();}
}
if(isset($_POST['查询']))
{
	if(!strlen($name)&&!strlen($xb)&&!strlen($kcs)){
		$sql="select *from student";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result))
		{
			echo "<table border <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
			while($row = mysqli_fetch_array($result))
				{
			echo "<tr><th>".$row['XM']."</th>";
		    echo "<th width=40px>";
		    if($row['XB']==1) echo "男";
		    else echo "女";
		    echo "</th>";
		    echo "<th width=120px>".$row['CSSJ']."</th>";
		    echo "<th width=60px>".$row['KCS']."</th></tr>";}}
		else
		{
			echo "<script>alert(\"无学生\");</script>";
			exit();}
	}
	if(strlen($name))
	{
		$sql="select *from student where XM='$name'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result))
		{
			$result=mysqli_query($conn,"select *from student where XM='$name'");
			$row=mysqli_fetch_array($result);
			echo "<table border <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
			echo "<tr><th>".$row['XM']."</th>";
		    echo "<th width=40px>";
		    if($row['XB']==1) echo "男";
		    else echo "女";
		    echo "</th>";
		    echo "<th width=120px>".$row['CSSJ']."</th>";
		    echo "<th width=60px>".$row['KCS']."</th></tr>";
		    echo "</table>";}
		else
		{
			echo "<script>alert(\"该学生不存在\");</script>";
			exit();}
	}
	else if(strlen($xb))
	{
		$sql="select *from student where XB='$xb'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result))
		{
			echo "<table border <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
			while($row = mysqli_fetch_array($result))
				{
			echo "<tr><th>".$row['XM']."</th>";
		    echo "<th width=40px>";
		    if($row['XB']==1) echo "男";
		    else echo "女";
		    echo "</th>";
		    echo "<th width=120px>".$row['CSSJ']."</th>";
		    echo "<th width=60px>".$row['KCS']."</th></tr>";
		}
		echo "</table>";}
		else
		{
			echo "<script>alert(\"查询无数据\");</script>";
			exit();}
	}
	else if(strlen($kcs))
	{
		$sql="select *from student where KCS='$kcs'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result))
		{
			echo "<table border <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
			while($row = mysqli_fetch_array($result))
				{
			echo "<tr><th>".$row['XM']."</th>";
		    echo "<th width=40px>";
		    if($row['XB']==1) echo "男";
		    else echo "女";
		    echo "</th>";
		    echo "<th width=120px>".$row['CSSJ']."</th>";
		    echo "<th width=60px>".$row['KCS']."</th></tr>";}
		    echo "</table>";
		}
		else
		{
			echo "<script>alert(\"查询无数据\");</script>";
			exit();}
	}
}
if(isset($_POST['删除']))
	{
		if(!strlen($name))
		{
			echo "<script>alert(\"姓名不能为空\");</script>";
			exit();}
		$sql="select XM from student where XM='$name'";
		$result=mysqli_query($conn,$sql);
		if(!mysqli_num_rows($result))
		{
			echo "<script>alert(\"该学生不存在\");</script>";
			exit();}
		$sql="delete from student where XM='$name'";
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
if(isset($_POST['更新']))
{
	if(!strlen($name)||!strlen($xb)||!strlen($birthday)||!strlen($kcs))
	{
		echo "<script>alert(\"请把信息填写完整\");</script>";
		exit();}
	$sql="select XM from student where XM='$name'";
	$result=mysqli_query($conn,$sql);
	if(!mysqli_num_rows($result))
	{
		echo "<script>alert(\"该学生不存在\");</script>";
		exit();}
		$sql="update student set XB='$xb',CSSJ='$birthday',KCS='$kcs' where XM='$name'";
		$result=mysqli_query($conn,$sql);
	if($result)
	{
		echo "<script>alert(\"更新成功\");</script>";
		$result=mysqli_query($conn,"select *from student where XM='$name'");
		$row=mysqli_fetch_array($result);
		echo "<table border <tr><th>姓名</th><th>性别</th><th>出生日期</th><th>已修课程数</th></tr>";
		echo "<tr><th>".$row['XM']."</th>";
		    echo "<th width=40px>";
		    if($row['XB']==1) echo "男";
		    else echo "女";
		    echo "</th>";
		    echo "<th width=120px>".$row['CSSJ']."</th>";
		    echo "<th width=60px>".$row['KCS']."</th></tr>";
		    echo "</table>";}
	else
	{
		echo "<script>alert(\"更新失败\");</script>";
		exit();}
}
mysqli_close($conn);
?>
</body>
</html>