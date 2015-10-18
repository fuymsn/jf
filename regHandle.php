<?php

require("./sql.php");
require("./state.php");

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

$connection = mysqlConnect();

$sqlread = "select email from user where email='".$mail."'";
$resRead = mysql_query($sqlread);

if ($arr = mysql_fetch_array($resRead)) {
	die("邮箱重复");
}else{
	
	//var_dump($arr);
	// 3 执行要做得sql 
	$sqlinsert = "insert into user (email, pwd) values('".$mail."','".$pw1."')";
	
	//mysql_query 执行sql语句
	$res = mysql_query($sqlinsert);
	
	var_dump($res);
	if (!$res) {
		echo "can not insert";
	}else{
		
		//重新录入session
		$_SESSION['email'] = $mail;
		$_SESSION['uid'] = mysql_insert_id();

		//var_dump($_SESSION);
		header('Location: ./index.php');
		//echo "注册成功";
	}

}

//$arr = array();

// while ($row = mysql_fetch_array($resRead)) {
// 	echo "<br/>";
// 	$arr[] = $row;
// }

//var_dump($arr);
// 4 close connection
mysql_close($connection);

?>