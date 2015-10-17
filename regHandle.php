<?php

require("./sql.php");

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

mysqlConnect();

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