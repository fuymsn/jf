<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
	<style>
		#regForm{
			width: 300px;
			margin: 30px auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="regHandle.php" method="POST" id="regForm">
				<h1>注册</h1>
				<div class="form-group">
					<label for="email">Email</label>
					<input name="email" type="email" class="form-control" id="email" placeholder="注册邮箱">
				</div>
				<div class="form-group">
					<label for="pw1">Password</label>
					<input name="pw1" type="password" class="form-control" id="pw1" placeholder="请输入密码">
				</div>
				<div class="form-group">
					<input name="pw2" type="password" class="form-control" id="pw2" placeholder="请再次输入密码">
				</div>
				<button type="submit" class="btn btn-primary btn-block">注册</button>
				<br/>
				<a href="/jf/login.php">-->登录</a>
			</form>
		</div>
	</div>
</body>
</html>

</body>
</html>