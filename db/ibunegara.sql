-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ibunegara
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.12.04.1

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
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `penulis` varchar(255) NOT NULL DEFAULT '',
  `ContentTypeD` varchar(255) NOT NULL DEFAULT '',
  `FotoDetil` longblob NOT NULL,
  `deskripsi` text NOT NULL,
  `Type150` varchar(255) NOT NULL DEFAULT '',
  `Type300` varchar(255) NOT NULL DEFAULT '',
  `Foto150` longblob NOT NULL,
  `Foto300` longblob NOT NULL,
  `judul` varchar(255) NOT NULL DEFAULT '',
  `isi` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beritafoto`
--

DROP TABLE IF EXISTS `beritafoto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beritafoto` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `FotoR` longblob NOT NULL,
  `TypeR` varchar(255) NOT NULL DEFAULT '',
  `FotoD` longblob NOT NULL,
  `TypeD` varchar(255) NOT NULL DEFAULT '',
  `deskripsi` varchar(255) NOT NULL DEFAULT '',
  `judul` varchar(255) NOT NULL DEFAULT '',
  `Ringkasan` text NOT NULL,
  `isi` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beritafoto`
--

LOCK TABLES `beritafoto` WRITE;
/*!40000 ALTER TABLE `beritafoto` DISABLE KEYS */;
/*!40000 ALTER TABLE `beritafoto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eng_pidato`
--

DROP TABLE IF EXISTS `eng_pidato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eng_pidato` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `tempat` varchar(255) NOT NULL DEFAULT '',
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `judul_id` text NOT NULL,
  `judul_en` varchar(255) NOT NULL DEFAULT '',
  `subjudul_id` varchar(255) NOT NULL DEFAULT '',
  `subjudul_en` varchar(255) NOT NULL DEFAULT '',
  `isi_id` text NOT NULL,
  `isi_en` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eng_pidato`
--

LOCK TABLES `eng_pidato` WRITE;
/*!40000 ALTER TABLE `eng_pidato` DISABLE KEYS */;
/*!40000 ALTER TABLE `eng_pidato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fokus`
--

DROP TABLE IF EXISTS `fokus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fokus` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `penulis` varchar(100) NOT NULL DEFAULT '',
  `kategori` varchar(6) NOT NULL DEFAULT '',
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `judul_id` varchar(255) NOT NULL DEFAULT '',
  `judul_en` varchar(255) NOT NULL DEFAULT '',
  `subjudul_id` varchar(255) NOT NULL DEFAULT '',
  `subjudul_en` varchar(255) NOT NULL DEFAULT '',
  `cuplikan_id` text NOT NULL,
  `cuplikan_en` text NOT NULL,
  `english` enum('0','1') NOT NULL DEFAULT '0',
  `NamaGambar` varchar(255) NOT NULL DEFAULT '',
  `ContentTypeR` varchar(100) NOT NULL DEFAULT '',
  `ContentTypeD` varchar(100) NOT NULL DEFAULT '',
  `FotoRingkasan` blob NOT NULL,
  `FotoDetil` blob NOT NULL,
  `deskripsi` varchar(255) NOT NULL DEFAULT '',
  `isi_id` text NOT NULL,
  `isi_en` text NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT '',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fokus`
--

LOCK TABLES `fokus` WRITE;
/*!40000 ALTER TABLE `fokus` DISABLE KEYS */;
/*!40000 ALTER TABLE `fokus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fokus_cat`
--

DROP TABLE IF EXISTS `fokus_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fokus_cat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kategori_id` varchar(200) NOT NULL DEFAULT '',
  `kategori_en` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fokus_cat`
--

LOCK TABLES `fokus_cat` WRITE;
/*!40000 ALTER TABLE `fokus_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `fokus_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fokus_link`
--

DROP TABLE IF EXISTS `fokus_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fokus_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fokus_id` int(11) NOT NULL DEFAULT '0',
  `judul_link` varchar(255) NOT NULL DEFAULT '',
  `url_link` varchar(255) NOT NULL DEFAULT '',
  `ringkasan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fokus_link`
--

LOCK TABLES `fokus_link` WRITE;
/*!40000 ALTER TABLE `fokus_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `fokus_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotorilis`
--

DROP TABLE IF EXISTS `fotorilis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotorilis` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `penulis` varchar(255) NOT NULL DEFAULT '',
  `ContentTypeD` varchar(255) NOT NULL DEFAULT '',
  `FotoDetil` longblob NOT NULL,
  `deskripsi` text NOT NULL,
  `Type150` varchar(255) NOT NULL DEFAULT '',
  `Type300` varchar(255) NOT NULL DEFAULT '',
  `Foto150` longblob NOT NULL,
  `Foto300` longblob NOT NULL,
  `judul` varchar(255) NOT NULL DEFAULT '',
  `isi` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotorilis`
--

LOCK TABLES `fotorilis` WRITE;
/*!40000 ALTER TABLE `fotorilis` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotorilis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_album`
--

DROP TABLE IF EXISTS `gallery_album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_album` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `album` varchar(200) NOT NULL DEFAULT '',
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `FotoR` longblob NOT NULL,
  `TypeR` varchar(255) NOT NULL DEFAULT '',
  `deskripsi` varchar(255) NOT NULL DEFAULT '',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_album`
--

LOCK TABLES `gallery_album` WRITE;
/*!40000 ALTER TABLE `gallery_album` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery_album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_pics`
--

DROP TABLE IF EXISTS `gallery_pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_pics` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_album` int(11) NOT NULL DEFAULT '0',
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `FotoD` longblob NOT NULL,
  `TypeD` varchar(255) NOT NULL DEFAULT '',
  `deskripsi` varchar(255) NOT NULL DEFAULT '',
  `pengisi` varchar(255) NOT NULL DEFAULT '',
  `ringkasan` text NOT NULL,
  `waktuLog` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_album` (`id_album`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_pics`
--

LOCK TABLES `gallery_pics` WRITE;
/*!40000 ALTER TABLE `gallery_pics` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery_pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kliping`
--

DROP TABLE IF EXISTS `kliping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kliping` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `judul` varchar(255) NOT NULL DEFAULT '',
  `sumber` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kliping`
--

LOCK TABLES `kliping` WRITE;
/*!40000 ALTER TABLE `kliping` DISABLE KEYS */;
/*!40000 ALTER TABLE `kliping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(32) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `logtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `act` varchar(255) NOT NULL DEFAULT '',
  `object` varchar(255) NOT NULL DEFAULT '',
  `module` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `uid` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `level` enum('1','2','3','4','5','6') NOT NULL DEFAULT '3',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `datereg` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `topik` varchar(200) NOT NULL DEFAULT '',
  `pesan` text NOT NULL,
  `baca` enum('0','1') NOT NULL DEFAULT '0',
  `balasan` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mutiara`
--

DROP TABLE IF EXISTS `mutiara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mutiara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` date NOT NULL DEFAULT '0000-00-00',
  `waktuLog` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tempat` varchar(100) NOT NULL DEFAULT '',
  `event` varchar(255) NOT NULL DEFAULT '',
  `mutiara` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mutiara`
--

LOCK TABLES `mutiara` WRITE;
/*!40000 ALTER TABLE `mutiara` DISABLE KEYS */;
/*!40000 ALTER TABLE `mutiara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `tb` varchar(20) NOT NULL DEFAULT 'pages',
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `hal` varchar(100) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `deskripsi` varchar(255) NOT NULL DEFAULT '',
  `detail1` text NOT NULL,
  `detail2` text NOT NULL,
  `detail3` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perhalaman`
--

DROP TABLE IF EXISTS `perhalaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perhalaman` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `halaman` varchar(50) NOT NULL DEFAULT '',
  `jumlah` int(2) NOT NULL DEFAULT '10',
  `keterangan` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perhalaman`
--

LOCK TABLES `perhalaman` WRITE;
/*!40000 ALTER TABLE `perhalaman` DISABLE KEYS */;
/*!40000 ALTER TABLE `perhalaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pers`
--

DROP TABLE IF EXISTS `pers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pers` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `kategori` char(1) NOT NULL DEFAULT '',
  `tempat` varchar(255) NOT NULL DEFAULT '',
  `waktu` date NOT NULL DEFAULT '0000-00-00',
  `waktu_log` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ContentType` varchar(255) NOT NULL DEFAULT '',
  `Dokumen` blob NOT NULL,
  `judul_id` varchar(255) NOT NULL DEFAULT '',
  `judul_en` varchar(255) NOT NULL DEFAULT '',
  `isi_id` text NOT NULL,
  `isi_en` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `english` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pers`
--

LOCK TABLES `pers` WRITE;
/*!40000 ALTER TABLE `pers` DISABLE KEYS */;
/*!40000 ALTER TABLE `pers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perspektif`
--

DROP TABLE IF EXISTS `perspektif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perspektif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` date NOT NULL DEFAULT '0000-00-00',
  `waktuLog` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `judul` varchar(100) NOT NULL DEFAULT '',
  `penulis` varchar(100) NOT NULL DEFAULT '',
  `media` varchar(100) NOT NULL DEFAULT '',
  `ringkasan` text NOT NULL,
  `isi` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perspektif`
--

LOCK TABLES `perspektif` WRITE;
/*!40000 ALTER TABLE `perspektif` DISABLE KEYS */;
/*!40000 ALTER TABLE `perspektif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pidato`
--

DROP TABLE IF EXISTS `pidato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pidato` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `tempat` varchar(255) NOT NULL DEFAULT '',
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `NamaGambar` varchar(255) NOT NULL DEFAULT '',
  `ContentTypeR` varchar(100) NOT NULL DEFAULT '',
  `ContentTypeD` varchar(100) NOT NULL DEFAULT '',
  `FotoRingkasan` longblob NOT NULL,
  `FotoDetil` longblob NOT NULL,
  `deskripsi` varchar(255) NOT NULL DEFAULT '',
  `Dokumen` longblob NOT NULL,
  `ContentTypeDokumen` varchar(255) NOT NULL DEFAULT '',
  `TemaSiaran` varchar(255) NOT NULL DEFAULT '',
  `waktuLog` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `alamatWMA` varchar(255) NOT NULL DEFAULT '',
  `alamatMP3` varchar(255) NOT NULL DEFAULT '',
  `alamatOGG` varchar(255) NOT NULL DEFAULT '',
  `judul_id` varchar(255) NOT NULL DEFAULT '',
  `judul_en` varchar(255) NOT NULL DEFAULT '',
  `cuplikan_id` text NOT NULL,
  `cuplikan_en` text NOT NULL,
  `subjudul_id` varchar(255) NOT NULL DEFAULT '',
  `subjudul_en` varchar(255) NOT NULL DEFAULT '',
  `isi_id` longtext NOT NULL,
  `isi_en` longtext NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `bahasa` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pidato`
--

LOCK TABLES `pidato` WRITE;
/*!40000 ALTER TABLE `pidato` DISABLE KEYS */;
/*!40000 ALTER TABLE `pidato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preference`
--

DROP TABLE IF EXISTS `preference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preference` (
  `title_presiden` varchar(200) NOT NULL DEFAULT '',
  `title_ibunegara` varchar(200) NOT NULL DEFAULT '',
  `title_istana` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preference`
--

LOCK TABLES `preference` WRITE;
/*!40000 ALTER TABLE `preference` DISABLE KEYS */;
/*!40000 ALTER TABLE `preference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms`
--

DROP TABLE IF EXISTS `sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tglAwal` date NOT NULL DEFAULT '0000-00-00',
  `tglAkhir` date NOT NULL DEFAULT '0000-00-00',
  `totalSMS` varchar(100) NOT NULL DEFAULT '',
  `Laporan` text NOT NULL,
  `image` longblob NOT NULL,
  `TypeIMG` varchar(255) NOT NULL DEFAULT '',
  `Data` longblob NOT NULL,
  `TypeData` varchar(255) NOT NULL DEFAULT '',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms`
--

LOCK TABLES `sms` WRITE;
/*!40000 ALTER TABLE `sms` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_data`
--

DROP TABLE IF EXISTS `sms_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_id` int(11) NOT NULL DEFAULT '0',
  `waktu_sms` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isi` varchar(200) NOT NULL DEFAULT '',
  `pengirim` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_data`
--

LOCK TABLES `sms_data` WRITE;
/*!40000 ALTER TABLE `sms_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topik`
--

DROP TABLE IF EXISTS `topik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topik` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sumber` varchar(50) NOT NULL DEFAULT '',
  `penulis` varchar(50) NOT NULL DEFAULT '',
  `kategori` int(10) NOT NULL DEFAULT '0',
  `judul_id` varchar(255) NOT NULL DEFAULT '',
  `judul_en` varchar(255) NOT NULL DEFAULT '',
  `keyword_id` varchar(255) NOT NULL DEFAULT '',
  `keyword_en` varchar(255) NOT NULL DEFAULT '',
  `cuplikan_id` text NOT NULL,
  `cuplikan_en` text NOT NULL,
  `NamaGambar` varchar(255) NOT NULL DEFAULT '',
  `GambarFokus` blob NOT NULL,
  `descripsi` varchar(255) NOT NULL DEFAULT '',
  `isi_id` text NOT NULL,
  `isi_en` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topik`
--

LOCK TABLES `topik` WRITE;
/*!40000 ALTER TABLE `topik` DISABLE KEYS */;
/*!40000 ALTER TABLE `topik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topik_link`
--

DROP TABLE IF EXISTS `topik_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topik_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topik_id` int(11) NOT NULL DEFAULT '0',
  `judul_link` varchar(255) NOT NULL DEFAULT '',
  `url_link` varchar(255) NOT NULL DEFAULT '',
  `ringkasan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topik_link`
--

LOCK TABLES `topik_link` WRITE;
/*!40000 ALTER TABLE `topik_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `topik_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uu`
--

DROP TABLE IF EXISTS `uu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` int(11) NOT NULL DEFAULT '0',
  `nomor` int(11) NOT NULL DEFAULT '0',
  `tahun` varchar(5) NOT NULL DEFAULT '',
  `tentang` text NOT NULL,
  `tempat` varchar(100) NOT NULL DEFAULT '',
  `waktu` date NOT NULL DEFAULT '0000-00-00',
  `Dokumen` longblob NOT NULL,
  `TypeD` varchar(255) NOT NULL DEFAULT '',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `nomor` (`nomor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uu`
--

LOCK TABLES `uu` WRITE;
/*!40000 ALTER TABLE `uu` DISABLE KEYS */;
/*!40000 ALTER TABLE `uu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wawancara`
--

DROP TABLE IF EXISTS `wawancara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wawancara` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `tempat` varchar(255) NOT NULL DEFAULT '',
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `NamaGambar` varchar(255) NOT NULL DEFAULT '',
  `ContentTypeR` varchar(100) NOT NULL DEFAULT '',
  `ContentTypeD` varchar(100) NOT NULL DEFAULT '',
  `FotoRingkasan` longblob NOT NULL,
  `FotoDetil` longblob NOT NULL,
  `deskripsi` varchar(255) NOT NULL DEFAULT '',
  `Dokumen` longblob NOT NULL,
  `ContentTypeDokumen` varchar(255) NOT NULL DEFAULT '',
  `TemaSiaran` varchar(255) NOT NULL DEFAULT '',
  `waktuLog` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `alamatWMA` varchar(255) NOT NULL DEFAULT '',
  `alamatMP3` varchar(255) NOT NULL DEFAULT '',
  `alamatOGG` varchar(255) NOT NULL DEFAULT '',
  `judul_id` varchar(255) NOT NULL DEFAULT '',
  `judul_en` varchar(255) NOT NULL DEFAULT '',
  `cuplikan_id` text NOT NULL,
  `cuplikan_en` text NOT NULL,
  `subjudul_id` varchar(255) NOT NULL DEFAULT '',
  `subjudul_en` varchar(255) NOT NULL DEFAULT '',
  `isi_id` longtext NOT NULL,
  `isi_en` longtext NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `bahasa` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wawancara`
--

LOCK TABLES `wawancara` WRITE;
/*!40000 ALTER TABLE `wawancara` DISABLE KEYS */;
/*!40000 ALTER TABLE `wawancara` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-17 15:22:31
