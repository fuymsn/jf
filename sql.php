<?php

//链接数据库
function mysqlConnect()
{
	//1 首先链接数据
	$con = mysql_connect("127.0.0.1:3306", "root", "");
	
	if (!$con) {
		die("链接不成功");
	}
	
	// 2 选择要操作的数据
	mysql_select_db("younglogin", $con);
	
	// 3 执行要做得sql 
	// $res = mysql_query($sqlinsert);

	// if (!$res) {
	// 	echo "can not insert";
	// }else{
	// 	echo "注册成功";
	// }
	// 4 close connection
	// mysql_close($con);
	return $con;
}

?>