-- MySQL dump 10.13  Distrib 9.4.0, for Win64 (x86_64)
--
-- Host: localhost    Database: kompass_db
-- ------------------------------------------------------
-- Server version	9.4.0

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
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image_paths` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'2024-04-10','Die 9. Ausgabe der studentischen Zeitung \"is loading\"','Die 9. Ausgabe der studentischen Zeitung \"is loading\". Neue und alte Mitglieder der Redaktion bei einem hybriden Treffen.','[\"C:xampphtdocsLIFT-KompassVeranstaltungen9.jpg\"]'),(2,'2024-01-06','Lit Kompass - Nummer 8 in Casa de Cultur? Friedrich Schiller Bukarest','Lit Kompass - Nummer 8 in Casa de Cultur? Friedrich Schiller Bukarest. Herzlichen Dank Kulturhaus \"Friedrich Schiller\" für das Auslegen unserer Nummer 8! Herzlichen Dank ?tefania Mure?anu für die Zeitungszustellung!','[\"C:xampphtdocsLIFT-KompassVeranstaltungen8.1.jpg\", \"C:xampphtdocsLIFT-KompassVeranstaltungen8.2.jpg\", \"C:xampphtdocsLIFT-KompassVeranstaltungen8.3.jpg\", \"C:xampphtdocsLIFT-KompassVeranstaltungen8.4.jpg\", \"C:xampphtdocsLIFT-KompassVeranstaltungen8.5.jpg\"]'),(3,'2023-05-23','Schon gewusst?','Schon gewusst? Lit Kompass und ihre kleine Schwester Kompass JUNIOR liegen ab sofort in Casa de Cultur? Friedrich Schiller Bukarest und in den Buchhandlungen La Dou? Bufni?e und Am Dom in Temeswar zum kostenlosen Mitnehmen aus. lichen Dank Frau Mariana Duliu, Direktorin des Schillerhauses Bukarest, für das Auslegen unserer Zeitungen! lichen Dank ?tefania Mure?anu für die Zeitungszustellung!','[\"C:xampphtdocsLIFT-KompassVeranstaltungen7.1.jpg\", \"C:xampphtdocsLIFT-KompassVeranstaltungen7.2.jpg\", \"C:xampphtdocsLIFT-KompassVeranstaltungen7.3.jpg\", \"C:xampphtdocsLIFT-KompassVeranstaltungen7.4.jpg\"]'),(4,'2022-12-09','Von den Besten lernen','Von den Besten lernen: Nutzen Sie die Gelegenheit, beim Präsenz-Workshop ?Themenwahl im Journalismus\", unter der Leitung von Herrn Siegfried Thiel, Redaktionsleiter der ?Banater Zeitung\" Ihr praktisches Wissen zu festigen und zu erweitern. Wir freuen uns, Sie am 9. Dezember 2022, von 9.00 bis 11.00 Uhr, an der West-Universität Temeswar (V. Pârvanstr. 4), im Raum 248, begrüßen zu dürfen.','[\"C:xampphtdocsLIFT-KompassVeranstaltungen6.1.jpg\", \"C:xampphtdocsLIFT-KompassVeranstaltungen6.2.jpg\", \"C:xampphtdocsLIFT-KompassVeranstaltungen6.3.jpg\", \"C:xampphtdocsLIFT-KompassVeranstaltungen6.4.jpg\"]'),(5,'2022-10-25','Neue Mitglieder im Team','Heute haben wir neue Mitglieder im Team willkommen geheißen, eifrig diskutiert, geplant, Aufgaben verteilt und gelacht.','[\"C:xampphtdocsLIFT-KompassVeranstaltungen5.jpg\"]'),(6,'2022-11-24','Literaturwettbewerb','Heyo! Du hast die Chance deinen Text zu veröffentlichen und deine Ideen bekannt zu machen. Mach bei unserem Literaturwettbewerb mit und schicke uns deine kreativen Texte! Nu rata ?ansa de a-?i publica textul ?i a-?i face ideile cunoscute. Particip? la concursul nostru de crea?ii literare ?i trimite-ne textele tale creative pân? în 10 octombrie. Aktualisierung: Nun ist das Warten vorbei! Unser Team freut sich darüber, die Gewinner des Schreibwettbewerbs zum Thema \"Mein Ich im Netz\" bekanntzugeben : Schüler- Prosa: Briana Herciu, 11.Klasse, Nikolaus Lenau Lyzeum Erwachsene- Prosa: Vanessa Cu?ui Erwachsene- Dichtung: Dragana Paulic Herzlichen Glückwunsch an alle!','[\"C:xampphtdocsLIFT-KompassVeranstaltungen3.jpg\"]'),(7,'2021-11-04','Journalismus-Workshop','Journalismus-Workshop unter der Leitung von Herrn Siegfried Thiel, Redaktionsleiter der ?Banater Zeitung\". Wir freuen uns, Sie am 4. November 2021, von 9.30 bis 11.00 Uhr, online begrüßen zu dürfen.','[]'),(8,'2021-07-21','Vorstellung der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS','Vorstellung der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS','[]');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `issues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `pdf_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issues`
--

LOCK TABLES `issues` WRITE;
/*!40000 ALTER TABLE `issues` DISABLE KEYS */;
INSERT INTO `issues` VALUES (1,'Die 1. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS','Wir sprechen der Banater Zeitung, der Allgemeinen Deutschen Zeitung für Rumänien, dem Institut für Auslandsbeziehungen (ifa) und dem Medienverein FunkForum unseren besonderen Dank und unsere Anerkennung für die großzügige journalistische und technische Unterstützung aus.\n\nNe exprim?m gratitudinea  ?i recuno?tin?a fa?? de publica?ia în limba german? ?Banater Zeitung\", de cotidianul în limba german? ?Allgemeine Deutsche Zeitung für Rumänien\", de Institutul Federal German pentru Rela?ii Externe (ifa) ?i de Asocia?ia posturilor de radio de limb? german? din sud-estul Europei ?FunkForum\", pentru consilierea jurnalistic? ?i suportul tehnic acordate.','C:xampphtdocsLIFT-KompassAusgabenNr. 1.pdf','2025-09-21 17:19:07'),(2,'Die 2. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS','Text','C:xampphtdocsLIFT-KompassAusgabenNr. 2.pdf','2025-09-21 17:19:07'),(3,'Die 3. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS','Text','C:xampphtdocsLIFT-KompassAusgabenNr. 3.pdf','2025-09-21 17:19:07'),(4,'Die 4. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS','Wir haben für euch die 4. Nummer unserer deutschsprachigen studentischen Zeitung. Schaut rein! Ihr findet auch die Texte der Preisträgerinnen unseres Literaturwettbewerbs \"Mein ich im Netz\". Herzlichen Dank, Herr Dr. Johann Fernbach, Vorsitzender der DFDB und Herr Siegfried Thiel, BZ-Redaktionsleiter!','C:xampphtdocsLIFT-KompassAusgabenNr. 4.pdf','2025-09-21 17:19:07'),(5,'Die 5. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS','Die 5. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS. Mitgewirkt haben diesmal auch Schüler des Banater Kollegs in Temeswar (Colegiul National Banatean Timisoara). Dank großzügiger finanzieller Unterstützung durch das ?Demokratische Forum der Deutschen im Banat\" und journalistischer Betreuung durch die Banater Zeitung Temeswar ist die Zeitung auch als gedruckte Ausgabe erhältlich.','C:xampphtdocsLIFT-KompassAusgabenNr. 5.pdf','2025-09-21 17:19:07'),(6,'Die 6. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS','Wir lieben das Secret-Santa-Spiel. Die 6. Ausgabe ist unser Weihnachtsgeschenk für euch. Frohe und erholsame Weihnachtsferien!','AusgabenNr. 6.pdf','2025-09-21 17:19:07'),(7,'Die 7. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS','Text','C:xampphtdocsLIFT-KompassAusgabenNr. 7.pdf','2025-09-21 17:19:07'),(8,'Die 8. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS','Text','C:xampphtdocsLIFT-KompassAusgabenNr. 8.pdf','2025-09-21 17:19:07'),(9,'Die 9. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS','Text','C:xampphtdocsLIFT-KompassAusgabenNr. 9.pdf','2025-09-21 17:19:07'),(10,'Die 10. Nummer der deutschsprachigen Studentenzeitung UVT-LIFT KOMPASS','Text','C:xampphtdocsLIFT-KompassAusgabenNr. 10.pdf','2025-09-21 17:19:07');
/*!40000 ALTER TABLE `issues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `team_year` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'Dr. Karla Lup?an','Gründer','2020-2021',NULL,'2020-2021'),(2,'Nesia Murariu','Gründer','2020-2021',NULL,'2020-2021'),(3,'Paula Scoro?anu','Gründer','2020-2021',NULL,'2020-2021'),(4,'Astrid Kataro','Studentische Leitung','1. B.A. Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2020-2021'),(5,'Nesia Murariu','Studentische Leitung','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2020-2021'),(6,'Paula Scoro?anu','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2020-2021'),(7,'Teodora Opri?or','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2020-2021'),(8,'Viven Szabo','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2020-2021'),(9,'Eduard Adam','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2020-2021'),(10,'Bianca Tat','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2020-2021'),(11,'Anamaria Ciortea','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2020-2021'),(12,'Alexandra Danciu','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2020-2021'),(13,'Ana Cazacu','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2020-2021'),(14,'Lucia Marian','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2020-2021'),(15,'Valentina Stroiu','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2020-2021'),(16,'Vivien Szabo','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2020-2021'),(17,'Mihaela Mure?an','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2020-2021'),(18,'Sebastian Coman','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2020-2021'),(19,'Lektor Dr. Mihaela ?andor','Betreuer',NULL,NULL,'2020-2021'),(20,'Lektor Dr. Karla Lup?an','Betreuer',NULL,NULL,'2020-2021'),(21,'Astrid Kataro','Studentische Leitung','2. B.A. Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2022'),(22,'Nesia Murariu','Studentische Leitung','2. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2022'),(23,'Teodora Opri?or','Redaktionsmitglieder','2. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2022'),(24,'Viven Szabo','Redaktionsmitglieder','2. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2022'),(25,'Bianca Tat','Redaktionsmitglieder','2. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2022'),(26,'Anamaria Ciortea','Redaktionsmitglieder','2. B.A. Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2022'),(27,'Alexandra Danciu','Redaktionsmitglieder','2. B.A. Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2022'),(28,'Valentina Stroiu','Redaktionsmitglieder','2. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2022'),(29,'Giulia Rieger','Redaktionsmitglieder','3. B.A. Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2022'),(30,'Raluca Pintilie','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2022'),(31,'Carla Tîrn?veanu-Lenghel','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2022'),(32,'Maria-?tefania Mure?anu','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2022'),(33,'Beatrice Pele','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2022'),(34,'Robert Chincea','Redaktionsmitglieder','1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2022'),(35,'Andreea Ignat','Redaktionsmitglieder','2. B.A-Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2022'),(36,'Ana Voicu','Redaktionsmitglieder','2. B.A-Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2022'),(37,'Lektor Dr. Mihaela ?andor','Betreuer',NULL,NULL,'2022'),(38,'Doz. Dr. Karla Lup?an','Betreuer',NULL,NULL,'2022'),(39,'Astrid Kataro','Studentische Leitung','3. B.A-Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2023'),(40,'Nesia Murariu','Studentische Leitung','3. B.A.- Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2023'),(41,'Anamaria Ciortea','Redaktionsmitglieder','3. B.A-Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2023'),(42,'Alexandra Danciu','Redaktionsmitglieder','3. B.A-Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2023'),(43,'Giulia Rieger','Redaktionsmitglieder','1. M.A.-Studienjahr, Deutsch im europäischen Kontext',NULL,'2023'),(44,'Raluca Pintilie','Redaktionsmitglieder','2. B.A-Studienjahr, Fachrichtung Sprache und Literatur',NULL,'2023'),(45,'Maria ?tefania Mure?anu','Redaktionsmitglieder','2. B.A-Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2023'),(46,'Beatrice Pele','Redaktionsmitglieder','2. B.A-Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2023'),(47,'Robert Chincea','Redaktionsmitglieder','2. B.A-Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2023'),(48,'Sarah Peter-Zembre','Redaktionsmitglieder','2. B.A-Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2023'),(49,'Adina Ciob?nas','Redaktionsmitglieder','2. B.A-Studienjahr, Fachrichtung Angewandte Moderne Sprachen',NULL,'2023'),(50,'Florentina Constantiescu (Tache)','Redaktionsmitglieder','2. M.A.-Studienjahr, Deutsch im europäischen Kontext',NULL,'2023'),(51,'Lektor Dr. Mihaela ?andor','Betreuer',NULL,NULL,'2023'),(52,'Doz. Dr. Karla Lup?an','Betreuer',NULL,NULL,'2023'),(53,'ÖeAD-Lektor-Christoph Flechl','Betreuer',NULL,NULL,'2023'),(54,'Doz. Dr. Marianne Marki','Betreuer',NULL,NULL,'2023');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `issue_id` int NOT NULL,
  `page_number` int NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `issue_id` (`issue_id`),
  CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`issue_id`) REFERENCES `issues` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (41,1,1,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.1Nr. 1-1.png'),(42,1,2,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.1Nr. 1-2.png'),(43,1,3,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.1Nr. 1-3.png'),(44,1,4,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.1Nr. 1-4.png'),(45,2,1,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.2Nr. 2-1.png'),(46,2,2,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.2Nr. 2-2.png'),(47,2,3,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.2Nr. 2-3.png'),(48,2,4,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.2Nr. 2-4.png'),(49,3,1,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.3Nr. 3-1.png'),(50,3,2,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.3Nr. 3-2.png'),(51,3,3,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.3Nr. 3-3.png'),(52,3,4,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.3Nr. 3-4.png'),(53,4,1,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.4Nr. 4-1.png'),(54,4,2,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.4Nr. 4-2.png'),(55,4,3,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.4Nr. 4-3.png'),(56,4,4,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.4Nr. 4-4.png'),(57,5,1,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.5Nr. 5-1.png'),(58,5,2,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.5Nr. 5-2.png'),(59,5,3,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.5Nr. 5-3.png'),(60,5,4,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.5Nr. 5-4.png'),(61,6,1,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.6Nr. 6-1.png'),(62,6,2,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.6Nr. 6-2.png'),(63,6,3,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.6Nr. 6-3.png'),(64,6,4,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.6Nr. 6-4.png'),(65,7,1,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.7Nr. 7-1.png'),(66,7,2,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.7Nr. 7-2.png'),(67,7,3,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.7Nr. 7-3.png'),(68,7,4,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.7Nr. 7-4.png'),(69,8,1,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.8Nr. 8-1.png'),(70,8,2,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.8Nr. 8-2.png'),(71,8,3,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.8Nr. 8-3.png'),(72,8,4,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.8Nr. 8-4.png'),(73,9,1,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.9Nr. 9-1.png'),(74,9,2,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.9Nr. 9-2.png'),(75,9,3,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.9Nr. 9-3.png'),(76,9,4,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.9Nr. 9-4.png'),(77,10,1,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.10Nr. 10-1.png'),(78,10,2,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.10Nr. 10-2.png'),(79,10,3,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.10Nr. 10-3.png'),(80,10,4,'C:xampphtdocsLIFT-KompassAusgabenSeitenNr.10Nr. 10-4.png');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `press`
--

DROP TABLE IF EXISTS `press`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `press` (
  `id` int NOT NULL AUTO_INCREMENT,
  `source` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `press`
--

LOCK TABLES `press` WRITE;
/*!40000 ALTER TABLE `press` DISABLE KEYS */;
INSERT INTO `press` VALUES (1,'Comunicat de pres? UVT','UVT/LIT KOMPASS - un proiect jurnalistic în premier? al studen?ilor germani?ti de la Facultatea de Litere, Istorie ?i Teologie a Universit??ii de Vest din Timi?oara','https://www.uvt.ro/comunicate-presa/uvt-lit-kompass-un-proiect-jurnalistic-in-premiera-al-studentilor-germanisti-de-la-facultatea-de-litere-istorie-si-teologie-a-universitatii-de-vest-din-timisoara/'),(2,'Agerpres','UVT/LIT KOMPASS un proiect jurnalistic în premier? al studen?ilor germani?ti de la Facultatea de Litere, Istorie ?i Teologie a Universit??ii de Vest din Timi?oara','https://www.agerpres.ro/comunicate/2021/06/10/comunicat-de-presa-universitatea-de-vest-din-timisoara--729040'),(3,'Timpolis','Studen?ii germani?ti de la Universitatea de Vest din Timi?oara edizeaz? un ziar','https://timpolis.ro/studentii-germanisti-de-la-universitatea-de-vest-din-timisoara-edizeaza-un-ziar/'),(4,'Banatul azi','Noul ziar al studen?ilor germani ai UVT, disponibil online','https://www.banatulazi.ro/noul-ziar-al-studentilor-germani-ai-uvt-disponibil-online/'),(5,'TION','Ziar online în limba german?, realizat de studen?ii de la UVT. Va ap?rea de cel pu?in dou? ori pe semestru','https://www.tion.ro/stirile-judetului-timis/ziar-online-in-limba-germana-realizat-de-studentii-de-la-uvt-va-aparea-de-cel-putin-doua-ori-pe-semestru-1449213/'),(6,'Express de Banat','Primul num?r al ziarului studen?esc online în limba german?. Ce informa?ii cuprinde?','https://expressdebanat.ro/primul-numar-al-ziarului-studentesc-online-in-limba-germana-ce-informatii-cuprinde/'),(7,'?tiri de Timi?oara','UVT/LIT KOMPASS. Primul ziar al studen?ilor de la German?','https://stiridetimisoara.ro/uvt-lit-kompass-primul-ziar-al-studentilor-de-la-germana_28387.html'),(8,'Ziua de Vest','UVT-LIT Kompas - un proiect jurnalistic în premier? al studen?ilor germani?ti de la UVT','https://www.ziuadevest.ro/uvt-lit-kompas-un-proiect-jurnalistic-in-premiera-al-studentilor-germanisti-de-la-uvt/'),(9,'Allgemeine Deutsche Zeitung für Rumänien','Studenten machen Zeitung in deutscher Sprache','https://adz.news/artikel/artikel/studenten-machen-zeitung-in-deutscher-sprache'),(10,'Ambasada Germaniei în Romania','Problem','https://rumaenien.diplo.de/ro-de/aktuelles/-/2472284');
/*!40000 ALTER TABLE `press` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-21 20:32:55
