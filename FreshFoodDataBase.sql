-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: freshfood
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `binhluan` (
  `id_user` bigint unsigned NOT NULL,
  `id_nongsan` bigint unsigned NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`,`id_nongsan`),
  KEY `binhluan_id_nongsan_foreign` (`id_nongsan`),
  CONSTRAINT `binhluan_id_nongsan_foreign` FOREIGN KEY (`id_nongsan`) REFERENCES `nongsan` (`id`),
  CONSTRAINT `binhluan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `binhluan`
--

LOCK TABLES `binhluan` WRITE;
/*!40000 ALTER TABLE `binhluan` DISABLE KEYS */;
/*!40000 ALTER TABLE `binhluan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhmuc` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tenDanhMuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `src` text COLLATE utf8mb4_unicode_ci,
  `src_icon` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmuc`
--

LOCK TABLES `danhmuc` WRITE;
/*!40000 ALTER TABLE `danhmuc` DISABLE KEYS */;
INSERT INTO `danhmuc` VALUES (1,'Trái cây',NULL,NULL,'img/danhmuc/traicay.png','<span class=\"iconify ml-2 mr-5\" data-icon=\"fluent:food-apple-20-filled\" style=\"font-size: 25px;\"></span>'),(2,'Vật phẩm khô',NULL,NULL,'img/danhmuc/thucphamkho.png','<span class=\"iconify ml-2 mr-5\" data-icon=\"whh:coffeebean\"  style=\"font-size: 23px;\"></span>'),(3,'Rau củ',NULL,NULL,'img/danhmuc/cuqua.png','<span class=\"iconify ml-2 mr-5\" data-icon=\"dashicons:carrot\" style=\"font-size: 25px;\"></span>'),(4,'Thịt tươi',NULL,NULL,'img/danhmuc/thittuoi.png','<span class=\"iconify ml-2 mr-5\" data-icon=\"emojione-monotone:meat-on-bone\" style=\"font-size: 25px;\"></span>'),(5,'Hải sản',NULL,NULL,'img/danhmuc/haisan.png','<span class=\"iconify ml-2 mr-5\" data-icon=\"ph:fish-fill\" style=\"font-size: 27px;\"></span>');
/*!40000 ALTER TABLE `danhmuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giohang` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `giohang_id_user_foreign` (`id_user`),
  CONSTRAINT `giohang_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giohang`
--

LOCK TABLES `giohang` WRITE;
/*!40000 ALTER TABLE `giohang` DISABLE KEYS */;
INSERT INTO `giohang` VALUES (1,2,NULL,NULL),(2,3,NULL,NULL),(3,4,NULL,NULL),(4,5,NULL,NULL),(5,6,NULL,NULL);
/*!40000 ALTER TABLE `giohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hinhanh`
--

DROP TABLE IF EXISTS `hinhanh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hinhanh` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_nongsan` bigint unsigned NOT NULL,
  `src` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hinhanh_id_nongsan_foreign` (`id_nongsan`),
  CONSTRAINT `hinhanh_id_nongsan_foreign` FOREIGN KEY (`id_nongsan`) REFERENCES `nongsan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hinhanh`
--

LOCK TABLES `hinhanh` WRITE;
/*!40000 ALTER TABLE `hinhanh` DISABLE KEYS */;
INSERT INTO `hinhanh` VALUES (1,1,'img/image1.jpg',NULL,NULL),(2,2,'img/image2.jpg',NULL,NULL),(3,3,'img/image3.jpg',NULL,NULL),(4,4,'img/image4.jpg',NULL,NULL),(5,5,'img/image5.jpg',NULL,NULL),(6,6,'img/image6.jpg',NULL,NULL),(7,7,'img/image7.jpg',NULL,NULL);
/*!40000 ALTER TABLE `hinhanh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hoadon` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned NOT NULL,
  `id_trangthai` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hoadon_id_user_foreign` (`id_user`),
  KEY `hoadon_id_trangthai_foreign` (`id_trangthai`),
  CONSTRAINT `hoadon_id_trangthai_foreign` FOREIGN KEY (`id_trangthai`) REFERENCES `trangthai` (`id`),
  CONSTRAINT `hoadon_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoadon`
--

LOCK TABLES `hoadon` WRITE;
/*!40000 ALTER TABLE `hoadon` DISABLE KEYS */;
/*!40000 ALTER TABLE `hoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemgiohang`
--

DROP TABLE IF EXISTS `itemgiohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `itemgiohang` (
  `id_giohang` bigint unsigned NOT NULL,
  `id_nongsan` bigint unsigned NOT NULL,
  `soluong` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_giohang`,`id_nongsan`),
  KEY `itemgiohang_id_nongsan_foreign` (`id_nongsan`),
  CONSTRAINT `itemgiohang_id_giohang_foreign` FOREIGN KEY (`id_giohang`) REFERENCES `giohang` (`id`),
  CONSTRAINT `itemgiohang_id_nongsan_foreign` FOREIGN KEY (`id_nongsan`) REFERENCES `nongsan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemgiohang`
--

LOCK TABLES `itemgiohang` WRITE;
/*!40000 ALTER TABLE `itemgiohang` DISABLE KEYS */;
INSERT INTO `itemgiohang` VALUES (1,1,7,'2021-12-10 02:57:47','2021-12-15 00:41:11'),(1,2,14,'2021-12-10 02:57:48','2021-12-10 19:56:22'),(1,3,2,'2021-12-10 02:57:50','2021-12-13 09:25:46'),(1,4,3,'2021-12-10 02:57:45','2021-12-10 20:49:43'),(2,2,1,'2021-12-10 20:38:15','2021-12-10 20:38:15'),(2,3,1,'2021-12-10 20:38:14','2021-12-10 20:38:14'),(5,1,4,'2021-12-14 07:00:57','2021-12-14 07:01:09'),(5,2,11,'2021-12-14 07:01:38','2021-12-14 07:01:52');
/*!40000 ALTER TABLE `itemgiohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemhoadon`
--

DROP TABLE IF EXISTS `itemhoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `itemhoadon` (
  `id_hoadon` bigint unsigned NOT NULL,
  `id_nongsan` bigint unsigned NOT NULL,
  `soluong` int NOT NULL,
  `dongia` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_hoadon`,`id_nongsan`),
  KEY `itemhoadon_id_nongsan_foreign` (`id_nongsan`),
  CONSTRAINT `itemhoadon_id_hoadon_foreign` FOREIGN KEY (`id_hoadon`) REFERENCES `hoadon` (`id`),
  CONSTRAINT `itemhoadon_id_nongsan_foreign` FOREIGN KEY (`id_nongsan`) REFERENCES `nongsan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemhoadon`
--

LOCK TABLES `itemhoadon` WRITE;
/*!40000 ALTER TABLE `itemhoadon` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemhoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2013_12_03_032329_role',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2021_12_03_035504_danhmuc',1),(7,'2021_12_03_035658_nongsan',1),(8,'2021_12_03_042053_yeuthich',1),(9,'2021_12_03_043528_binhluan',1),(10,'2021_12_03_044207_giohang',1),(11,'2021_12_03_044342_itemgiohang',1),(12,'2021_12_03_044421_trangthai',1),(13,'2021_12_03_044422_hoadon',1),(14,'2021_12_03_044443_itemhoadon',1),(15,'2021_12_04_001123_hinhanh',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nongsan`
--

DROP TABLE IF EXISTS `nongsan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nongsan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tenNongSan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia` bigint DEFAULT NULL,
  `soluong` bigint DEFAULT NULL,
  `create_by` bigint unsigned DEFAULT NULL,
  `id_danhmuc` bigint unsigned NOT NULL,
  `noisanxuat` text COLLATE utf8mb4_unicode_ci,
  `noidung` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nongsan_id_danhmuc_foreign` (`id_danhmuc`),
  CONSTRAINT `nongsan_id_danhmuc_foreign` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nongsan`
--

LOCK TABLES `nongsan` WRITE;
/*!40000 ALTER TABLE `nongsan` DISABLE KEYS */;
INSERT INTO `nongsan` VALUES (1,'Dứa',15500,1000,NULL,1,'Hồ Chí Minh','<p>Dứa này các cặp đôi hơi bị thích á nha<h1>Trần Đại</h1></p>',NULL,NULL),(2,'Dâu Tây',300000,10000,NULL,1,'Hà Nội','<p>Dâu Tây ngọt ngào</p>',NULL,NULL),(3,'Chanh vàng',15000,10000,NULL,1,'Đà Nẵng','<p>Thơm nức mũi</p>',NULL,NULL),(4,'Trái bưởi',135000,100,NULL,1,'Cần Thơ','<p><strong>Hòa bị</strong> điên<br>Bưởi 100 <i>roi xiêu ngon</i><a href=\"https://www.facebook.com/yeulamcrush/\"><i> link chi tiết</i></a></p>',NULL,NULL),(5,'111',111,111,NULL,1,'111','<p>This is some sample content.</p>',NULL,NULL),(6,'Hoaf ddieen',100000,100,NULL,4,'Quảng Nam','<p>Thịt siêu thơmmmm</p>',NULL,NULL),(7,'1',1,1,NULL,2,'1','<p>This is some s1111ample content.</p>',NULL,NULL);
/*!40000 ALTER TABLE `nongsan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Quản trị viên','ADMIN',NULL,NULL),(2,'Người dùng','USER',NULL,NULL),(3,'Nhân Viên','STAFF',NULL,NULL),(4,'Quản lý','MANAGER',NULL,NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trangthai`
--

DROP TABLE IF EXISTS `trangthai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trangthai` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tentrangthai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trangthai`
--

LOCK TABLES `trangthai` WRITE;
/*!40000 ALTER TABLE `trangthai` DISABLE KEYS */;
/*!40000 ALTER TABLE `trangthai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tendangnhap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thenganhang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` bigint unsigned NOT NULL,
  `ngaysinh` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_id_role_foreign` (`id_role`),
  CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','admin@admin.com','admin','admin',NULL,'$2y$10$7myTvXbO0v7s7yk0Qzwj0OLNu/UWUvogErEaJ3eevSWVQhW1xv./y',3,'2021-12-19 17:00:00',NULL,NULL,NULL,'2021-12-11 06:09:46'),(2,'user','user','user@user','user','user',NULL,'$2y$10$0RlsYm2aXFxN2MySia0kyeI6mjOICG3hJWqcmIeDeo4Vr/LDmypvi',1,'2021-12-19 17:00:00',NULL,NULL,NULL,NULL),(3,'trandai2401','Trần Đại','trandai2401@gmail.com','+10866146741','36 Hòa Nam 1 Phường Hòa Minh Quận Liên Chiểu Đà Nẵng',NULL,'$2y$10$MArmWps2Q/PDmaDw1bGVEuB7AWgCmoC5tVhg2VKeBKE3.dDjByf/q',3,'2001-01-23 17:00:00',NULL,NULL,NULL,'2021-12-11 06:09:44'),(4,'thuhoa123','Tăng  Thị Thu Hòa','thuhoa123@gmail.com','0987456321','Đại Lộc, Quảng Nam',NULL,'$2y$10$S4uVZ1rq6pxgjYYkf/qcOeRBTJpmNmCCK2VPdM2m.J3kkONR25oT2',2,'2001-01-02 17:00:00',NULL,NULL,NULL,'2021-12-14 07:03:00'),(5,'vananh123','Hồ Thị Vân Anh','Hoovananh123@gmail.com','12345','Núi Thành, Quảng Nam',NULL,'$2y$10$5HlhudV.Oaxc/ier.J9PkuUxiUOY2PXyQwTJDdRTOA2ehwKyX8Duy',2,'2000-12-31 17:00:00',NULL,NULL,NULL,'2021-12-11 06:00:15'),(6,'thuhoa0103','Tăng  Thị Thu Hòa','thuhoatang2001@gmail.com','+44987456321','Đại Lộc, Quảng Nam',NULL,'$2y$10$7RNnwiJHDEF9G4YcPNPXt.uoTwucF.9R4wjZylY7UqhOxb11fRpeC',2,'2001-02-28 17:00:00',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yeuthich`
--

DROP TABLE IF EXISTS `yeuthich`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `yeuthich` (
  `id_user` bigint unsigned NOT NULL,
  `id_nongsan` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`,`id_nongsan`),
  KEY `yeuthich_id_nongsan_foreign` (`id_nongsan`),
  CONSTRAINT `yeuthich_id_nongsan_foreign` FOREIGN KEY (`id_nongsan`) REFERENCES `nongsan` (`id`),
  CONSTRAINT `yeuthich_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yeuthich`
--

LOCK TABLES `yeuthich` WRITE;
/*!40000 ALTER TABLE `yeuthich` DISABLE KEYS */;
/*!40000 ALTER TABLE `yeuthich` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-20  9:59:16
