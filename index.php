<?php
    require("./state.php");
    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>page</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap-datetimepicker.min.css">
    <script src="lib/jquery-2.0.1.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap-datetimepicker.zh-CN.js"></script>
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
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">金分</a>
      </div>
    </div>
  </nav>
  <section>
    <div class="col-md-3">
      <ul class="list-group">
         <li class="list-group-item">1</li>
         <li class="list-group-item">2</li>
         <li class="list-group-item">3</li>
         <li class="list-group-item">4</li>
         <li class="list-group-item">5</li>
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
                <iframe src="" height="600" width="100%" border="0" id="chart" name="chart"></iframe>
            </div>
         </div>
      </div>
    </div>
  </section>
</body>
</html>
<script type="text/javascript">
    
    var url = "";
    var dateStart = "";
    var dateEnd = "";

    var url1 = "http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E6%95%B4%E7%AB%99%E6%94%B6%E5%85%A5%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:'";
    var url2 = "',mode:quick,to:'";
    var url3 = "'))&_a=(filters:!(),linked:!t,query:(query_string:(query:'*')),vis:(aggs:!((id:'1',params:(field:%E6%94%B6%E5%85%A5%EF%BC%88%E5%85%83%EF%BC%89),schema:metric,type:sum),(id:'2',params:(customInterval:'2h',extended_bounds:(),field:'@timestamp',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))";
    
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
