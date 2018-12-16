/*
 Navicat Premium Data Transfer

 Source Server         : zyt
 Source Server Type    : MySQL
 Source Server Version : 80013
 Source Host           : localhost:3306
 Source Schema         : yisi

 Target Server Type    : MySQL
 Target Server Version : 80013
 File Encoding         : 65001

 Date: 12/12/2018 10:20:23
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member`  (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '成员',
  `name` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '姓名',
  `grade` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '年级',
  `class` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '班级',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `qq` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'qq',
  `group` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '组别',
  `state` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '状态',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '照片',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for proposer
-- ----------------------------
DROP TABLE IF EXISTS `proposer`;
CREATE TABLE `proposer`  (
  `id` int(255) NOT NULL COMMENT '申请人',
  `name` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '姓名',
  `grade` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '年级',
  `class` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '班级',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `qq` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'qq',
  `introduction` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '个人介绍',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '管理员',
  `name` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '姓名',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '密码',
  `grade` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '年级',
  `class` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '班级',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `qq` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'qq号',
  `position` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '职位',
  `introduction` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '个人介绍',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '照片',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
