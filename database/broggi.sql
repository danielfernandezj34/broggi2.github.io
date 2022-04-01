-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: broggi
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `afectats`
--
use broggi ;
UNLOCK TABLES;
DROP TABLE IF EXISTS `afectats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afectats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefon` int(10) NOT NULL,
  `cip` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `cognoms` varchar(45) DEFAULT NULL,
  `edat` varchar(45) DEFAULT NULL,
  `te_cip` tinyint(4) DEFAULT NULL,
  `sexes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_afectats_sexes1_idx` (`sexes_id`),
  CONSTRAINT `fk_afectats_sexes1` FOREIGN KEY (`sexes_id`) REFERENCES `sexes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afectats`
--

LOCK TABLES `afectats` WRITE;
/*!40000 ALTER TABLE `afectats` DISABLE KEYS */;
/*!40000 ALTER TABLE `afectats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alertants`
--

DROP TABLE IF EXISTS `alertants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alertants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefon` int(10) NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `cognoms` varchar(150) DEFAULT NULL,
  `adreca` varchar(150) DEFAULT NULL,
  `municipis_id` int(11) DEFAULT NULL,
  `tipus_alertants_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_alertants_tipus_alertants1_idx` (`tipus_alertants_id`),
  KEY `fk_alertants_municipis1_idx` (`municipis_id`),
  CONSTRAINT `fk_alertants_municipis1` FOREIGN KEY (`municipis_id`) REFERENCES `municipis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alertants_tipus_alertants1` FOREIGN KEY (`tipus_alertants_id`) REFERENCES `tipus_alertants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alertants`
--


--
-- Table structure for table `comarques`
--

DROP TABLE IF EXISTS `comarques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comarques` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `provincies_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comarques_provincies1_idx` (`provincies_id`),
  CONSTRAINT `fk_comarques_provincies1` FOREIGN KEY (`provincies_id`) REFERENCES `provincies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comarques`
--


--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `helpbox`
--

DROP TABLE IF EXISTS `helpbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `helpbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preguntaES` varchar(300) NOT NULL,
  `preguntaEN` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `helpbox`
--

--
-- Table structure for table `incidencies`
--

DROP TABLE IF EXISTS `incidencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_incident` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `telefon_alertant` int(10) NOT NULL,
  `adreca` varchar(150) NOT NULL,
  `adreca_complement` varchar(150) DEFAULT NULL,
  `descripcio` varchar(256) NOT NULL,
  `nom_metge` varchar(45) DEFAULT NULL,
  `tipus_incidencies_id` int(11) NOT NULL,
  `alertants_id` int(11) NOT NULL,
  `municipis_id` int(11) NOT NULL,
  `usuaris_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `num_incident_UNIQUE` (`num_incident`),
  KEY `fk_incidencies_tipus_incidents1_idx` (`tipus_incidencies_id`),
  KEY `fk_incidencies_alertants1_idx` (`alertants_id`),
  KEY `fk_incidencies_municipis1_idx` (`municipis_id`),
  KEY `fk_incidencies_usuaris1_idx` (`usuaris_id`),
  CONSTRAINT `fk_incidencies_alertants1` FOREIGN KEY (`alertants_id`) REFERENCES `alertants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_municipis1` FOREIGN KEY (`municipis_id`) REFERENCES `municipis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_tipus_incidents1` FOREIGN KEY (`tipus_incidencies_id`) REFERENCES `tipus_incidencies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_usuaris1` FOREIGN KEY (`usuaris_id`) REFERENCES `usuaris` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencies`
--

LOCK TABLES `incidencies` WRITE;
/*!40000 ALTER TABLE `incidencies` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidencies_has_afectats`
--

DROP TABLE IF EXISTS `incidencies_has_afectats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencies_has_afectats` (
  `incidencies_id` int(11) NOT NULL,
  `afectats_id` int(11) NOT NULL,
  PRIMARY KEY (`incidencies_id`,`afectats_id`),
  KEY `fk_incidencies_has_afectats_afectats1_idx` (`afectats_id`),
  KEY `fk_incidencies_has_afectats_incidencies_idx` (`incidencies_id`),
  CONSTRAINT `fk_incidencies_has_afectats_afectats1` FOREIGN KEY (`afectats_id`) REFERENCES `afectats` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_has_afectats_incidencies` FOREIGN KEY (`incidencies_id`) REFERENCES `incidencies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencies_has_afectats`
--

LOCK TABLES `incidencies_has_afectats` WRITE;
/*!40000 ALTER TABLE `incidencies_has_afectats` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencies_has_afectats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidencies_has_recursos`
--

DROP TABLE IF EXISTS `incidencies_has_recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencies_has_recursos` (
  `incidencies_id` int(11) NOT NULL,
  `recursos_id` int(11) NOT NULL,
  `hora_activacio` datetime DEFAULT NULL,
  `hora_mobilitzacio` datetime DEFAULT NULL,
  `hora_assistencia` datetime DEFAULT NULL,
  `hora_transport` datetime DEFAULT NULL,
  `hora_arribada_hospital` datetime DEFAULT NULL,
  `hora_transferencia` datetime DEFAULT NULL,
  `hora_finalitzacio` datetime DEFAULT NULL,
  `prioritat` int(11) DEFAULT NULL,
  `desti` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`incidencies_id`,`recursos_id`),
  KEY `fk_incidencies_has_recursos_recursos1_idx` (`recursos_id`),
  KEY `fk_incidencies_has_recursos_incidencies1_idx` (`incidencies_id`),
  CONSTRAINT `fk_incidencies_has_recursos_incidencies1` FOREIGN KEY (`incidencies_id`) REFERENCES `incidencies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_incidencies_has_recursos_recursos1` FOREIGN KEY (`recursos_id`) REFERENCES `recursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencies_has_recursos`
--

LOCK TABLES `incidencies_has_recursos` WRITE;
/*!40000 ALTER TABLE `incidencies_has_recursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencies_has_recursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--


--
-- Table structure for table `municipis`
--

DROP TABLE IF EXISTS `municipis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipis` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `comarques_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_municipis_comarques1_idx` (`comarques_id`),
  CONSTRAINT `fk_municipis_comarques1` FOREIGN KEY (`comarques_id`) REFERENCES `comarques` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipis`
--

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `provincies`
--

DROP TABLE IF EXISTS `provincies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincies` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincies`
--


--
-- Table structure for table `recursos`
--

DROP TABLE IF EXISTS `recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codi` varchar(45) NOT NULL,
  `actiu` tinyint(4) NOT NULL,
  `tipus_recursos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recursos_tipus_recursos1_idx` (`tipus_recursos_id`),
  CONSTRAINT `fk_recursos_tipus_recursos1` FOREIGN KEY (`tipus_recursos_id`) REFERENCES `tipus_recursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recursos`
--

--
-- Table structure for table `rols`
--

DROP TABLE IF EXISTS `rols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rols`
--

--
-- Table structure for table `sexes`
--

DROP TABLE IF EXISTS `sexes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sexes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sexe` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sexe_UNIQUE` (`sexe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexes`
--


--
-- Table structure for table `tipus_alertants`
--

DROP TABLE IF EXISTS `tipus_alertants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipus_alertants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipus` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipus_UNIQUE` (`tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipus_alertants`
--
--
-- Table structure for table `tipus_incidencies`
--

DROP TABLE IF EXISTS `tipus_incidencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipus_incidencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipus` varchar(45) NOT NULL,
  `video` varchar(255),
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipus_UNIQUE` (`tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipus_incidencies`
--
--
-- Table structure for table `tipus_recursos`
--

DROP TABLE IF EXISTS `tipus_recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipus_recursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipus` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipus_UNIQUE` (`tipus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipus_recursos`
--


--
-- Table structure for table `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuaris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `contrasenya` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `cognoms` varchar(45) NOT NULL,
  `rols_id` int(11) NOT NULL,
  `recursos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuaris_rols1_idx` (`rols_id`),
  KEY `fk_usuaris_recursos1_idx` (`recursos_id`),
  CONSTRAINT `fk_usuaris_recursos1` FOREIGN KEY (`recursos_id`) REFERENCES `recursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuaris_rols1` FOREIGN KEY (`rols_id`) REFERENCES `rols` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuaris`
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-13 12:24:35
