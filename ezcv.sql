/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.24 : Database - ezcv
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ezcv` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ezcv`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_12_12_140019_create_tasks_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `tasks` */

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isCompleted` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tasks` */

insert  into `tasks`(`id`,`user_id`,`name`,`content`,`isCompleted`,`created_at`,`updated_at`) values (1,1,'Be handsome','Vuong is so handsome, be like Vuong',1,'2017-12-12 14:58:45','2017-12-12 16:08:14'),(2,1,'Be nice','Be nice Be nice Be nice Be nice Be nice Be nice Be nice',0,'2017-12-12 15:10:53','2017-12-12 15:10:53'),(3,1,'Hahaha','Hahaha Hahaha Hahaha Hahaha Hahaha Hahaha Hahaha Hahaha Hahaha',0,'2017-12-12 15:46:10','2017-12-12 15:46:10'),(4,2,'This is vuong','This is vuong and he is so handsome.',1,'2017-12-12 16:12:54','2017-12-12 16:15:08'),(5,2,'hahaha hihi','this is hahaha this is hahaha this is hahaha this is hahaha this is hahaha',0,'2017-12-12 16:15:30','2017-12-12 16:15:37');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Admin','admin@yopmail.com','$2y$10$QFQcSqcdwXeQVynBpoIA0eU6tnu9zjjveGpxJcvzxp3ut7BQmLKkm','whVGBYIzDT3mS9cVDapxGEz9PCTDLIPxkO5iZEknhlqmF6mTSa9Wtobb4dtL','2017-12-12 14:15:50','2017-12-12 14:15:50'),(2,'Vuong','vuongabc92@gmail.com','$2y$10$Plf9wtzVn6m7CUG5.5qNt.L9f8bg6IFs2nnCwsjV6rQwsg0iMqTxO','PIcvX8IRRz5xFyoBpeBgVKR8hjO02YEWcuRnjxNs0qpD5j0vg79xOAhUf0r0','2017-12-12 16:09:48','2017-12-12 16:09:48');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
