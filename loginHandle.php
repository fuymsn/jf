<?php

require("./sql.php");
require("./state.php");

//获取前台传入的email and pwd
$email = $_POST["email"];
$pwd = $_POST["pwd"];

if(empty($email)){
	die("请输入邮箱");
}

if(empty($pwd)){
	die("请输入密码");
}

//链接数据库
$connection = mysqlConnect();

$sqlRead = "select uid,email from user where email='".$email."' and pwd='".$pwd."' limit 1";
$resRead = mysql_query($sqlRead);

//var_dump(mysql_fetch_array($resRead));
//mysql_fetch_array() 每次执行指针会指向下一条数据
//mysql_fetch_array($resRead)

if ($arr = mysql_fetch_array($resRead)) {
	
	//获取session状态
	$_SESSION["email"] = $email;
	$_SESSION["uid"] = $arr["uid"];
	
	echo "登录成功";
	
	header("Location: /jf/index.php");
}else{
	echo "登录失败";
}

mysql_close($connection);

?>