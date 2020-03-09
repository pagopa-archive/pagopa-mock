-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: pagopatest
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `clientparpt`
--

DROP TABLE IF EXISTS `clientparpt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientparpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identificativodominio` varchar(255) DEFAULT NULL,
  `identificativopsp` varchar(255) DEFAULT NULL,
  `dataorarichiesta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iuv` varchar(255) DEFAULT NULL,
  `ccp` varchar(255) DEFAULT NULL,
  `id_statorptrt` int(255) DEFAULT NULL,
  `dataesecuzionepagamento` date DEFAULT NULL,
  `importototaledaversare` decimal(19,2) DEFAULT NULL,
  `id_carrello` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `paaattivarptcoda`
--

DROP TABLE IF EXISTS `paaattivarptcoda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paaattivarptcoda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identificativoIntermediarioPA` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `identificativoStazioneIntermediarioPA` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `identificativoDominio` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `identificativoUnivocoVersamento` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `codiceContestoPagamento` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `identificativoPSP` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `importoSingoloVersamento` decimal(10,0) DEFAULT NULL,
  `identificativoIntermediarioPSP` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `identificativoCanalePSP` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `statusInviata` bit(1) DEFAULT NULL,
  `statusInviataRT` bit(1) DEFAULT NULL,
  `datart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pspinviacarrellortcoda`
--

DROP TABLE IF EXISTS `pspinviacarrellortcoda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pspinviacarrellortcoda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rtarray` text COLLATE latin1_general_ci,
  `rrarray` text COLLATE latin1_general_ci,
  `rtinviata` bit(1) DEFAULT NULL,
  `rrinviata` bit(1) DEFAULT NULL,
  `rrrichiesta` bit(1) DEFAULT NULL,
  `identificativoDominio` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `identificativoUnivocoVersamento` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `codiceContestoPagamento` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `dataarray` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `statorptrt`
--

DROP TABLE IF EXISTS `statorptrt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statorptrt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stato` varchar(255) DEFAULT NULL,
  `descrizione` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-25 10:36:32
