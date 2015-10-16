<html>
<head>
	<title>login</title>

</head>
<body>
	<h1>修改密码</h1>
	<form action="" method="POST">
		<label>原密码</label>
		<input name="opwd" type="password" />

		<label>新密码</label>
		<input name="pwd1" type="password" />

		<label>重新输入密码</label>
		<input name="pwd2" type="password" />

		<input type="submit" /> 
	</form>

	<?php

		session_start();

		$userid = $_SESSION["uid"];

		var_dump($_POST);


		if(!empty($_POST))
		{
			$opwd = $_POST["opwd"];
			$pwd1 = $_POST["pwd1"];
			$pwd2 = $_POST["pwd2"];

			$con = mysql_connect("10.1.10.145:3366", "halin", "123456");

			if (!$con) {
				die("链接不成功");
			}

			mysql_select_db("younglogin", $con);

			$sqlupdate = "update user set pwd='".$pwd1."' where uid='".$userid."'";

			$res = mysql_query($sqlupdate);

			if ($res) {
				echo "更新成功";
			}else{
				echo "更新失败";
			}

			mysql_close($con);

		}
		
	?>

</body>
</html>