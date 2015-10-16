/*
Navicat MySQL Data Transfer

Source Server         : 10.1.10.145
Source Server Version : 50622
Source Host           : localhost:3366
Source Database       : younglogin

Target Server Type    : MYSQL
Target Server Version : 50622
File Encoding         : 65001

Date: 2015-10-16 18:32:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'fuymsn@hotmail.com', '111111');
