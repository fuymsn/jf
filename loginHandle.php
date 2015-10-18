<?php

require("./sql.php");
session_start();

//获取前台传入的email and pwd
$email = $_POST["email"];
$pwd = $_POST["pwd"];

if(empty($email)){
	exit("请输入邮箱");
}

if(empty($pwd)){
	exit("请输入密码");
}

//链接数据库
$sql = new MySql();
//$sqlConnection = mysqlConnect();

//$sqlResult = $sql->mysqlSelectQuery("uid,email", "user", "email='".$email."' and pwd='".$pwd."'", "1");
$sqlResult = $sql->select("uid,email", "user")
	->where("email", $email)
	->where("pwd", $pwd)
	->limit(1)
	->query();
//var_dump($sqlResult); exit;
//$sqlRead = "select uid,email from user where email='".$email."' and pwd='".$pwd."' limit 1";
//$resRead = mysql_query($sqlRead);

//var_dump(mysql_fetch_array($resRead));
//mysql_fetch_array() 每次执行指针会指向下一条数据
//mysql_fetch_array($resRead)
//$param = array('table'=>'user','where'=>"email");
//var_dump($sqlResult); exit();

if ($sqlResult) {

	//获取session状态
	$_SESSION["email"] = $email;
	$_SESSION["uid"] = $sqlResult["uid"];
	
	echo "登录成功";
	
	header("Location: /jf/index.php");
}else{
	exit("登录失败");
}

?>