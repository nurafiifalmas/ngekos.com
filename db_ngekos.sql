-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_ngekos
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `foto` longblob NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (5,'Nurafiif Almas Azhari','nurafiifalmasazhr@gmail.com','b0a24be8b823d2257e52f5b6fb8bc48a','20180731_174801.jpg'),(6,'Najwa Ainaya Firmansyah','ainayanajwa673@gmail.com','1e2a4ca313943d53681a09818bb0d7d2','WhatsApp Image 2022-05-09 at 08.26.10.jpeg');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_customer`
--

DROP TABLE IF EXISTS `tb_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(200) NOT NULL,
  `nik_customer` char(16) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `alamat_customer` varchar(200) NOT NULL,
  `tlp_customer` char(14) NOT NULL,
  `gender_customer` enum('laki-laki','perempuan') NOT NULL,
  `foto_customer` text NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_customer`
--

LOCK TABLES `tb_customer` WRITE;
/*!40000 ALTER TABLE `tb_customer` DISABLE KEYS */;
INSERT INTO `tb_customer` VALUES (3,'Nurafiif Almas Azhari','123456789012342','nurafiifalmasazhari@gmail.com','b0a24be8b823d2257e52f5b6fb8bc48a','Ds. Lebak Ayu, Sawahan, Madiun','12345678976','laki-laki','IMG_2920.JPG'),(4,'najwa ainaya firmansyah','123456789876','najwaainaya673@gmail.com','f9e9b682232ab616ffde1efbb0e914d0','jl.doho no 21','087772433088','perempuan','WhatsApp Image 2022-06-20 at 11.59.42.jpeg'),(6,'Syahharbanu','3519142001020001','syahharbanu@gmail.com','ee00dda70930f64072e9596bdbc8210e','Ngampel, Mejayan, Madiun','082887554121','perempuan','WhatsApp Image 2022-06-23 at 10.12.22.jpeg');
/*!40000 ALTER TABLE `tb_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_kos`
--

DROP TABLE IF EXISTS `tb_kos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_kos` (
  `id_kos` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemilik_kos` int(11) NOT NULL,
  `nama_kos` varchar(200) NOT NULL,
  `desc_kos` text NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `stok_kamar` int(11) NOT NULL,
  `alamat_kos` varchar(200) NOT NULL,
  `foto1` longblob NOT NULL,
  `foto2` longblob NOT NULL,
  `foto3` longblob NOT NULL,
  `foto4` longblob NOT NULL,
  PRIMARY KEY (`id_kos`),
  KEY `id_pemilik_kos` (`id_pemilik_kos`),
  CONSTRAINT `tb_kos_ibfk_1` FOREIGN KEY (`id_pemilik_kos`) REFERENCES `tb_pemilik_kos` (`id_pemiliik_kos`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_kos`
--

LOCK TABLES `tb_kos` WRITE;
/*!40000 ALTER TABLE `tb_kos` DISABLE KEYS */;
INSERT INTO `tb_kos` VALUES (9,1,'Kos Depan Toko Bangunan Borobudur','Menerima Kos Putra dan Putri. Fasilitas : Kamar, Kipas, Meja, Lemari, Kamar Mandi Depan',350000,4,2,'Jl. Imam Bonjol Mejayan, Caruban','2.png','detail1_kos_tb_borobudur.jpeg','detail2_kos_tb_borobudur.jpeg','detail3_kos_tb_borobudur.jpeg'),(13,2,'Kos Pak Fajar','Menerima Kos Putri. Fasilitas : Free Wifi, Kipas, Musholla, Kamar Mandi, Dapur',350000,10,0,'Jl. Kutilang, Mejayan, Caruban','5.png','WhatsApp Image 2022-06-22 at 14.36.08.jpeg','WhatsApp Image 2022-06-22 at 14.36.09.jpeg','WhatsApp Image 2022-06-22 at 14.36.10.jpeg'),(16,1,'Kos Rumah Zhiva','Menerima Kos Putra dan Putri. Fasilitas : Meja, Kursi, Kasur, Lemari, AC, Musholla, Kamar Mandi (Kamar dapat untuk 2 orang)',830000,2,0,'Jl. Semeru Mejayan, Caruban','3.png','detail1_kos_zhiva.jpeg','detail2_kos_zhiva.jpeg','detail3_kos_zhiva.jpeg'),(18,1,'Kos Depan Toko Bangunan Borobudur','Menerima Kos Putra dan Putri. Fasilitas : Kamar, kipas, lemari, meja, kasur, dapur, kamar mandi belakang',300000,3,2,'Jl. Imam Bonjol Mejayan, Caruban','2.png','detail1_kos_tb_borobudur.jpeg','detail2_kos_tb_borobudur.jpeg','detail3_kos_tb_borobudur.jpeg'),(19,1,'Kos Rumah Zhiva','Menerima Kos Putra dan Putri. Fasilitas : meja, kursi, kasur, lemari, musholla, kamar mandi, kipas (Kamar tidur kecil)',480000,10,2,'Jl. Semeru Mejayan, Caruban','3.png','detail1_kos_zhiva.jpeg','zhiva non ac.jpeg','detail3_kos_zhiva.jpeg');
/*!40000 ALTER TABLE `tb_kos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pembayaran`
--

DROP TABLE IF EXISTS `tb_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesan` int(11) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `kode_pembayaran` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_pesan` (`id_pesan`),
  CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `tb_pesan` (`id_pesan`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pembayaran`
--

LOCK TABLES `tb_pembayaran` WRITE;
/*!40000 ALTER TABLE `tb_pembayaran` DISABLE KEYS */;
INSERT INTO `tb_pembayaran` VALUES (33,43,300000,'Lunas','KK26N80');
/*!40000 ALTER TABLE `tb_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pemilik_kos`
--

DROP TABLE IF EXISTS `tb_pemilik_kos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pemilik_kos` (
  `id_pemiliik_kos` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemilik_kos` varchar(200) NOT NULL,
  `tlp_pemilik_kos` char(14) NOT NULL,
  `gender_pemilik_kos` enum('laki-laki','perempuan') NOT NULL,
  `email_pemilik_kos` varchar(200) NOT NULL,
  `password_pemilik_kos` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pemiliik_kos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pemilik_kos`
--

LOCK TABLES `tb_pemilik_kos` WRITE;
/*!40000 ALTER TABLE `tb_pemilik_kos` DISABLE KEYS */;
INSERT INTO `tb_pemilik_kos` VALUES (1,'Nurafiif Almas Azhari','0895359508913','laki-laki','nurafiifalmas@gmail.com','b0a24be8b823d2257e52f5b6fb8bc48a'),(2,'Syaharbanu','081323550139','perempuan','syaharbanu@gmail.com','ee00dda70930f64072e9596bdbc8210e');
/*!40000 ALTER TABLE `tb_pemilik_kos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pesan`
--

DROP TABLE IF EXISTS `tb_pesan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kos` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `status_pemesanan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pesan`),
  KEY `id_kos` (`id_kos`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `tb_pesan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tb_customer` (`id_customer`),
  CONSTRAINT `tb_pesan_ibfk_2` FOREIGN KEY (`id_kos`) REFERENCES `tb_kos` (`id_kos`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pesan`
--

LOCK TABLES `tb_pesan` WRITE;
/*!40000 ALTER TABLE `tb_pesan` DISABLE KEYS */;
INSERT INTO `tb_pesan` VALUES (43,18,6,'2022-06-26','selesai');
/*!40000 ALTER TABLE `tb_pesan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-26 20:08:19
