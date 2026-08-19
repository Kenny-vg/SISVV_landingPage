-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: vista_verde
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `vista_verde`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `vista_verde` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `vista_verde`;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_is_visible_index` (`is_visible`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Desayunos & Brunch','desayunos','Comience el d??a con una selecci??n de reposter??a artesanal, platillos tradicionales, frutas de temporada y jugos naturales prensados.',NULL,NULL,'08:00 AM - 12:30 PM',1,'2026-07-09 16:03:33','2026-07-09 16:03:33'),(2,'Comidas','comida','Una propuesta de cortes premium, ensaladas frescas y platillos de mar ideales para disfrutar en nuestra terraza frente al lago.',NULL,NULL,'01:00 PM - 06:00 PM',1,'2026-07-09 16:03:33','2026-07-09 16:03:33'),(3,'Cenas','cena','Una experiencia de alta cocina y gastronom??a de autor maridada con una selecta colecci??n de vinos nacionales e internacionales.',NULL,NULL,'07:00 PM - 11:00 PM',1,'2026-07-09 16:03:33','2026-07-09 16:03:33'),(4,'Caf?? & Cocteler??a','cafe','Disfrute de nuestra barra de caf??s de especialidad, mixolog??a de autor y reposter??a gourmet en un ambiente de total privacidad.',NULL,NULL,'Todo el d??a',1,'2026-07-09 16:03:33','2026-07-09 16:03:33');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discipline_images`
--

DROP TABLE IF EXISTS `discipline_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discipline_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `discipline_id` bigint(20) unsigned NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discipline_images_discipline_id_foreign` (`discipline_id`),
  CONSTRAINT `discipline_images_discipline_id_foreign` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discipline_images`
--

LOCK TABLES `discipline_images` WRITE;
/*!40000 ALTER TABLE `discipline_images` DISABLE KEYS */;
INSERT INTO `discipline_images` VALUES (1,1,'disciplines/01KX6TT9W5DSFYDXN4PPNQ3QKF.JPG',1,'2026-07-10 20:17:01','2026-07-10 20:17:01'),(2,2,'disciplines/01KX6TWS87R0BCE4Y5VWP23P0K.jpeg',1,'2026-07-10 20:18:22','2026-07-10 20:18:22'),(3,4,'disciplines/01KX6TXZF3FVM91ZQ8X7B63X6Q.jpeg',1,'2026-07-10 20:19:01','2026-07-10 20:19:01'),(4,3,'disciplines/01KX6V1X93ZBJMAW3P5JGF8RVE.jpg',1,'2026-07-10 20:21:10','2026-07-10 20:21:10'),(5,5,'disciplines/01KX6V3A0NYFTWJB0VWTKJ5SE1.jpg',1,'2026-07-10 20:21:56','2026-07-10 20:21:56');
/*!40000 ALTER TABLE `discipline_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplines`
--

DROP TABLE IF EXISTS `disciplines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `disciplines_slug_unique` (`slug`),
  KEY `disciplines_is_published_sort_order_index` (`is_published`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplines`
--

LOCK TABLES `disciplines` WRITE;
/*!40000 ALTER TABLE `disciplines` DISABLE KEYS */;
INSERT INTO `disciplines` VALUES (1,'Golf','golf','Deportivo','Clases grupales e individuales con instructores certificados. Técnica de swing, juego corto y estrategia de campo para todos los niveles, desde principiantes hasta avanzados.','Mar - Dom: 7:00 am - 6:00 pm',1,1,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(2,'Yoga & Pilates','yoga-pilates','Bienestar','Sesiones al aire libre al amanecer y atardecer en la pradera del club. Yoga vinyasa, pilates mat y meditación guiada para conectar cuerpo, mente y naturaleza.','Mar - Sáb: 7:00 am y 5:00 pm',1,2,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(3,'Natación','natacion','Fitness','Clases para todas las edades y niveles, desde iniciación hasta entrenamiento avanzado. Técnica de estilos, resistencia acuática y aquafitness.','Mar - Sáb: 8:00 am - 7:00 pm',1,3,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(4,'Tenis','tenis','Deportivo','Canchas de arcilla profesional con iluminación nocturna. Clases particulares y en grupo, clinics de fin de semana y torneos internos para socios.','Lun - Dom: 7:00 am - 9:00 pm',1,4,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(5,'Entrenamiento Funcional','entrenamiento-funcional','Fitness','Circuitos de alta intensidad al aire libre en la pradera del club. Entrenamiento en grupo con peso corporal, kettlebells, TRX y cardio dinámico.','Lun - Sáb: 6:30 am, 8:00 am y 6:00 pm',1,5,'2026-07-09 16:03:33','2026-08-19 20:33:55');
/*!40000 ALTER TABLE `disciplines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `events_slug_unique` (`slug`),
  KEY `events_is_published_created_at_index` (`is_published`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Bodas de ensueño','bodas','Boda','<p>Celebra tu amor en un entorno natural incomparable. Nuestro equipo de coordinación se encargará de cada detalle para que tu día especial sea perfecto.</p>',NULL,NULL,1,'2026-07-09 16:03:33','2026-08-19 20:58:25'),(2,'Baby Shower','baby-shower','Baby Shower','<p>Recibe a tu bebé con una celebración íntima y elegante. Espacios versátiles y menús personalizados para compartir con familiares y amigos.</p>',NULL,NULL,1,'2026-07-09 16:03:33','2026-08-19 20:58:25'),(3,'Fiestas y celebraciones','fiestas','Fiesta','<p>Cumpleaños, aniversarios y cualquier motivo especial merece un lugar excepcional. Vive momentos inolvidables en nuestras instalaciones.</p>',NULL,NULL,1,'2026-07-09 16:03:33','2026-08-19 20:58:25'),(4,'Graduaciones','graduaciones','Graduación','<p>Reconoce el esfuerzo y dedicación de tus seres queridos con una celebración a la altura. Espacios para grupos grandes y menús ejecutivos.</p>',NULL,NULL,1,'2026-07-09 16:03:33','2026-08-19 20:58:25'),(5,'Eventos corporativos','corporativos','Corporativo','<p>Conferencias, convenciones y reuniones de negocio en un entorno que inspira productividad y confort. Equipo audiovisual y servicio de primer nivel.</p>',NULL,NULL,1,'2026-07-09 16:03:33','2026-08-19 20:58:25'),(6,'Torneo de Golf Anual','torneo-de-golf-anual','Torneo','<p>Únete a nuestro torneo de golf más esperado del año. Disfruta de una jornada deportiva en nuestro campo de 9 hoyos.</p>',NULL,NULL,1,'2026-07-09 16:03:33','2026-08-19 20:58:25');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facilities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `panorama_path` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `facilities_slug_unique` (`slug`),
  KEY `facilities_is_published_sort_order_index` (`is_published`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
INSERT INTO `facilities` VALUES (1,'Casa Club','casa-club','Social','Salones privados para eventos, restaurante gourmet con cocina de autor y una terraza panorámica con vistas espectaculares al campo de golf. El corazón social del club.','Mar - Sáb: 8:00 am - 10:00 pm | Dom: 8:00 am - 6:00 pm',NULL,1,1,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(2,'Spa de Bienestar','spa-de-bienestar','Bienestar','Santuario de relajación con masajes terapéuticos, temazcal tradicional, baños de vapor, sauna seca y tratamientos holísticos diseñados para renovar cuerpo y mente.','Mar - Sáb: 9:00 am - 8:00 pm',NULL,1,2,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(3,'Campo de Golf','campo-de-golf','Deportivo','Campo de 18 hoyos par 72, diseñado por arquitectos de renombre, rodeado de vegetación nativa. Ideal para torneos y juego recreativo en un entorno natural inigualable.','Todos los días: 6:00 am - 7:00 pm',NULL,1,3,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(4,'Alberca Semiolímpica','alberca-semiolimpica','Fitness','Alberca semiolímpica climatizada con área de loungers, sombrillas y servicio de snacks. Perfecta para entrenamiento, clases de natación o días de relax familiar.','Mar - Dom: 7:00 am - 8:00 pm',NULL,1,4,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(5,'Gimnasio','gimnasio','Fitness','Equipamiento Technogym de última generación, zona de entrenamiento funcional, área de cardio con vista al jardín y entrenadores certificados disponibles.','Lun - Sáb: 6:00 am - 10:00 pm | Dom: 8:00 am - 6:00 pm',NULL,1,5,'2026-07-09 16:03:33','2026-08-19 20:33:55');
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility_images`
--

DROP TABLE IF EXISTS `facility_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facility_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `facility_id` bigint(20) unsigned NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facility_images_facility_id_foreign` (`facility_id`),
  CONSTRAINT `facility_images_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility_images`
--

LOCK TABLES `facility_images` WRITE;
/*!40000 ALTER TABLE `facility_images` DISABLE KEYS */;
INSERT INTO `facility_images` VALUES (1,1,'facilities/01KX6TDZAR7CWT3FY8A5W8WVA7.JPG',1,'2026-07-10 20:10:17','2026-07-10 20:10:17'),(2,2,'facilities/01KX6TFEM5S6JV3GMZVVW3YHWS.jpeg',1,'2026-07-10 20:11:05','2026-07-10 20:11:05'),(3,3,'facilities/01KX6TH0M8YCR3240FS6052ZSB.JPG',1,'2026-07-10 20:11:56','2026-07-10 20:11:56'),(4,4,'facilities/01KX6TMKGRKH16T24KKSZYP4XE.jpeg',1,'2026-07-10 20:13:54','2026-07-10 20:13:54'),(5,5,'facilities/01KX6TNW0DFDEA19GQPT211Q79.JPG',1,'2026-07-10 20:14:36','2026-07-10 20:14:36');
/*!40000 ALTER TABLE `facility_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `heroes`
--

DROP TABLE IF EXISTS `heroes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `heroes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `heroes_is_active_sort_order_index` (`is_active`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `heroes`
--

LOCK TABLES `heroes` WRITE;
/*!40000 ALTER TABLE `heroes` DISABLE KEYS */;
INSERT INTO `heroes` VALUES (1,'Donde cada día se disfruta diferente','Naturaleza, bienestar y experiencias que elevan tu estilo de vida.','Explorar el Club','#instalaciones',NULL,1,0,'2026-07-09 16:03:33','2026-08-19 20:33:55');
/*!40000 ALTER TABLE `heroes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membership_benefits`
--

DROP TABLE IF EXISTS `membership_benefits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membership_benefits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `membership_id` bigint(20) unsigned NOT NULL,
  `benefit` text NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `membership_benefits_membership_id_foreign` (`membership_id`),
  CONSTRAINT `membership_benefits_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `memberships` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership_benefits`
--

LOCK TABLES `membership_benefits` WRITE;
/*!40000 ALTER TABLE `membership_benefits` DISABLE KEYS */;
INSERT INTO `membership_benefits` VALUES (109,9,'Tenis y pádel',1,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(110,9,'Gimnasio',2,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(111,9,'Natación',3,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(112,9,'Vapor y sauna',4,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(113,9,'Restaurante',5,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(114,9,'Cafetería',6,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(115,9,'Bar lounge y más',7,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(116,10,'Tenis y pádel',1,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(117,10,'Gimnasio',2,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(118,10,'Natación',3,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(119,10,'Vapor y sauna',4,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(120,10,'Restaurante',5,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(121,10,'Cafetería',6,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(122,10,'Bar lounge y más',7,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(123,11,'Tenis y pádel',1,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(124,11,'Gimnasio',2,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(125,11,'Natación',3,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(126,11,'Vapor y sauna',4,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(127,11,'Restaurante',5,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(128,11,'Cafetería',6,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(129,11,'Bar lounge y más',7,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(130,12,'Tenis y pádel',1,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(131,12,'Gimnasio',2,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(132,12,'Natación',3,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(133,12,'Vapor y sauna',4,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(134,12,'Restaurante',5,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(135,12,'Cafetería',6,'2026-08-19 20:33:55','2026-08-19 20:33:55'),(136,12,'Bar lounge y más',7,'2026-08-19 20:33:55','2026-08-19 20:33:55');
/*!40000 ALTER TABLE `membership_benefits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memberships`
--

DROP TABLE IF EXISTS `memberships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `memberships` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `show_price` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `memberships_is_published_sort_order_index` (`is_published`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memberships`
--

LOCK TABLES `memberships` WRITE;
/*!40000 ALTER TABLE `memberships` DISABLE KEYS */;
INSERT INTO `memberships` VALUES (9,'MENSUALIDAD INDIVIDUAL','$3,900.00','MEN','Campo de Golf',1,1,1,0,'2026-08-19 19:35:28','2026-08-19 20:33:55'),(10,'MENSUALIDAD INDIVIDUAL','$1,600.00','MEN','Casa Club',2,1,1,1,'2026-08-19 19:35:28','2026-08-19 20:33:55'),(11,'MENSUALIDAD FAMILIAR','$5,120.00','MEN','Casa Club',3,1,1,0,'2026-08-19 19:35:28','2026-08-19 20:33:55'),(12,'MENSUALIDAD FAMILIAR','$7,500.00','MEN','Campo de Golf',4,1,1,0,'2026-08-19 19:35:28','2026-08-19 20:33:55');
/*!40000 ALTER TABLE `memberships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2026_07_02_181115_create_categories_table',1),(6,'2026_07_02_181116_create_events_table',1),(7,'2026_07_02_181118_create_settings_table',1),(8,'2026_07_03_000001_create_heroes_table',1),(9,'2026_07_03_000002_create_facilities_table',1),(10,'2026_07_03_000003_create_facility_images_table',1),(11,'2026_07_03_000004_create_disciplines_table',1),(12,'2026_07_03_000005_create_discipline_images_table',1),(13,'2026_07_03_000006_create_page_sections_table',1),(14,'2026_07_04_000002_create_memberships_table',1),(15,'2026_08_14_000001_add_indexes_to_cms_tables',2),(16,'2026_08_19_125130_create_sessions_table',2),(17,'2026_08_19_125131_create_jobs_table',2),(18,'2026_08_19_132104_add_membership_fields_to_memberships_table',2),(19,'2026_08_19_133033_drop_clave_membresia_from_memberships_table',3),(20,'2026_08_19_133443_add_area_to_memberships_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_sections`
--

DROP TABLE IF EXISTS `page_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_float` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_sections_key_unique` (`key`),
  KEY `page_sections_is_active_index` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_sections`
--

LOCK TABLES `page_sections` WRITE;
/*!40000 ALTER TABLE `page_sections` DISABLE KEYS */;
INSERT INTO `page_sections` VALUES (1,'about_intro','Quiénes somos','Vista Verde Country Club nació como un sueño: crear un espacio donde la excelencia deportiva, el bienestar y la naturaleza se fundieran en perfecta armonía. Hoy somos un destino exclusivo para quienes buscan más que un club, un estilo de vida.','sections/01KX6TBQ8NFEK0KDCGA8222XHG.JPG',NULL,1,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(2,'about_mission','Nuestra Misión','Ofrecer a nuestros socios un refugio privado donde la excelencia deportiva, el bienestar integral y la conexión con la naturaleza se combinen para crear experiencias únicas que eleven su calidad de vida.',NULL,NULL,1,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(3,'about_vision','Nuestra Visión','Ser el club campestre más distinguido de la región, reconocido por nuestro compromiso con la calidad, la innovación en servicios y la creación de una comunidad exclusiva que trascienda generaciones.',NULL,NULL,1,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(4,'about_values','Nuestros Valores','Compromiso con la excelencia en cada servicio, respeto por la naturaleza y el entorno, integridad en cada acción, calidez en el trato humano y pasión por crear momentos inolvidables para nuestros socios y sus familias.',NULL,NULL,1,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(5,'about_philosophy','Nuestra Filosofía','Creemos que el verdadero lujo no está en lo material, sino en la libertad de disfrutar momentos auténticos. Cada rincón de Vista Verde está diseñado para inspirar, renovar y conectar a las personas con lo esencial.',NULL,NULL,1,'2026-07-09 16:03:33','2026-08-19 20:33:55'),(6,'menu_intro','Alta cocina en cada detalle.','Descubre nuestra propuesta gastronómica de temporada, curada por chefs de renombre y diseñada para acompañar tus tardes en el club. Disfruta de un maridaje exclusivo en la terraza frente al lago o en la comodidad del salón privado.','sections/01KX6VD3JEAG46AVE7HG8WBNAX.jpg','sections/01KX709VBD2NB0WNHW3JZ9S0JZ.png',1,'2026-07-09 16:03:33','2026-08-19 20:33:55');
/*!40000 ALTER TABLE `page_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site_name','Vista Verde Country Club','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(2,'site_description','Un refugio privado de golf y bienestar termal en sintonía con la naturaleza.','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(3,'hero_title','Donde cada día se disfruta diferente','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(4,'hero_subtitle','Naturaleza, bienestar y experiencias que elevan tu estilo de vida.','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(5,'hero_default_button','Explorar el Club','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(6,'hero_show_golfista','1','general','2026-07-09 16:03:33','2026-07-10 20:04:46'),(7,'about_heading','Un refugio privado<br><span style=\"font-style: italic; font-weight: 300; color: var(--color-accent-gold);\">donde el deporte y la naturaleza convergen.</span>','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(8,'instalaciones_heading','Espacios del<br><span>Club.</span>','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(9,'instalaciones_subtext','Cada rincón de Vista Verde ha sido diseñado para ofrecerte una experiencia de exclusividad y confort sin igual, desde la Casa Club hasta nuestro Spa de bienestar.','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(10,'instalaciones_btn_text','Ver Todas','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(11,'instalaciones_link_text','Conocer más →','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(12,'facilities_heading','Clases &<br><span>Disciplinas.</span>','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(13,'facilities_subtext','Instructores certificados, metodología de élite y espacios de primer nivel para elevar tu rendimiento y bienestar en cada sesión.','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(14,'facilities_link_text','Ver Clase →','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(15,'events_label','Club Vista Verde','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(16,'events_heading','Eventos &<br><span>Próximas fechas.</span>','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(17,'events_subtext','Actividades exclusivas, torneos y celebraciones diseñadas para la comunidad del club. Vive experiencias únicas junto a los tuyos.','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(18,'events_link_text','Ver evento →','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(19,'events_all_link_text','Ver todos los eventos','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(20,'facilities_all_link_text','Ver todas las clases','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(21,'menu_btn_text','Ver Carta Interactiva','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(22,'contact_phone','238 37 4 50 11 ext. 101 o 108','contact','2026-07-09 16:03:33','2026-07-09 16:03:33'),(23,'contact_cell','238 129 0316','contact','2026-07-09 16:03:33','2026-07-09 16:03:33'),(24,'contact_email','sistemas@vistaverde.com.mx','contact','2026-07-09 16:03:33','2026-07-09 16:03:33'),(25,'contact_schedule','Mar - Sáb: 8:00 am - 8:00 pm<br>Dom: 8:00 am - 6:00 pm','contact','2026-07-09 16:03:33','2026-08-19 20:58:02'),(26,'contact_address_name','Casa Club Vista Verde','contact','2026-07-09 16:03:33','2026-07-09 16:03:33'),(27,'contact_address_line1','Carretera Federal México-Tehuacán Km. 252','contact','2026-07-09 16:03:33','2026-08-19 20:58:02'),(28,'contact_address_line2','San Nicolás Tetitzintla, 75710 Tehuacán, Pue.','contact','2026-07-09 16:03:33','2026-08-19 20:58:02'),(29,'contact_maps_url','https://www.google.com/maps/place/Casa+Club+Vista+Verde+Country+Club/@18.4835419,-97.4133092,17z','contact','2026-07-09 16:03:33','2026-07-09 16:03:33'),(30,'contact_maps_embed','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.002589867335!2d-97.41330921649934!3d18.483541887826103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c5a2cf77bbf7f9%3A0x992163d342c0d985!2sCasa%20Club%20Vista%20Verde%20Country%20Club!5e0!3m2!1ses-419!2smx!4v1783023157035!5m2!1ses-419!2smx','contact','2026-07-09 16:03:33','2026-07-09 16:03:33'),(31,'contact_label','Visítenos','contact','2026-07-09 16:03:33','2026-08-19 20:58:02'),(32,'contact_heading','Ubicación<br><span>y acceso.</span>','contact','2026-07-09 16:03:33','2026-08-19 20:58:02'),(33,'contact_subtext','Vista Verde Country Club se encuentra ubicado en una zona privilegiada y de fácil acceso en Tehuacán, ofreciendo un entorno natural exclusivo de total privacidad para sus socios.','contact','2026-07-09 16:03:33','2026-08-19 20:58:02'),(34,'contact_address_label','Dirección Principal','contact','2026-07-09 16:03:33','2026-08-19 20:58:02'),(35,'contact_maps_btn_text','Cómo Llegar en Google Maps →','contact','2026-07-09 16:03:33','2026-08-19 20:58:02'),(36,'contact_social_heading','Síguenos en redes','contact','2026-07-09 16:03:33','2026-08-19 20:58:02'),(37,'nav_link_inicio','Inicio','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(38,'nav_link_instalaciones','Instalaciones','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(39,'nav_link_clases','Clases','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(40,'nav_link_eventos','Eventos','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(41,'nav_link_carta','Carta','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(42,'nav_link_membresias','Membresías','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(43,'nav_link_contacto','Contacto','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(44,'footer_memberships_title','Membresías e Informes','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(45,'footer_location_title','Ubicación','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(46,'footer_maps_link_text','Ver en Google Maps →','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(47,'footer_privacy_text','Aviso de Privacidad','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(48,'footer_terms_text','Términos y Condiciones','general','2026-07-09 16:03:33','2026-08-19 20:58:02'),(49,'footer_rights_text','Todos los derechos reservados.','general','2026-07-09 16:03:33','2026-07-09 16:03:33'),(50,'social_facebook','https://www.facebook.com/p/Vista-Verde-Country-Club-AC-100063650045982/','social','2026-07-09 16:03:33','2026-07-09 16:03:33'),(51,'social_instagram','https://www.instagram.com/clubvistaverdecountry/','social','2026-07-09 16:03:33','2026-07-09 16:03:33'),(52,'social_whatsapp','https://wa.me/522381290316','social','2026-07-09 16:03:33','2026-07-09 16:03:33'),(53,'social_whatsapp_number','522381290316','social','2026-07-09 16:03:33','2026-07-09 16:03:33'),(54,'about_image','about/01KX6T3W7XN2K2GDR4GB85Y8K3.JPG','general','2026-07-10 20:04:46','2026-07-10 20:04:46'),(55,'about_image_float','','general','2026-07-10 20:04:46','2026-08-19 20:56:05'),(56,'privacy_pdf','','general','2026-07-10 20:04:46','2026-08-19 19:23:24'),(57,'terms_pdf','','general','2026-07-10 20:04:46','2026-08-19 19:23:24'),(58,'membresias_reglamento_heading','Reglamento del socio','general','2026-08-19 19:23:24','2026-08-19 19:23:24'),(59,'membresias_actualizacion','El costo de la membresía será actualizado al inicio de cada año, de acuerdo con las políticas y ajustes establecidos por el club.','general','2026-08-19 19:23:24','2026-08-19 20:58:02'),(60,'membresias_consumos','<p><strong>Casa Club:</strong></p><p>Membresía individual: $300 mensuales.<br>Membresía familiar: $500 mensuales.</p><p><strong>Campo de Golf:</strong></p><p>Membresía individual y familiar: $500 mensuales.</p><p><em>El consumo mínimo debe realizarse durante el mes correspondiente. Para registrar sus consumos, es obligatorio proporcionar su número de membresía en cada punto de venta.</em></p>','general','2026-08-19 19:23:24','2026-08-19 20:58:02'),(61,'membresias_pagos','Para evitar recargos, los pagos mensuales deben realizarse durante los primeros 10 días de cada mes.','general','2026-08-19 19:23:24','2026-08-19 20:58:02'),(62,'membresias_cortesia','Los pases de cortesía estarán disponibles únicamente durante los primeros 5 días de cada mes, siempre y cuando la membresía se encuentre pagada en su totalidad.','general','2026-08-19 19:23:24','2026-08-19 20:58:02'),(63,'membresias_baja','<p>Para tramitar su baja, debe realizarse dentro de los primeros 10 días de cada mes, cumpliendo con los siguientes requisitos:</p><p>Completar el formato de baja correspondiente.<br>Asegurar que el estado de cuenta esté en $0.</p><p>La baja no podrá exceder los tres meses. En caso de superar este periodo, se requerirá el pago de una cuota de incorporación para reactivar la membresía.</p>','general','2026-08-19 19:23:24','2026-08-19 20:58:02'),(64,'membresias_visitas','Todas las visitas deben ser informadas previamente en la recepción para que el personal del pórtico pueda autorizar el acceso. Los visitantes deberán registrarse en recepción antes de ingresar a las instalaciones.','general','2026-08-19 19:23:24','2026-08-19 20:58:02'),(65,'membresias_fotografia','Todos los miembros de la membresía deben tomarse una fotografía en nuestras instalaciones para completar su registro.','general','2026-08-19 19:23:24','2026-08-19 20:58:02'),(66,'membresias_contacto','Cualquier duda, aclaración o pago debe comunicarse al correo <a href=\"mailto:caja@vistaverde.com.mx\">caja@vistaverde.com.mx</a>, al teléfono 238 374 5011 ext. 101 o por WhatsApp al 238 204 1659.','general','2026-08-19 19:23:24','2026-08-19 20:58:02');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin2','admin2@vistaverde.com','2026-08-19 19:47:57','$2y$10$s1gUYmpKdmxmniUKrB45buyWPnczaYby0t6vfyfVEynlNYx.iukcS',1,NULL,'2026-07-10 19:33:20','2026-08-19 19:47:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'vista_verde'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-19 15:00:33
