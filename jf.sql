-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2015 at 03:56 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `younglogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '图表类型，0用户，1主播',
  `category` varchar(255) NOT NULL,
  `iframesrc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='添加金分类别';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `type`, `category`, `iframesrc`) VALUES
(25, 0, '每日注册用户数统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E6%B3%A8%E5%86%8C%E7%94%A8%E6%88%B7%E6%95%B0%E7%BB%9F%E8%AE%A1?embed&_g=()&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E6%B3%A8%E5%86%8C%E7%94%A8%E6%88%B7%E6%95%B0),schema:metric,type:sum),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(26, 0, '新用户次日留存率统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%96%B0%E7%94%A8%E6%88%B7%E6%AC%A1%E6%97%A5%E7%95%99%E5%AD%98%E7%8E%87%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E6%96%B0%E7%94%A8%E6%88%B7%E7%95%99%E5%AD%98%E7%8E%87),schema:metric,type:sum),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!t,shareYAxis:!t,times:!(),yAxis:(max:1,min:0)),type:histogram))" height="600" width="800"></iframe>'),
(27, 0, '新用户三日留存率统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%96%B0%E7%94%A8%E6%88%B7%E4%B8%89%E6%97%A5%E7%95%99%E5%AD%98%E7%8E%87%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E6%96%B0%E7%94%A8%E6%88%B7%E7%95%99%E5%AD%98%E7%8E%87),schema:metric,type:sum),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!t,shareYAxis:!t,times:!(),yAxis:(max:1,min:0)),type:histogram))" height="600" width="800"></iframe>'),
(28, 0, '新用户七日留存率统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%96%B0%E7%94%A8%E6%88%B7%E4%B8%83%E6%97%A5%E7%95%99%E5%AD%98%E7%8E%87%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E6%96%B0%E7%94%A8%E6%88%B7%E7%95%99%E5%AD%98%E7%8E%87),schema:metric,type:sum),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!t,shareYAxis:!t,times:!(),yAxis:(max:1,min:0)),type:histogram))" height="600" width="800"></iframe>'),
(29, 0, '每日非活跃用户比例统计（房间停留时长低于平均值288秒的用户）', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E9%9D%9E%E6%B4%BB%E8%B7%83%E7%94%A8%E6%88%B7%E6%AF%94%E4%BE%8B%E7%BB%9F%E8%AE%A1%EF%BC%88%E6%88%BF%E9%97%B4%E5%81%9C%E7%95%99%E6%97%B6%E9%95%BF%E4%BD%8E%E4%BA%8E%E5%B9%B3%E5%9D%87%E5%80%BC288%E7%A7%92%E7%9A%84%E7%94%A8%E6%88%B7%EF%BC%89?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E7%94%A8%E6%88%B7%E5%B9%B3%E5%9D%87%E6%88%BF%E9%97%B4%E5%81%9C%E7%95%99%E6%97%B6%E9%97%B4%EF%BC%88%E7%A7%92%EF%BC%89,values:!(288)),schema:metric,type:percentile_ranks),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(30, 0, '每日登录并进入房间用户数（DAU）', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E8%BF%9B%E5%85%A5%E6%88%BF%E9%97%B4%E7%94%A8%E6%88%B7%E6%95%B0%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E8%BF%9B%E5%85%A5%E6%88%BF%E9%97%B4%E7%94%A8%E6%88%B7%E6%95%B0),schema:metric,type:sum),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(31, 0, '每日用户单次入房间平均停留时长', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E5%8D%95%E7%94%A8%E6%88%B7%E6%88%BF%E9%97%B4%E5%81%9C%E7%95%99%E6%80%BB%E6%97%B6%E9%95%BF%E7%BB%9F%E8%AE%A1%EF%BC%88%E7%A7%92%EF%BC%89?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E7%94%A8%E6%88%B7%E6%88%BF%E9%97%B4%E5%81%9C%E7%95%99%E6%97%B6%E9%97%B4%EF%BC%88%E7%A7%92%EF%BC%89%E6%80%BB%E5%92%8C),schema:metric,type:avg),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(32, 0, '每日用户平均房间停留时长统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E7%94%A8%E6%88%B7%E5%B9%B3%E5%9D%87%E6%88%BF%E9%97%B4%E5%81%9C%E7%95%99%E6%97%B6%E9%95%BF%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E7%94%A8%E6%88%B7%E5%B9%B3%E5%9D%87%E6%88%BF%E9%97%B4%E5%81%9C%E7%95%99%E6%97%B6%E9%97%B4%EF%BC%88%E7%A7%92%EF%BC%89),schema:metric,type:avg),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(33, 0, '每日整站收入统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E6%95%B4%E7%AB%99%E6%94%B6%E5%85%A5%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E6%94%B6%E5%85%A5%EF%BC%88%E5%85%83%EF%BC%89),schema:metric,type:sum),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(34, 0, '每日付费用户数统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E4%BB%98%E8%B4%B9%E7%94%A8%E6%88%B7%E6%95%B0%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E7%94%A8%E6%88%B7ID),schema:metric,type:cardinality),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(35, 0, '每日首次付费用户统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E9%A6%96%E6%AC%A1%E4%BB%98%E8%B4%B9%E7%94%A8%E6%88%B7%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E9%A6%96%E6%AC%A1%E4%BB%98%E8%B4%B9%E7%94%A8%E6%88%B7%E6%95%B0),schema:metric,type:sum),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(36, 0, '每日活跃用户消费均值统计（平均房间停留时长高于平均值288秒的用户）', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E6%B4%BB%E8%B7%83%E7%94%A8%E6%88%B7%E6%B6%88%E8%B4%B9%E5%9D%87%E5%80%BC%E7%BB%9F%E8%AE%A1%EF%BC%88%E5%B9%B3%E5%9D%87%E6%88%BF%E9%97%B4%E5%81%9C%E7%95%99%E6%97%B6%E9%95%BF%E9%AB%98%E4%BA%8E%E5%B9%B3%E5%9D%87%E5%80%BC288%E7%A7%92%E7%9A%84%E7%94%A8%E6%88%B7%EF%BC%89?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E5%8D%95%E7%94%A8%E6%88%B7%E6%AF%8F%E6%97%A5%E5%85%85%E5%80%BC%EF%BC%88%E5%85%83%EF%BC%89),schema:metric,type:avg),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram),(id:''3'',params:(field:%E7%94%A8%E6%88%B7%E5%B9%B3%E5%9D%87%E6%88%BF%E9%97%B4%E5%81%9C%E7%95%99%E6%97%B6%E9%97%B4%EF%BC%88%E7%A7%92%EF%BC%89,ranges:!((from:288,to:!n))),schema:group,type:range)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(37, 0, '每日付费用户消费均值统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E4%BB%98%E8%B4%B9%E7%94%A8%E6%88%B7%E6%B6%88%E8%B4%B9%E5%9D%87%E5%80%BC%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E5%8D%95%E7%94%A8%E6%88%B7%E6%AF%8F%E6%97%A5%E5%85%85%E5%80%BC%EF%BC%88%E5%85%83%EF%BC%89),schema:metric,type:avg),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(38, 0, '每日订单金额分布统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E8%AE%A2%E5%8D%95%E9%87%91%E9%A2%9D%E5%88%86%E5%B8%83%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E6%94%B6%E5%85%A5%EF%BC%88%E5%85%83%EF%BC%89,percents:!(50,75,95)),schema:metric,type:percentiles),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!t,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(39, 0, '流失付费用户数统计（付费后一周内不再进入房间的用户）', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%B5%81%E5%A4%B1%E4%BB%98%E8%B4%B9%E7%94%A8%E6%88%B7%E6%95%B0%E7%BB%9F%E8%AE%A1%EF%BC%88%E4%BB%98%E8%B4%B9%E5%90%8E%E4%B8%80%E5%91%A8%E5%86%85%E4%B8%8D%E5%86%8D%E8%BF%9B%E5%85%A5%E6%88%BF%E9%97%B4%E7%9A%84%E7%94%A8%E6%88%B7%EF%BC%89?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E6%B5%81%E5%A4%B1%E4%BB%98%E8%B4%B9%E7%94%A8%E6%88%B7%E6%95%B0),schema:metric,type:sum),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(40, 1, '每日主播平均直播时长分布统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E4%B8%BB%E6%92%AD%E5%B9%B3%E5%9D%87%E7%9B%B4%E6%92%AD%E6%97%B6%E9%95%BF%E5%88%86%E5%B8%83%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E4%B8%BB%E6%92%AD%E5%B9%B3%E5%9D%87%E7%9B%B4%E6%92%AD%E6%97%B6%E9%95%BF%EF%BC%88%E7%A7%92%EF%BC%89),schema:metric,type:avg),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram),(id:''3'',params:(field:%E4%B8%BB%E6%92%AD%E5%B9%B3%E5%9D%87%E7%9B%B4%E6%92%AD%E6%97%B6%E9%95%BF%EF%BC%88%E7%A7%92%EF%BC%89,ranges:!((from:0,to:900),(from:900,to:1800),(from:1800,to:3600),(from:3600,to:86400))),schema:group,type:range)),listeners:(),params:(addLegend:!t,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:grouped,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(41, 1, '每日主播总直播时长分布统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E4%B8%BB%E6%92%AD%E6%80%BB%E7%9B%B4%E6%92%AD%E6%97%B6%E9%95%BF%E5%88%86%E5%B8%83%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram),(id:''5'',params:(field:%E4%B8%BB%E6%92%AD%E6%AF%8F%E6%97%A5%E7%9B%B4%E6%92%AD%E6%80%BB%E6%97%B6%E9%95%BF%EF%BC%88%E7%A7%92%EF%BC%89),schema:metric,type:avg),(id:''6'',params:(field:%E4%B8%BB%E6%92%AD%E6%AF%8F%E6%97%A5%E7%9B%B4%E6%92%AD%E6%80%BB%E6%97%B6%E9%95%BF%EF%BC%88%E7%A7%92%EF%BC%89,ranges:!((from:0,to:1800),(from:1800,to:3600),(from:3600,to:7200),(from:7200,to:86400))),schema:group,type:range)),listeners:(),params:(addLegend:!t,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:grouped,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(42, 1, '每日主播最大直播时长分布统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E4%B8%BB%E6%92%AD%E6%9C%80%E5%A4%A7%E7%9B%B4%E6%92%AD%E6%97%B6%E9%95%BF%E5%88%86%E5%B8%83%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram),(id:''1'',params:(field:%E4%B8%BB%E6%92%AD%E6%AF%8F%E6%97%A5%E6%9C%80%E5%A4%A7%E7%9B%B4%E6%92%AD%E6%97%B6%E9%95%BF%EF%BC%88%E7%A7%92%EF%BC%89),schema:metric,type:avg),(id:''3'',params:(field:%E4%B8%BB%E6%92%AD%E6%AF%8F%E6%97%A5%E6%9C%80%E5%A4%A7%E7%9B%B4%E6%92%AD%E6%97%B6%E9%95%BF%EF%BC%88%E7%A7%92%EF%BC%89,ranges:!((from:0,to:1800),(from:1800,to:3600),(from:3600,to:10800))),schema:group,type:range)),listeners:(),params:(addLegend:!t,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:grouped,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(43, 1, '每日主播最小直播时长分布统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E4%B8%BB%E6%92%AD%E6%9C%80%E5%B0%8F%E7%9B%B4%E6%92%AD%E6%97%B6%E9%95%BF%E5%88%86%E5%B8%83%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E4%B8%BB%E6%92%AD%E6%AF%8F%E6%97%A5%E6%9C%80%E5%B0%8F%E7%9B%B4%E6%92%AD%E6%97%B6%E9%95%BF%EF%BC%88%E7%A7%92%EF%BC%89),schema:metric,type:avg),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram),(id:''3'',params:(field:%E4%B8%BB%E6%92%AD%E6%AF%8F%E6%97%A5%E6%9C%80%E5%B0%8F%E7%9B%B4%E6%92%AD%E6%97%B6%E9%95%BF%EF%BC%88%E7%A7%92%EF%BC%89,ranges:!((from:0,to:900),(from:900,to:1800),(from:1800,to:10800))),schema:group,type:range)),listeners:(),params:(addLegend:!t,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:grouped,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(44, 1, '每日主播直播时长统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E4%B8%BB%E6%92%AD%E7%9B%B4%E6%92%AD%E6%97%B6%E9%95%BF%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E4%B8%BB%E6%92%AD%E6%AF%8F%E6%97%A5%E6%9C%80%E5%A4%A7%E7%9B%B4%E6%92%AD%E6%97%B6%E9%95%BF%EF%BC%88%E7%A7%92%EF%BC%89),schema:metric,type:avg),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram),(id:''3'',params:(field:%E4%B8%BB%E6%92%AD%E6%AF%8F%E6%97%A5%E7%9B%B4%E6%92%AD%E6%80%BB%E6%97%B6%E9%95%BF%EF%BC%88%E7%A7%92%EF%BC%89),schema:metric,type:avg)),listeners:(),params:(addLegend:!t,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:grouped,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(45, 1, '每日主播直播频次分布统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%AF%8F%E6%97%A5%E4%B8%BB%E6%92%AD%E7%9B%B4%E6%92%AD%E9%A2%91%E6%AC%A1%E5%88%86%E5%B8%83%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E4%B8%BB%E6%92%AD%E6%AF%8F%E6%97%A5%E7%9B%B4%E6%92%AD%E9%A2%91%E6%AC%A1),schema:metric,type:avg),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram),(id:''3'',params:(field:%E4%B8%BB%E6%92%AD%E6%AF%8F%E6%97%A5%E7%9B%B4%E6%92%AD%E9%A2%91%E6%AC%A1,ranges:!((from:0,to:5),(from:5,to:20),(from:20,to:50),(from:50,to:100),(from:100,to:200))),schema:group,type:range)),listeners:(),params:(addLegend:!t,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:grouped,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:()),type:histogram))" height="600" width="800"></iframe>'),
(46, 1, '主播消费刺激能力（平均每分钟钻石收入）', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E4%B8%BB%E6%92%AD%E6%B6%88%E8%B4%B9%E5%88%BA%E6%BF%80%E8%83%BD%E5%8A%9B%EF%BC%88%E5%B9%B3%E5%9D%87%E6%AF%8F%E5%88%86%E9%92%9F%E9%92%BB%E7%9F%B3%E6%94%B6%E5%85%A5%EF%BC%89?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E4%B8%BB%E6%92%AD%E5%B9%B3%E5%9D%87%E6%94%B6%E5%85%A5%E9%92%BB%E7%9F%B3%E6%95%B0%EF%BC%88%E6%AF%8F%E5%88%86%E9%92%9F%EF%BC%89),schema:metric,type:sum),(id:''2'',params:(field:nickname.raw,order:desc,orderBy:''1'',size:100),schema:bucket,type:terms)),listeners:(),params:(perPage:50,showMeticsAtAllLevels:!f,showPartialRows:!f),type:table))" height="600" width="800"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL COMMENT '群组id, 0为普通用户，1为管理员',
  `email` varchar(32) NOT NULL,
  `pwd` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `groupid`, `email`, `pwd`) VALUES
(1, 0, 'fuymsn@hotmail.com', '111111'),
(25, 1, 'admin@admin.com', 'qwerty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
