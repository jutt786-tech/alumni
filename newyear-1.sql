/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : newyear

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2019-08-22 13:16:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'admin@gmail.com', 'adminn', '1');

-- ----------------------------
-- Table structure for `bottom_img`
-- ----------------------------
DROP TABLE IF EXISTS `bottom_img`;
CREATE TABLE `bottom_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `bottom_image` varchar(255) NOT NULL,
  `status` varchar(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bottom_img
-- ----------------------------
INSERT INTO `bottom_img` VALUES ('1', 'ali hassan updated', '../assets/images/ccvb.JPG', '');
INSERT INTO `bottom_img` VALUES ('3', 'ali khan', '../assets/images/jaxz.PNG', '');
INSERT INTO `bottom_img` VALUES ('4', 'ali khan', '../assets/images/jaxz.PNG', '');
INSERT INTO `bottom_img` VALUES ('5', 'ali khan', '../assets/images/jaxz.PNG', '');

-- ----------------------------
-- Table structure for `left_img`
-- ----------------------------
DROP TABLE IF EXISTS `left_img`;
CREATE TABLE `left_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `leftimage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of left_img
-- ----------------------------
INSERT INTO `left_img` VALUES ('2', 'ali khan updated', '../assets/images/f.JPG');
INSERT INTO `left_img` VALUES ('3', 'jutt updated', '../assets/images/jazzzz.PNG');
INSERT INTO `left_img` VALUES ('4', 'zaheer updated', '../assets/images/swis-maid.gif');

-- ----------------------------
-- Table structure for `right_img`
-- ----------------------------
DROP TABLE IF EXISTS `right_img`;
CREATE TABLE `right_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rightimage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of right_img
-- ----------------------------
INSERT INTO `right_img` VALUES ('5', 'jamal deen pent updated', '../assets/images/jazzzz.PNG');
INSERT INTO `right_img` VALUES ('6', 'ali khan', '../assets/images/qa.JPG');

-- ----------------------------
-- Table structure for `top_img`
-- ----------------------------
DROP TABLE IF EXISTS `top_img`;
CREATE TABLE `top_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `topimage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of top_img
-- ----------------------------
INSERT INTO `top_img` VALUES ('28', 'dummy', '../assets/images/center monlink.PNG');
INSERT INTO `top_img` VALUES ('29', 'fdfd upadeted', '../assets/images/Capture.JPG');
INSERT INTO `top_img` VALUES ('30', 'asdfad', '../assets/images/aaa.gif');
