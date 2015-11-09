<?php

class LoginController
{
	
	function index()
	{
		session_start();
		
		if($_SESSION){
			header("Location: /");
		}

		//require出现错误继续执行
		include __APP__.'View/Front/login.php';

	}

	//执行登录操作
	function handle()
	{
		
		session_start();
		//require出现错误则断掉
		require __CORE__."Model.php";

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
		$sqlResult = $sql->select("uid, groupid, email", "user")
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
		
		if ($sqlResult) {
			
			//获取session状态
			$_SESSION["email"] = $email;
			$_SESSION["uid"] = $sqlResult[0]["uid"];
			$_SESSION["gid"] = $sqlResult[0]["groupid"];
			
			// var_dump($sqlResult); exit;
			
			echo "登录成功";
			
			header("Location: /");
			
		}else{
			exit("登录失败");
		}

	}


	function out()
	{
		session_start();
		session_destroy();
		header("Location: /login");
	}

}

?>
