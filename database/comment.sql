/*
Navicat MySQL Data Transfer

Source Server         : wamp
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2018-11-29 13:45:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `product_id` int(255) DEFAULT NULL,
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `content` text,
  `is_reply` tinyint(10) DEFAULT NULL,
  `from_uid` int(255) DEFAULT NULL,
  `thumb_img` varchar(255) DEFAULT NULL,
  `create_time` date DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `order_num` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('12', '1', '超级好吃哦', '0', '1', null, '2018-11-12', '0', '23948734759287', '王小强');
INSERT INTO `comment` VALUES ('12', '2', '菠萝蜜超级好吃好吗？菠萝蜜超级好吃好吗？菠萝蜜超级好吃好吗？菠萝蜜超级好吃好吗？菠萝蜜超级好吃好吗？菠萝蜜超级好吃好吗？菠萝蜜超级好吃好吗？菠萝蜜超级好吃好吗？菠萝蜜超级好吃好吗？菠萝蜜超级好吃好吗？菠萝蜜超级好吃好吗？', '0', '2', null, '2018-11-13', '1', '39562562835692', '坚果');
INSERT INTO `comment` VALUES ('12', '3', '好吃的不行！好吃的不行！好吃的不行！好吃的不行！好吃的不行！好吃的不行！好吃的不行！好吃的不行！好吃的不行！好吃的不行！', '0', '3', null, '2018-11-13', '1', '45692523495752', '熊大');
INSERT INTO `comment` VALUES ('13', '4', '什么玩意？差评什么玩意？差评什么玩意？差评什么玩意？差评什么玩意？差评什么玩意？差评什么玩意？差评什么玩意？差评什么玩意？差评什么玩意？差评', '0', '4', null, '2018-11-13', '-1', '29384692832459', '熊二');
INSERT INTO `comment` VALUES ('13', '5', '这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！', '0', '5', null, '2018-11-13', '-1', '293824957295057', '机器猫');
INSERT INTO `comment` VALUES ('13', '6', '这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！这橙子也太难吃了！甜的发齁！', '0', '5', null, '2018-11-13', '-1', '20394572039572093', '机器猫');
