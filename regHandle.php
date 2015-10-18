<?php

require("./sql.php");
session_start();

$mail = $_POST["email"];
$pw1 = $_POST["pw1"];
$pw2 = $_REQUEST["pw2"];

if (empty($mail)) {
	exit("请输入邮箱");
}

if (empty($pw1) || empty($pw2)) {
	exit("请输入密码");
}

if ($pw1 != $pw2) {
	exit("确认密码");
}

//查询数据库
$sql = new MySql();
$checkEmailResult = $sql->select("email", "user")->where("email", $mail)->query();
//$param = array('table'=>'user','where'=>"email");

if ($checkEmailResult) {
	exit("邮箱重复");
}else{
	
	$insertInfoResult = $sql->insert('user', array('email'=>$mail, 'pwd'=>$pw1));
	//$sqlinsert = "insert into user (email, pwd) values('".$mail."','".$pw1."')";
	
	if (!$insertInfoResult) {
		exit("注册失败");
	}else{
		
		//重新录入session
		$_SESSION['email'] = $mail;
		$_SESSION['uid'] = mysql_insert_id();

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

?>