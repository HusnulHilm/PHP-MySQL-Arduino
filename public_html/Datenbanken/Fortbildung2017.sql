-- MySQL dump 10.11
--
-- Host: localhost    Database: Fortbildung
-- ------------------------------------------------------
-- Server version	5.0.45

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
-- Table structure for table `Angebot`
--

DROP TABLE IF EXISTS `Angebot`;
CREATE TABLE `Angebot` (
  `ID_AN` int(11) NOT NULL auto_increment,
  `A_Name` varchar(255) NOT NULL,
  `Regelangebot` enum('J','N') NOT NULL default 'N',
  `Ergaenzungsangebot` enum('J','N') NOT NULL default 'N',
  `Ersatzangebot` enum('J','N') NOT NULL default 'N',
  `Bezeichnung` text NOT NULL,
  `Kapazitaet` int(11) default NULL,
  `vom` date NOT NULL,
  `bis` date default NULL,
  `Tagesveranstaltung` enum('J','N') NOT NULL default 'N',
  `Reihen` enum('J','N') NOT NULL default 'N',
  `Betriebspraktikum` enum('J','N') NOT NULL default 'N',
  `Abrufangebot` enum('J','N') NOT NULL default 'N',
  `elearning` enum('J','N') NOT NULL default 'N',
  `Unterrichtsbesuch` enum('J','N') NOT NULL default 'N',
  `Dauer` int(11) default NULL,
  PRIMARY KEY  (`ID_AN`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Angebot`
--

LOCK TABLES `Angebot` WRITE;
/*!40000 ALTER TABLE `Angebot` DISABLE KEYS */;
INSERT INTO `Angebot` VALUES (1,'WT 2014-002-16','N','J','N','Gespräche bewußt gestalten',15,'2014-12-04','0000-00-00','N','N','N','N','N','N',4),(2,'14E630001-11','J','N','N','ESF-Kurs GQM',15,'2014-10-09','0000-00-00','J','N','N','N','N','N',8),(3,'14L160610','J','N','N','English to go',15,'2014-11-06','2014-11-07','J','N','N','N','N','N',12),(4,'1257','J','N','N','Kollegiale Beratung',20,'2014-09-03','2014-09-03','N','N','N','N','N','N',3),(5,'1255','J','N','N','Kollegiale Beratung',20,'2014-09-03','2014-09-03','N','N','N','N','N','N',3),(6,'1189','J','N','N','Unterrichtsbesuche',20,'2014-09-03','2014-09-03','N','N','N','N','N','N',3),(7,'1259','J','N','N','Unterrichtsbesuche',20,'2014-09-03','2014-09-03','N','N','N','N','N','N',3),(8,'1193','J','N','N','moodle',20,'2014-09-03','2014-09-03','N','N','N','N','N','N',3),(9,'1261','J','N','N','moodle',20,'2014-09-03','2014-09-03','N','N','N','N','N','N',3),(10,'14E650400-01','J','N','N','moodle',20,'2014-09-09','2014-09-10','J','J','N','N','N','N',12),(11,'14L220200-01','J','N','N','Fortbildungsmangement',15,'2014-12-17','2014-12-18','J','N','N','N','N','N',12),(12,'14B125001','J','N','N','BBS im Fokus der qualitativen Weiterentwicklung',15,'2014-11-26','2014-11-27','J','N','N','N','N','N',12),(13,'14E650400-05','J','N','N','moodle 2.0',NULL,'2014-10-20','2014-10-21','N','J','N','N','N','N',NULL),(14,'14L050004','J','N','N','Fortbildung mit System',NULL,'2015-01-15','2015-01-15','N','N','N','N','N','N',NULL),(15,'Medical Airport I','J','N','N','Gesunder Rücken',NULL,'2015-02-26','2015-02-26','N','N','N','N','N','N',NULL),(16,'14F100042-01','J','N','N','Gesunderhaltung / Drogen und Suchtprävention',NULL,'2014-10-07','2014-10-07','N','N','N','N','N','N',NULL),(17,'14F133020-01','J','N','N','Freiheit und verantwortliches Handeln',NULL,'2014-09-30','2014-09-30','N','N','N','N','N','N',NULL),(18,'Medical Airport II','N','N','N','Gesunder Rücken',NULL,'2015-03-05','2015-03-05','N','N','N','N','N','N',NULL),(19,'Medical Airport III','N','N','N','Gesunder Rücken',NULL,'2015-03-12','2015-03-12','N','N','N','N','N','N',NULL),(20,'14L122004','J','N','N','Professionalisierung von schulischen Führungskräften',NULL,'2015-03-04','2015-03-06','N','N','N','N','N','N',NULL),(21,'14L550001','J','N','N','Workshop zur Erstelllung schulinterner Evaluationsinstrumente',NULL,'2015-02-19','2015-02-19','N','N','N','N','N','N',NULL),(22,'WT 2015-400-24','N','N','N','Magdeburger Lehrertag 2015',NULL,'2015-03-11','2015-03-11','N','N','N','N','N','N',NULL),(23,'11E610333','J','N','N','Brush up your English',NULL,'2014-01-10','2014-12-19','N','N','N','N','N','N',264),(24,'14L223208-01','J','N','N','Heterogentät im Unterricht des Übergangssystems der beruflichen Bildung',NULL,'2014-10-06','2014-10-08','J','N','N','N','N','N',NULL),(25,'14L223208-02','J','N','N','Heterogentät im Unterricht des Übergangssystems der beruflichen Bildung',NULL,'2014-12-01','2014-12-03','J','N','N','N','N','N',NULL),(26,'14L223208-03','N','N','N','Heterogentät im Unterricht des Übergangssystems der beruflichen Bildung',NULL,'2015-02-23','2015-02-25','J','N','N','N','N','N',NULL),(27,'TSM1','N','N','N','TSM1 Lehrerfortbildung',NULL,'2015-04-28','2015-04-29','N','N','N','N','N','N',2),(28,'Kochausbildung','N','N','N','Konferenz der Köche ausbildenden Lehrkräfte',NULL,'2015-03-18','2015-03-18','J','N','N','N','N','N',1),(29,'14L220200-02','J','N','N','Fortbildungsplanung an BBS',NULL,'2015-05-05','2015-05-05','J','N','N','N','N','N',1),(30,'14L122003','J','N','N','Coaching für schulische Führungskräfte',NULL,'2015-04-20','2015-04-21','N','N','N','N','N','N',2),(31,'14L223208-04','J','N','N','Heterogentät im Unterricht des Übergangssystems der beruflichen Bildung',NULL,'2015-03-30','2015-03-31','J','J','N','N','N','N',2),(32,'14L223208-05','J','N','N','Heterogentät im Unterricht des Übergangssystems der beruflichen Bildung',NULL,'2015-04-20','2015-04-21','J','N','N','N','N','N',2),(33,'14E650400-20','J','N','N','moodle@schule2.0: Aufbauworkshops zur Moderation der Schulinstanzen',NULL,'2015-06-23','2015-06-25','J','N','N','N','N','N',2),(34,'Spielplan 2014','N','J','N','Spielplan TdA',15,'2014-09-17','0000-00-00','N','N','N','N','N','N',2),(35,'14E610334','N','J','N','BRUSH UP Alumni',15,'2014-01-01','2015-06-30','N','N','N','N','N','N',24),(36,'14L205012-01','J','N','N','Simatic S7',15,'2014-12-09','2014-12-10','N','N','N','N','N','N',12),(37,'14L205012-02','J','N','N','Simatic S7',15,'2015-02-25','2015-02-26','N','N','N','N','N','N',12),(38,'Personalrat','J','N','N','Personalratsschulung',15,'2015-10-08','2015-10-08','N','N','N','N','N','N',12),(39,'Personalrat-1','J','N','N','Personalratsschulung',15,'2015-09-09','2015-09-09','N','N','N','N','N','N',12),(40,'Sachsen092015','J','N','N','Bau-, Holz-, Farbtechnik',15,'2015-09-16','2015-09-17','N','N','N','N','N','N',16),(41,'15L162008','J','N','N','Brush up - continued',12,'2015-09-22','2015-09-22','N','N','N','N','N','N',4),(42,'WT2015-074-53','N','N','N','Theaterpädagogische Angebote 2015/16 TdA',25,'2015-09-17','2015-09-17','N','N','N','N','N','N',4),(43,'Straßenbau','J','N','N','Straßen verbinden Europa',15,'2015-10-01','2015-10-02','N','N','N','N','N','N',16),(44,'15L262003','J','N','N','Sommerferienkurs \"Neue Thesen braucht das Land\"',25,'2016-06-27','2016-06-30','N','N','N','N','N','N',4),(45,'15L115002-01 ','J','N','N','Professionalisierung der Lehrkräfte durch Gesundheitsmanagement (Teil 1)',25,'2015-11-18','2015-11-19','N','N','N','N','N','N',16),(46,'15L115002-02','N','N','N','Professionalisierung der Lehrkräfte durch Gesundheitsmanagement (Teil 2)',25,'2016-01-27','2016-01-27','N','N','N','N','N','N',8),(47,'15L115002-03','J','N','N','Professionalisierung der Lehrkräfte durch Gesundheitsmanagement (Teil 3)',25,'2016-03-16','2016-03-16','J','N','N','N','N','N',8),(48,'14F221030','J','N','N','Qualitätssicherung in Metallberufen durch Prüfverfahren',25,'2015-02-25','2015-02-25','J','N','N','N','N','N',8),(49,'15B213013','J','N','N','Europakonferenz',56,'2015-10-08','2015-10-09','N','N','N','N','N','N',2),(50,'15L223201','J','N','N','Sicheres Auftreten als Lehrkraft sowie als Fachbetreuer',15,'2015-11-03','2015-11-04','J','N','N','N','N','N',16),(51,'15L091100','J','N','N','Coaching für schulische Führungskräfte',12,'2015-11-02','2015-11-04','N','N','N','N','N','N',16),(52,'15F223021','J','N','N','Die Verantwortung der Medien bei der Meinungsbildung der Schüler',25,'2016-01-19','2016-01-19','N','N','N','N','N','N',4),(53,'15L091703','N','N','N','3. Führungskräfteakademie',24,'2015-12-03','2015-12-05','J','J','N','N','N','N',16),(54,'15L220200-01','J','N','N','Fortbildungsmanagement und Fortbildungsplanung an berufsbildenden Schulen - Werkzeuge der Qualitätsentwicklung, Teil 3',20,'2015-12-17','2015-12-18','J','N','N','N','N','N',16),(55,'15L205012-01','J','N','N','Prozessvisualisierung mit SIMATIC',14,'2015-12-09','2015-12-10','J','N','N','N','N','N',16),(56,'Arbeit in internationalen Klassen','N','N','J','Unterrichtsmaterialien für die Arbeit in internationalen Klassen',12,'2015-11-17','2015-11-17','N','N','N','N','N','N',3),(57,'Sachsen012016','J','N','N','Baugeschichte Holzbauten',15,'2016-01-18','2016-01-19','J','N','N','N','N','N',16),(59,'15F171206-01','J','N','N','Fit und gesund - Fitnessprojekte',15,'2016-01-12','2016-01-12','J','N','N','N','N','N',8),(60,'Integrationstag 2016','N','N','N','Integrationstag 2016',35,'2016-02-20','2016-02-20','N','N','N','N','N','N',8),(61,'15L223202','J','N','N','Qualitätsentwicklung und Qualitätssicherung an BbS',25,'2016-03-01','2016-03-02','J','N','N','N','N','N',16),(62,'15L205012-02','N','N','N','Prozessvisualisierung mit SIMATIC',20,'2016-03-08','2016-03-09','J','N','N','N','N','N',16),(63,'15L115002-03','J','N','N','Professionalisierung der Lehrkräfte Teil 3',22,'2016-03-16','2016-03-16','J','J','N','N','N','N',8),(64,'Med. Airport 5509 Teil 1','J','N','N','Bewegung ist die beste Medizin',8,'2016-01-16','2016-01-16','N','N','N','N','N','N',3),(65,'Med. Airport 5509 Teil 2','J','N','N','Bewegung ist die beste Medizin',8,'2016-01-28','2016-01-28','N','N','N','N','N','N',3),(66,'Med. Airport 5509 Teil 3','J','N','N','Bewegung ist die beste Medizin',8,'2016-03-31','2016-03-31','N','N','N','N','N','N',3),(67,'Med. Airport 2016 Teil 1','J','N','N','Stimmt die Stimme',8,'2016-03-03','2016-03-03','N','N','N','N','N','N',3),(68,'Med. Airport 2016 Teil 2','J','N','N','Stimmt die Stimme',8,'2016-03-10','2016-03-10','N','N','N','N','N','N',3),(69,'Med. Airport 2016 Teil 3','J','N','N','Stimmt die Stimme',8,'2016-03-17','2016-03-17','N','N','N','N','N','N',3),(70,'DSLK2016','N','N','N','Deutscher Schulleiterkongress 2016',80,'2016-03-03','2016-03-05','J','N','N','N','N','N',24),(71,'Spezial-Seminar DIHK','N','N','N','Korrektur ungebundener Prüfungsaufgaben',25,'2016-04-14','2016-04-14','J','N','N','N','N','N',8),(72,'Dachseminar','N','N','N','Innovative Flachdachkonzepte',50,'2016-04-12','2016-04-12','J','N','N','N','N','N',6),(73,'15F220112','J','N','N','Verkehrstechnische Sicherung von Baustellen',16,'2016-04-14','2016-04-14','N','N','N','N','N','N',6),(74,'15L205016','J','N','N','Hoch hinaus? Baugerüste im Bauhaupt- und Baunebengwewerbe',16,'2016-04-28','2016-04-29','J','N','N','N','N','N',16),(75,'15F220014','J','N','N','Westafrikanische Küche',12,'2015-11-24','2015-11-24','N','N','N','N','N','N',3),(76,'KM Qualitätssicherung','N','N','N','Qualitätssicherung der schriftlichen Prüfungsarbeiten im Fach Deutsch an\nBerufsbildenden Schulen',12,'2015-11-05','2015-11-05','N','N','N','N','N','N',3),(77,'15F220029','N','N','N','Kollegialer Unterrichtsbes uch mit inklusivem Schwerpunkt im Bereich\nErnährung/Hauswirtschaft',12,'2016-02-23','2016-02-23','N','N','N','N','N','N',4),(78,'15L175001','J','N','N','Willkommenskultur und DaZ',25,'2015-10-14','2015-10-14','N','N','N','N','N','N',2),(79,'15F220124','J','N','N','E-Learning im Lernfeldunterricht',12,'2015-12-10','2015-12-10','N','N','N','N','N','N',4),(80,'15F133001-02','J','N','N','Begegnung mit dem Islam',15,'2016-01-11','2016-01-11','J','N','N','N','N','N',8),(81,'TdA Schule und Theater','N','J','N','Zwei Institutionen - Ein Ziel\nDer Junge auf dem Baum',100,'2016-09-15','2016-09-15','N','N','N','N','N','N',4),(82,'TdA Anne Frank','N','J','N','Anne Frank',100,'2017-01-12','2017-01-12','N','N','N','N','N','N',3),(83,'16L223207','J','N','N','Gemeinsamer Unterricht im BVJ',25,'2016-09-08','2016-09-09','J','N','N','N','N','N',12),(84,'16L607101','J','N','N','Koordinierungsberatung der ostdeutschen Bundesländer in den Berufen Bau/Holz',15,'2016-11-23','2016-11-24','J','N','N','N','N','N',16),(85,'16L550001','J','N','N','Perspektive des GQM',15,'2016-09-19','2016-09-20','J','N','N','N','N','N',12),(86,'15L220200','J','N','N','Fortbildungsmanagement und Fortbildungsplanung an berufsbildenden Schulen - Werkzeuge der Qualitätsentwicklung, Teil 4',15,'2016-06-09','2016-06-10','J','J','N','N','N','N',16),(87,'16L220220','J','N','N','Fortbildungsbeauftragte(r) an berufsbildenden Schulen - Mitgestalter von Schulentwicklung',15,'2016-06-08','2016-06-08','N','N','N','N','N','N',6),(88,'16L153002','J','N','N','Digitale Medien im Unterricht\n14 Termine im ersten Halbjahr 2016/2017',15,'2016-10-13','2017-01-26','J','J','N','N','N','N',100),(89,'16L220200-01','J','N','N','Fortbildungsmanagement und Fortbildungsplanung an berufsbildenden Schulen - Werkzeuge der Qualitätsentwicklung',15,'2016-12-15','2016-12-16','J','J','N','N','N','N',12),(90,'16L223202','J','N','N','Qualitätssicherung in der Lehrerfortbildung',20,'2017-03-01','2017-03-02','J','N','N','N','N','N',14),(91,'WT 2017-400-26','N','N','N','Informatorische Bildung an Schulen',120,'2017-03-08','2017-03-08','J','N','N','N','N','N',8),(92,'16L220210-02','J','N','N','Projekte im Unterricht. TIA-Portal und SPS Teil 4',20,'2017-03-08','2017-03-09','J','J','N','N','N','N',16),(93,'16L223205','J','N','N','Ein neuer Schwerpunkt in der FOS: Ingenieurtechnik',20,'2017-03-28','2017-03-28','J','N','N','N','N','N',8),(94,'16L220200-02','J','N','N','Fortbildungsmanagement und Fortbildungsplanung',16,'2017-04-19','2017-04-20','J','N','N','N','N','N',16);
/*!40000 ALTER TABLE `Angebot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Beantragt`
--

DROP TABLE IF EXISTS `Beantragt`;
CREATE TABLE `Beantragt` (
  `ID` int(10) NOT NULL auto_increment,
  `P_NR` int(10) default NULL,
  `A_NR` varchar(255) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Beantragt`
--

LOCK TABLES `Beantragt` WRITE;
/*!40000 ALTER TABLE `Beantragt` DISABLE KEYS */;
INSERT INTO `Beantragt` VALUES (1,24,'44'),(3,18,'46'),(4,18,'47'),(5,14,'52'),(6,35,'52'),(7,40,'52');
/*!40000 ALTER TABLE `Beantragt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Besucht`
--

DROP TABLE IF EXISTS `Besucht`;
CREATE TABLE `Besucht` (
  `ID` int(10) NOT NULL auto_increment,
  `BP_NR` int(10) NOT NULL,
  `BA_NR` varchar(255) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=246 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Besucht`
--

LOCK TABLES `Besucht` WRITE;
/*!40000 ALTER TABLE `Besucht` DISABLE KEYS */;
INSERT INTO `Besucht` VALUES (1,18,'15'),(146,8,'31'),(3,18,'5'),(4,18,'8'),(5,18,'10'),(6,18,'13'),(7,2,'8'),(8,18,'11'),(9,18,'14'),(10,1,'6'),(11,1,'9'),(12,2,'7'),(13,4,'5'),(14,4,'8'),(15,5,'4'),(16,5,'9'),(17,6,'4'),(18,6,'9'),(19,7,'5'),(20,7,'6'),(21,8,'6'),(22,8,'9'),(23,8,'15'),(24,9,'4'),(25,9,'7'),(26,9,'15'),(27,10,'5'),(28,10,'6'),(29,11,'7'),(30,11,'8'),(31,12,'7'),(32,12,'8'),(33,14,'4'),(34,14,'7'),(35,15,'6'),(36,15,'9'),(37,15,'1'),(38,16,'5'),(39,16,'8'),(40,17,'6'),(41,17,'9'),(42,19,'4'),(43,19,'7'),(44,19,'15'),(45,20,'5'),(46,20,'8'),(47,21,'6'),(48,21,'9'),(49,22,'4'),(50,22,'9'),(51,22,'10'),(52,22,'15'),(53,23,'4'),(54,23,'7'),(55,24,'6'),(56,24,'9'),(57,25,'4'),(58,25,'5'),(59,25,'3'),(60,26,'4'),(61,26,'7'),(62,27,'4'),(63,27,'7'),(64,28,'5'),(65,28,'8'),(66,29,'5'),(67,29,'8'),(68,29,'15'),(69,30,'4'),(70,30,'7'),(71,32,'6'),(72,32,'9'),(73,34,'5'),(74,34,'6'),(75,35,'6'),(76,35,'9'),(77,36,'5'),(78,36,'6'),(79,37,'5'),(80,37,'6'),(81,38,'4'),(82,38,'9'),(83,39,'8'),(84,39,'9'),(85,40,'5'),(86,40,'8'),(87,41,'4'),(88,41,'9'),(89,42,'6'),(90,42,'8'),(91,43,'5'),(92,43,'8'),(93,44,'4'),(94,44,'5'),(95,45,'4'),(96,45,'7'),(97,45,'2'),(98,45,'15'),(99,46,'6'),(100,46,'9'),(101,47,'6'),(102,47,'9'),(103,48,'5'),(104,48,'8'),(105,49,'5'),(106,49,'8'),(107,50,'7'),(108,50,'8'),(109,51,'6'),(110,51,'9'),(111,52,'6'),(112,52,'9'),(113,53,'5'),(114,53,'8'),(115,54,'5'),(116,54,'6'),(117,39,'16'),(118,39,'17'),(119,7,'18'),(120,18,'18'),(121,19,'18'),(122,22,'18'),(123,29,'18'),(124,18,'19'),(125,10,'21'),(126,2,'20'),(127,18,'22'),(128,2,'12'),(129,25,'23'),(130,7,'19'),(131,8,'19'),(132,9,'19'),(133,19,'19'),(134,22,'19'),(135,29,'19'),(136,8,'24'),(137,8,'25'),(138,8,'26'),(139,47,'24'),(140,47,'25'),(141,47,'26'),(142,25,'28'),(143,46,'27'),(144,18,'29'),(145,50,'30'),(147,8,'32'),(148,18,'33'),(152,25,'35'),(151,37,'34'),(153,28,'36'),(154,28,'37'),(155,5,'38'),(156,40,'39'),(157,38,'40'),(158,25,'41'),(159,12,'42'),(160,38,'43'),(161,25,'42'),(162,30,'48'),(163,18,'38'),(164,47,'39'),(165,19,'39'),(166,38,'49'),(167,38,'50'),(168,50,'51'),(169,18,'45'),(170,2,'53'),(171,18,'54'),(172,28,'55'),(173,9,'56'),(174,45,'56'),(175,38,'57'),(176,18,'46'),(177,10,'59'),(178,2,'60'),(179,38,'61'),(180,28,'62'),(181,18,'63'),(182,18,'64'),(183,48,'64'),(184,7,'66'),(185,9,'64'),(186,19,'64'),(187,22,'64'),(188,48,'65'),(189,7,'65'),(190,9,'65'),(191,19,'65'),(192,22,'65'),(193,18,'65'),(194,5,'67'),(195,18,'67'),(196,30,'67'),(197,33,'67'),(198,39,'67'),(199,40,'67'),(200,5,'68'),(201,18,'68'),(202,30,'68'),(203,39,'68'),(204,40,'68'),(205,5,'69'),(206,18,'69'),(207,30,'69'),(208,33,'69'),(209,39,'69'),(210,40,'69'),(211,2,'1'),(212,9,'66'),(213,18,'66'),(214,19,'66'),(215,22,'66'),(216,48,'66'),(217,2,'70'),(219,25,'71'),(220,10,'72'),(221,38,'73'),(222,38,'74'),(223,16,'75'),(224,16,'76'),(225,16,'77'),(226,45,'75'),(227,45,'78'),(228,9,'79'),(229,9,'80'),(230,25,'81'),(231,25,'82'),(232,47,'83'),(233,38,'84'),(234,33,'85'),(235,33,'81'),(236,18,'86'),(237,18,'87'),(238,18,'88'),(239,18,'89'),(241,38,'90'),(242,18,'91'),(243,28,'92'),(244,28,'93'),(245,18,'94');
/*!40000 ALTER TABLE `Besucht` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Lehrer`
--

DROP TABLE IF EXISTS `Lehrer`;
CREATE TABLE `Lehrer` (
  `P_NR` int(10) NOT NULL auto_increment,
  `Vorname` varchar(255) NOT NULL,
  `Nachname` varchar(255) NOT NULL,
  `Geburtsdatum` date default NULL,
  `Schule` varchar(255) default NULL,
  `Schulform` varchar(255) default '',
  `Dienstalter` date default NULL,
  `rente` date default NULL,
  `aktuell` char(1) default 'y',
  `abgabe2016` char(1) default 'n',
  `KurzBez` char(4) default NULL,
  PRIMARY KEY  (`P_NR`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Lehrer`
--

LOCK TABLES `Lehrer` WRITE;
/*!40000 ALTER TABLE `Lehrer` DISABLE KEYS */;
INSERT INTO `Lehrer` VALUES (1,'Joern','Baacke','1965-11-15','BbS I Stendal',NULL,NULL,NULL,'y','y','Baa'),(2,'Lothar','Baetz','1954-07-31','BbS I Stendal',NULL,NULL,'2020-07-31','y','y','Bä'),(3,'Thomas','Beversdorff','1967-01-25','BbS I Stendal',NULL,NULL,NULL,'y','y','BeT'),(4,'Rolf','Birkholz','1960-04-10','BbS I Stendal',NULL,NULL,NULL,'y','y','Bz'),(5,'Burkhard','Boerner','1968-05-03','BbS I Stendal',NULL,NULL,NULL,'y','n','Bör'),(6,'Thomas','Boesener','1979-08-04','BbS I Stendal',NULL,NULL,NULL,'n','n',NULL),(7,'Regina','Briese','1961-04-25','BbS I Stendal',NULL,NULL,NULL,'y','y','Br'),(8,'Doreen','Cierpinski','1969-02-24','BbS I Stendal',NULL,NULL,NULL,'y','y','Cp'),(9,'Kirsten','Claus','1956-01-29','BbS I Stendal',NULL,NULL,'2022-01-31','y','y','Cl'),(10,'Philipp','Doering','1985-12-20','BbS I Stendal',NULL,NULL,NULL,'y','n','Do'),(11,'Joachim','Friedrich','1956-11-01','BbS I Stendal',NULL,NULL,NULL,'y','n','Fr'),(12,'Werner','Gehlhar','1950-11-19','BbS I Stendal',NULL,NULL,'2016-07-31','n','n',NULL),(13,'Kerstin','Halfter','1962-08-05','BbS I Stendal',NULL,NULL,NULL,'y','n','Hf'),(14,'Guenter','Hartwig','1952-02-27','BbS I Stendal',NULL,NULL,'2018-01-31','y','y','Har'),(15,'Hans-Georg','Hartz','1957-07-21','BbS I Stendal',NULL,NULL,NULL,'y','y','Hz'),(16,'Stefanie','Heine','1982-03-07','BbS I Stendal',NULL,NULL,NULL,'y','n','Hs'),(17,'Marion','Hepper','1965-04-30','BbS I Stendal',NULL,NULL,NULL,'y','y','Hep'),(18,'Ullrich','Hoetling','1955-12-13','BbS I Stendal','BFS','1981-08-01','2022-01-31','y','y','Hö'),(19,'Marion','Janas','1959-08-06','BbS I Stendal',NULL,NULL,NULL,'y','y','Jn'),(20,'Dietmar','Koehne','1956-03-23','BbS I Stendal',NULL,NULL,NULL,'y','n','Kn'),(21,'Jana','Konrad','1970-08-28','BbS I Stendal',NULL,NULL,NULL,'y','y','Ko'),(22,'Hans-Joachim','Krueger','1957-06-12','BbS I Stendal','0000-00-00',NULL,NULL,'y','y','KrH'),(23,'Petra','Kuhlmann','1962-02-15','BbS I Stendal',NULL,NULL,NULL,'y','y','Kl'),(24,'Ramona','Kuehn','1961-10-06','BbS I Stendal',NULL,NULL,NULL,'y','y','KüR'),(25,'Angelika','Loleit','1958-11-01','BbS I Stendal',NULL,NULL,NULL,'y','y','Lt'),(26,'Karlheinz','Nebelung','1950-04-30','BbS I Stendal',NULL,NULL,'2016-01-31','n','n',NULL),(27,'Jutta','Nebelung','1950-11-22','BbS I Stendal',NULL,NULL,'2016-01-31','n','n',NULL),(28,'Roy','Nique','1972-07-10','BbS I Stendal',NULL,NULL,NULL,'y','y','Nq'),(29,'Frank','Nowak','1963-08-28','BbS I Stendal',NULL,NULL,NULL,'y','n','Nw'),(30,'Burga','Peuker','1957-05-20','BbS I Stendal',NULL,NULL,NULL,'y','y','Pk'),(31,'Ute','Priegnitz','1958-05-20','BbS I Stendal',NULL,NULL,NULL,'n','n',NULL),(32,'Ulrich','Radloff','1951-07-30','BbS I Stendal',NULL,NULL,'2017-01-31','n','n',NULL),(33,'Christina','Schaff','1959-05-01','BbS I Stendal',NULL,NULL,NULL,'y','y','Scha'),(34,'Simone','Schulz','1962-02-10','BbS I Stendal',NULL,NULL,NULL,'y','y','Sz'),(35,'Waltraut','Schwieterka','1952-01-18','BbS I Stendal',NULL,NULL,'2017-07-31','y','y','Schw'),(36,'Kerstin','Seguin','1958-08-19','BbS I Stendal',NULL,NULL,NULL,'y','y','Seg'),(37,'Peter','Seibt','1961-12-30','BbS I Stendal',NULL,NULL,NULL,'y','y','Sei'),(38,'Falk','Seifert','1952-03-13','BbS I Stendal',NULL,NULL,'2018-01-31','y','y','Seif'),(39,'Gudrun','Simon','1959-04-02','BbS I Stendal',NULL,NULL,NULL,'y','y','Si'),(40,'Mike','Spanier','1973-01-31','BbS I Stendal',NULL,NULL,NULL,'y','n','Spa'),(41,'Wolfgang','Stein','1950-04-09','BbS I Stendal',NULL,NULL,'2016-01-31','n','n',NULL),(42,'Frank','Steinhorst','1962-08-06','BbS I Stendal',NULL,NULL,NULL,'y','n','Sth'),(43,'Hartmut','Thielbeer','1951-03-05','BbS I Stendal',NULL,NULL,'2017-01-31','n','n','Thi'),(44,'Elke','Totonji','1962-12-08','BbS I Stendal',NULL,NULL,NULL,'y','y','Tj'),(45,'Edwina','Tuchen','1963-07-03','BbS I Stendal',NULL,NULL,NULL,'y','y','Tu'),(46,'Gregor','Wagner','1967-02-28','BbS I Stendal',NULL,NULL,NULL,'y','y','Wg'),(47,'Udo','Wagner','1965-12-13','BbS I Stendal',NULL,NULL,NULL,'y','y','WaU'),(48,'Yvonne','Wesche','1977-12-09','BbS I Stendal',NULL,NULL,NULL,'y','y','Ws'),(49,'Ute','Wienroth','1959-11-18','BbS I Stendal',NULL,NULL,NULL,'y','y','Wr'),(50,'Ilona','Witte','1956-03-02','BbS I Stendal',NULL,NULL,NULL,'y','y','Wt'),(51,'Matthias','Woitek','1969-03-06','BbS I Stendal',NULL,NULL,NULL,'y','n','Wo'),(52,'Hardy','Wyrenbach','1956-08-02','BbS I Stendal',NULL,NULL,NULL,'y','n','Wyr'),(53,'Rainer','Zeglat','1958-05-09','BbS I Stendal',NULL,NULL,NULL,'y','n','Ze'),(54,'Mario','Zimper','1960-02-08','BbS I Stendal',NULL,NULL,NULL,'y','n','Zi'),(67,'Melanie','Hieke','1990-01-01','BbS I Stendal',NULL,NULL,NULL,'y','n','Hk'),(68,'Heidrun','Wolff','1990-01-01','BbS I Stendal',NULL,NULL,NULL,'y','n','Wf'),(69,'Christian','Sadel','1990-01-01','BbS I Stendal',NULL,NULL,NULL,'y','n','Sd'),(70,'Evgenia','Sachse','1990-01-01','BbS I Stendal',NULL,NULL,NULL,'y','n','Sac'),(71,'Ralph','Marth','1990-01-01','BbS I Stendal',NULL,NULL,NULL,'y','n','Mar'),(72,'Martin','Herms','1990-01-01','BbS I Stendal',NULL,NULL,NULL,'n','n',NULL),(73,'Christian','Baumert','1990-01-01','BbS I Stendal',NULL,NULL,NULL,'n','n',NULL),(74,'Anke','Ahrens','1990-01-01','BbS I Stendal',NULL,NULL,NULL,'y','n','Ah');
/*!40000 ALTER TABLE `Lehrer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'Fortbildung'
--
DELIMITER ;;
DELIMITER ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-08  8:29:44
