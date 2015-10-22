<?php
    require("../core/state.php");
    require("../model/sql.php");

    $sql = new MySql();

    $result = $sql->select("id, category, iframesrc", "category")->query();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>backend</title>
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <script src="../lib/jquery-2.0.1.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <style>
      .table .table-ifrsrc{
        overflow: hidden;
        text-overflow: ellipsis;
        /* width: 500px; */
        word-break: break-all;
        white-space: nowrap;
        width: 60%;
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
            <li class="list-group-item"><a href="./category.php">添加类别</a></li>
          </ul>
        </div>
        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-body">

      			<table class="table table-striped">
              <?php $index = 0 ?>
              <?php foreach ($result as $value) {?>
      				<tr>
                <td><?php echo ++$index ?></td>
                <td><?php echo $value['category']?></td>
                <td class="table-ifrsrc" title="<?php echo htmlspecialchars($value['iframesrc']); ?>"><div style="width: 450px"><?php echo htmlspecialchars($value['iframesrc']); ?></div></td>
                <td><button type="submit" class="btn btn-primary btn-xs">删除</button></td>
              </tr>
              <?php }?>
      			</table>

      			<form action="./cateHandle.php" method="POST">
      				<div class="form-group">
      					<label for="category">类别</label>
      					<input type="text" class="form-control" name="category" id="category" placeholder="category">
      				</div>
      				<div class="form-group">
      					<label for="iframesrc">iframe 链接</label>
      					<textarea class="form-control" name="iframesrc" id="iframesrc" placeholder="iframe src"></textarea>
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