<!DOCTYPE html>
<html>
<head>
    <title>home</title>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap-datetimepicker.min.css">
    <script src="./lib/jquery-2.0.1.min.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="./lib/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    <script src="./lib/bootstrap/js/bootstrap-datetimepicker.zh-CN.js"></script>
    <style>
      .main-message{ padding: 30px 15px 5px 15px;}
      .control-label{ line-height: 34px;}
      iframe{ border: none;}
      .kbn-timepicker-section{
        float: left;
        margin-right: 40px;
      }
      
      .nav >.active:focus>a,
      .nav >.active:hover>a,
      .nav >.active>a {
          padding-left: 18px;
          font-weight: 700;
          color: #563d7c;
          background-color: transparent;
          border-left: 2px solid #563d7c;
      }
      
      .sidenav>li>a {
          display: block;
          padding: 4px 20px;
          font-size: 13px;
          font-weight: 500;
          color: #767676;
      }
      
      .sidenav .nav>li>a {
          padding-top: 1px;
          padding-bottom: 1px;
          padding-left: 30px;
          font-size: 12px;
          font-weight: 400;
      }
      
      .sidenav .nav {
          padding-bottom: 10px;
      }
      
      .sidenav .nav>.active:focus>a,
      .sidenav .nav>.active:hover>a,
      .sidenav .nav>.active>a {
          padding-left: 28px;
          font-weight: 500;
      }
    </style>
</head>
<body>
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
          <ul class="nav sidenav">
            <li>
              <a href="#">用户数据统计</a>
              <ul class="nav">
                <?php foreach ($categoryResult as $value) { ?>
                  <?php if($value['type'] == 0){?>
                    <li class="<?php if($cid == $value['id']){echo "active";} ?>">
                      <a href="/?cid=<?php echo $value['id'];?>">
                        <?php echo htmlspecialchars($value['category']); ?>
                      </a>
                    </li>
                  <?php } ?>
                <?php } ?>
              </ul>
            </li>
            <li>
              <a href="#">主播数据统计</a>
              <ul class="nav">
                <?php foreach ($categoryResult as $value) { ?>
                  <?php if($value['type'] == 1){?>
                  <li class="<?php if($cid == $value['id']){echo "active";} ?>">
                    <a href="/?cid=<?php echo $value['id'];?>">
                      <?php echo htmlspecialchars($value['category']); ?>
                    </a>
                  </li>
                  <?php } ?>
                <?php }?>
              </ul>
            </li>
          </ul>
        </div>

        <div class="col-md-9">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="container-fluid">
              <form class="form-inline">
                  <div class="kbn-timepicker-section">
                    <label>From:</label>
                    </br>
                    <div class="form-group">
                      <div class="input-group date form_date" data-date="" data-link-field="startDate" data-link-format="yyyy-mm-dd" id="startTime">
                        <input class="form-control" size="16" type="text" value="">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                      <input type="hidden" id="startDate" value="" /><br/>
                    </div>
                  </div>
    
                  <div class="kbn-timepicker-section">
                      <label>
                        To: 
                      </label>
                      </br>
                      <div class="input-group date form_date" data-date="" data-link-field="endDate" data-link-format="yyyy-mm-dd" id="endTime">
                        <input class="form-control" size="16" type="text" value="">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                      <button type="button" class="btn btn-primary kbn-timepicker-go" id="chartFresh">Go</button>
                      <input type="hidden" id="endDate" value="" /><br/>
                  </div>
              </form>
              </div>
    
    <!--             <div on="mode" class="container-fluid">
                  <div class="ng-scope">
                    <form role="form" class="form-inline ng-pristine ng-valid" name="relativeTime">
                      <div class="kbn-timepicker-section">
                        <label>From:<span>The time you set</span></label>
                        <br>
                        <div class="form-group">
                          <input required="" greater-than="-1" type="number" class="form-control ng-pristine ng-valid ng-untouched ng-valid-greater-than ng-valid-number ng-valid-required">
                        </div>
                        <div class="form-group">
                          <select class="form-control col-xs-2 ng-pristine ng-valid ng-untouched">
                            <option value="0" label="Seconds ago">Seconds ago</option>
                            <option value="1" label="Minutes ago">Minutes ago</option>
                            <option value="2" label="Hours ago">Hours ago</option>
                            <option value="3" label="Days ago">Days ago</option>
                            <option value="4" selected="selected" label="Weeks ago">Weeks ago</option>
                            <option value="5" label="Months ago">Months ago</option>
                            <option value="6" label="Years ago">Years ago</option>
                          </select>
                        </div>
                      </div>
    
                      <div class="kbn-timepicker-section">
                        <label>
                          To: Now
                        </label>
                        <br>
                        <div class="form-group">
                          <input type="text" disabled="" class="form-control" value="Now">
                          <button type="submit" class="btn btn-primary kbn-timepicker-go" ng-disabled="!relative.preview">Go</button>
                        </div>
                      </div>
    
                    </form>
                  </div>
                </div> -->
    
                <div class="form-group main-message">
                    <iframe src="" height="500" width="100%" border="0" id="chart" name="chart"></iframe>
                </div>
            </div>
          </div>
        </div>
        
  </div>
  <div style="width:0px; height:0px; overflow:hidden;" id="con">
    <?php foreach ($categoryResult as $value) { ?>
      <?php if($value['id'] == $cid){ ?>
        <?php echo $value['iframesrc'] ?>
      <?php } ?>
    <?php } ?>
    
  </div>
</body>
</html>
<script type="text/javascript">
    //var url = "http://elkdb.ops.org/#/visualize/edit/%E6%96%B0%E7%94%A8%E6%88%B7%E4%B8%83%E6%97%A5%E7%95%99%E5%AD%98%E7%8E%87%E7%BB%9F%E8%AE%A1?_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:'2015-10-01T02:53:30.324Z',mode:absolute,to:'2015-10-14T05:23:38.855Z'))&_a=(filters:!(),linked:!t,query:(query_string:(query:'*')),vis:(aggs:!((id:'1',params:(field:%E6%96%B0%E7%94%A8%E6%88%B7%E7%95%99%E5%AD%98%E7%8E%87),schema:metric,type:sum),(id:'2',params:(customInterval:'2h',extended_bounds:(),field:'@timestamp',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!t,shareYAxis:!t,times:!(),yAxis:(max:1,min:0)),type:histogram))";
    
    <?php foreach ($categoryResult as $value) { ?>
      <?php if($value['id'] == $cid){ ?>
    var url = $("#con").find("iframe").attr("src");
      <?php } ?>
    <?php } ?>

    var dateStart = "";
    var dateEnd = "";

    var urlArr = url.split("______");
    var url1 = urlArr[0];
    var url2 = urlArr[1];
    var url3 = urlArr[2];
    
    //var url1 = "http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E6%95%B4%E7%AB%99%E6%94%B6%E5%85%A5%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:'";
    //var url2 = "',mode:quick,to:'";
    //var url3 = "'))&_a=(filters:!(),linked:!t,query:(query_string:(query:'*')),vis:(aggs:!((id:'1',params:(field:%E6%94%B6%E5%85%A5%EF%BC%88%E5%85%83%EF%BC%89),schema:metric,type:sum),(id:'2',params:(customInterval:'2h',extended_bounds:(),field:'@timestamp',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))";
    
    //日期选择
  	$('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
    		autoclose: 1,
    		todayHighlight: 1,
    		startView: 2,
    		minView: 2,
    		forceParse: 0,
        format: "yyyy-mm-dd"
    })
    .on('changeDate', function(ev){
        var target = ev.target.id;
        var dateValue = $(ev.target).find('.form-control').val();

        if (target == "startTime") {
          dateStart = dateValue;
          url = url1 + dateStart + url2 + dateEnd + url3;
        }else{
          dateEnd = dateValue;
          url = url1 + dateStart + url2 + dateEnd + url3;
        };
        
    });
    
    $("#chartFresh").on("click", function(){

      if (dateStart == "") {
        alert("请填写开始日期");
        return;
      };

      if (dateEnd == "") {
        alert("请选择结束日期");
        return;
      };

      $("#chart").attr("src", url);

    });

</script>
