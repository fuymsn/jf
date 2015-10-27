<?php

class RegisterController extends BaseController
{
	function index()
	{
		include __APP__."/View/Front/register.php";
	}

	function handle(){

		require __CORE__."Model.php";
		session_start();

		$mail = $_POST["email"];
		$pw1 = $_REQUEST["pw1"];
		
		//$_REQUEST 包含了 $_GET，$_POST 和 $_COOKIE 的数组。
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

				header('Location: /');
				//echo "注册成功";
			}

		}

	}
}

?>