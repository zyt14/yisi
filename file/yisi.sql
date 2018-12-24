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

 Date: 22/12/2018 16:37:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动id',
  `group_id` int(11) NULL DEFAULT NULL COMMENT '组别id',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '照片',
  `introduce` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '介绍',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article`  (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '标题',
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '内容',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文章图片',
  `category_id` int(11) NULL DEFAULT NULL COMMENT '分类id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, '5149');
INSERT INTO `category` VALUES (2, '不是对262');

-- ----------------------------
-- Table structure for competition
-- ----------------------------
DROP TABLE IF EXISTS `competition`;
CREATE TABLE `competition`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '比赛id',
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '内容',
  `time` varchar(0) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '比赛时间',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '照片',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group`  (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '组别id',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '组别名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES (1, '5149');
INSERT INTO `group` VALUES (3, '不是对262');
INSERT INTO `group` VALUES (4, '不是对262');
INSERT INTO `group` VALUES (5, '不是对262');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member`  (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '成员',
  `name` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '姓名',
  `grade` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '年级',
  `major` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '班级',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `qq` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'qq',
  `group_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '组别',
  `state` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '状态',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '照片',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES (2, 'zyt', '2017', '软件1601', '15555555', '555555', '哈哈', '5', '88');
INSERT INTO `member` VALUES (3, 'zyt', '2017', '软件1601', '13855555555', '555555', '司法所爆', '5', NULL);

-- ----------------------------
-- Table structure for organize
-- ----------------------------
DROP TABLE IF EXISTS `organize`;
CREATE TABLE `organize`  (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '组id',
  `group_id` int(11) NULL DEFAULT NULL COMMENT '组别id',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '组照片',
  `grade` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '年级',
  `introducte` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '介绍',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '职位id',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of position
-- ----------------------------
INSERT INTO `position` VALUES (1, '不是对262');
INSERT INTO `position` VALUES (2, '不是对262');

-- ----------------------------
-- Table structure for production
-- ----------------------------
DROP TABLE IF EXISTS `production`;
CREATE TABLE `production`  (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '成员作品',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '作品名称',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '作品图片',
  `group_id` int(11) NULL DEFAULT NULL COMMENT '分组id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for proposer
-- ----------------------------
DROP TABLE IF EXISTS `proposer`;
CREATE TABLE `proposer`  (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '申请人',
  `name` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '姓名',
  `grade` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '年级',
  `major` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '班级',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `qq` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'qq',
  `introduction` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '个人介绍',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of proposer
-- ----------------------------
INSERT INTO `proposer` VALUES (4, 'zyt', '2017', '软件1601', '13855555555', '555555', '司法所爆发时播放方式第三季度');
INSERT INTO `proposer` VALUES (5, 'zyt', '2017', '软件1601', '13855555555', '555555', '司法所爆发时播放方式第三季度');

-- ----------------------------
-- Table structure for studio
-- ----------------------------
DROP TABLE IF EXISTS `studio`;
CREATE TABLE `studio`  (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '工作室id',
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '内容介绍',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of studio
-- ----------------------------
INSERT INTO `studio` VALUES (1, '不是对262');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '管理员',
  `name` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '姓名',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '密码',
  `grade` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '年级',
  `major` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '班级',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `qq` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'qq号',
  `position_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '职位',
  `introduction` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '个人介绍',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '照片',
  `state` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '状态0：以前的1：现在的',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (2, 'zyt', NULL, '2017', '软件1601', '15555555', '555555', '哈哈', '司法所爆发时播放方式第三季度', '5555', '');
INSERT INTO `user` VALUES (3, '5511', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c14c25af08e0.jpg', '');
INSERT INTO `user` VALUES (4, 'zyt', NULL, '2018', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/default/img/User.jpeg', '');
INSERT INTO `user` VALUES (5, 'zyt', NULL, '2018', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c138cb017f7a.jpg', '');
INSERT INTO `user` VALUES (6, 'zyt', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c1390a8cfeef.jpg', '');
INSERT INTO `user` VALUES (7, 'zyt', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c13924310199.jpg', '');
INSERT INTO `user` VALUES (8, 'zyt', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c1397248bb99.jpg', '');
INSERT INTO `user` VALUES (9, 'zyt', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/default/img/User.jpeg', '');
INSERT INTO `user` VALUES (10, 'zyt', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c13975203694.jpg', '');
INSERT INTO `user` VALUES (11, 'zyt', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c14bee1a0113.jpg', '');
INSERT INTO `user` VALUES (12, 'zyt', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c14beec3aadf.jpg', '');
INSERT INTO `user` VALUES (13, 'zyt888', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c14c0403046e.jpg', '');
INSERT INTO `user` VALUES (14, 'zyt888', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c14c041ce3cd.jpg', '');
INSERT INTO `user` VALUES (15, 'zyt888', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c14c12c1985f.jpg', '');
INSERT INTO `user` VALUES (16, '55', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c14c1339e085.jpg', '');
INSERT INTO `user` VALUES (17, '55', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c14c1903003f.jpg', '');
INSERT INTO `user` VALUES (18, '55', NULL, '2017', '软件1601', '13888888888', '555555', '哈哈', '司法所爆发时播放方式第三季度', '/image/5c14c19ce9ae9.jpg', '');
INSERT INTO `user` VALUES (19, '55', NULL, '2017', '软件1601', '13888888888', '555555', '5', '司法所爆发', '/image/5c1de7fa25e29.jpg', '5');
INSERT INTO `user` VALUES (20, '55', NULL, '2017', '软件1601', '13888888888', '555555', '5', '司法所爆发', '555', '5');
INSERT INTO `user` VALUES (21, '55', NULL, '2017', '软件1601', '13888888888', '555555', '5', '司法所爆发', '/', '5');

SET FOREIGN_KEY_CHECKS = 1;
