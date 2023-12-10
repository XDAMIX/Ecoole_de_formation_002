-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.4.24-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.0.0.6532
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour formations
CREATE DATABASE IF NOT EXISTS `formations` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `formations`;

-- Listage de la structure de table formations. acceuils
CREATE TABLE IF NOT EXISTS `acceuils` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sous_titre1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sous_titre2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.acceuils : ~0 rows (environ)
INSERT INTO `acceuils` (`id`, `titre`, `sous_titre1`, `sous_titre2`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'UNIVERSE-SCHOOL', 'Bienvenue sur le site web de l\'école', 'Ne perdez pas de temps, inscrivez-vous dès maintenant, les cours ont déjà démarré.', 'public/images/acceuil/rWAaEf6ctyEFCFwwGV5qfAyzbwnwE5ElkwDZqqUK.jpg', NULL, '2023-12-07 13:37:52', NULL);

-- Listage de la structure de table formations. banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.banners : ~2 rows (environ)
INSERT INTO `banners` (`id`, `titre`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Banner 1', 'public/images/banners/JkydPLdw6qFnXbO5UZFwKuET1HiyXfE8ft0Qfh6M.jpg', NULL, '2023-12-06 06:10:17', '2023-12-06 06:10:17'),
	(2, '2023', 'public/images/banners/hMb8zUYh54yytQ1rijVQYk7zMiJTP7w4s15gcMF5.jpg', '2023-12-06 06:10:08', '2023-12-06 08:38:08', NULL);

-- Listage de la structure de table formations. calculs
CREATE TABLE IF NOT EXISTS `calculs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `formateurs` int(11) NOT NULL,
  `formations` int(11) NOT NULL,
  `stagiaires` int(11) NOT NULL,
  `diplomes` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.calculs : ~0 rows (environ)

-- Listage de la structure de table formations. cours
CREATE TABLE IF NOT EXISTS `cours` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `formation_id` bigint(20) unsigned NOT NULL,
  `prof_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cours_formation_id_foreign` (`formation_id`),
  KEY `cours_prof_id_foreign` (`prof_id`),
  CONSTRAINT `cours_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`),
  CONSTRAINT `cours_prof_id_foreign` FOREIGN KEY (`prof_id`) REFERENCES `profs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.cours : ~7 rows (environ)
INSERT INTO `cours` (`id`, `formation_id`, `prof_id`, `created_at`, `updated_at`) VALUES
	(1, 3, 2, '2023-12-07 16:45:21', NULL),
	(2, 1, 1, '2023-12-07 16:46:00', NULL),
	(3, 3, 3, '2023-12-07 17:05:11', NULL),
	(59, 2, 267, '2023-12-08 01:26:56', '2023-12-08 01:26:56'),
	(63, 2, 269, '2023-12-08 01:54:12', '2023-12-08 01:54:12'),
	(100, 3, 1, '2023-12-08 18:18:04', '2023-12-08 18:18:04');

-- Listage de la structure de table formations. etudiants
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `montant` int(11) DEFAULT NULL,
  `session_id` bigint(20) unsigned DEFAULT NULL,
  `etat_formation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'En-formation',
  `code_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_obt_diplome` date DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `lieu_naissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_debut_formation` date DEFAULT NULL,
  `date_fin_formation` date DEFAULT NULL,
  `mention_diplome` date DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `etudiants_session_id_foreign` (`session_id`),
  CONSTRAINT `etudiants_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.etudiants : ~9 rows (environ)
INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `sexe`, `wilaya`, `created_at`, `updated_at`, `tel`, `email`, `profession`, `montant`, `session_id`, `etat_formation`, `code_diplome`, `date_obt_diplome`, `date_naissance`, `lieu_naissance`, `date_debut_formation`, `date_fin_formation`, `mention_diplome`, `photo`, `deleted_at`) VALUES
	(31, 'Djemaaoui', 'Yanis', 'H', 'Alger', '2023-12-06 11:31:30', '2023-12-07 11:01:25', '0776554433', 'dj_yacine@gmail.com', 'vendeur', 5000, 1, 'En-formation', NULL, NULL, '2000-06-08', 'El-biar Alger', NULL, NULL, NULL, 'public/images/stagiaires/7o1DRMGddulSfNmRaBEg9HWM22Z72d9xpYyH04BV.jpg', NULL),
	(32, 'Boukhers', 'Imad', 'H', 'Alger', '2023-12-06 21:40:42', '2023-12-07 12:54:57', '0564557654', 'b_imad@gmail.com', 'comerçant', 5000, 1, 'En-formation', NULL, NULL, '2001-11-21', 'El-harrach Alger', NULL, NULL, NULL, 'public/images/stagiaires/6F96jhHP20OX0KdeZsYTTpfr7jiLITsajp4srHrm.jpg', NULL),
	(33, 'Dabachi', 'Abd erraouf', 'H', 'Alger', '2023-12-06 21:41:36', '2023-12-07 12:54:10', '0564558735', 'D_raouf@gmail.com', 'vendeur', 5000, 1, 'En-formation', NULL, NULL, '2002-02-15', 'Alger centre Alger', NULL, NULL, NULL, 'public/images/stagiaires/jxkIKx8QNBG7DbaPhLmXFEeqa8vldgKJvdgOmtSn.jpg', NULL),
	(34, 'mighari', 'Soumia', 'F', 'Alger', '2023-12-07 09:24:47', '2023-12-07 14:12:45', '0564357458', 'm_ahlam@gmail.com', 'vendeuse', 5000, 2, 'En-formation', NULL, NULL, '2003-12-07', 'Ben aknoun Alger', NULL, NULL, NULL, 'public/images/stagiaires/McC2ehCZamMuLWV8XL1TGcKhAWmURQwXgOGIKnmD.jpg', NULL),
	(35, 'Bensaid', 'Imene', 'F', 'Alger', '2023-12-07 12:23:57', '2023-12-07 14:12:59', '0776554123', 'imene@gmail.com', 'vendeuse', 5000, 2, 'En-formation', NULL, NULL, '1999-03-11', 'Cheraga Alger', NULL, NULL, NULL, 'public/images/stagiaires/yBnCFrZqDXAQdvN4DhwzSy3EA8hO1x16uRudOIpv.jpg', NULL),
	(36, 'Brahimi', 'Nour el houda', 'F', 'Alger', '2023-12-07 12:31:01', '2023-12-08 18:39:13', '0776552232', 'brahimi_houda@gmail.com', 'vendeur', 5000, 2, 'En-formation', NULL, NULL, '1998-11-12', 'Dely ibrahim Alger', NULL, NULL, NULL, 'public/images/stagiaires/8fZY0JlqhJbf91apfQaQrqEtnN4iRUY2jy1AfwvC.jpg', NULL),
	(37, 'Sébaoui', 'Abd errahim', 'H', 'Alger', '2023-12-07 14:09:28', '2023-12-07 14:09:28', '0776554424', 'Abdou_sebaoui@gmail.com', 'comerçant', 5000, 1, 'En-formation', NULL, NULL, '1998-07-17', 'Bir khadem Alger', NULL, NULL, NULL, 'public/images/stagiaires/awXD3JZaV0FHcuvNnJWdHkMcFJfojn2QN1C9TQ5z.jpg', NULL),
	(45, 'Touhami', 'Sabrina', 'F', 'Alger', '2023-12-07 14:29:19', '2023-12-07 14:29:19', '0666 349783', 'Sabrina_touhami@gmail.com', 'vendeuse', 5000, 2, 'En-formation', NULL, NULL, '1997-05-13', 'El-biar Alger', NULL, NULL, NULL, 'public/images/stagiaires/fmAguc6GA8nnbVrZcooL9E9SFGcH8odznQHWXjTl.jpg', NULL),
	(46, 'Bensalem', 'abd el-karim', 'H', 'Alger', '2023-12-09 23:33:27', '2023-12-10 01:45:27', '0555245376', 'Karim_bensalem@gmail.com', 'vendeur', 5000, 3, 'En-formation', NULL, NULL, '2023-12-01', 'el-biar Alger', NULL, NULL, NULL, 'public/images/stagiaires/Vt0aLL5wH16jgw2jL8SmeS9nWqGF6AhTreMrWavf.jpg', NULL);

-- Listage de la structure de table formations. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Listage des données de la table formations.failed_jobs : ~0 rows (environ)

-- Listage de la structure de table formations. formations
CREATE TABLE IF NOT EXISTS `formations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publique` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `objectifs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.formations : ~3 rows (environ)
INSERT INTO `formations` (`id`, `titre`, `dure`, `description`, `publique`, `objectifs`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'DEVELOPPEMENT WEB', '2 MOIS', 'HTML CSS JAVASCRIPT PHP MYSQL', 'tout le monde', 'conception des sites-web', 'public/images/formations/DmEyprvmW0LOvhJsSYa9TU3TBx1JcrFDsgWxVYOF.jpg', '2023-12-05 14:33:45', '2023-12-06 06:27:39', NULL),
	(2, 'DESIGN GRAPHIQUE', '2 MOIS', 'Adobe pack', 'tout le monde', 'conception graphique', 'public/images/formations/aGYaGB3vtGq3i4kC8Qz0AU9IctZCU0bSyMhqUZ8I.jpg', '2023-12-06 05:35:06', '2023-12-06 06:22:16', NULL),
	(3, 'INFORMATIQUE BUREAUTIQUE', '2 MOIS', 'Microsoft Office', 'Etudiants', 'Pack Microsoft Office', 'public/images/formations/hylq8LwHlyCgLDRwxo83kPDFjU8Qe7jL4zOibL4c.jpg', '2023-12-06 06:20:11', '2023-12-06 06:20:11', NULL);

-- Listage de la structure de table formations. informations
CREATE TABLE IF NOT EXISTS `informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure_travail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `wilaya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.informations : ~0 rows (environ)
INSERT INTO `informations` (`id`, `nom`, `adresse`, `localisation`, `email`, `logo`, `heure_travail`, `created_at`, `updated_at`, `wilaya`, `site_web`) VALUES
	(1, 'UNIVERSE-SCHOOL', 'Bouzareah, ALGER', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25561.77443161779!2d2.9909673080534622!3d36.78923204292906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fb3c973619673%3A0x5e58db42e49121dc!2sBouzareah!5e0!3m2!1sfr!2sdz!4v1701789824261!5m2!1sfr!2sdz', 'contact@ecole.com', 'public/images/logo/Kskn9KU5hmyJEw3sqyD1u29XSXegE3YP1jBAq6pr.png', 'Dimanche-Jeudi 08h00-17h00', NULL, '2023-12-07 14:37:35', 'Alger', 'www.universe-school.com');

-- Listage de la structure de table formations. inscriptions
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `wilaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation` tinyint(1) NOT NULL DEFAULT 0,
  `formation_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inscriptions_formation_id_foreign` (`formation_id`),
  CONSTRAINT `inscriptions_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.inscriptions : ~7 rows (environ)
INSERT INTO `inscriptions` (`id`, `sexe`, `nom`, `age`, `wilaya`, `tel`, `created_at`, `updated_at`, `deleted_at`, `prenom`, `email`, `profession`, `validation`, `formation_id`) VALUES
	(1, 'H', 'Djemaaoui', 19, 'Alger', '0776554433', '2023-12-05 14:35:07', '2023-12-06 11:31:30', NULL, 'Yacine', 'dj_yacine@gmail.com', 'vendeur', 1, 3),
	(2, 'H', 'Boukhers', 20, 'Alger', '0564557654', '2023-12-06 05:36:51', '2023-12-06 21:40:42', NULL, 'Imad', 'b_imad@gmail.com', 'comerçant', 1, 3),
	(3, 'H', 'Dabachi', 22, 'Alger', '0564558735', '2023-12-06 05:50:24', '2023-12-06 21:41:36', NULL, 'Abd erraouf', 'D_raouf@gmail.com', 'vendeur', 1, 3),
	(4, 'H', 'mighari', 23, 'Alger', '0564357458', '2023-12-07 09:23:30', '2023-12-07 09:24:47', NULL, 'Soumia', 'm_ahlam@gmail.com', 'vendeuse', 1, 3),
	(5, 'H', 'Bensaid', 20, 'Alger', '0776554123', '2023-12-07 11:57:11', '2023-12-07 12:23:57', NULL, 'Imene', 'imene@gmail.com', 'vendeuse', 1, 3),
	(6, 'F', 'Brahimi', 25, 'Alger', '0776552232', '2023-12-07 12:25:45', '2023-12-07 12:31:01', NULL, 'Nour el houda', 'brahimi_houda@gmail.com', 'vendeur', 1, 3),
	(7, 'H', 'Bensalem', 25, 'Alger', '0555245376', '2023-12-07 12:39:19', '2023-12-09 23:41:03', NULL, 'abd el-karim', 'Karim_bensalem@gmail.com', 'vendeur', 1, 2);

-- Listage de la structure de table formations. liens
CREATE TABLE IF NOT EXISTS `liens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `reseau_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.liens : ~4 rows (environ)
INSERT INTO `liens` (`id`, `reseau_social`, `lien`, `created_at`, `updated_at`) VALUES
	(1, 'Facebook', 'https://www.facebook.com', NULL, '2023-12-06 05:43:28'),
	(2, 'Instagram', 'https://www.instagram.com', NULL, '2023-12-06 05:43:47'),
	(3, 'Twitter', 'https://www.twitter.com', NULL, '2023-12-06 05:44:05'),
	(4, 'Youtube', 'https://www.youtube.com', NULL, '2023-12-06 05:44:21'),
	(5, 'Tiktok', '', NULL, NULL);

-- Listage de la structure de table formations. messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.messages : ~0 rows (environ)

-- Listage de la structure de table formations. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.migrations : ~51 rows (environ)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_01_01_184030_create_inscriptions_table', 1),
	(6, '2023_01_01_184127_create_informations_table', 1),
	(7, '2023_01_01_184159_create_telephones_table', 1),
	(8, '2023_01_03_113607_create_liens_table', 1),
	(9, '2023_01_04_000021_create_formations_table', 1),
	(10, '2023_01_07_014703_create_messages_table', 1),
	(11, '2023_01_11_115029_create_temoignages_table', 1),
	(12, '2023_01_11_115046_create_calculs_table', 1),
	(13, '2023_01_11_115106_create_questions_table', 1),
	(14, '2023_01_11_115146_create_photos_table', 1),
	(15, '2023_01_11_122506_create_paragraphes_table', 1),
	(16, '2023_01_14_023212_add_deleted_at_formations', 1),
	(17, '2023_01_16_105546_add_deleted__at__photos', 1),
	(18, '2023_01_17_102406_add_deleted__at__temoignages', 1),
	(19, '2023_01_17_113448_create_banners_table', 1),
	(20, '2023_01_17_114159_add_deleted_at_banners', 1),
	(21, '2023_01_18_120442_add_deleted_at_questions', 1),
	(22, '2023_01_18_233553_add_deleted_at_messages', 1),
	(23, '2023_01_19_003700_add_deleted_at_inscriptions', 1),
	(24, '2023_01_28_180050_create_acceuils_table', 1),
	(25, '2023_02_14_143408_addcolumn_operateur_telephones', 1),
	(26, '2023_02_15_105703_add_deleted_at_telephones', 1),
	(27, '2023_02_16_012842_add_deleted_at_acceuils', 1),
	(28, '2023_02_18_155348_add_sous_titre_paragraphes', 1),
	(29, '2023_02_18_155626_add_deleted_at_paragraphes', 1),
	(30, '2023_02_20_014401_add_date_inscriptions', 1),
	(31, '2023_03_27_011221_add_fields_to_photos', 1),
	(32, '2023_07_07_192939_create_tb_etudiant', 1),
	(33, '2023_09_04_140855_create_profs_table', 1),
	(34, '2023_09_04_191353_add_columns_to_profs', 1),
	(35, '2023_09_04_193442_add_columns_to_etudiants', 1),
	(36, '2023_09_04_220144_update_columns_to_inscriptions', 1),
	(37, '2023_09_05_114132_update_columns_to_etudiants', 1),
	(38, '2023_09_05_130125_create_sessions_table', 1),
	(39, '2023_09_06_213427_add_columns_to_inscriptions', 1),
	(40, '2023_09_06_220914_drop_columns_date_to_inscriptions', 1),
	(41, '2023_11_25_145841_add_montant_a_la_table', 1),
	(42, '2023_12_05_123707_modify_etudiants', 1),
	(43, '2023_12_05_123747_modify_inscriptions', 1),
	(44, '2023_12_05_123837_modify_sessions', 1),
	(45, '2023_12_05_123906_modify_profs', 1),
	(46, '2023_12_05_123951_create_cours', 1),
	(47, '2023_12_06_074943_modify_etudiants2', 2),
	(48, '2023_12_06_090924_modify_informations', 3),
	(49, '2023_12_06_100124_modify_sessions', 4),
	(51, '2023_12_07_150614_modify_etudiant', 5),
	(52, '2023_12_07_153306_modify_infos', 6),
	(53, '2023_12_07_182027_modify_professeurs', 7),
	(54, '2023_12_08_012850_modify_add_deleted_at', 8);

-- Listage de la structure de table formations. paragraphes
CREATE TABLE IF NOT EXISTS `paragraphes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sous_titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paragraphe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.paragraphes : ~2 rows (environ)
INSERT INTO `paragraphes` (`id`, `titre`, `sous_titre`, `photo`, `paragraphe`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'UNIVERSE-SCHOOL école de formation professionnelle', 'Présentation de l\'école :', 'public/images/presentation/3IZ0Zl1Zi7Hhgb9GXcs3lZT9anamTUOUolfypG0A.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa quis porro neque, quae ut rerum deleniti. Provident dolorum nemo excepturi autem commodi fuga dignissimos, iure assumenda debitis deserunt sequi laboriosam.\r\nNam harum quia, doloremque ea porro hic vero pariatur non minus quasi ipsam voluptatum! Quae veniam voluptatibus quasi, blanditiis suscipit ut non dolores sed alias rerum tempora laborum molestias sapiente.\r\nIpsam rem ipsum, facere aliquam tempore, modi vel accusamus doloremque at eveniet officia voluptatum quas nemo ad reiciendis laudantium dolorum et perferendis! Neque dignissimos ipsam unde ducimus sed asperiores eos?\r\nIllo alias quo beatae suscipit est, fugit provident aperiam iure illum sit saepe asperiores recusandae ab aspernatur atque laboriosam placeat similique commodi aliquam vitae! Sit dolore alias placeat ex totam.', '2023-12-06 06:13:28', '2023-12-06 08:37:30', NULL),
	(2, NULL, 'Fondateur de l\'école :', 'public/images/presentation/yP5hrwoz7h1cxykZZYNp6tOLPwaO7l5VxIGfnUeL.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa quis porro neque, quae ut rerum deleniti. Provident dolorum nemo excepturi autem commodi fuga dignissimos, iure assumenda debitis deserunt sequi laboriosam.\r\nNam harum quia, doloremque ea porro hic vero pariatur non minus quasi ipsam voluptatum! Quae veniam voluptatibus quasi, blanditiis suscipit ut non dolores sed alias rerum tempora laborum molestias sapiente.\r\nIpsam rem ipsum, facere aliquam tempore, modi vel accusamus doloremque at eveniet officia voluptatum quas nemo ad reiciendis laudantium dolorum et perferendis! Neque dignissimos ipsam unde ducimus sed asperiores eos?\r\nIllo alias quo beatae suscipit est, fugit provident aperiam iure illum sit saepe asperiores recusandae ab aspernatur atque laboriosam placeat similique commodi aliquam vitae! Sit dolore alias placeat ex totam.', '2023-12-06 06:14:27', '2023-12-07 13:30:49', NULL);

-- Listage de la structure de table formations. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.password_resets : ~0 rows (environ)

-- Listage de la structure de table formations. personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.personal_access_tokens : ~0 rows (environ)

-- Listage de la structure de table formations. photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `emplacement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.photos : ~6 rows (environ)
INSERT INTO `photos` (`id`, `titre`, `photo`, `created_at`, `updated_at`, `deleted_at`, `emplacement`, `dure`, `description`) VALUES
	(1, 'sortie rondonnée', 'public/images/gallerie/pllo2DA33NvPqhqCtPployWBBHP8XXvz5BNoTdYP.jpg', '2023-12-06 08:24:54', '2023-12-06 08:24:54', NULL, 'LAC AGULMIM', '1 journée', NULL),
	(2, 'sortie rondonnée', 'public/images/gallerie/CVvnqSkSu5mp1Nn4sx5AFg6BznrllinzFiTfw7xM.jpg', '2023-12-06 08:25:18', '2023-12-06 08:25:18', NULL, 'LAC NOIR', '1 journée', NULL),
	(3, 'visite', 'public/images/gallerie/0wC7KNn1pBIsnYidm3G2eRJcqZJuddAUpNr276HA.jpg', '2023-12-06 08:25:53', '2023-12-06 08:25:53', NULL, 'TIKJDA', '1 journée', NULL),
	(4, 'visite', 'public/images/gallerie/UHup4mWEPexcrN90drUY4FPpvkXfX4c38AZWpBa8.jpg', '2023-12-06 08:26:18', '2023-12-06 08:26:18', NULL, 'CHREA BLIDA', '1 journée', NULL),
	(5, 'visite', 'public/images/gallerie/kvcAYMBRR4DJHGrT85oQ6JS03mzlk6w6psBjUDPl.jpg', '2023-12-06 08:26:47', '2023-12-06 08:26:47', NULL, 'TIPAZA', '1 journée', NULL),
	(6, 'visite', 'public/images/gallerie/g7xn06krwf1fjfkeCqucfo5uUtakdMUpxiMRlxe4.jpg', '2023-12-06 08:27:14', '2023-12-06 08:27:14', NULL, 'JIJEL', '2 jours', NULL),
	(7, 'visite', 'public/images/gallerie/mk1qd53ENkJ54TpqWAnJOlbwWPzjYjXKyMBgJN0R.jpg', '2023-12-06 08:27:35', '2023-12-06 08:27:35', NULL, 'CANSTANTINE', '2 jours', NULL);

-- Listage de la structure de table formations. profs
CREATE TABLE IF NOT EXISTS `profs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wilaya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `lieu_naissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.profs : ~7 rows (environ)
INSERT INTO `profs` (`id`, `nom`, `prenom`, `sexe`, `created_at`, `updated_at`, `tel`, `email`, `photo`, `wilaya`, `adresse`, `date_naissance`, `lieu_naissance`, `diplome`, `deleted_at`) VALUES
	(1, 'Slimani', 'Noureddine', 'H', '2023-12-07 16:37:43', '2023-12-08 17:36:34', '0772647583', 'slimani_noureddine@gmail.com', 'public/images/professeurs/3wcbaJJb6tZqxSCENPDvrHbKMWwtWHc5NDCLRgGR.jpg', 'Alger', 'ALGER', '1992-11-30', 'Alger', 'Ing en informatique', NULL),
	(2, 'Mustphaoui', 'Samira', 'F', '2023-12-07 16:37:40', '2023-12-08 17:55:26', '0562887463', 'fz_mustphaoui@gmail.com', 'public/images/professeurs/tXhX9yZxL6IqRn8gKn5oj3skkmqFxPTamn2zysTt.jpg', 'Alger', 'ALGER', '1992-04-08', 'Alger', 'Ing en informatique', NULL),
	(3, 'Salmi', 'Yousra', 'F', '2023-12-07 17:04:25', '2023-12-08 17:36:59', '0656378465', 'salmi_yousra@gmail.com', 'public/images/professeurs/TKfFDcq7NnaXAfVS6OVEq76wrB4RfAr5VVny5H5Y.jpg', 'Alger', 'ALGER', '1996-10-02', 'Alger', 'Ing en informatique', NULL),
	(267, 'Bentaleb', 'Sofiane', 'H', '2023-12-08 01:05:18', '2023-12-08 17:56:38', '0776552134', 'bentaleb_s@gmail.com', 'public/images/professeurs/vnEKkR21bD3rZPzcMqCcGJPedA5yvcut5fEPRyWk.jpg', 'Alger', 'Bouzareah, ALGER', '1990-02-22', 'Bir', 'Ing en informatique', NULL),
	(268, 'Hamiti', 'Djallel', 'H', '2023-12-08 01:49:54', '2023-12-08 18:37:25', '0562987465', 'h_djallel@gmail.com', 'public/images/professeurs/7XZz23sE7nHydv99A44s6L0BIOrPCKYL4kB71BZH.jpg', 'Alger', 'Cheraga, ALGER', '1989-09-21', 'Cheraga', 'Ing en informatique', NULL),
	(269, 'Dahmani', 'Rania', 'F', '2023-12-08 01:53:13', '2023-12-08 18:38:43', '0665447382', 'D_rania@gmail.com', 'public/images/professeurs/ztje351s54crMYAns3h8mctNwtDbXxZgnMOasbGX.jpg', 'Alger', 'El-biar ALGER', '1987-10-23', 'El-biar', 'Ing en informatique', NULL),
	(270, 'NEW_RECORD', 'NEW_RECORD', 'NEW_RECORD', '2023-12-08 01:55:55', '2023-12-08 01:55:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Listage de la structure de table formations. questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reponse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.questions : ~0 rows (environ)
INSERT INTO `questions` (`id`, `question`, `reponse`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Combien de temps faut-il pour traiter mon inscription?', 'Le temps de traitement des inscriptions est très rapide ,on vous contactera le jour même', '2023-12-06 08:31:44', '2023-12-06 08:31:44', NULL);

-- Listage de la structure de table formations. sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En attente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `formation_id` bigint(20) unsigned DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_formation_id_foreign` (`formation_id`),
  CONSTRAINT `sessions_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.sessions : ~3 rows (environ)
INSERT INTO `sessions` (`id`, `nom`, `date_debut`, `date_fin`, `statut`, `created_at`, `updated_at`, `formation_id`, `prof_id`, `deleted_at`) VALUES
	(1, 'Session1Bureautique2023', '2023-12-07', NULL, 'En cours', '2023-12-07 17:47:05', '2023-12-07 17:40:03', 3, 2, NULL),
	(2, 'Session2Bureautique2023', '2023-12-07', '2023-12-10', 'Termine', '2023-12-07 17:47:13', '2023-12-10 00:19:37', 3, 3, NULL),
	(3, 'Session1DEVWEB2023', NULL, NULL, 'En attente', '2023-12-07 16:13:32', '2023-12-07 16:13:32', 1, 1, NULL);

-- Listage de la structure de table formations. telephones
CREATE TABLE IF NOT EXISTS `telephones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `operateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.telephones : ~2 rows (environ)
INSERT INTO `telephones` (`id`, `operateur`, `numero`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Ooredoo', '0564332897', '2023-12-05 14:26:08', '2023-12-05 14:26:08', NULL),
	(2, 'Mobilis', '0665347765', '2023-12-05 14:26:24', '2023-12-05 14:26:24', NULL),
	(3, 'Djezzy', '0795437364', '2023-12-05 14:26:39', '2023-12-05 14:26:39', NULL);

-- Listage de la structure de table formations. temoignages
CREATE TABLE IF NOT EXISTS `temoignages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mot` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.temoignages : ~2 rows (environ)
INSERT INTO `temoignages` (`id`, `nom`, `poste`, `mot`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Sabrina', 'Informaticienne', 'En tant qu\'étudiant en informatique, j\'ai été impressionné par la qualité des cours et des instructeurs à l\'École. Les leçons pratiques et les projets réels m\'ont vraiment préparé pour le monde professionnel. Je recommande vivement cette école à tous ceux qui veulent une formation informatique exceptionnelle.', 'public/images/temoignages/ql0QMILl4PJpPNEBJnIwLpdWHRMCqCFjCx2echTT.jpg', '2023-12-06 08:34:03', '2023-12-06 08:34:03', NULL),
	(2, 'Toufik', 'Comptable', 'Grâce à l\'École, j\'ai acquis des compétences solides en programmation et en développement web. La formation est axée sur les dernières technologies et les tendances de l\'industrie, ce qui m\'a donné un avantage sur le marché du travail. Je me sens prêt à relever tous les défis dans le domaine de l\'informatique.', 'public/images/temoignages/HetRyfIdZrvnJ8AhSMmha6vP3A8mn2IJRclWOJ0E.jpg', '2023-12-06 08:34:58', '2023-12-06 08:34:58', NULL),
	(3, 'Oussama', 'Développeur web', 'L\'équipe pédagogique de l\'École est exceptionnelle. Les professeurs sont non seulement experts dans leur domaine, mais ils se soucient vraiment de la réussite de leurs élèves. Les cours sont bien structurés, et l\'assistance personnalisée m\'a permis de progresser rapidement dans mes études.', 'public/images/temoignages/ezLeF7o22FAe0KYCMhdq1ZCm1u5lX2U9haEhNTC2.jpg', '2023-12-06 08:36:10', '2023-12-06 08:36:10', NULL);

-- Listage de la structure de table formations. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table formations.users : ~1 rows (environ)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Web-Develloper', 'boualem@gmail.com', NULL, '$2y$10$qcyU2VUBOZjX5LKkWQcyRODNUUIBEWWIxXz6MB9wUGHlA6JpskbT6', 'yqDcc8KNF8MwockqOiKjVQUmEPzmbIoUAcdciQqI0bzjRdQKHCL5d1jeZ45p', '2023-12-05 14:19:00', '2023-12-05 14:19:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
