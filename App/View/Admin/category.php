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
        width: 300px;
      }
      
      .table .table-btnbox{
        width:100px;
      }
      
      #updateModal textarea{
        height: 200px;
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
              <td class="table-title"><?php echo htmlspecialchars($value['category']); ?></td>
              <td><?php echo $value['type'] ?></td>
              <td class="table-ifrsrc" title="<?php echo htmlspecialchars($value['iframesrc']); ?>"><div><?php echo htmlspecialchars($value['iframesrc']); ?></div></td>
              <td class="table-btnbox">
                <a class="btn btn-primary btn-xs J-btn-update" data-toggle="modal" data-target="#updateModal" data-category="<?php echo htmlspecialchars($value['category']); ?>" data-iframesrc="<?php echo htmlspecialchars($value['iframesrc']); ?>" data-id="<?php echo $value['id']?>">修改</a>
                <a href="/admin/delete?cid=<?php echo $value['id']?>&type=<?php echo $_GET["type"]?>" class="btn btn-primary btn-xs">删除</a>
              </td>
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

<!-- 弹窗 -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">修改</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="modalCategory" class="control-label">图表名称:</label>
            <input type="text" class="form-control" id="modalCategory">
          </div>
          <div class="form-group">
            <label for="modalIframesrc" class="control-label">图表链接:</label>
            <textarea class="form-control" id="modalIframesrc"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" id="categoryUpdate">保存</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
  $('#updateModal').on('show.bs.modal', function (event) {
    var $button = $(event.relatedTarget);
    
    var category = $button.data('category');
    var iframesrc = $button.data('iframesrc');
    var id = $button.data("id");
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var $modal = $(this);
    $modal.find('.modal-title').text('修改：' + category);
    $modal.find('.modal-body input').val(category);
    $modal.find('.modal-body textarea').val(iframesrc);
    $modal.find('#categoryUpdate').attr("data-id", id);
  });
  
  $("#categoryUpdate").on("click", function(){
    //console.log("say hi");
    $.ajax({
      url: "/admin/update",
      data: {
        category: $("#modalCategory").val(),
        iframesrc: $("#modalIframesrc").val(),
        id: $("#categoryUpdate").data("id")
      },
      dataType: "json",
      type: "get",
      success: function(json){
        if(!json.code){
          alert(json.msg);
          location.reload();
        }else{
          alert(json.msg);
        }
      },
      error: function(){
        alert("更新失败");
      }
    });
    
  });
  
  
});

</script>
</body>
</html>