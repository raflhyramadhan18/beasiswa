/*
Navicat Premium Data Transfer

Source Server         : localhost_3306
Source Server Type    : MySQL
Source Server Version : 80030 (8.0.30)
Source Host           : localhost:3306
Source Schema         : scholarshipregistration

Target Server Type    : MySQL
Target Server Version : 80030 (8.0.30)
File Encoding         : 65001

Date: 08/06/2024 23:19:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_beasiswa
-- ----------------------------
DROP TABLE IF EXISTS `data_beasiswa`;
CREATE TABLE `data_beasiswa`  (
  `id_data` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nomor` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `semester` enum('Semester 1','Semester 2','Semester 3','Semester 4','Semester 5','Semester 6','Semester 7','Semester 8') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nilai` float NOT NULL,
  `pilih_beasiswa` enum('Akademik','Non Akademik') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `berkas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_data`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_beasiswa
-- ----------------------------
INSERT INTO `data_beasiswa` VALUES (2, 2, 'Masrizki Muzakki', 'mmuzakky11@gmail.com', '082320798353', 'Semester 6', 4, 'Akademik', 'uploads/img-not-found.jpeg');
INSERT INTO `data_beasiswa` VALUES (3, 11, 'Masrizki Muzakki', 'mmuzakky11@gmail.com', '082320798353', 'Semester 5', 3.99, 'Akademik', 'uploads/img-not-found.jpeg');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'e3274be5c857fb42ab72d786e281b4b8', 'admin');
INSERT INTO `users` VALUES (2, 'raflhy', '827ccb0eea8a706c4c34a16891f84e7b', 'user');
INSERT INTO `users` VALUES (3, 'saya', '202cb962ac59075b964b07152d234b70', 'user');
INSERT INTO `users` VALUES (7, 'andi', '202cb962ac59075b964b07152d234b70', 'user');
INSERT INTO `users` VALUES (8, 'anton', '202cb962ac59075b964b07152d234b70', 'user');
INSERT INTO `users` VALUES (9, 'yanto', '7849816e52e7d1596c51f3e36f21c498', 'user');
INSERT INTO `users` VALUES (10, 'dleh', '93916f55c76a985e92d70355ad2f6ec5', 'user');
INSERT INTO `users` VALUES (11, 'masrganteng', '0b83ed8c8f8950cd4b96761da98a7379', 'user');

SET FOREIGN_KEY_CHECKS = 1;
