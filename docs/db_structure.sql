-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para stacksystem
CREATE DATABASE IF NOT EXISTS `stacksystem` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `stacksystem`;

-- Volcando estructura para tabla stacksystem.tbl_category
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla stacksystem.tbl_category: ~7 rows (aproximadamente)

-- Volcando estructura para tabla stacksystem.tbl_question
CREATE TABLE IF NOT EXISTS `tbl_question` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_spanish_ci,
  `slug` varchar(500) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `notifications_enabled` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla stacksystem.tbl_question: ~0 rows (aproximadamente)

-- Volcando estructura para tabla stacksystem.tbl_question_image
CREATE TABLE IF NOT EXISTS `tbl_question_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question_id` int NOT NULL,
  `image_url` varchar(225) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla stacksystem.tbl_question_image: ~0 rows (aproximadamente)

-- Volcando estructura para tabla stacksystem.tbl_question_tag
CREATE TABLE IF NOT EXISTS `tbl_question_tag` (
  `question_id` int NOT NULL,
  `tag_id` int NOT NULL,
  PRIMARY KEY (`question_id`,`tag_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `tbl_question_tag_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `tbl_question` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_question_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tbl_tag` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla stacksystem.tbl_question_tag: ~0 rows (aproximadamente)

-- Volcando estructura para tabla stacksystem.tbl_tag
CREATE TABLE IF NOT EXISTS `tbl_tag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_spanish_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` int DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla stacksystem.tbl_tag: ~29 rows (aproximadamente)

-- Volcando estructura para tabla stacksystem.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT 'assets/images/user_1.png',
  `country` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `description` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `website` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `twitter` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `facebook` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `instagram` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `youtube` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `vimeo` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `github` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla stacksystem.tbl_user: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
