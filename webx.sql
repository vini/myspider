/*
Navicat MySQL Data Transfer

Source Server         : Mysql - Localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : webx

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2016-03-16 21:18:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for emails
-- ----------------------------
DROP TABLE IF EXISTS `emails`;
CREATE TABLE `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of emails
-- ----------------------------

-- ----------------------------
-- Table structure for urls
-- ----------------------------
DROP TABLE IF EXISTS `urls`;
CREATE TABLE `urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `visited` enum('yes','no') DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of urls
-- ----------------------------
INSERT INTO `urls` VALUES ('1', 'http://www.folha.com.br/', 'no');
