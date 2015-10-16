<?php

$mail = $_POST["email"];
$pw1 = $_POST["pw1"];
$pw2 = $_REQUEST["pw2"];

if (empty($mail)) {
	die("pls print email");
}

if (empty($pw1) || empty($pw2)) {
	die("pls print pwd");
}

if ($pw1 != $pw2) {
	die("pwd is not the same");
}

//1 首先链接数据
$con = mysql_connect("10.1.10.145:3366", "halin", "123456");

if (!$con) {
	die("链接不成功");
}
// 2 选择要操作的数据
mysql_select_db("younglogin", $con);

$sqlread = "select email from user where email='".$mail."'";
$resRead = mysql_query($sqlread);

if (mysql_fetch_array($resRead)) {
	die("邮箱重复");
}else{
	// 3 执行要做得sql 
	$sqlinsert = "insert into user (email, pwd) values('".$mail."','".$pw1."')";

	$res = mysql_query($sqlinsert);

	if (!$res) {
		echo "can not insert";
		# code...
	}else{
		echo "注册成功";
	}

}

//$arr = array();

// while ($row = mysql_fetch_array($resRead)) {
// 	echo "<br/>";
// 	$arr[] = $row;
// }

//var_dump($arr);
// 4 close connection
mysql_close($con);

?>