<?php

	session_start();

$email = $_POST["email"];
$pwd = $_POST["pwd"];

$con = mysql_connect("127.0.0.1:3306", "root", "");

if (!$con) {
	die("链接不成功");
}

mysql_select_db("younglogin", $con);

$sqlread = "select uid,email from user where email='".$email."' and pwd='".$pwd."' limit 1";

$resRead = mysql_query($sqlread);

//var_dump(mysql_fetch_array($resRead));

//mysql_fetch_array() 每次执行指针会指向下一条数据
//mysql_fetch_array($resRead)

if ($arr = mysql_fetch_array($resRead)) {

	$_SESSION["email"] = $email;
	$_SESSION["uid"] = $arr["uid"];

	echo "登录成功";
	header("Location: /jf/index.php");
}else{
	echo "登录失败";
}

mysql_close($con);

?>