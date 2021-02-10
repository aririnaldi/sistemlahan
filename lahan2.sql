-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: lahan2
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `id_login` int NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` int NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'admin','admin',1);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_alternatif`
--

DROP TABLE IF EXISTS `tb_alternatif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_alternatif` (
  `kode` int NOT NULL AUTO_INCREMENT,
  `nama_tanaman` varchar(50) NOT NULL,
  `tekstur` varchar(100) NOT NULL,
  `ph_min` float NOT NULL,
  `ph_max` float NOT NULL,
  `drainase` varchar(100) NOT NULL,
  `suhu_min` float NOT NULL,
  `suhu_max` float NOT NULL,
  `ketinggian_min` varchar(10) NOT NULL,
  `ketinggian_max` varchar(10) NOT NULL,
  `lereng_min` varchar(10) NOT NULL,
  `lereng_max` varchar(10) NOT NULL,
  `ch_min` varchar(10) NOT NULL,
  `ch_max` varchar(10) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_alternatif`
--

LOCK TABLES `tb_alternatif` WRITE;
/*!40000 ALTER TABLE `tb_alternatif` DISABLE KEYS */;
INSERT INTO `tb_alternatif` VALUES (1,'Lengkuas','Halus, Agak Halus, Sedang, Agak Kasar, Kasar, Sangat Halus',1,14,'Baik, Sedang, Agak Terhambat, Terhambat, Agak Cepat, Sangat Terhambat, Cepat',15,40,'1','1500','1','15','250','4000'),(2,'Jahe','Agak Kasar, Sedang, Agak Halus, Halus, Sangat Halus, Kasar',1,14,'Baik, Sedang, Agak Terhambat, Terhambat, Agak Cepat, Sangat Terhambat, Cepat',20,35,'300','900','1','15','1800','4000'),(3,'Kunyit ','Agak Halus, Sedang, Halus, Agak Kasar, Sangat Halus, Kasar',4.5,14,'Baik, Sedang, Agak Terhambat, Terhambat, Agak Cepat, Sangat Terhambat, Cepat',15,40,'1','1500','1','15','250','4000'),(4,'Kencur','Agak Halus, Sedang, Halus, Agak Kasar, Sangat Halus, Kasar',1,14,'Baik, Sedang, Agak Terhambat, Terhambat, Agak Cepat, Sangat Terhambat, Cepat',15,40,'50','600','1','15','250','4000'),(5,'Temulawak','Sedang, Agak Halus, Halus, Agak Kasar, Sangat Halus',4.8,14,'Baik, Agak Terhambat, Terhambat, Sangat Cepat',19,27,'240','700','1','45','250','3000');
/*!40000 ALTER TABLE `tb_alternatif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_bobot_curah_hujan`
--

DROP TABLE IF EXISTS `tb_bobot_curah_hujan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_bobot_curah_hujan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanaman_id` int NOT NULL,
  `min_curah` int DEFAULT '0',
  `maks_curah` int DEFAULT '0',
  `bobot` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bobot_curah_hujan_tanaman_id_fk` (`tanaman_id`),
  CONSTRAINT `bobot_curah_hujan_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_bobot_curah_hujan`
--

LOCK TABLES `tb_bobot_curah_hujan` WRITE;
/*!40000 ALTER TABLE `tb_bobot_curah_hujan` DISABLE KEYS */;
INSERT INTO `tb_bobot_curah_hujan` VALUES (5,14,1001,2000,4),(6,14,2001,4000,3),(7,14,250,1000,2),(8,14,0,249,1),(9,14,4001,100000,1),(10,15,2501,3500,4),(11,15,1800,2500,3),(12,15,3501,4000,2),(13,15,0,1799,1),(14,15,4001,100000,1);
/*!40000 ALTER TABLE `tb_bobot_curah_hujan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_bobot_drainase`
--

DROP TABLE IF EXISTS `tb_bobot_drainase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_bobot_drainase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanaman_id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bobot` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bobot_drainase_tanaman_id_fk` (`tanaman_id`),
  CONSTRAINT `bobot_drainase_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_bobot_drainase`
--

LOCK TABLES `tb_bobot_drainase` WRITE;
/*!40000 ALTER TABLE `tb_bobot_drainase` DISABLE KEYS */;
INSERT INTO `tb_bobot_drainase` VALUES (34,14,'Baik',4),(35,14,'Agak Baik',4),(36,14,'Agak Terhambat',3),(37,14,'Terhambat',2),(38,14,'Agak Cepat',2),(39,14,'Sangat Terhambat',1),(40,14,'Cepat',1),(41,15,'Baik',4),(42,15,'Agak Baik',4),(43,15,'Agak Terhambat',3),(44,15,'Terhambat',2),(45,15,'Agak Cepat',2),(46,15,'Sangat Terhambat',1),(47,15,'Cepat',1);
/*!40000 ALTER TABLE `tb_bobot_drainase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_bobot_lereng`
--

DROP TABLE IF EXISTS `tb_bobot_lereng`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_bobot_lereng` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanaman_id` int NOT NULL,
  `min_lereng` int DEFAULT '0',
  `maks_lereng` int DEFAULT '0',
  `bobot` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bobot_lereng_tanaman_id_fk` (`tanaman_id`),
  CONSTRAINT `bobot_lereng_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_bobot_lereng`
--

LOCK TABLES `tb_bobot_lereng` WRITE;
/*!40000 ALTER TABLE `tb_bobot_lereng` DISABLE KEYS */;
INSERT INTO `tb_bobot_lereng` VALUES (6,14,0,2,4),(7,14,3,8,3),(8,14,9,15,2),(9,14,16,100,1),(10,15,0,2,4),(11,15,3,8,3),(12,15,9,15,2),(13,15,16,100,1);
/*!40000 ALTER TABLE `tb_bobot_lereng` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_bobot_ph`
--

DROP TABLE IF EXISTS `tb_bobot_ph`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_bobot_ph` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanaman_id` int NOT NULL,
  `min_ph` int DEFAULT '0',
  `maks_ph` int DEFAULT '0',
  `bobot` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bobot_ph_tanaman_id_fk` (`tanaman_id`),
  CONSTRAINT `bobot_ph_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_bobot_ph`
--

LOCK TABLES `tb_bobot_ph` WRITE;
/*!40000 ALTER TABLE `tb_bobot_ph` DISABLE KEYS */;
INSERT INTO `tb_bobot_ph` VALUES (6,14,5,6,4),(7,14,5,5,3),(8,14,6,8,2),(9,14,0,4,1),(10,14,8,100,1),(11,15,5,7,4),(12,15,4,5,3),(13,15,7,8,2),(14,15,0,4,1),(15,15,8,100,1);
/*!40000 ALTER TABLE `tb_bobot_ph` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_bobot_suhu`
--

DROP TABLE IF EXISTS `tb_bobot_suhu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_bobot_suhu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanaman_id` int NOT NULL,
  `min_suhu` int DEFAULT '0',
  `maks_suhu` int DEFAULT '0',
  `bobot` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bobot_suhu_tanaman_id_fk` (`tanaman_id`),
  CONSTRAINT `bobot_suhu_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_bobot_suhu`
--

LOCK TABLES `tb_bobot_suhu` WRITE;
/*!40000 ALTER TABLE `tb_bobot_suhu` DISABLE KEYS */;
INSERT INTO `tb_bobot_suhu` VALUES (7,14,23,28,4),(8,14,29,40,3),(9,14,15,22,2),(10,14,0,14,1),(11,14,41,100,1),(12,15,26,30,4),(13,15,20,25,3),(14,15,31,35,2),(15,15,0,20,1),(16,15,36,10000,1);
/*!40000 ALTER TABLE `tb_bobot_suhu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_bobot_tekstur`
--

DROP TABLE IF EXISTS `tb_bobot_tekstur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_bobot_tekstur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanaman_id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bobot` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bobot_tekstur_tanaman_id_fk` (`tanaman_id`),
  CONSTRAINT `bobot_tekstur_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_bobot_tekstur`
--

LOCK TABLES `tb_bobot_tekstur` WRITE;
/*!40000 ALTER TABLE `tb_bobot_tekstur` DISABLE KEYS */;
INSERT INTO `tb_bobot_tekstur` VALUES (9,14,'Agak Halus',4),(10,14,'Sedang',4),(11,14,'Halus',3),(12,14,'Agak Kasar',2),(13,14,'Sangat Halus',2),(14,14,'Kasar',1),(15,15,'Agak Kasar',4),(16,15,'Sedang',4),(17,15,'Agak Halus',3),(18,15,'Halus',3),(19,15,'Sangat Halus',2),(20,15,'Kasar',1);
/*!40000 ALTER TABLE `tb_bobot_tekstur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_bobot_tinggi_lahan`
--

DROP TABLE IF EXISTS `tb_bobot_tinggi_lahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_bobot_tinggi_lahan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanaman_id` int NOT NULL,
  `min_tinggi` int DEFAULT '0',
  `maks_tinggi` int DEFAULT '0',
  `bobot` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bobot_tinggi_lahan_tanaman_id_fk` (`tanaman_id`),
  CONSTRAINT `bobot_tinggi_lahan_tanaman_id_fk` FOREIGN KEY (`tanaman_id`) REFERENCES `tb_tanaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_bobot_tinggi_lahan`
--

LOCK TABLES `tb_bobot_tinggi_lahan` WRITE;
/*!40000 ALTER TABLE `tb_bobot_tinggi_lahan` DISABLE KEYS */;
INSERT INTO `tb_bobot_tinggi_lahan` VALUES (6,14,1,600,4),(7,14,601,900,3),(8,14,901,1500,2),(9,14,1501,10000000,1),(10,15,451,600,4),(11,15,300,450,3),(12,15,601,900,2),(13,15,0,299,1),(14,15,901,10000,1);
/*!40000 ALTER TABLE `tb_bobot_tinggi_lahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kriteria`
--

DROP TABLE IF EXISTS `tb_kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_kriteria` (
  `id_kriteria` int NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kriteria`
--

LOCK TABLES `tb_kriteria` WRITE;
/*!40000 ALTER TABLE `tb_kriteria` DISABLE KEYS */;
INSERT INTO `tb_kriteria` VALUES (1,'tekstur'),(2,'ph'),(3,'drainase'),(4,'suhu'),(5,'ketinggian'),(6,'lereng'),(7,'curah_hujan');
/*!40000 ALTER TABLE `tb_kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_lahan`
--

DROP TABLE IF EXISTS `tb_lahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_lahan` (
  `id_alamat` int NOT NULL AUTO_INCREMENT,
  `alamat` varchar(100) NOT NULL,
  `tekstur` varchar(100) NOT NULL,
  `ph` float NOT NULL,
  `drainase` varchar(100) NOT NULL,
  `suhu` float NOT NULL,
  `ketinggian` varchar(100) NOT NULL,
  `lereng` varchar(100) NOT NULL,
  `curah_hujan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_lahan`
--

LOCK TABLES `tb_lahan` WRITE;
/*!40000 ALTER TABLE `tb_lahan` DISABLE KEYS */;
INSERT INTO `tb_lahan` VALUES (2,'Caringin','Sangat Halus',5.6,'Cepat',24,'455','15','1574'),(4,'Cariu','Sangat Halus',4.5,'Cepat',28.5,'107','8','3061'),(5,'Ciampea','Halus',4.5,'Baik',27,'188','8','3936'),(6,'Ciawi','Agak Kasar',5.6,'Baik',23.5,'518','40','2574'),(9,'Cibinong','Sangat Halus',4.5,'Baik',28,'139','3','4344'),(10,'Cigudeg','Halus',4.5,'Baik',28,'369','41','3060'),(12,'Cibungbulang','Halus',6.6,'Baik',27,'350','8','2976'),(13,'Cigombong','Agak Kasar',5.6,'Baik',27,'578','15','2068'),(15,'Test 2','Sangat Halus',3,'Terhambat',6,'5000','50','400');
/*!40000 ALTER TABLE `tb_lahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_penilaian`
--

DROP TABLE IF EXISTS `tb_penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_penilaian` (
  `id_penilaian` int NOT NULL AUTO_INCREMENT,
  `id_alternatif` int NOT NULL,
  `kriteria_1` int NOT NULL,
  `kriteria_2` int NOT NULL,
  `kriteria_3` int NOT NULL,
  `kriteria_4` int NOT NULL,
  `level` int NOT NULL,
  PRIMARY KEY (`id_penilaian`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_penilaian`
--

LOCK TABLES `tb_penilaian` WRITE;
/*!40000 ALTER TABLE `tb_penilaian` DISABLE KEYS */;
INSERT INTO `tb_penilaian` VALUES (78,32,16,3,11,5,6),(79,33,7,3,12,1,6),(80,34,7,3,14,3,6),(81,35,16,3,14,2,6),(82,36,16,3,12,4,6),(83,37,16,3,13,2,6),(84,38,9,4,13,3,6),(85,32,1,11,6,5,5),(86,33,1,12,7,1,5),(87,34,3,12,16,3,5),(88,35,4,12,7,2,5),(89,36,1,13,9,4,5),(90,37,3,13,16,2,5),(91,38,4,14,16,3,5);
/*!40000 ALTER TABLE `tb_penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ranking`
--

DROP TABLE IF EXISTS `tb_ranking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_ranking` (
  `id_ranking` int NOT NULL AUTO_INCREMENT,
  `id_penilaian` int NOT NULL,
  `nilai_akhir` float NOT NULL,
  `level` int NOT NULL,
  PRIMARY KEY (`id_ranking`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ranking`
--

LOCK TABLES `tb_ranking` WRITE;
/*!40000 ALTER TABLE `tb_ranking` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_ranking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tanaman`
--

DROP TABLE IF EXISTS `tb_tanaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_tanaman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tanaman`
--

LOCK TABLES `tb_tanaman` WRITE;
/*!40000 ALTER TABLE `tb_tanaman` DISABLE KEYS */;
INSERT INTO `tb_tanaman` VALUES (14,'Lengkuas'),(15,'Jahe');
/*!40000 ALTER TABLE `tb_tanaman` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-10 13:52:09
