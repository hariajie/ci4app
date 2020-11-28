/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : ci4app

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 28/11/2020 20:10:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for komik
-- ----------------------------
DROP TABLE IF EXISTS `komik`;
CREATE TABLE `komik`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `penulis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `penerbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sampul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of komik
-- ----------------------------
INSERT INTO `komik` VALUES (1, 'Naruto', 'naruto', 'Masashi Kishimoto', 'Shonen Jump', 'naruto.png', NULL, NULL);
INSERT INTO `komik` VALUES (2, 'One Piece', 'one-piece', 'Eichiro Oda', 'Shonen Jump', 'onepiece.png', NULL, NULL);
INSERT INTO `komik` VALUES (3, 'Eyeshield 21', 'eyeshield-21', 'Gue', 'Apa deh', 'aaa.png', '2020-11-03 03:44:07', '2020-11-03 03:44:07');

SET FOREIGN_KEY_CHECKS = 1;
