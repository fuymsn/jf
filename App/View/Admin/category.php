<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>backend</title>
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
    <script src="./lib/jquery-2.0.1.min.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
    <style>
      .list-group-item.active a{
        color: #fff;
      }
      .table .table-ifrsrc{
        overflow: hidden;
        text-overflow: ellipsis;
        word-break: break-all;
        white-space: nowrap;
        width: 40%;
      }
      
      .table .table-ifrsrc div{
        overflow: hidden;
        text-overflow: ellipsis;
        word-break: break-all;
        white-space: nowrap;
        width: 450px;
      }
    </style>
</head>
<body>
    <?php $_GET['type'] = isset($_GET['type']) ? $_GET['type'] : 1 ?>
    <nav class="navbar navbar-static-top navbar-default" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">V项目数据统计</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $_SESSION["email"] ?></a></li>
        <li><a href="/login/out">退出</a></li>
      </ul>
    </div>
  </nav>
  <div class="">


    <div class="col-md-3">
      <ul class="list-group">

        <li class="list-group-item <?php echo ($_GET['type'] == 1) ? 'active': '' ?>"><a href="/admin?type=1">主播数据</a></li>
        <li class="list-group-item <?php echo ($_GET['type'] == 0) ? 'active': '' ?>"><a href="/admin?type=0">用户数据</a></li>
      </ul>
    </div>
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-body">

        <table class="table table-striped">
          <tr>
            <th>No.</th>
            <th>图表名称</th>
            <th>类型</th>
            <th>图表链接</th>
            <th>操作</th>
          </tr>
          <?php $index = 0 ?>
          <?php foreach ($result as $value) {?>
            <?php if( $value['type'] == $_GET['type']){ ?>
            <tr>
              <td><?php echo ++$index ?></td>
              <td><?php echo htmlspecialchars($value['category']); ?></td>
              <td><?php echo $value['type'] ?></td>
              <td class="table-ifrsrc" title="<?php echo htmlspecialchars($value['iframesrc']); ?>"><div style="width: 450px"><?php echo htmlspecialchars($value['iframesrc']); ?></div></td>
              <td><a href="/admin/delete?cid=<?php echo $value['id']?>&type=<?php echo $_GET["type"]?>" class="btn btn-primary btn-xs">删除</a></td>
            </tr>
            <?php } ?>
          <?php }?>
        </table>
        <div class="panel panel-default well well-sm">
          <div class="panel-body">
            <form action="/admin/add" method="POST">
              <h3>添加新数据</h3>
              
              <div class="form-group">
                <label for="category">图表名称</label>
                <input type="text" class="form-control" name="category" id="category" placeholder="category">
                <input type="hidden" name="type" value="<?php echo $_GET['type'] ?>" />
              </div>
    
              <div class="form-group">
                <label for="iframesrc">图表链接</label>
                <textarea class="form-control" name="iframesrc" id="iframesrc" placeholder="iframe src"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">提交</button>
            </form>
           </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>
</html>