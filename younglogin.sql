-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2015 at 12:26 PM
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
  `category` varchar(255) NOT NULL,
  `iframesrc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='添加金分类别';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `iframesrc`) VALUES
(11, '新用户次日留存率统计', '<iframe src="http://elkdb.ops.org/#/visualize/edit/%E6%96%B0%E7%94%A8%E6%88%B7%E6%AC%A1%E6%97%A5%E7%95%99%E5%AD%98%E7%8E%87%E7%BB%9F%E8%AE%A1?embed&_g=(refreshInterval:(display:Off,pause:!f,section:0,value:0),time:(from:''______'',mode:absolute,to:''______''))&_a=(filters:!(),linked:!t,query:(query_string:(query:''*'')),vis:(aggs:!((id:''1'',params:(field:%E6%96%B0%E7%94%A8%E6%88%B7%E7%95%99%E5%AD%98%E7%8E%87),schema:metric,type:sum),(id:''2'',params:(customInterval:''2h'',extended_bounds:(),field:''@timestamp'',interval:d,min_doc_count:1),schema:segment,type:date_histogram)),listeners:(),params:(addLegend:!f,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!f,mode:stacked,scale:linear,setYExtents:!t,shareYAxis:!t,times:!(),yAxis:(max:1,min:0)),type:histogram))" height="600" width="800"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `pwd` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `email`, `pwd`) VALUES
(1, 'fuymsn@hotmail.com', '111111'),
(7, 'test@test.com', '111111'),
(8, 'young@qq.com', '111111'),
(9, 'young@qq1.com', '111111'),
(10, 'young1@qq.com', '111111'),
(11, 'young2@qq.com', '111111'),
(12, 'young3@qq.com', '111111'),
(13, 'young4@qq.com', '111111'),
(14, 'fuymsn1@hotmail.com', '111111'),
(15, 'fuymsn2@hotmail.com', '111'),
(16, 'fuymsn4@hotmail.com', '111111'),
(17, 'fuymsn5@hotmail.com', '111111'),
(18, 'test1@test.com', '111'),
(19, 'fuymsn@hotmail.com77', '1111111111'),
(20, 'fuymsn@hotssmail.com', '111111'),
(21, 'fuymsn@hotmail.cosss', '111111'),
(22, '111111@qqc.p', '111111'),
(23, 'fuymsn9@hotmail.com', '111111'),
(24, 'sss@qqq.com', '111111'),
(25, 'admin@admin.com', '123456');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
