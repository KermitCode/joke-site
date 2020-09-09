/*
Navicat MySQL Data Transfer

Source Server         : 阿里Mysql
Source Server Version : 50537
Source Host           : 114.215.80.214:3306
Source Database       : 33xiao

Target Server Type    : MYSQL
Target Server Version : 50537
File Encoding         : 65001

Date: 2020-09-09 09:42:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xh_sprider
-- ----------------------------
DROP TABLE IF EXISTS `xh_sprider`;
CREATE TABLE `xh_sprider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sprider` varchar(15) DEFAULT NULL,
  `cometime` int(10) unsigned DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`),
  KEY `sprider` (`sprider`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=gbk COMMENT='搜索引擎记录';

-- ----------------------------
-- Records of xh_sprider
-- ----------------------------
