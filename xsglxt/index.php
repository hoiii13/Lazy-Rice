<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统主页</title>
<style type="text/css">
nav{
	background-color: #CCE8F4;
	height: 650px;
	width: 1260px;
}
.div1{
	background-color: #CCE8F4;
	display: inline;
	width: 10px;
	font-family: "华文隶书";
	color: #000;
	font-size: 18px;
}
.span1{
	background-color: #FFF;
	display: inline-block;
	width: 240px;
	height: 380px;
	border: 3px inset #CCF;
	border-radius: 15px;
	text-align:center;
	color:#333;
	float:left;
}
#d1{
	background-color:#6CF;
	height: 85px;
	font-family: "华文隶书";
	color: #969;
	font-size: 26px;
	text-align: center;
	border: 3px inset #CCF;
	border-radius: 15px;
}
#d2{
	background-color: #6CF;
	height: 100px;
	font-family: "华文隶书";
	color: #969;
	font-size: 15px;
	text-align:center;
	}
#d3{
	background-color:#FFF;
	width:350px;
	height:440px;
	text-align:left;}
.d4{
	color:#FFF;}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
</head>

<body>
<nav>
<div id="d1">
学生管理系统<br />
Welcome to the xs system</div>
<table width="160" border="1" align="right" height="35" bordercolor="#FFFFFF">
  <tr>
    <td>
    <div class="div1">
<?php
session_start();
if(isset($_SESSION['username'])){
	echo "当前用户:".$_SESSION['username'];
	echo "<hr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"destroy_session.php\">注销</a>";}
else{
		echo "<a href=\"login.html\">前往登录</a>||";
		echo "<a href=\"register.html\">注册</a>";}?>&nbsp;&nbsp;</div></td>
  </tr>
</table>
<br /><br /><br />
<span class="span1"><br /><br /><br /><br /><table width="140" border="1" align="center" background="file:///D|/Users/lenovo/Documents/2020年大一下期期末/19软2班82杨多思（数据库）/xs/4.png">
  <tr>
    <td><a href="student.html"><font color="#000000"><b>学生管理</b></font></a></td>
  </tr>
</table>
<br /><br /><table width="140" border="1" align="center" background="file:///D|/Users/lenovo/Documents/2020年大一下期期末/19软2班82杨多思（数据库）/xs/4.png">
  <tr>
    <td><a href="score.html"><font color="#000000"><b>成绩管理</b></font></a></td>
  </tr>
</table>
<br />
</span>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<div id="d2">
<br />&nbsp;&nbsp;&nbsp;&nbsp;系别：软件工程&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;班级：19级软件工程2班&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;姓名：杨多思
<br />&nbsp;&nbsp;&nbsp;&nbsp;QQ：1068637453&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮箱：1068637453@qq.com</div>
</nav>
<br />


</nav>
</body>
</html>