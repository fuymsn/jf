<?php
	session_start();
	
	if($_SESSION){
		header("Location: /jf/index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
	<style>
		#loginForm{
			width: 300px;
			margin: 30px auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="loginHandle.php" method="POST" id="loginForm">
				<h1>登录</h1>
				<div class="form-group">
					<label for="exampleInputEmail1">Email</label>
					<input name="email" type="email" class="form-control" id="email" placeholder="邮箱">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input name="pwd" type="password" class="form-control" id="pwd" placeholder="密码">
				</div>
				<button type="submit" class="btn btn-primary btn-block">登录</button>
				<br/>
				<a href="/jf/reg.php">-->注册</a>
			</form>
		</div>
	</div>
</body>
</html>