/*
Navicat MySQL Data Transfer

Source Server         : Carson
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : study

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-01-31 17:29:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ent_admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `ent_admin_user`;
CREATE TABLE `ent_admin_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `last_login_ip` varchar(32) NOT NULL DEFAULT '' COMMENT '登陆IP',
  `last_login_time` int(20) NOT NULL DEFAULT '0' COMMENT '最后登陆时间',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(10) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ent_admin_user
-- ----------------------------
INSERT INTO `ent_admin_user` VALUES ('1', '111222', '123456', '', '0', '0', '0', '0', '0');
INSERT INTO `ent_admin_user` VALUES ('2', '333', '123456', '', '0', '0', '0', '1517390205', '1517390148');
INSERT INTO `ent_admin_user` VALUES ('4', '3322', '123456', '', '0', '0', '0', '1517390205', '1517390205');
INSERT INTO `ent_admin_user` VALUES ('5', '3232', '123456', '', '0', '0', '0', '1517390399', '1517390399');
