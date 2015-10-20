<?php
    require("./state.php");
    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>backend</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <script src="lib/jquery-2.0.1.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <style>
      .main-message{ padding: 30px 15px 5px 15px;}
      .control-label{ line-height: 34px;}
      iframe{ border: none;}
      .kbn-timepicker-section{
        float: left;
        margin-right: 40px;
      }
    </style>
</head>
<body>
  <div class="container">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">金分</a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $_SESSION["email"] ?></a></li>
            <li><a href="./loginout.php">退出</a></li>
          </ul>
        </div>
      </nav>
    <div class="row">
        <div class="col-md-3">
          <ul class="list-group">
            <li class="list-group-item">添加类别</li>
          </ul>
        </div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-body">
			<table>
				
			</table>
			<form>
				<div class="form-group">
					<label for="category">类别</label>
					<input type="text" class="form-control" id="category" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="iframesrc">iframe 链接</label>
					<textarea class="form-control" id="iframesrc" placeholder="iframe src"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">提交</button>
			</form>
            </div>
          </div>
        </div>
    </div>
  </div>
</body>
</html>