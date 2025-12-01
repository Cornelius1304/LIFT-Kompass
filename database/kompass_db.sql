-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2025 at 06:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kompass_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password_hash`, `created_at`) VALUES
(1, 'admin', '684ea9629aebed2ede5e06ff95d1d5e3feb901fcfd164b9e5d69acae24d131d4', '2025-09-22 19:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_paths` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `date`, `title`, `description`, `image_paths`) VALUES
(1, '2024-04-10', 'Die 9. Ausgabe der studentischen Zeitung \"is loading\"', 'Die 9. Ausgabe der studentischen Zeitung \"is loading\". Neue und alte Mitglieder der Redaktion bei einem hybriden Treffen.', '[\"/LIFT-Kompass/Veranstaltungen/9.jpg\"]'),
(2, '2024-01-06', 'Lit Kompass - Nummer 8 in Casa de Cultur? Friedrich Schiller Bukarest', 'Lit Kompass - Nummer 8 in Casa de Cultur? Friedrich Schiller Bukarest. Herzlichen Dank Kulturhaus \"Friedrich Schiller\" für das Auslegen unserer Nummer 8! Herzlichen Dank ?tefania Mure?anu für die Zeitungszustellung!', '[\"/LIFT-Kompass/Veranstaltungen/8.1.jpg\", \"/LIFT-Kompass/Veranstaltungen/8.2.jpg\", \"/LIFT-Kompass/Veranstaltungen/8.3.jpg\", \"/LIFT-Kompass/Veranstaltungen/8.4.jpg\", \"/LIFT-Kompass/Veranstaltungen/8.5.jpg\"]'),
(3, '2023-05-23', 'Schon gewusst?', 'Schon gewusst? Lit Kompass und ihre kleine Schwester Kompass JUNIOR liegen ab sofort in Casa de Cultur? Friedrich Schiller Bukarest und in den Buchhandlungen La Dou? Bufni?e und Am Dom in Temeswar zum kostenlosen Mitnehmen aus. lichen Dank Frau Mariana Duliu, Direktorin des Schillerhauses Bukarest, für das Auslegen unserer Zeitungen! lichen Dank ?tefania Mure?anu für die Zeitungszustellung!', '[\"/LIFT-Kompass/Veranstaltungen/7.1.jpg\", \"/LIFT-Kompass/Veranstaltungen/7.2.jpg\", \"/LIFT-Kompass/Veranstaltungen/7.3.jpg\", \"/LIFT-Kompass/Veranstaltungen/7.4.jpg\"]'),
(4, '2022-12-09', 'Von den Besten lernen', 'Von den Besten lernen: Nutzen Sie die Gelegenheit, beim Präsenz-Workshop ?Themenwahl im Journalismus\", unter der Leitung von Herrn Siegfried Thiel, Redaktionsleiter der ?Banater Zeitung\" Ihr praktisches Wissen zu festigen und zu erweitern. Wir freuen uns, Sie am 9. Dezember 2022, von 9.00 bis 11.00 Uhr, an der West-Universität Temeswar (V. Pârvanstr. 4), im Raum 248, begrüßen zu dürfen.', '[\"/LIFT-Kompass/Veranstaltungen/6.1.jpg\", \"/LIFT-Kompass/Veranstaltungen/6.2.jpg\", \"/LIFT-Kompass/Veranstaltungen/6.3.jpg\", \"/LIFT-Kompass/Veranstaltungen/6.4.jpg\"]'),
(5, '2022-10-25', 'Neue Mitglieder im Team', 'Heute haben wir neue Mitglieder im Team willkommen geheißen, eifrig diskutiert, geplant, Aufgaben verteilt und gelacht.', '[\"/LIFT-Kompass/Veranstaltungen/5.jpg\"]'),
(6, '2022-11-24', 'Literaturwettbewerb', 'Heyo! Du hast die Chance deinen Text zu veröffentlichen und deine Ideen bekannt zu machen. Mach bei unserem Literaturwettbewerb mit und schicke uns deine kreativen Texte! Nu rata ?ansa de a-?i publica textul ?i a-?i face ideile cunoscute. Particip? la concursul nostru de crea?ii literare ?i trimite-ne textele tale creative pân? în 10 octombrie. Aktualisierung: Nun ist das Warten vorbei! Unser Team freut sich darüber, die Gewinner des Schreibwettbewerbs zum Thema \"Mein Ich im Netz\" bekanntzugeben : Schüler- Prosa: Briana Herciu, 11.Klasse, Nikolaus Lenau Lyzeum Erwachsene- Prosa: Vanessa Cu?ui Erwachsene- Dichtung: Dragana Paulic Herzlichen Glückwunsch an alle!', '[\"/LIFT-Kompass/Veranstaltungen/3.jpg\"]'),
(7, '2021-11-04', 'Journalismus-Workshop', 'Journalismus-Workshop unter der Leitung von Herrn Siegfried Thiel, Redaktionsleiter der ?Banater Zeitung\". Wir freuen uns, Sie am 4. November 2021, von 9.30 bis 11.00 Uhr, online begrüßen zu dürfen.', '[]'),
(8, '2021-07-21', 'Vorstellung der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS', 'Vorstellung der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `pdf_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `title`, `description`, `pdf_path`, `created_at`) VALUES
(1, 'Die 1. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS', 'Wir sprechen der Banater Zeitung, der Allgemeinen Deutschen Zeitung für Rumänien, dem Institut für Auslandsbeziehungen (ifa) und dem Medienverein FunkForum unseren besonderen Dank und unsere Anerkennung für die großzügige journalistische und technische Unterstützung aus.\n\nNe exprim?m gratitudinea  ?i recuno?tin?a fa?? de publica?ia în limba german? ?Banater Zeitung\", de cotidianul în limba german? ?Allgemeine Deutsche Zeitung für Rumänien\", de Institutul Federal German pentru Rela?ii Externe (ifa) ?i de Asocia?ia posturilor de radio de limb? german? din sud-estul Europei ?FunkForum\", pentru consilierea jurnalistic? ?i suportul tehnic acordate.', '/LIFT-Kompass/Ausgaben/Nr. 1.pdf', '2025-09-21 17:19:07'),
(2, 'Die 2. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS', 'Text', '/LIFT-Kompass/Ausgaben/Nr. 2.pdf', '2025-09-21 17:19:07'),
(3, 'Die 3. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS', 'Text', '/LIFT-Kompass/Ausgaben/Nr. 3.pdf', '2025-09-21 17:19:07'),
(4, 'Die 4. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS', 'Wir haben für euch die 4. Nummer unserer deutschsprachigen studentischen Zeitung. Schaut rein! Ihr findet auch die Texte der Preisträgerinnen unseres Literaturwettbewerbs \"Mein ich im Netz\". Herzlichen Dank, Herr Dr. Johann Fernbach, Vorsitzender der DFDB und Herr Siegfried Thiel, BZ-Redaktionsleiter!', '/LIFT-Kompass/Ausgaben/Nr. 4.pdf', '2025-09-21 17:19:07'),
(5, 'Die 5. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS', 'Die 5. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS. Mitgewirkt haben diesmal auch Schüler des Banater Kollegs in Temeswar (Colegiul National Banatean Timisoara). Dank großzügiger finanzieller Unterstützung durch das ?Demokratische Forum der Deutschen im Banat\" und journalistischer Betreuung durch die Banater Zeitung Temeswar ist die Zeitung auch als gedruckte Ausgabe erhältlich.', '/LIFT-Kompass/Ausgaben/Nr. 5.pdf', '2025-09-21 17:19:07'),
(6, 'Die 6. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS', 'Wir lieben das Secret-Santa-Spiel. Die 6. Ausgabe ist unser Weihnachtsgeschenk für euch. Frohe und erholsame Weihnachtsferien!', '/LIFT-Kompass/Ausgaben/Nr. 6.pdf', '2025-09-21 17:19:07'),
(7, 'Die 7. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS', 'Text', '/LIFT-Kompass/Ausgaben/Nr. 7.pdf', '2025-09-21 17:19:07'),
(8, 'Die 8. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS', 'Text', '/LIFT-Kompass/Ausgaben/Nr. 8.pdf', '2025-09-21 17:19:07'),
(9, 'Die 9. Nummer der deutschsprachigen Studentenzeitung UVT-LIT KOMPASS', 'Text', '/LIFT-Kompass/Ausgaben/Nr. 9.pdf', '2025-09-21 17:19:07'),
(10, 'Die 10. Nummer der deutschsprachigen Studentenzeitung UVT-LIFT KOMPASS', 'Text', '/LIFT-Kompass/Ausgaben/Nr. 10.pdf', '2025-09-21 17:19:07'),
(11, 'Die 11.Camera', 'test', '/uploads/issues/68d2be01ac8ae_camera.pdf', '2025-09-23 15:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `team_year` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `role`, `year`, `image_path`, `team_year`) VALUES
(1, 'Dr. Karla Lup?an', 'Gründer', '2020-2021', NULL, '2020-2021'),
(2, 'Nesia Murariu', 'Gründer', '2020-2021', NULL, '2020-2021'),
(3, 'Paula Scoro?anu', 'Gründer', '2020-2021', NULL, '2020-2021'),
(4, 'Astrid Kataro', 'Studentische Leitung', '1. B.A. Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2020-2021'),
(5, 'Nesia Murariu', 'Studentische Leitung', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2020-2021'),
(6, 'Paula Scoro?anu', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2020-2021'),
(7, 'Teodora Opri?or', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2020-2021'),
(8, 'Viven Szabo', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2020-2021'),
(9, 'Eduard Adam', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2020-2021'),
(10, 'Bianca Tat', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2020-2021'),
(11, 'Anamaria Ciortea', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2020-2021'),
(12, 'Alexandra Danciu', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2020-2021'),
(13, 'Ana Cazacu', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2020-2021'),
(14, 'Lucia Marian', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2020-2021'),
(15, 'Valentina Stroiu', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2020-2021'),
(16, 'Vivien Szabo', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2020-2021'),
(17, 'Mihaela Mure?an', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2020-2021'),
(18, 'Sebastian Coman', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2020-2021'),
(19, 'Lektor Dr. Mihaela ?andor', 'Betreuer', NULL, NULL, '2020-2021'),
(20, 'Lektor Dr. Karla Lup?an', 'Betreuer', NULL, NULL, '2020-2021'),
(21, 'Astrid Kataro', 'Studentische Leitung', '2. B.A. Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2022'),
(22, 'Nesia Murariu', 'Studentische Leitung', '2. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2022'),
(23, 'Teodora Opri?or', 'Redaktionsmitglieder', '2. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2022'),
(24, 'Viven Szabo', 'Redaktionsmitglieder', '2. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2022'),
(25, 'Bianca Tat', 'Redaktionsmitglieder', '2. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2022'),
(26, 'Anamaria Ciortea', 'Redaktionsmitglieder', '2. B.A. Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2022'),
(27, 'Alexandra Danciu', 'Redaktionsmitglieder', '2. B.A. Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2022'),
(28, 'Valentina Stroiu', 'Redaktionsmitglieder', '2. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2022'),
(29, 'Giulia Rieger', 'Redaktionsmitglieder', '3. B.A. Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2022'),
(30, 'Raluca Pintilie', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2022'),
(31, 'Carla Tîrn?veanu-Lenghel', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2022'),
(32, 'Maria-?tefania Mure?anu', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2022'),
(33, 'Beatrice Pele', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2022'),
(34, 'Robert Chincea', 'Redaktionsmitglieder', '1. B.A. Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2022'),
(35, 'Andreea Ignat', 'Redaktionsmitglieder', '2. B.A-Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2022'),
(36, 'Ana Voicu', 'Redaktionsmitglieder', '2. B.A-Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2022'),
(37, 'Lektor Dr. Mihaela ?andor', 'Betreuer', NULL, NULL, '2022'),
(38, 'Doz. Dr. Karla Lup?an', 'Betreuer', NULL, NULL, '2022'),
(39, 'Astrid Kataro', 'Studentische Leitung', '3. B.A-Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2023'),
(40, 'Nesia Murariu', 'Studentische Leitung', '3. B.A.- Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2023'),
(41, 'Anamaria Ciortea', 'Redaktionsmitglieder', '3. B.A-Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2023'),
(42, 'Alexandra Danciu', 'Redaktionsmitglieder', '3. B.A-Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2023'),
(43, 'Giulia Rieger', 'Redaktionsmitglieder', '1. M.A.-Studienjahr, Deutsch im europäischen Kontext', NULL, '2023'),
(44, 'Raluca Pintilie', 'Redaktionsmitglieder', '2. B.A-Studienjahr, Fachrichtung Sprache und Literatur', NULL, '2023'),
(45, 'Maria ?tefania Mure?anu', 'Redaktionsmitglieder', '2. B.A-Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2023'),
(46, 'Beatrice Pele', 'Redaktionsmitglieder', '2. B.A-Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2023'),
(47, 'Robert Chincea', 'Redaktionsmitglieder', '2. B.A-Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2023'),
(48, 'Sarah Peter-Zembre', 'Redaktionsmitglieder', '2. B.A-Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2023'),
(49, 'Adina Ciob?nas', 'Redaktionsmitglieder', '2. B.A-Studienjahr, Fachrichtung Angewandte Moderne Sprachen', NULL, '2023'),
(50, 'Florentina Constantiescu (Tache)', 'Redaktionsmitglieder', '2. M.A.-Studienjahr, Deutsch im europäischen Kontext', NULL, '2023'),
(51, 'Lektor Dr. Mihaela ?andor', 'Betreuer', NULL, NULL, '2023'),
(52, 'Doz. Dr. Karla Lup?an', 'Betreuer', NULL, NULL, '2023'),
(53, 'ÖeAD-Lektor-Christoph Flechl', 'Betreuer', NULL, NULL, '2023'),
(54, 'Doz. Dr. Marianne Marki', 'Betreuer', NULL, NULL, '2023');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `page_number` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `issue_id`, `page_number`, `image_path`) VALUES
(96, 1, 1, '/LIFT-Kompass/Ausgaben/Seiten/Nr.1/Nr. 1-1.png'),
(97, 1, 2, '/LIFT-Kompass/Ausgaben/Seiten/Nr.1/Nr. 1-2.png'),
(98, 1, 3, '/LIFT-Kompass/Ausgaben/Seiten/Nr.1/Nr. 1-3.png'),
(99, 1, 4, '/LIFT-Kompass/Ausgaben/Seiten/Nr.1/Nr. 1-4.png'),
(100, 2, 1, '/LIFT-Kompass/Ausgaben/Seiten/Nr.2/Nr. 2-1.png'),
(101, 2, 2, '/LIFT-Kompass/Ausgaben/Seiten/Nr.2/Nr. 2-2.png'),
(102, 2, 3, '/LIFT-Kompass/Ausgaben/Seiten/Nr.2/Nr. 2-3.png'),
(103, 2, 4, '/LIFT-Kompass/Ausgaben/Seiten/Nr.2/Nr. 2-4.png'),
(104, 3, 1, '/LIFT-Kompass/Ausgaben/Seiten/Nr.3/Nr. 3-1.png'),
(105, 3, 2, '/LIFT-Kompass/Ausgaben/Seiten/Nr.3/Nr. 3-2.png'),
(106, 3, 3, '/LIFT-Kompass/Ausgaben/Seiten/Nr.3/Nr. 3-3.png'),
(107, 3, 4, '/LIFT-Kompass/Ausgaben/Seiten/Nr.3/Nr. 3-4.png'),
(108, 4, 1, '/LIFT-Kompass/Ausgaben/Seiten/Nr.4/Nr. 4-1.png'),
(109, 4, 2, '/LIFT-Kompass/Ausgaben/Seiten/Nr.4/Nr. 4-2.png'),
(110, 4, 3, '/LIFT-Kompass/Ausgaben/Seiten/Nr.4/Nr. 4-3.png'),
(111, 4, 4, '/LIFT-Kompass/Ausgaben/Seiten/Nr.4/Nr. 4-4.png'),
(112, 5, 1, '/LIFT-Kompass/Ausgaben/Seiten/Nr.5/Nr. 5-1.png'),
(113, 5, 2, '/LIFT-Kompass/Ausgaben/Seiten/Nr.5/Nr. 5-2.png'),
(114, 5, 3, '/LIFT-Kompass/Ausgaben/Seiten/Nr.5/Nr. 5-3.png'),
(115, 5, 4, '/LIFT-Kompass/Ausgaben/Seiten/Nr.5/Nr. 5-4.png'),
(116, 6, 1, '/LIFT-Kompass/Ausgaben/Seiten/Nr.6/Nr. 6-1.png'),
(117, 6, 2, '/LIFT-Kompass/Ausgaben/Seiten/Nr.6/Nr. 6-2.png'),
(118, 6, 3, '/LIFT-Kompass/Ausgaben/Seiten/Nr.6/Nr. 6-3.png'),
(119, 6, 4, '/LIFT-Kompass/Ausgaben/Seiten/Nr.6/Nr. 6-4.png'),
(120, 7, 1, '/LIFT-Kompass/Ausgaben/Seiten/Nr.7/Nr. 7-1.png'),
(121, 7, 2, '/LIFT-Kompass/Ausgaben/Seiten/Nr.7/Nr. 7-2.png'),
(122, 7, 3, '/LIFT-Kompass/Ausgaben/Seiten/Nr.7/Nr. 7-3.png'),
(123, 7, 4, '/LIFT-Kompass/Ausgaben/Seiten/Nr.7/Nr. 7-4.png'),
(124, 8, 1, '/LIFT-Kompass/Ausgaben/Seiten/Nr.8/Nr. 8-1.png'),
(125, 8, 2, '/LIFT-Kompass/Ausgaben/Seiten/Nr.8/Nr. 8-2.png'),
(126, 8, 3, '/LIFT-Kompass/Ausgaben/Seiten/Nr.8/Nr. 8-3.png'),
(127, 8, 4, '/LIFT-Kompass/Ausgaben/Seiten/Nr.8/Nr. 8-4.png'),
(128, 9, 1, '/LIFT-Kompass/Ausgaben/Seiten/Nr.9/Nr. 9-1.png'),
(129, 9, 2, '/LIFT-Kompass/Ausgaben/Seiten/Nr.9/Nr. 9-2.png'),
(130, 9, 3, '/LIFT-Kompass/Ausgaben/Seiten/Nr.9/Nr. 9-3.png'),
(131, 9, 4, '/LIFT-Kompass/Ausgaben/Seiten/Nr.9/Nr. 9-4.png'),
(132, 10, 1, '/LIFT-Kompass/Ausgaben/Seiten/Nr.10/Nr. 10-1.png'),
(133, 10, 2, '/LIFT-Kompass/Ausgaben/Seiten/Nr.10/Nr. 10-2.png'),
(134, 10, 3, '/LIFT-Kompass/Ausgaben/Seiten/Nr.10/Nr. 10-3.png'),
(135, 10, 4, '/LIFT-Kompass/Ausgaben/Seiten/Nr.10/Nr. 10-4.png');

-- --------------------------------------------------------

--
-- Table structure for table `press`
--

CREATE TABLE `press` (
  `id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `press`
--

INSERT INTO `press` (`id`, `source`, `title`, `url`) VALUES
(1, 'Comunicat de pres? UVT', 'UVT/LIT KOMPASS - un proiect jurnalistic în premier? al studen?ilor germani?ti de la Facultatea de Litere, Istorie ?i Teologie a Universit??ii de Vest din Timi?oara', 'https://www.uvt.ro/comunicate-presa/uvt-lit-kompass-un-proiect-jurnalistic-in-premiera-al-studentilor-germanisti-de-la-facultatea-de-litere-istorie-si-teologie-a-universitatii-de-vest-din-timisoara/'),
(2, 'Agerpres', 'UVT/LIT KOMPASS un proiect jurnalistic în premier? al studen?ilor germani?ti de la Facultatea de Litere, Istorie ?i Teologie a Universit??ii de Vest din Timi?oara', 'https://www.agerpres.ro/comunicate/2021/06/10/comunicat-de-presa-universitatea-de-vest-din-timisoara--729040'),
(3, 'Timpolis', 'Studen?ii germani?ti de la Universitatea de Vest din Timi?oara edizeaz? un ziar', 'https://timpolis.ro/studentii-germanisti-de-la-universitatea-de-vest-din-timisoara-edizeaza-un-ziar/'),
(4, 'Banatul azi', 'Noul ziar al studen?ilor germani ai UVT, disponibil online', 'https://www.banatulazi.ro/noul-ziar-al-studentilor-germani-ai-uvt-disponibil-online/'),
(5, 'TION', 'Ziar online în limba german?, realizat de studen?ii de la UVT. Va ap?rea de cel pu?in dou? ori pe semestru', 'https://www.tion.ro/stirile-judetului-timis/ziar-online-in-limba-germana-realizat-de-studentii-de-la-uvt-va-aparea-de-cel-putin-doua-ori-pe-semestru-1449213/'),
(6, 'Express de Banat', 'Primul num?r al ziarului studen?esc online în limba german?. Ce informa?ii cuprinde?', 'https://expressdebanat.ro/primul-numar-al-ziarului-studentesc-online-in-limba-germana-ce-informatii-cuprinde/'),
(7, '?tiri de Timi?oara', 'UVT/LIT KOMPASS. Primul ziar al studen?ilor de la German?', 'https://stiridetimisoara.ro/uvt-lit-kompass-primul-ziar-al-studentilor-de-la-germana_28387.html'),
(8, 'Ziua de Vest', 'UVT-LIT Kompas - un proiect jurnalistic în premier? al studen?ilor germani?ti de la UVT', 'https://www.ziuadevest.ro/uvt-lit-kompas-un-proiect-jurnalistic-in-premiera-al-studentilor-germanisti-de-la-uvt/'),
(9, 'Allgemeine Deutsche Zeitung für Rumänien', 'Studenten machen Zeitung in deutscher Sprache', 'https://adz.news/artikel/artikel/studenten-machen-zeitung-in-deutscher-sprache'),
(10, 'Ambasada Germaniei în Romania', 'Problem', 'https://rumaenien.diplo.de/ro-de/aktuelles/-/2472284');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issue_id` (`issue_id`);

--
-- Indexes for table `press`
--
ALTER TABLE `press`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `press`
--
ALTER TABLE `press`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`issue_id`) REFERENCES `issues` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
